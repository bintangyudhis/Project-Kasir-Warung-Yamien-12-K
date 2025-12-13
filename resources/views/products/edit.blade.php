@extends('layouts.admin')
@section('title', 'Edit Produk - MeTime')

@push('styles')
<style>
        .error-message {
            color: #d9534f;
            font-size: 0.9em;
            margin-top: 5px;
            display: block;
        }

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

        .form-container {
            max-width: 600px;
            margin: 0 auto;
        }

        .form-container h2 {
            font-size: 26px;
            font-weight: 700;
            color: #222;
            margin-bottom: 25px;
        }

        .menu-form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        label {
            font-weight: 600;
            color: #333;
            font-size: 14px;
        }

        input,
        textarea,
        select {
            padding: 10px 14px;
            border-radius: 10px;
            border: 1px solid #ccc;
            font-size: 14px;
            outline: none;
            transition: 0.3s;
        }

        input:focus,
        textarea:focus,
        select:focus {
            border-color: #ff6633;
            box-shadow: 0 0 5px rgba(255, 102, 51, 0.3);
        }

        .upload-box {
            border: 2px dashed #bbb;
            border-radius: 10px;
            padding: 30px;
            text-align: center;
            color: #666;
            cursor: pointer;
            transition: 0.3s;
        }

        .upload-box:hover {
            border-color: #ff6633;
            background-color: #fff4ef;
        }

        .form-actions {
            display: flex;
            gap: 15px;
            margin-top: 20px;
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
        }

        .btn.save {
            background-color: #22c55e;
            color: white;
        }

        .btn.cancel {
            background-color: #ccc;
            color: #333;
        }

        .btn:hover {
            transform: translateY(-2px);
            opacity: 0.9;
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

            .form-container {
                width: 100%;
            }
        }
    </style>
@endpush

@section('content')
            <div class="form-container">
                <h2>Edit Menu</h2>
                <form class="menu-form" action="{{ route('products.update', $product->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label>Nama Menu</label>
                        <input type="text" name="name" placeholder="Masukkan nama menu"
                            value="{{ old('name', $product->name) }}" required>
                        @error('name')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea rows="3" name="description" placeholder="Masukkan deskripsi menu">{{ old('description', $product->name) }}</textarea>
                        @error('description')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Harga</label>
                        <input type="number" name="price" placeholder="Masukkan harga"
                            value="{{ old('price', $product->price) }}" step="any" required>
                        @error('price')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="category_id" required>
                            <option value="" selected disabled>Pilih kategori</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Jumlah Stok</label>
                        <input type="number" name="stock_quantity" placeholder="Masukkan jumlah stok"
                            value="{{ old('stock_quantity', $product->stock_quantity) }}" required min="0">

                        @error('stock_quantity')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Gambar Menu</label>
                        @if (isset($product) && $product->photo)
                            <div style="margin-bottom: 15px;">
                                <img src="{{ asset('storage/' . $product->photo) }}" alt="Foto {{ $product->name }}"
                                    style="width: 150px; height: auto; border-radius: 10px; border: 1px solid #eee;">
                            </div>
                            <label>Ganti Gambar (Opsional):</label>
                        @endif

                        <input type="file" name="photo">

                        @error('photo')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn save">Simpan</button>
                        <a href="{{ route('products.index') }}" class="btn cancel">Batal</a>
                    </div>
                </form>
            </div>
        @endsection
