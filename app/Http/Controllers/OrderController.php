<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Table;
use App\Models\ActivityLog;
use App\Models\Category;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Midtrans\Config;
use Midtrans\Snap;

class OrderController extends Controller
{
    protected $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');
    }
    public function index(Request $request)
    {
        $query = Product::query();


        if ($request->has('search') && $request->search) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }


        if ($request->has('category') && $request->category && $request->category != 'semua') {
            $query->whereHas('category', function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->category . '%');
            });
        }

        $products = $query->get();

        $cart = session()->get('cart', []);

        $totalAmount = 0;
        foreach ($cart as $item) {
            $totalAmount += $item['price'] * $item['quantity'];
        }

        $categories = Category::all();

        return view('kasir.menu.index', compact('products', 'cart', 'totalAmount', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();

        $cart = session()->get('cart', []);

        $totalAmount = 0;
        foreach ($cart as $item) {
            $totalAmount += $item['price'] * $item['quantity'];
        }

        $availableTables = Table::doesntHave('activeBooking')->get();

        return view('kasir.menu.create', compact('products', 'cart', 'totalAmount', 'availableTables'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'order_date' => 'required|date',
            'table_id' => 'nullable|exists:tables,id',
            'payment_method' => 'required|in:cash,midtrans',
        ]);

        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->back()->with('error', 'Keranjang kosong! Silahkan tambah produk dulu.');
        }

        $totalAmount = 0;
        foreach ($cart as $id => $item) {
            $totalAmount += $item['price'] * $item['quantity'];
        }

        try {
            DB::beginTransaction();

            $bookingId = null;
            $tableInfo = "";

            if ($request->table_id) {
                $booking = Booking::create([
                    'table_id' => $request->table_id,
                    'user_id' => Auth::id(),
                    'status' => 'filled',
                ]);

                $bookingId = $booking->id;

                $table = Table::find($request->table_id);
                $tableInfo = " di meja " . $table->table_number;
            }else {
                $tableInfo = " (Take Away)";
            }

            $trx_id = Payment::generateTransactionId();

            $order = Order::create([
                'user_id' => Auth::id(),
                'booking_id' => $bookingId,
                'customer_name' => $request->customer_name,
                'order_date' => $request->order_date,
                'total_amount' => $totalAmount,
            ]);

            $payment = Payment::create([
                'order_id' => $order->id,
                'amount' => $totalAmount,
                'payment_method' => $request->payment_method,
                'status' => $request->payment_method == 'cash' ? 'paid' : 'unpaid',
                'payment_date' => $request->order_date,
                'transaction_id' => $trx_id,
            ]);

            foreach ($cart as $productId => $item) {
                OrderItems::create([
                    'order_id' => $order->id,
                    'product_id' => $productId,
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                ]);

                $product = Product::find($productId);
                $product->decrement('stock_quantity', $item['quantity']);
            }

            DB::commit();

            ActivityLog::create([
                'activity_type' => 'make order',
                'description' => 'Membuat pesanan baru untuk ' . $request->customer_name . $tableInfo . ' dengan total Rp' . number_format($totalAmount, 0, ',', '.'),
                'user_id' => Auth::id(),
            ]);

            session()->forget('cart');

            if ($request->payment_method == 'midtrans') {
                $params = [
                    'transaction_details' => [
                        'order_id' => $trx_id,
                        'gross_amount' => (int) $order->total_amount,
                    ],
                    'customer_details' => [
                        'first_name' => $request->customer_name,
                    ],
                ];

                try {
                    $snapToken = Snap::getSnapToken($params);

                    $payment->update([
                        'midtrans_transaction' => $snapToken
                    ]);

                    return view('kasir.payment.midtrans', compact('order', 'snapToken'));
                } catch (\Exception $e) {
                    return redirect()
                        ->route('orders.index')
                        ->with('error', 'Gagal generate Midtrans token: ' . $e->getMessage());
                }
            }


            return redirect()
                ->route('orders.show', $order->id)
                ->with('success', 'Pesanan berhasil dibuat! Pembayaran Cash.');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()
                ->back()
                ->with('error', 'Gagal membuat pesanan: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $order->load('items.product', 'payment', 'user', 'booking.table');

        return view('orders.show', compact('order'));
    }
    public function history(Request $request){
         $query = Order::with('user', 'payment', 'items.product', 'booking.table')->orderBy('created_at', 'desc');


         $userRole = Auth::user()->role;


         if ($userRole == 'admin') {

             if ($request->has('date') && $request->date) {
                 $query->whereDate('order_date', $request->date);
             }


             if ($request->has('month') && $request->month) {
                 $query->whereMonth('order_date', $request->month);
                 if ($request->has('year') && $request->year) {
                     $query->whereYear('order_date', $request->year);
                 }
             }

             $orders = $query->get();
             return view('kasir.history.index', compact('orders'));
         }


         $orders = $query->get();
         return view('kasir.history.kasir', compact('orders'));
    }

    public function exportPdf(Request $request)
    {
        $query = Order::with('user', 'payment', 'items.product', 'booking.table')->orderBy('created_at', 'desc');

        if ($request->filter == 'daily' && $request->has('date') && $request->date) {
            $query->whereDate('order_date', $request->date);
        } elseif ($request->filter == 'monthly') {
            $month = $request->month ?? date('m');
            $year = $request->year ?? date('Y');
            $query->whereMonth('order_date', $month)->whereYear('order_date', $year);
        }

        $orders = $query->get();

        $pdf = Pdf::loadView('orders.pdf', compact('orders'))
            ->setPaper('a4', 'landscape');

        $filename = 'riwayat-penjualan-';
        if ($request->filter == 'daily' && $request->has('date') && $request->date) {
            $filename .= $request->date;
        } elseif ($request->filter == 'monthly') {
            $month = $request->month ?? date('m');
            $year = $request->year ?? date('Y');
            $filename .= $year . '-' . str_pad($month, 2, '0', STR_PAD_LEFT);
        } else {
            $filename .= date('Y-m-d');
        }

        return $pdf->download($filename . '.pdf');
    }

    public function exportExcel(Request $request)
    {
        $query = Order::with('user', 'payment', 'items.product')->orderBy('created_at', 'desc');

        if ($request->filter == 'daily' && $request->has('date') && $request->date) {
            $query->whereDate('order_date', $request->date);
            $filename = 'riwayat-penjualan-' . $request->date . '.csv';
        } elseif ($request->filter == 'monthly') {
            $month = $request->month ?? date('m');
            $year = $request->year ?? date('Y');
            $query->whereMonth('order_date', $month)->whereYear('order_date', $year);
            $filename = 'riwayat-penjualan-' . $year . '-' . str_pad($month, 2, '0', STR_PAD_LEFT) . '.csv';
        } else {
            $filename = 'riwayat-penjualan-' . date('Y-m-d') . '.csv';
        }

        $orders = $query->get();

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        $callback = function() use ($orders) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['Transaction ID', 'Tanggal', 'Waktu', 'Customer', 'Total Item', 'Payment Method', 'Total Amount', 'Status']);

            foreach ($orders as $order) {
                fputcsv($file, [
                    $order->payment->transaction_id ?? 'N/A',
                    \Carbon\Carbon::parse($order->order_date)->format('Y-m-d'),
                    \Carbon\Carbon::parse($order->created_at)->format('H:i:s'),
                    $order->customer_name,
                    $order->items->count(),
                    $order->payment->payment_method ?? 'N/A',
                    $order->total_amount,
                    $order->payment->status ?? 'N/A'
                ]);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
    public function midtransCallback(Request $request)
    {
        $serverKey = config('services.midtrans.serverKey');
        $hashed = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        if ($hashed == $request->signature_key) {
            $payment = Payment::where('transaction_id', $request->order_id)->first();

            if ($payment) {
                Log::info('Payment Found', [
                    'payment_id' => $payment->id,
                    'current_status' => $payment->status,
                    'new_status' => $request->transaction_status
                ]);

                if ($request->transaction_status == 'capture' || $request->transaction_status == 'settlement') {
                    $payment->update([
                        'status' => 'paid',
                        'payment_date' => now(),
                    ]);


                    $order = $payment->order;
                    ActivityLog::create([
                        'activity_type' => 'check payment',
                        'description' => 'Pembayaran berhasil untuk order #' . $order->id . ' melalui Midtrans',
                        'user_id' => $order->user_id,
                    ]);

                } elseif ($request->transaction_status == 'pending') {
                    $payment->update(['status' => 'unpaid']);
                } elseif (in_array($request->transaction_status, ['deny', 'expire', 'cancel'])) {
                    $payment->update(['status' => 'unpaid']);
                }

                return response()->json(['success' => true]);
            } else {
                return response()->json(['success' => false, 'message' => 'Payment not found'], 404);
            }
        }


        return response()->json(['success' => false, 'message' => 'Invalid signature'], 400);
    }
}
