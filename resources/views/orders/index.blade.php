@extends('layouts.admin')

@section('title', 'Riwayat Pesanan - Yammien 12K')

@push('styles')
<style>
    .orders-history {
        display: flex;
        flex-direction: column;
        gap: 22px;
    }

    .orders-table-wrap {
        overflow-x: auto;
        background: #fff;
        border: 1px solid var(--line);
        border-radius: 8px;
        box-shadow: var(--shadow-sm);
    }

    .orders-table {
        width: 100%;
        min-width: 780px;
        border-collapse: collapse;
    }

    .orders-table th,
    .orders-table td {
        padding: 14px 16px;
        text-align: left;
        font-size: 14px;
    }

    .orders-table tbody tr:hover td {
        background: #fffaf7;
    }

    .badge {
        display: inline-flex;
        align-items: center;
        padding: 6px 10px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 800;
    }

    .bg-success {
        background: #ecfdf3;
        color: #067647;
    }

    .bg-warning {
        background: #fffbeb;
        color: #b45309;
    }
</style>
@endpush

@section('content')
    <section class="orders-history">
        <div class="header-section">
            <h2>Riwayat Pesanan</h2>
            <div class="menu-actions">
                <a href="{{ route('orders.create') }}" class="btn add">
                    <i class="fa-solid fa-plus"></i> Buat Pesanan Baru
                </a>
            </div>
        </div>

        <div class="orders-table-wrap">
            <table class="orders-table">
                <thead>
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
                                <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info btn-sm">
                                    <i class="fa-solid fa-receipt"></i> Struk
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" style="text-align: center; padding: 42px; color: var(--muted);">
                                Belum ada riwayat pesanan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection
