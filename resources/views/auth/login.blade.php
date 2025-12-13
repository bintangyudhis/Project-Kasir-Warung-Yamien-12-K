<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>MeTime - Login</title>
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
      background-color: #f97316;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .login-container {
      width: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .login-box {
      background: rgba(255, 255, 255, 0.95);
      padding: 50px 60px;
      border-radius: 16px;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
      text-align: center;
      width: 380px;
    }

    .login-title {
      font-size: 28px;
      font-weight: 700;
      color: #000;
      margin-bottom: 30px;
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
      box-shadow: 0 0 4px rgba(249, 115, 22, 0.4);
    }

    .login-btn {
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

    .login-btn:hover {
      background-color: #ea580c;
      transform: translateY(-2px);
    }

    .register-text {
      margin-top: 20px;
      font-size: 14px;
      color: #333;
    }

    .register-text a {
      color: #f97316;
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
        width: 90%;
        padding: 40px 30px;
      }
    }
  </style>
</head>
<body>
  <div class="login-container">
    <div class="login-box">
      <h2 class="login-title">Login</h2>

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

        <button type="submit" class="login-btn">LOGIN</button>
      </form>

    </div>
  </div>
</body>
</html>
