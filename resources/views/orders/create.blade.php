@extends('layouts.kasir')

@section('title', 'Checkout Pesanan - Yammien 12K')

@push('styles')
<style>
    .checkout-shell {
        display: grid;
        grid-template-columns: minmax(0, 1.35fr) minmax(340px, 0.65fr);
        gap: 22px;
        min-height: 100%;
    }

    .checkout-panel {
        background: #fff;
        border: 1px solid var(--line);
        border-radius: 8px;
        box-shadow: var(--shadow-sm);
        padding: 22px;
    }

    .checkout-header {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 16px;
        margin-bottom: 18px;
        padding-bottom: 16px;
        border-bottom: 1px solid var(--line);
    }

    .checkout-header p {
        color: var(--muted);
        font-size: 14px;
        margin-top: 6px;
    }

    .product-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
        gap: 16px;
        max-height: calc(100vh - 190px);
        overflow-y: auto;
        padding-right: 4px;
    }

    .product-card {
        background: #fff;
        border: 1px solid var(--line);
        border-radius: 8px;
        box-shadow: var(--shadow-sm);
        overflow: hidden;
        display: flex;
        flex-direction: column;
    }

    .product-card img,
    .product-card .product-empty {
        width: 100%;
        height: 132px;
        object-fit: cover;
        background: linear-gradient(135deg, #fff2ea, #edf5ff);
    }

    .product-empty {
        display: grid;
        place-items: center;
        color: #f05a28;
        font-size: 30px;
    }

    .product-body {
        padding: 14px;
        display: flex;
        flex-direction: column;
        gap: 8px;
        flex: 1;
    }

    .product-title {
        font-size: 15px;
        font-weight: 800;
        color: var(--ink);
        line-height: 1.35;
    }

    .product-meta {
        color: var(--muted);
        font-size: 13px;
    }

    .cart-list {
        display: flex;
        flex-direction: column;
        gap: 10px;
        max-height: 34vh;
        overflow-y: auto;
        margin-bottom: 18px;
    }

    .cart-item {
        display: grid;
        grid-template-columns: minmax(0, 1fr) auto auto;
        align-items: center;
        gap: 10px;
        padding: 12px;
        border: 1px solid var(--line);
        border-radius: 8px;
        background: #fff;
    }

    .cart-item strong {
        display: block;
        color: var(--ink);
        font-size: 14px;
    }

    .cart-item small {
        color: var(--muted);
    }

    .qty-form {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .qty-form input {
        width: 62px;
        padding: 8px;
        text-align: center;
    }

    .remove-btn {
        width: 34px;
        height: 34px;
        border: 0;
        border-radius: 8px;
        background: #dc2626;
        color: #fff;
        cursor: pointer;
        font-weight: 800;
    }

    .checkout-total {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 16px 0;
        border-top: 1px dashed var(--line);
        border-bottom: 1px dashed var(--line);
        margin-bottom: 18px;
        font-size: 18px;
        font-weight: 800;
    }

    .order-form {
        display: flex;
        flex-direction: column;
        gap: 14px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: 7px;
    }

    .form-group label {
        color: var(--ink);
        font-size: 13px;
        font-weight: 800;
    }

    .form-group input,
    .form-group select {
        width: 100%;
        padding: 12px;
    }

    .field-error {
        color: #dc2626;
        font-size: 12px;
        font-weight: 700;
    }

    .submit-order {
        width: 100%;
        padding: 13px;
        border: 0;
        border-radius: 8px;
        background: linear-gradient(135deg, var(--brand), #ff8a4c);
        color: #fff;
        font-weight: 800;
        cursor: pointer;
    }

    .empty-state {
        grid-column: 1 / -1;
        text-align: center;
        padding: 42px;
        color: var(--muted);
        border: 1px dashed var(--line);
        border-radius: 8px;
        background: #fff;
    }

    @media (max-width: 1024px) {
        .checkout-shell {
            grid-template-columns: 1fr;
        }

        .product-grid,
        .cart-list {
            max-height: none;
        }
    }
</style>
@endpush

@section('content')
    <section class="checkout-shell">
        <div class="checkout-panel">
            <div class="checkout-header">
                <div>
                    <h2>Daftar Produk</h2>
                    <p>Pilih menu yang akan masuk ke keranjang pesanan.</p>
                </div>
                <a href="{{ route('orders.index') }}" class="btn btn-info">
                    <i class="fa-solid fa-arrow-left"></i> Kembali
                </a>
            </div>

            <div class="product-grid">
                @forelse ($products as $product)
                    <div class="product-card">
                        @if ($product->photo)
                            <img src="{{ asset('storage/' . $product->photo) }}" alt="{{ $product->name }}">
                        @else
                            <div class="product-empty">
                                <i class="fa-solid fa-utensils"></i>
                            </div>
                        @endif

                        <div class="product-body">
                            <div class="product-title">{{ $product->name }}</div>
                            <div class="product-meta">Rp {{ number_format($product->price) }} | Stok: {{ $product->stock_quantity }}</div>

                            <form action="{{ route('cart.add', $product->id) }}" method="POST" style="margin-top: auto;">
                                @csrf
                                <button type="submit" class="btn add" style="width: 100%;">
                                    <i class="fa-solid fa-cart-plus"></i> Tambah
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="empty-state">Belum ada produk.</div>
                @endforelse
            </div>
        </div>

        <aside class="checkout-panel">
            <div class="checkout-header">
                <div>
                    <h2>Keranjang</h2>
                    <p>Lengkapi detail pesanan sebelum pembayaran.</p>
                </div>
            </div>

            <div class="cart-list">
                @forelse ($cart as $id => $item)
                    <div class="cart-item">
                        <div>
                            <strong>{{ $item['name'] }}</strong>
                            <small>Rp {{ number_format($item['price']) }}</small>
                        </div>

                        <form action="{{ route('cart.update', $id) }}" method="POST" class="qty-form">
                            @csrf
                            @method('PATCH')
                            <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1">
                            <button type="submit" class="btn btn-info btn-sm">Upd</button>
                        </form>

                        <form action="{{ route('cart.remove', $id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="remove-btn" aria-label="Hapus item">x</button>
                        </form>
                    </div>
                @empty
                    <div class="empty-state">Keranjang masih kosong.</div>
                @endforelse
            </div>

            <div class="checkout-total">
                <span>Total</span>
                <span>Rp {{ number_format($totalAmount) }}</span>
            </div>

            <form action="{{ route('orders.store') }}" method="POST" class="order-form">
                @csrf
                <div class="form-group">
                    <label for="customer_name">Nama Customer</label>
                    <input type="text" id="customer_name" name="customer_name" value="{{ old('customer_name') }}" required>
                    @error('customer_name')
                        <div class="field-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="order_date">Tanggal Order</label>
                    <input type="date" id="order_date" name="order_date" value="{{ old('order_date', date('Y-m-d')) }}" required>
                    @error('order_date')
                        <div class="field-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="table_id">Pilih Meja</label>
                    <select id="table_id" name="table_id">
                        <option value="">Take Away / Tidak Pilih Meja</option>
                        @foreach ($availableTables as $table)
                            <option value="{{ $table->id ?? '' }}">{{ $table->table_number }} (Kapasitas: {{ $table->capacity }})</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="payment_method">Metode Bayar</label>
                    <select id="payment_method" name="payment_method" required>
                        <option value="cash">Cash</option>
                        <option value="midtrans">Midtrans (Digital)</option>
                    </select>
                    @error('payment_method')
                        <div class="field-error">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="submit-order">
                    <i class="fa-solid fa-check"></i> Buat Pesanan
                </button>
            </form>
        </aside>
    </section>
@endsection
