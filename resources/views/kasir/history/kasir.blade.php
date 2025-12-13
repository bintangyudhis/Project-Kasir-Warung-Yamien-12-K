@extends('layouts.admin')

@section('title', 'Riwayat Transaksi - MeTime')

@push('styles')
    <style>
        .main-content {
            background-color: #f8f8f8;
            padding: 30px 100px;
            overflow-y: auto;
        }

        .main-content h2 {
            margin-bottom: 20px;
            color: #222;
        }

        .riwayat-container {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-right: 90px;
        }

        details summary {
            list-style: none;
            cursor: pointer;
        }

        details summary::-webkit-details-marker {
            display: none;
        }

        .transaksi {
            background: #fff;
            border-radius: 0px;
            padding: 12px 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .transaksi:hover {
            transform: scale(1.01);
        }

        .info-transaksi {
            display: grid;
            grid-template-columns: 25px 100px 110px 120px 100px 130px 100px 90px 40px;
            align-items: center;
            gap: 10px;
        }

        .arrow {
            color: #666;
            transition: transform 0.3s ease;
        }

        details[open] .arrow {
            transform: rotate(90deg);
            color: #ff6633;
        }

        .kode {
            font-weight: bold;
            color: #222;
        }

        .tanggal,
        .jam,
        .pesanan,
        .pembayaran {
            font-size: 13px;
            color: #666;
        }

        .pembayaran i,
        .jam i {
            margin-right: 4px;
            color: #555;
        }

        .total {
            font-weight: bold;
            color: #000;
        }

        .status {
            font-size: 13px;
            font-weight: 600;
            padding: 4px 10px;
            border-radius: 6px;
            text-align: center;
        }

        .status.selesai {
            color: #0c8800;
            background-color: #ccf8cc;
        }

        .status.pending {
            color: #ff8c00;
            background-color: #ffe4cc;
        }

        .status.failed {
            color: #cc0000;
            background-color: #ffcccc;
        }

        .btn-detail {
            background-color: #ff6633;
            color: #fff;
            border: none;
            border-radius: 6px;
            width: 30px;
            height: 30px;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: 0.2s;
            text-decoration: none;
        }

        .btn-detail:hover {
            background-color: #e45522;
            transform: scale(1.05);
        }

        .btn-detail i {
            pointer-events: none;
        }

        .detail-transaksi {
            margin-top: 12px;
            padding-top: 10px;
            border-top: 1px solid #eee;
            animation: fade 0.3s ease;
        }

        .detail-transaksi ul {
            list-style: none;
        }

        .detail-transaksi li {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
            color: #333;
        }

        .total-detail {
            display: flex;
            justify-content: space-between;
            margin-top: 8px;
            font-weight: bold;
        }

        @keyframes fade {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        body {
            background-color: #f2f32f2;
        }

        .main-content {
            background-color: #f8f8f8;
            padding: 30px 100px;
        }
    </style>
@endpush

@section('content')
    <h2>Riwayat Transaksi</h2>
    <div class="riwayat-container">

        @forelse($orders as $order)
            <details class="transaksi">
                <summary>
                    <div class="info-transaksi">
                        <i class="fa-solid fa-chevron-right arrow"></i>
                        <div class="kode">
                            {{ $order->payment->transaction_id ?? 'TRX' . str_pad($order->id, 3, '0', STR_PAD_LEFT) }}</div>
                        <div class="tanggal">{{ \Carbon\Carbon::parse($order->order_date)->format('d M Y') }}</div>
                        <div class="jam"><i class="fa-regular fa-clock"></i>
                            {{ \Carbon\Carbon::parse($order->created_at)->format('H:i') }}</div>
                        <div class="pesanan">{{ $order->items->count() }} Item</div>
                        <div class="pembayaran">
                            @if ($order->payment)
                                @if ($order->payment->payment_method == 'cash')
                                    <i class="fa-solid fa-money-bill-wave"></i> Cash
                                @elseif(in_array($order->payment->payment_method, ['gopay', 'shopeepay', 'dana']))
                                    <i class="fa-solid fa-wallet"></i> E-Wallet
                                @elseif($order->payment->payment_method == 'qris')
                                    <i class="fa-solid fa-qrcode"></i> QRIS
                                @else
                                    <i class="fa-solid fa-credit-card"></i> {{ ucfirst($order->payment->payment_method) }}
                                @endif
                            @else
                                <i class="fa-solid fa-question"></i> -
                            @endif
                        </div>
                        <div class="total">Rp{{ number_format($order->total_amount, 0, ',', '.') }}</div>
                         <a href="{{ route('orders.show', $order->id) }}" class="btn-detail" onclick="event.stopPropagation();">
                            <i class="fa-solid fa-receipt"></i>
                        </a>

                    </div>
                </summary>
                <div class="detail-transaksi">
                    <ul>
                        @foreach ($order->items as $item)
                            <li>
                                <span>{{ $item->product->name }} (x{{ $item->quantity }})</span>
                                <span>Rp{{ number_format($item->price * $item->quantity, 0, ',', '.') }}</span>
                            </li>
                        @endforeach
                    </ul>
                    <div class="total-detail">
                        <strong>Total</strong>
                        <span>Rp{{ number_format($order->total_amount, 0, ',', '.') }}</span>
                    </div>
                </div>
            </details>
        @empty
            <div style="text-align: center; padding: 40px; color: #999;">
                <i class="fa-solid fa-inbox" style="font-size: 48px; margin-bottom: 10px;"></i>
                <p>Belum ada transaksi</p>
            </div>
        @endforelse

    </div>
@endsection
