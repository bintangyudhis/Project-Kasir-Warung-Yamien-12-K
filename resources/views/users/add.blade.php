@extends('layouts.admin')

@section('title', 'Tambah Akun Pengguna')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        .edit-container {
            max-width: 620px;
            margin: 50px auto;
            background: #fff;
            border-radius: 18px;
            padding: 35px 45px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }

        .edit-container:hover {
            box-shadow: 0 14px 36px rgba(0, 0, 0, 0.12);
            transform: translateY(-3px);
        }

        h1 {
            font-size: 1.7rem;
            font-weight: 700;
            color: #1e293b;
            text-align: center;
            margin-bottom: 30px;
            letter-spacing: 0.5px;
        }

        form label {
            font-weight: 600;
            color: #334155;
            display: block;
            margin-bottom: 8px;
        }

        form input,
        form select {
            width: 100%;
            padding: 12px 14px;
            border-radius: 10px;
            border: 1px solid #d1d5db;
            background-color: #f9fafb;
            transition: all 0.25s ease;
        }

        form input:focus,
        form select:focus {
            outline: none;
            border-color: #6366f1;
            background-color: #fff;
            box-shadow: 0 0 5px rgba(99, 102, 241, 0.3);
        }

        .form-group {
            margin-bottom: 22px;
        }

        .form-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 30px;
            gap: 10px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px 20px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.95rem;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: all 0.25s ease-in-out;
        }

        .btn i {
            font-size: 0.9rem;
        }

        /* Tombol Confirm – gradient style */
        .btn-save-edit {
            background: linear-gradient(135deg, #4f46e5, #6366f1);
            color: #fff;
            box-shadow: 0 4px 14px rgba(99, 102, 241, 0.25);
            position: relative;
            overflow: hidden;
        }

        .btn-save-edit::after {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.15);
            transition: all 0.3s ease;
        }

        .btn-save-edit:hover::after {
            left: 100%;
        }

        .btn-save-edit:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(99, 102, 241, 0.35);
        }

        /* Tombol Batal */
        .btn-cancel {
            background: #e2e8f0;
            color: #1e293b;
        }

        .btn-cancel:hover {
            background: #cbd5e1;
            transform: translateY(-1px);
        }
    </style>
@endpush

@section('content')
    <div class="edit-container">
        <h1><i class="fas fa-user-plus"></i> Tambah Akun Pengguna</h1>
        <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="username">Nama Pengguna (Username)</label>
                <input type="text" id="username" name="username" placeholder="Masukkan username..." required>
                @error('username')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="fullname">Nama Lengkap</label>
                <input type="text" id="fullname" name="fullname" placeholder="Masukkan fullname..." required>
                @error('fullname')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Alamat Email</label>
                <input type="email" id="email" name="email" placeholder="contoh@email.com" required>
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Kata Sandi</label>
                <input type="password" id="password" name="password" placeholder="Minimal 8 karakter" required>
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="role">Hak Akses (Role)</label>
                <select id="role" name="role" required>
                    <option value="" disabled {{ old('role') ? '' : 'selected' }}>Pilih Role...</option>
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="cashier" {{ old('role') == 'cashier' ? 'selected' : '' }}>Kasir</option>
                </select>
                @error('role')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="photo">Foto Profil (Opsional)</label>
                <input type="file" id="photo" name="photo" accept="image/*">
                @error('photo')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-save-edit">
                    <i class="fas fa-check-circle"></i> Confirm
                </button>
                <a href="{{ route('users.index') }}" class="btn btn-cancel">
                    <i class="fas fa-arrow-left"></i> Batal
                </a>
            </div>
        </form>
    </div>
@endsection
