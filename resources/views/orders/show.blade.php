<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Pesanan - {{ $order->payment->transaction_id ?? 'N/A' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            /*font-family: 'Courier New', Courier, monospace;*/
            background: #f5f5f5;
        }

        .screen-only {
            display: block;
        }

        .receipt-container {
            max-width: 600px;
            margin: 2rem auto;
            background: white;
            padding: 2rem;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        @media print {
            body {
                background: white;
                margin: 0;
                padding: 0;
            }

            .screen-only {
                display: none !important;
            }

            .receipt-container {
                width: 58mm;
                max-width: 58mm;
                margin: 0;
                padding: 2mm;
                border: none;
                border-radius: 0;
            }

            .thermal-receipt {
                width: 100%;
            }

            .text-center {
                text-align: center;
            }

            .text-right {
                text-align: right;
            }

            .header {
                margin-bottom: 3mm;
            }

            .header h3 {
                font-weight: bold;
                margin: 1mm 0;
            }

            .header p {
                margin: 0.5mm 0;
            }

            .divider {
                border-top: 1px dashed #000;
                margin: 2mm 0;
            }

            .info-row {
                display: flex;
                justify-content: space-between;
                margin: 1mm 0;
            }

            .info-label {
                font-weight: bold;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin: 2mm 0;
            }

            table thead th {
                border-bottom: 1px solid #000;
                padding: 1mm 0;
                text-align: left;
                font-weight: bold;
            }

            table tbody td {
                padding: 1mm 0;
                vertical-align: top;
            }

            table tfoot td {
                border-top: 1px solid #000;
                padding: 1mm 0;
                font-weight: bold;
            }

            .total-row {
                font-weight: bold;
            }

            .footer {
                text-align: center;
                margin-top: 3mm;
            }
        }
    </style>
</head>
<body>

    <div class="screen-only" style="background: #f5f5f5; padding: 20px 0;">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="max-width: 600px; margin: 0 auto 20px;">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(request('payment') == 'success')
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="max-width: 600px; margin: 0 auto 20px;">
                <strong>Pembayaran Berhasil!</strong> Transaksi telah dikonfirmasi.
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(request('payment') == 'pending')
            <div class="alert alert-warning alert-dismissible fade show" role="alert" style="max-width: 600px; margin: 0 auto 20px;">
                <strong>Pembayaran Pending!</strong> Menunggu konfirmasi pembayaran.
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
    </div>

    <div class="receipt-container">
        <div class="thermal-receipt">

            <div class="header text-center">
                <h3>MeTime</h3>
                <p>www.metime.web.id</p>
            </div>

            <div class="divider"></div>

            <div class="info-row">
                <span class="info-label">No.Trx</span>
                <span>{{ $order->payment->transaction_id ?? 'N/A' }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Tanggal</span>
                <span>{{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y H:i') }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Customer</span>
                <span>{{ $order->customer_name }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Kasir</span>
                <span>{{ Auth::user()->username }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Meja</span>
                <span>{{ $order->booking ? $order->booking->table->table_number : 'Take Away' }}</span>
            </div>

            <div class="divider"></div>

            <table>
                <thead>
                    <tr>
                        <th>Item</th>
                        <th style="text-align: center;">Qty</th>
                        <th style="text-align: right;">Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->items as $item)
                        <tr>
                            <td colspan="3">{{ $item->product->name ?? 'Produk Dihapus' }}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="text-align: center;">{{ $item->quantity }}x</td>
                            <td style="text-align: right;">{{ number_format($item->price, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="total-row">
                        <td colspan="2">TOTAL</td>
                        <td style="text-align: right;">{{ number_format($order->total_amount, 0, ',', '.') }}</td>
                    </tr>
                </tfoot>
            </table>

            <div class="divider"></div>

            <div class="info-row">
                <span class="info-label">Bayar</span>
                <span style="text-transform: uppercase;">{{ $order->payment->payment_method }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Status</span>
                <span>{{ $order->payment->status == 'paid' ? 'LUNAS' : 'PENDING' }}</span>
            </div>

            <div class="divider"></div>

            <div class="footer">
                <p>Terima kasih atas kunjungan Anda</p>
                <p>Selamat menikmati!</p>
                <p>=========================</p>
            </div>

        </div>

        <div class="text-center mt-4 screen-only">
            <a href="{{ route('orders.index') }}" class="btn btn-primary">Buat Pesanan Baru</a>
            <a href="{{ route('orders.history') }}" class="btn btn-secondary">Lihat Riwayat</a>
            <button onclick="window.print()" class="btn btn-success">
                <i class="fas fa-print"></i> Cetak Struk
            </button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
