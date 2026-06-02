<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Yammien 12K - Login</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Inter", sans-serif;
    }

    body {
      background:
        linear-gradient(120deg, rgba(24, 33, 47, 0.72), rgba(240, 90, 40, 0.38)),
        url("{{ asset('images/yammien-hero.png') }}") no-repeat center center / cover;
      background-color: #f6f7fb;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 24px;
    }

    .login-container {
      width: 100%;
      max-width: 1080px;
      display: flex;
      justify-content: flex-end;
      align-items: center;
    }

    .login-box {
      background: rgba(255, 255, 255, 0.92);
      padding: 36px;
      border-radius: 8px;
      box-shadow: 0 24px 70px rgba(24, 33, 47, 0.22);
      text-align: left;
      width: 410px;
      border: 1px solid rgba(255, 255, 255, 0.76);
      backdrop-filter: blur(14px);
    }

    .brand-mark {
      width: 52px;
      height: 52px;
      border-radius: 8px;
      display: grid;
      place-items: center;
      margin-bottom: 18px;
      background: linear-gradient(135deg, #f05a28, #ff9a62);
      color: #fff;
      font-size: 24px;
      font-weight: 800;
      box-shadow: 0 14px 28px rgba(240, 90, 40, 0.25);
    }

    .brand-name {
      font-size: 30px;
      font-weight: 800;
      color: #18212f;
      line-height: 1.05;
      margin-bottom: 8px;
    }

    .brand-name span {
      color: #f05a28;
    }

    .login-subtitle {
      color: #687386;
      font-size: 14px;
      line-height: 1.6;
      margin-bottom: 26px;
    }

    .login-title {
      font-size: 15px;
      font-weight: 800;
      color: #18212f;
      margin-bottom: 14px;
    }

    .input-field {
      width: 100%;
      padding: 13px 14px;
      border: 1px solid #e7eaf0;
      border-radius: 8px;
      font-size: 15px;
      margin-bottom: 14px;
      outline: none;
      transition: all 0.3s ease;
      background: #fff;
      color: #18212f;
    }

    .input-field:focus {
      border-color: #f05a28;
      box-shadow: 0 0 0 4px rgba(240, 90, 40, 0.14);
    }

    .login-btn {
      width: 100%;
      padding: 13px;
      background: linear-gradient(135deg, #f05a28, #ff8a4c);
      color: white;
      border: none;
      border-radius: 8px;
      font-weight: 800;
      font-size: 16px;
      cursor: pointer;
      transition: box-shadow 0.2s ease, transform 0.2s ease;
      box-shadow: 0 14px 28px rgba(240, 90, 40, 0.25);
    }

    .login-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 18px 34px rgba(24, 33, 47, 0.18);
    }

    .register-text {
      margin-top: 20px;
      font-size: 14px;
      color: #333;
    }

    .register-text a {
      color: #f05a28;
      text-decoration: none;
      font-weight: 600;
    }

    .register-text a:hover {
      text-decoration: underline;
    }

    .error-message {
      color: #dc2626;
      font-size: 13px;
      text-align: left;
      margin-top: -10px;
      margin-bottom: 10px;
    }

    @media (max-width: 480px) {
      .login-box {
        width: 100%;
        padding: 28px;
      }
    }
  </style>
</head>
<body>
  <div class="login-container">
    <div class="login-box">
      <div class="brand-mark">Y</div>
      <div class="brand-name">Yammien <span>12K</span></div>
      <p class="login-subtitle">Masuk ke dashboard kasir untuk mengelola menu, meja, transaksi, dan riwayat penjualan.</p>
      <h2 class="login-title">Login akun</h2>

      <form method="POST" action="{{ route('login') }}">
        @csrf

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

        <button type="submit" class="login-btn">Masuk</button>
      </form>

    </div>
  </div>
</body>
</html>
