@extends('layouts.admin')

@section('title', 'Detail Produk - Yammien 12K')

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
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px 0;
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
            flex: 1;
            background: #fff;
            border-top-left-radius: 20px;
            border-bottom-left-radius: 20px;
            padding: 40px;
            overflow-y: auto;
        }

        .detail-container {
            max-width: 900px;
            margin: 0 auto;
        }

        .detail-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .detail-header h2 {
            font-size: 26px;
            font-weight: 700;
            color: #222;
        }

        .btn {
            padding: 10px 18px;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            transition: 0.3s;
            text-decoration: none;
            text-align: center;
            display: inline-block;
        }

        .btn.back {
            background-color: #ccc;
            color: #333;
        }

        .btn.edit {
            background-color: #3b82f6;
            color: white;
        }

        .btn:hover {
            transform: translateY(-2px);
            opacity: 0.9;
        }

        .product-detail {
            display: flex;
            gap: 30px;
            background: #f9f9f9;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .product-image {
            flex-shrink: 0;
            width: 350px;
            height: 350px;
            border-radius: 15px;
            overflow: hidden;
            background: #e0e0e0;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .product-info {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .product-title {
            font-size: 28px;
            font-weight: 700;
            color: #222;
        }

        .product-category {
            display: inline-block;
            padding: 6px 12px;
            background-color: #e0f2fe;
            color: #0369a1;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            width: fit-content;
        }

        .product-description {
            font-size: 14px;
            color: #555;
            line-height: 1.6;
        }

        .product-price {
            font-size: 32px;
            font-weight: 700;
            color: #ff6633;
        }

        .product-stock {
            font-size: 14px;
            color: #666;
        }

        .product-actions {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                flex-direction: row;
                justify-content: space-around;
            }

            .main-content {
                padding: 20px;
            }

            .product-detail {
                flex-direction: column;
            }

            .product-image {
                width: 100%;
                height: 300px;
            }
        }
    </style>
@endpush

@section('content')
            <div class="detail-container">
                <div class="detail-header">
                    <h2>Detail Menu</h2>
                    <a href="{{ route('products.index') }}" class="btn back">Kembali</a>
                </div>

                <div class="product-detail">
                    <div class="product-image">
                        @if ($product->photo)
                            <img src="{{ asset('storage/' . $product->photo) }}" alt="{{ $product->name }}">
                        @else
                            <img src="https://via.placeholder.com/350" alt="No Image">
                        @endif
                    </div>

                    <div class="product-info">
                        <h1 class="product-title">{{ $product->name }}</h1>
                        <span class="product-category">{{ $product->category->name ?? 'No Category' }}</span>

                        <p class="product-description">
                            {{ $product->description ?? 'Tidak ada deskripsi untuk produk ini.' }}
                        </p>

                        <p class="product-price">Rp{{ number_format($product->price, 0, ',', '.') }}</p>

                        <p class="product-stock">Stok Tersisa: <strong>{{ $product->stock_quantity }}</strong></p>

                        <div class="product-actions">
                            <a href="{{ route('products.edit', $product->id) }}" class="btn edit">Edit Produk</a>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
