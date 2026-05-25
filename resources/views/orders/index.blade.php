<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-10">
                <h1>Riwayat Pesanan</h1>
            </div>
            <div class="col-md-2 text-end">
                <a href="{{ route('orders.create') }}" class="btn btn-primary">Buat Pesanan Baru</a>
            </div>
        </div>
        
        <hr>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No. Transaksi</th>
                    <th>Customer</th>
                    <th>Tanggal</th>
                    <th>Total</th>
                    <th>Status Bayar</th>
                    <th>Kasir</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($orders as $order)
                    <tr>
                        <td><strong>{{ $order->payment->transaction_id ?? 'N/A' }}</strong></td>
                        <td>{{ $order->customer_name }}</td>
                        <td>{{ \Carbon\Carbon::parse($order->order_date)->format('d M Y') }}</td>
                        <td>Rp {{ number_format($order->total_amount) }}</td>
                        <td>
                            @if($order->payment && $order->payment->status == 'paid')
                                <span class="badge bg-success">LUNAS</span>
                            @else
                                <span class="badge bg-warning">BELUM LUNAS</span>
                            @endif
                        </td>
                        <td>{{ $order->user->name ?? 'N/A' }}</td>
                        <td>
                            <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info btn-sm">Lihat Struk</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Belum ada riwayat pesanan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</body>
</html>