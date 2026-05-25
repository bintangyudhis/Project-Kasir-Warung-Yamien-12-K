@extends('layouts.admin')

@section('title', 'Edit Profil Saya')

@section('content')
    <div class="account-edit-wrapper">

        <div class="account-edit-card">

            <div class="card-header">
                <h2><i class="fa-solid fa-user-pen"></i> Edit Profil Saya</h2>
            </div>

            <form class="account-form" action="{{ route('cashier.update', $user->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group profile-section">
                    <div class="avatar-wrapper">
                        @if ($user->photo)
                            <img src="{{ asset('storage/' . $user->photo) }}" alt="Foto Profil" class="avatar-img">
                        @else
                            <div class="no-photo-placeholder">
                                <i class="fa-solid fa-user"></i>
                            </div>
                        @endif

                        <label for="photo" class="upload-btn-overlay" title="Ganti Foto">
                            <i class="fa-solid fa-camera"></i>
                        </label>
                    </div>

                    <input type="file" id="photo" name="photo" accept="image/*" style="display: none;"
                        onchange="previewImage(event)">
                    <p class="photo-hint">Klik ikon kamera untuk mengganti foto</p>

                    @error('photo')
                        <small class="error-text">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-grid">
                    <div class="form-group">
                        <label for="fullname">Nama Lengkap</label>
                        <input type="text" id="fullname" name="fullname" value="{{ old('fullname', $user->fullname) }}"
                            class="form-control" readonly style="background-color: #f0f0f0; cursor: not-allowed;">
                        @error('fullname') <small class="error-text">{{ $message }}</small> @enderror
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" value="{{ old('username', $user->username) }}"
                            class="form-control" required>
                        @error('username') <small class="error-text">{{ $message }}</small> @enderror
                    </div>

                    <div class="form-group full-width">
                        <label for="email">Alamat Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
                            class="form-control" readonly style="background-color: #f0f0f0; cursor: not-allowed;">
                        @error('email') <small class="error-text">{{ $message }}</small> @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Kata Sandi Baru <span class="optional-text">(Opsional)</span></label>
                        <input type="password" id="password" name="password" placeholder="********" class="form-control">
                        @error('password') <small class="error-text">{{ $message }}</small> @enderror
                    </div>

                    <div class="form-group">
                        <label for="role">Hak Akses</label>
                        <input type="text" class="form-control" value="Kasir" readonly
                            style="background-color: #f0f0f0; cursor: not-allowed;">
                        <input type="hidden" name="role" value="cashier">
                    </div>
                </div>

                <div class="form-actions">
                    <a href="{{ route('profile.show') }}" class="btn btn-secondary">
                        <i class="fa-solid "></i>Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa-solid fa-floppy-disk"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function () {
                var output = document.querySelector('.avatar-img');
                var placeholder = document.querySelector('.no-photo-placeholder');

                if (output) {
                    output.src = reader.result;
                } else if (placeholder) {
                    var newImg = document.createElement('img');
                    newImg.src = reader.result;
                    newImg.className = 'avatar-img';
                    newImg.alt = 'Foto Profil';
                    placeholder.parentNode.replaceChild(newImg, placeholder);
                }
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* ===== Global & Scrollbar Reset ===== */
        * {
            box-sizing: border-box;
        }

        /* Hide scrollbar completely */
        html,
        body {
            overflow-x: hidden;
            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        ::-webkit-scrollbar {
            display: none;
        }

        :root {
            --primary: #ff6633;
            --primary-dark: #e64a19;
            --primary-light: #fff0e6;
            --text-dark: #2d3436;
            --text-muted: #636e72;

            /* Background Abu-abu Netral */
            --bg-page: #eef2f5;

            --bg-card: #ffffff;
            --border-color: #e0e0e0;
            --radius: 12px;
            --shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        }

        /* ===== Wrapper: Center Content ===== */
        .account-edit-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            /* Vertikal Center */
            padding: 40px 20px;
            min-height: 100vh;
        }

        /* ===== Card Styling ===== */
        .account-edit-card {
            background-color: var(--bg-card);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            padding: 40px 50px;
            width: 100%;
            max-width: 750px;
            border-top: 5px solid var(--primary);
            animation: fadeIn 0.4s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card-header {
            margin-bottom: 35px;
            border-bottom: 1px solid var(--border-color);
            padding-bottom: 20px;
            text-align: center;
        }

        .card-header h2 {
            font-size: 1.6rem;
            color: var(--text-dark);
            margin: 0;
            display: inline-flex;
            align-items: center;
            gap: 12px;
        }

        .card-header h2 i {
            color: var(--primary);
            background: var(--primary-light);
            padding: 10px;
            border-radius: 50%;
            font-size: 1.1rem;
        }

        /* ===== Profile Photo Section ===== */
        .profile-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 35px;
        }

        .avatar-wrapper {
            position: relative;
            width: 130px;
            height: 130px;
            margin-bottom: 15px;
        }

        .avatar-img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #fff;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
        }

        .no-photo-placeholder {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background-color: var(--primary-light);
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3.5rem;
            border: 2px dashed var(--primary);
        }

        .upload-btn-overlay {
            position: absolute;
            bottom: 5px;
            right: 5px;
            background: var(--primary);
            color: white;
            width: 38px;
            height: 38px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            border: 3px solid #fff;
            transition: all 0.2s;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        }

        .upload-btn-overlay:hover {
            transform: scale(1.1);
            background: var(--primary-dark);
        }

        .photo-hint {
            font-size: 0.85rem;
            color: var(--text-muted);
            margin: 0;
        }

        /* ===== Form Grid Styling ===== */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        /* Responsive Grid: Jadi 1 kolom di HP */
        @media (max-width: 600px) {
            .form-grid {
                grid-template-columns: 1fr;
            }

            .account-edit-card {
                padding: 30px 20px;
            }
        }

        label {
            font-weight: 600;
            font-size: 0.95rem;
            color: var(--text-dark);
            margin-bottom: 8px;
        }

        .optional-text {
            font-weight: 400;
            color: var(--text-muted);
            font-size: 0.8rem;
        }

        .form-control {
            padding: 12px 16px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            font-size: 0.95rem;
            color: var(--text-dark);
            transition: all 0.3s;
            background-color: #fafafa;
            width: 100%;
        }

        .form-control:focus {
            border-color: var(--primary);
            background-color: #fff;
            box-shadow: 0 0 0 4px rgba(255, 102, 51, 0.1);
            outline: none;
        }

        .error-text {
            color: #e74c3c;
            font-size: 0.85rem;
            margin-top: 5px;
        }

        /* ===== Action Buttons ===== */
        .form-actions {
            margin-top: 40px;
            display: flex;
            justify-content: flex-end;
            gap: 15px;
            padding-top: 25px;
            border-top: 1px solid #eee;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 28px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
            gap: 8px;
            border: none;
        }

        .btn-primary {
            background-color: var(--primary);
            color: white;
            box-shadow: 0 4px 12px rgba(255, 102, 51, 0.25);
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(255, 102, 51, 0.35);
        }

        .btn-secondary {
            background-color: #f1f2f6;
            color: var(--text-dark);
        }

        .btn-secondary:hover {
            background-color: #e2e6ea;
            color: #000;
        }

        /* Mobile Button fix */
        @media (max-width: 480px) {
            .form-actions {
                flex-direction: column-reverse;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
@endpush