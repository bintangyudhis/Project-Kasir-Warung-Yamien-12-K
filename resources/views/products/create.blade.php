@extends('layouts.admin')

@section('title', 'Tambah Menu - MeTime')

@push('styles')
<style>
    .error-message {
      color: #d9534f; /* Warna merah untuk error */
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
    position: relative; /* Penting untuk drag drop */
  }

  .upload-box:hover {
    border-color: #ff6633;
    background-color: #fff4ef;
  }

  /* Style tambahan untuk efek saat didrag */
  .upload-box.drag-over {
    border-color: #ff6633;
    background-color: #fff4ef;
    transform: scale(1.02);
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
        <h2>Tambah Menu Baru</h2>

        <form class="menu-form" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="form-group">
            <label>Nama Menu</label>
            <input type="text" name="name" placeholder="Masukkan nama menu" value="{{ old('name') }}" required>
            @error('name')
              <span class="error-message">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group">
            <label>Deskripsi</label>
            <textarea rows="3" name="description" placeholder="Masukkan deskripsi menu">{{ old('description') }}</textarea>
            @error('description')
              <span class="error-message">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group">
            <label>Harga</label>
            <input type="number" name="price" placeholder="Masukkan harga" value="{{ old('price') }}" required>
            @error('price')
              <span class="error-message">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group">
            <label>Kategori</label>
            <select name="category_id" required>
              <option value="" selected disabled>Pilih kategori</option>
              @foreach ($categories as $category)
                  <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
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
                <input type="number" name="stock_quantity" placeholder="Masukkan jumlah stok" required min="1">

                @error('stock_quantity')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

          <div class="form-group">
            <label>Gambar Menu</label>
            {{-- Tambahkan ID drop-zone --}}
            <div class="upload-box" id="drop-zone">
              <p>Klik atau Tarik Gambar ke Sini</p>
              {{-- Input file tetap hidden --}}
              <input type="file" name="photo" id="photo-input" style="display: none;" accept="image/*">
            </div>
            <span id="file-name" style="font-size: 12px; color: #666; margin-top: 5px;"></span>
            @error('photo')
              <span class="error-message">{{ $message }}</span>
            @enderror
          </div>

          {{-- Script Drag & Drop --}}
          <script>
            const dropZone = document.getElementById('drop-zone');
            const photoInput = document.getElementById('photo-input');
            const fileNameDisplay = document.getElementById('file-name');

            // 1. Klik box untuk buka file manager (seperti sebelumnya)
            dropZone.addEventListener('click', () => photoInput.click());

            // 2. Saat file input berubah lewat klik
            photoInput.addEventListener('change', function() {
                if (this.files.length > 0) {
                    fileNameDisplay.textContent = 'File dipilih: ' + this.files[0].name;
                }
            });

            // 3. Drag Over: Beri efek visual saat file ditarik ke atas box
            dropZone.addEventListener('dragover', (e) => {
                e.preventDefault();
                dropZone.classList.add('drag-over');
            });

            // 4. Drag Leave: Hapus efek saat file keluar box
            dropZone.addEventListener('dragleave', () => {
                dropZone.classList.remove('drag-over');
            });

            // 5. Drop: Tangani file yang dilepas
            dropZone.addEventListener('drop', (e) => {
                e.preventDefault();
                dropZone.classList.remove('drag-over');

                if (e.dataTransfer.files.length > 0) {
                    // Masukkan file yang didrop ke input form
                    photoInput.files = e.dataTransfer.files;
                    
                    // Tampilkan nama file
                    fileNameDisplay.textContent = 'File dipilih: ' + e.dataTransfer.files[0].name;
                }
            });
          </script>

          <div class="form-actions">
            <button type="submit" class="btn save">Simpan</button>
            <a href="{{ route('products.index') }}" class="btn cancel">Batal</a>
          </div>
        </form>
      </div>
@endsection