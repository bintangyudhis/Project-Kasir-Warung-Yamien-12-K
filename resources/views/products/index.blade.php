@extends('layouts.admin')

@section('title', 'Manajemen Menu - MeTime')

@push('styles')
<style>
    body {
        overflow: hidden;
    }

    .main-content {
        display: flex;
        flex-direction: column;
        overflow: hidden;
    }

    .header-section {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
    }

    .header-section h2 {
        font-size: 28px;
        color: #222;
    }

    .menu-actions {
        display: flex;
        gap: 10px;
    }

    .btn {
        padding: 10px 20px;
        border-radius: 8px;
        text-decoration: none;
        font-size: 14px;
        font-weight: 500;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        line-height: 1;
        gap: 5px
    }

    .btn.add {
        background-color: #ff6633;
        color: #fff;
    }

    .btn.add:hover {
        background-color: #e45522;
    }

    .btn.edit {
        background-color: #555;
        color: #fff;
    }

    .btn.edit:hover {
        background-color: #333;
    }

    .btn.profile {
        background-color: #6f42c1;
        color: #fff;
    }

    .btn.profile:hover {
        background-color: #59359a;
    }

    .btn-info {
        background-color: #17a2b8;
        color: #fff;
    }

    .btn-info:hover {
        background-color: #138496;
    }

    .btn-warning {
        background-color: #ffc107;
        color: #000;
    }

    .btn-warning:hover {
        background-color: #e0a800;
    }

    .btn-danger {
        background-color: #dc3545;
        color: #fff;
    }

    .btn-danger:hover {
        background-color: #c82333;
    }

    .btn-sm {
        padding: 6px 12px;
        font-size: 12px;
    }

    .menu-list {
        flex: 1;
        overflow-y: auto;
        padding-right: 10px;
    }

    .menu-list::-webkit-scrollbar {
        width: 6px;
    }

    .menu-list::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }

    .menu-list::-webkit-scrollbar-thumb {
        background: #ccc;
        border-radius: 10px;
    }

    .menu-list::-webkit-scrollbar-thumb:hover {
        background: #999;
    }

    .cards {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
        gap: 20px;
    }

    .card {
        background: #fff;
        border: 1px solid #e0e0e0;
        border-radius: 12px;
        padding: 15px;
        text-align: center;
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
    }

    .card:hover {
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        transform: translateY(-5px);
    }

    .img-placeholder {
        width: 100%;
        height: 150px;
        background: #f5f5f5;
        border-radius: 8px;
        margin-bottom: 15px;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .img-placeholder img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .card .title {
        font-size: 16px;
        font-weight: 600;
        color: #222;
        margin-bottom: 5px;
    }

    .card .desc {
        font-size: 12px;
        color: #999;
        margin-bottom: 8px;
    }

    .card .price {
        font-size: 18px;
        font-weight: bold;
        color: #ff6633;
        margin-bottom: 8px;
    }

    .card .status {
        font-size: 12px;
        font-weight: 600;
        padding: 4px 8px;
        border-radius: 6px;
        margin-bottom: 15px;
        display: inline-block;
    }

    .card .status.tersedia {
        background-color: #d4edda;
        color: #155724;
    }

    .card .status.tidak-tersedia {
        background-color: #f8d7da;
        color: #721c24;
    }

    .card-actions {
        display: flex;
        gap: 8px;
        justify-content: center;
        margin-top: auto;
    }

    .card-actions form {
        display: inline;
    }

    @media (max-width: 768px) {
        .header-section {
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
        }

        .menu-actions {
            width: 100%;
            flex-direction: column;
        }

        .cards {
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
        }
    }
</style>
@endpush

@section('content')
<section class="header-section">
    <h2>Manajemen Menu</h2>
    <div class="menu-actions">
        <a href="{{ route('products.create') }}" class="btn add">
            <i class="fa-solid fa-plus"></i> Tambah Menu
        </a>
        <a href="{{ route('categories.index') }}" class="btn edit">
            <i class="fa-solid fa-list"></i> Kategori
        </a>
    </div>
</section>

<section class="menu-list">
    <div class="cards">
        @forelse ($products as $product)
            <div class="card">
                <div class="img-placeholder">
                    @if ($product->photo)
                        <img src="{{ asset('storage/' . $product->photo) }}" alt="{{ $product->name }}">
                    @else
                        <i class="fa-solid fa-utensils" style="font-size: 48px; color: #ddd;"></i>
                    @endif
                </div>
                <p class="title">{{ $product->name }}</p>
                <p class="desc">{{ $product->category->name ?? 'No Category' }}</p>
                <p class="price">Rp{{ number_format($product->price, 0, ',', '.') }}</p>
                <p class="status {{ $product->stock_quantity > 0 ? 'tersedia' : 'tidak-tersedia' }}">
                    {{ $product->stock_quantity > 0 ? 'Tersedia (' . $product->stock_quantity . ')' : 'Tidak Tersedia' }}
                </p>

                <div class="card-actions">
                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm">
                        <i class="fa-solid fa-eye"></i> Lihat
                    </a>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">
                        <i class="fa-solid fa-pen"></i> Edit
                    </a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                            <i class="fa-solid fa-trash"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div style="grid-column: 1 / -1; text-align: center; padding: 60px 20px;">
                <i class="fa-solid fa-inbox" style="font-size: 64px; color: #ddd; margin-bottom: 20px; display: block;"></i>
                <p style="color: #999; font-size: 16px;">Belum ada produk.</p>
                <p style="color: #ccc; font-size: 14px; margin-top: 10px;">Klik tombol "Tambah Menu" untuk menambahkan produk baru.</p>
            </div>
        @endforelse
    </div>
</section>
@endsection
