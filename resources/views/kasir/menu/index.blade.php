@extends('layouts.kasir')

@section('title', 'Menu - Kasir MeTime')

@push('styles')
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            background: #f2f2f2;
            overflow-x: hidden;
            color: #333;
        }

        .container {
            display: flex;
            height: 100vh;
        }

        .sidebar {
            width: 220px;
            background-color: #000;
            color: #fff;

            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;

            display: flex;
            flex-direction: column;
            align-items: center;

            padding: 20px 0;
            overflow-y: auto;
            z-index: 1000;
        }

        .profile {
            text-align: center;
            margin-bottom: 40px;
        }

        .avatar {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background-color: #777;
            margin: 0 auto 10px;
        }

        .role {
            font-size: 12px;
            color: #aaa;
        }

        .name {
            font-size: 14px;
            color: #00c6ff;
        }

        .menu-nav {
            display: flex;
            flex-direction: column;
            gap: 20px;
            width: 100%;
            padding: 0 30px;
        }

        .menu-nav a {
            color: #ccc;
            text-decoration: none;
            font-size: 14px;
            transition: 0.3s;
            padding: 8px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .menu-nav a:hover,
        .menu-nav a.active {
            background-color: #ff6633;
            color: #fff;
        }

        .main-content {
            flex: 1.5;
            background: white;
            border-top-left-radius: 20px;
            border-bottom-left-radius: 20px;
            padding: clamp(12px, 3vw, 32px);
            width: 100%;
            max-width: 100%;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .kategori {
            display: flex;
            flex-direction: column;
            gap: 20px;

        }

        .search-bar {
            display: flex;
            gap: 10px;
        }

        .search-bar input {
            flex: 1;
            padding: 10px 15px;
            border-radius: 20px;
            border: 1px solid #ddd;
        }

        .search-bar button {
            background: white;
            border: none;
            cursor: pointer;
        }

        .kategori-buttons {
            display: flex;
            gap: 10px;
            overflow-x: auto;
            padding-bottom: 5px;

            /* hide scrollbar */
            scrollbar-width: none;
        }

        .kategori-buttons a {
            text-decoration: none;
        }

        .kategori-buttons::-webkit-scrollbar {
            height: 5px;
        }

        .kategori-buttons::-webkit-scrollbar-thumb {
            background: #ccc;
            border-radius: 10px;
        }

        .kategori-buttons button {
            padding: 10px 20px;
            border: none;
            border-radius: 10px;
            background: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            font-weight: 500;
            transition: 0.3s;
            white-space: nowrap;
            flex-shrink: 0;
        }

        .kategori-buttons button:hover {
            background: #f5f5f5;
        }

        .kategori-buttons button.active {
            background: #e75b27;
            color: white;
        }

        .kategori-buttons button.active:hover {
            background: #d14a1f;
        }

        .menu-list {
            margin-top: 20px;
            flex: 1;
            overflow-y: auto;
            padding-right: 10px;
        }

        .menu-list::-webkit-scrollbar {
            width: 6px;
        }

        .menu-list::-webkit-scrollbar-thumb {
            background-color: #ccc;
            border-radius: 10px;
        }

        .cards {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            padding-bottom: 30px;
        }

        .card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 15px;
            width: 140px;
            text-align: center;
        }

        .card .title {
            font-size: 13px;
            font-weight: 500;
            margin: 5px 0;
        }

        .card .price {
            font-size: 12px;
            color: #e75b27;
            font-weight: 600;
            margin: 3px 0;
        }

        .card .status {
            font-size: 11px;
            color: #666;
            margin: 3px 0 8px 0;
        }

        .img-placeholder {
            width: 100%;
            height: 80px;
            background: #ccc;
            border-radius: 10px;
            margin-bottom: 10px;
        }

        .btn-add-cart {
            width: 100%;
            padding: 8px;
            background: #e75b27;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 13px;
            cursor: pointer;
            font-weight: 500;
            transition: 0.3s;
        }

        .btn-add-cart:hover {
            background: #d14a1f;
        }

        .order-section {
            width: 380px;
            background: #f4f4f4;
            border-top-right-radius: 20px;
            border-bottom-right-radius: 20px;
            padding: 30px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .order-item {
            display: flex;
            align-items: center;
            gap: 10px;
            background: white;
            padding: 12px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .img-placeholder.small {
            width: 60px;
            height: 60px;
            background: #ccc;
            border-radius: 8px;
            flex-shrink: 0;
            overflow: hidden;
        }

        .img-placeholder.small img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .order-info {
            flex: 1;
            min-width: 0;
        }

        .order-info .item-name {
            font-size: 13px;
            font-weight: 500;
            margin: 0 0 4px 0;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .order-info .item-price {
            font-size: 12px;
            color: #666;
            margin: 0;
        }

        .qty-control {
            display: grid;
            grid-template-columns: auto auto;
            grid-template-rows: 1fr 1fr;
            gap: 5px;
            width: max-content;
        }

        .qty-control form {
            display: contents !important;
        }

        .qty-control input[type="number"] {
            grid-column: 1 / 2;
            grid-row: 1 / 3;

            width: 45px !important;
            height: 100% !important;
            padding: 0 !important;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            text-align: center;
            outline: none;
            margin: 0 !important;
        }

        .btn-update {
            grid-column: 2 / 3;
            grid-row: 1 / 2;

            width: 70px !important;
            height: 30px !important;
            background-color: #e75b27 !important;
            color: white !important;
            border: none !important;
            border-radius: 5px !important;
            font-size: 12px !important;
            font-weight: 500;
            cursor: pointer;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-remove {
            grid-column: 2 / 3;
            grid-row: 2 / 3;

            width: 70px !important;
            height: 30px !important;
            background-color: #c82333 !important;
            color: white !important;
            border: none !important;
            border-radius: 5px !important;
            font-size: 12px !important;
            font-weight: 500;
            cursor: pointer;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-update {
            background: #e75b27;
        }

        .btn-remove {
            background: #c82333;
        }

        .btn-update:hover {
            background: #d14a1f;
        }

        .btn-remove:hover {
            background: #c82333;
        }

        .order-total {
            display: flex;
            justify-content: space-between;
            font-weight: 600;
        }

        .btn-pay {
            background: #e75b27;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 12px;
            font-size: 15px;
            cursor: pointer;
        }

        /* ============================= */
        /* HIDE SCROLLBAR TAPI TETAP SCROLL */
        /* ============================= */

        /* Chrome, Safari, Edge */
        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }

        /* Firefox */
        .hide-scrollbar {
            scrollbar-width: none;
        }

        /* Internet Explorer & Edge lama */
        .hide-scrollbar {
            -ms-overflow-style: none;
        }
    </style>
@endpush

@section('content')
    <section class="kategori">
        <h2>Menu Kasir</h2>
        <form action="{{ route('orders.index') }}" method="GET" class="search-bar">
            <input type="text" name="search" placeholder="search menu" value="{{ request('search') }}" />
            <input type="hidden" name="category" value="{{ request('category', 'semua') }}" />
            <button type="submit">🔍</button>
        </form>
        <div class="kategori-buttons">
            <a href="{{ route('orders.index', ['category' => 'semua', 'search' => request('search')]) }}">
                <button type="button" class="{{ request('category', 'semua') == 'semua' ? 'active' : '' }}">semua</button>
            </a>

            @foreach ($categories as $category)
                @php
                    $categoryName = strtolower($category->name);
                @endphp

                <a href="{{ route('orders.index', ['category' => $categoryName, 'search' => request('search')]) }}">
                    <button type="button" class="{{ request('category') == $categoryName ? 'active' : '' }}">
                        {{ $category->name }} </button>
                </a>
            @endforeach
        </div>
    </section>

    <section class="menu-list">
        <h3>Menu</h3>
        <div class="cards" style="margin-top:20px;">
            @forelse ($products as $product)
                <div class="card">
                    @if ($product->photo)
                        <img src="{{ asset('storage/' . $product->photo) }}" alt="{{ $product->name }}"
                            style="width: 100%; height: 80px; object-fit: cover; border-radius: 10px; margin-bottom: 10px;">
                    @else
                        <div class="img-placeholder"></div>
                    @endif
                    <p class="title">{{ $product->name }}</p>
                    <p class="price">Rp{{ number_format($product->price, 0, ',', '.') }}</p>
                    <p class="status">{{ $product->stock_quantity > 0 ? 'tersedia' : 'tidak tersedia' }}</p>

                    @if ($product->stock_quantity > 0)
                        <form action="{{ route('cart.add', $product->id) }}" method="POST" style="margin-top: 5px;">
                            @csrf
                            <button type="submit" class="btn-add-cart">Tambah</button>
                        </form>
                    @endif
                </div>
            @empty
                <div style="width: 100%; text-align: center; padding: 40px;">
                    <p style="color: #999;">Belum ada produk.</p>
                </div>
            @endforelse
        </div>
    </section>
@endsection

@section('right-sidebar')
    <aside class="order-section">
        <h3>Pesanan</h3>

        <div style="flex: 1; overflow-y: auto; display: flex; flex-direction: column; gap: 10px;">
            @forelse ($cart as $id => $item)
                <div class="order-item">
                    <div class="img-placeholder small">
                        @if (isset($item['photo']) && $item['photo'])
                            <img src="{{ asset('storage/' . $item['photo']) }}" alt="{{ $item['name'] }}">
                        @endif
                    </div>

                    <div class="order-info">
                        <p class="item-name">{{ $item['name'] }}</p>
                        <p class="item-price">Rp{{ number_format($item['price'], 0, ',', '.') }}</p>
                    </div>

                    <div class="qty-control">
                        <form action="{{ route('cart.update', $id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" required>
                            <button type="submit" class="btn-update">Update</button>
                        </form>

                        <form action="{{ route('cart.remove', $id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-remove">Hapus</button>
                        </form>
                    </div>
                </div>
            @empty
                <div style="text-align: center; padding: 20px;">
                    <p style="color: #999; font-size: 14px;">Keranjang masih kosong.</p>
                </div>
            @endforelse
        </div>

        @if (!empty($cart))
            <div class="order-total">
                <p>Total</p>
                <p>Rp {{ number_format($totalAmount) }}</p>
            </div>

            <center>
                <a href="{{ route('orders.create') }}">
                    <button class="btn-pay">
                        Lanjutkan Pembayaran
                    </button>
                </a>
            </center>
        @endif
    </aside>
@endsection