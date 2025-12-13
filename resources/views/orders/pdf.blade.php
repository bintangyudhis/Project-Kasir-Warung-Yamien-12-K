<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Riwayat Transaksi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 5px;
        }
        .subtitle {
            text-align: center;
            color: #666;
            margin-bottom: 20px;
            font-size: 14px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th {
            background-color: #ff6633;
            color: white;
            padding: 10px;
            text-align: left;
            font-weight: bold;
        }
        td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .badge {
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 10px;
            font-weight: bold;
            display: inline-block;
        }
        .badge-takein { background-color: #28a745; color: white; }
        .badge-takeaway { background-color: #ffc107; color: #000; }
        .footer {
            margin-top: 30px;
            text-align: right;
            font-size: 10px;
            color: #666;
        }
        .summary {
            margin-top: 20px;
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
        }
        .summary-item {
            display: inline-block;
            width: 48%;
            margin-bottom: 10px;
        }
        .summary-label {
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body>
    <h1>Laporan Riwayat Transaksi</h1>
    <div class="subtitle">
        @if(request('date'))
            Tanggal: {{ \Carbon\Carbon::parse(request('date'))->format('d F Y') }}
        @elseif(request('month') && request('year'))
            Periode: {{ \Carbon\Carbon::create(request('year'), request('month'))->format('F Y') }}
        @else
            Semua Data
        @endif
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 8%">No</th>
                <th style="width: 15%">Tanggal</th>
                <th style="width: 12%">Order ID</th>
                <th style="width: 15%">Customer</th>
                <th style="width: 10%">Tipe</th>
                <th style="width: 15%">Payment</th>
                <th style="width: 15%">Total</th>
                <th style="width: 10%">Status</th>
            </tr>
        </thead>
        <tbody>
            @php $totalAmount = 0; @endphp
            @foreach($orders as $index => $order)
            @php $totalAmount += $order->total_amount; @endphp
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                <td>{{ $order->payment ? $order->payment->transaction_id : 'N/A' }}</td>
                <td>{{ $order->customer_name }}</td>
                <td>
                    @if($order->booking && $order->booking->table)
                        <span class="badge badge-takein">Dine In</span>
                    @else
                        <span class="badge badge-takeaway">Take Away</span>
                    @endif
                </td>
                <td>{{ $order->payment ? ucfirst($order->payment->payment_method) : '-' }}</td>
                <td>Rp {{ number_format($order->total_amount, 0, ',', '.') }}</td>
                <td>{{ ucfirst($order->payment->status) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="summary">
        <div class="summary-item">
            <span class="summary-label">Total Transaksi:</span> {{ count($orders) }} transaksi
        </div>
        <div class="summary-item">
            <span class="summary-label">Total Pendapatan:</span> Rp {{ number_format($totalAmount, 0, ',', '.') }}
        </div>
        @if(count($orders) > 0)
        <div class="summary-item">
            <span class="summary-label">Rata-rata Transaksi:</span> Rp {{ number_format($totalAmount / count($orders), 0, ',', '.') }}
        </div>
        @endif
    </div>

    <div class="footer">
        <p>Dicetak pada: {{ \Carbon\Carbon::now()->format('d F Y H:i:s') }}</p>
    </div>
</body>
</html>
