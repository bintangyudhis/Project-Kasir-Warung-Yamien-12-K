<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            overflow-x: hidden;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 230px;
            background-color: #343a40;
            color: white;
            padding-top: 20px;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 12px 20px;
        }

        .sidebar a:hover {
            background-color: #495057;
        }

        .content {
            margin-left: 230px;
            padding: 30px;
        }
    </style>
</head>

<body>


    <div class="content container-fluid">
        <h2>Edit Profil</h2>
        <hr>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="username" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="username" name="username"
                    value="{{ old('username', $user->username) }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Alamat Email</label>
                <input type="email" class="form-control" id="email" value="{{ $user->email }}" disabled>
            </div>

            <div class="mb-3">
                <label for="avatar" class="form-label">Foto Profil</label>
                @if ($profile && $profile->avatar)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $profile->avatar) }}" alt="Avatar" class="rounded-circle border"
                            width="100" height="100">

                    </div>
                @endif

                <input type="file" class="form-control" id="avatar" name="avatar" accept="image/*">
            </div>


            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>