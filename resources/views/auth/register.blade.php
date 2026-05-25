<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>MeTime - Daftar Akun</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      background: url("{{ asset('images/mie-bg.jpg') }}") no-repeat center center / cover;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: #f97316;
    }

    .register-container {
      width: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .register-box {
      background: rgba(255, 255, 255, 0.96);
      padding: 45px 55px;
      border-radius: 18px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
      text-align: center;
      width: 400px;
    }

    .register-title {
      font-size: 26px;
      font-weight: 700;
      color: #000;
      margin-bottom: 25px;
    }

    .input-field {
      width: 100%;
      padding: 12px 15px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 15px;
      margin-bottom: 15px;
      outline: none;
      transition: all 0.3s ease;
    }

    .input-field:focus {
      border-color: #f97316;
      box-shadow: 0 0 6px rgba(249, 115, 22, 0.4);
    }

    .register-btn {
      width: 100%;
      padding: 12px;
      background-color: #f97316;
      color: white;
      border: none;
      border-radius: 8px;
      font-weight: 600;
      font-size: 16px;
      cursor: pointer;
      transition: background 0.3s ease, transform 0.2s ease;
    }

    .register-btn:hover {
      background-color: #ea580c;
      transform: translateY(-2px);
    }

    .login-text {
      margin-top: 20px;
      font-size: 14px;
      color: #333;
    }

    .login-text a {
      color: #f97316;
      text-decoration: none;
      font-weight: 600;
    }

    .login-text a:hover {
      text-decoration: underline;
    }

    @media (max-width: 480px) {
      .register-box {
        width: 90%;
        padding: 35px 25px;
      }
      .register-title {
        font-size: 22px;
      }
    }

    .error-message {
      color: #dc2626;
      font-size: 13px;
      text-align: left;
      margin-top: -10px;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>
  <div class="register-container">
    <div class="register-box">
      <h2 class="register-title">Daftar Akun</h2>

      <form method="POST" action="{{ route('register') }}">
        @csrf

        <input
          type="text"
          name="username"
          placeholder="Username"
          value="{{ old('username') }}"
          required
          class="input-field"
        />
        @error('username')
          <div class="error-message">{{ $message }}</div>
        @enderror

        <input
          type="text"
          name="fullname"
          placeholder="Nama Lengkap"
          value="{{ old('fullname') }}"
          required
          class="input-field"
        />
        @error('fullname')
          <div class="error-message">{{ $message }}</div>
        @enderror

        <input
          type="email"
          name="email"
          placeholder="Email"
          value="{{ old('email') }}"
          required
          class="input-field"
        />
        @error('email')
          <div class="error-message">{{ $message }}</div>
        @enderror

        <input
          type="password"
          name="password"
          placeholder="Password"
          required
          class="input-field"
        />
        @error('password')
          <div class="error-message">{{ $message }}</div>
        @enderror

        <input
          type="password"
          name="password_confirmation"
          placeholder="Konfirmasi Password"
          required
          class="input-field"
        />

        <button type="submit" class="register-btn">DAFTAR</button>
      </form>

      <p class="login-text">
        Sudah punya akun? <a href="{{ route('login') }}" class="link">Login di sini</a>
      </p>
    </div>
  </div>
</body>
</html>
