<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Yammien 12K - Login Kasir</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
  <style>
    :root {
      --ink: #151821;
      --muted: #5c6574;
      --paper: #fffaf4;
      --line: #e6ded4;
      --brand: #d84b22;
      --brand-dark: #9d3215;
      --leaf: #386a4b;
      --charcoal: #20242b;
      --white: #ffffff;
      --radius: 8px;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      min-height: 100vh;
      font-family: "Inter", Arial, sans-serif;
      color: var(--white);
      background:
        linear-gradient(90deg, rgba(12, 14, 19, 0.86) 0%, rgba(12, 14, 19, 0.58) 48%, rgba(12, 14, 19, 0.2) 100%),
        url("<?php echo e(asset('images/yammien-hero.png')); ?>") center / cover no-repeat;
    }

    a {
      color: inherit;
      text-decoration: none;
    }

    .login-shell {
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      padding: 16px;
    }

    .topbar {
      width: min(1160px, 100%);
      min-height: 64px;
      margin: 0 auto;
      padding: 0 14px 0 18px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 16px;
      border: 1px solid rgba(255, 255, 255, 0.22);
      border-radius: 999px;
      background: rgba(255, 255, 255, 0.13);
      box-shadow: 0 20px 54px rgba(9, 12, 18, 0.22);
      backdrop-filter: blur(22px) saturate(150%);
    }

    .brand {
      font-size: 17px;
      font-weight: 900;
      line-height: 1;
    }

    .home-link {
      min-height: 42px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      padding: 0 17px;
      border: 1px solid rgba(255, 255, 255, 0.26);
      border-radius: 999px;
      color: var(--white);
      font-size: 14px;
      font-weight: 800;
      white-space: nowrap;
      transition: transform 0.18s ease, background 0.18s ease, border-color 0.18s ease;
    }

    .home-link:hover,
    .home-link:focus {
      transform: translateY(-1px);
      border-color: rgba(255, 255, 255, 0.55);
      background: rgba(255, 255, 255, 0.08);
      outline: none;
    }

    .login-main {
      width: min(1160px, 100%);
      flex: 1;
      margin: 0 auto;
      display: grid;
      grid-template-columns: minmax(0, 1fr) 430px;
      gap: 36px;
      align-items: center;
      padding: 52px 0 28px;
    }

    .intro {
      width: min(650px, 100%);
      text-shadow: 0 18px 46px rgba(8, 11, 16, 0.36);
    }

    .kicker {
      margin-bottom: 14px;
      color: #ffd2bd;
      font-size: 13px;
      font-weight: 900;
      text-transform: uppercase;
    }

    .intro h1 {
      margin-bottom: 18px;
      font-size: clamp(40px, 6vw, 76px);
      font-weight: 900;
      line-height: 0.98;
      letter-spacing: 0;
    }

    .intro p {
      color: rgba(255, 255, 255, 0.82);
      font-size: clamp(16px, 2vw, 20px);
      font-weight: 500;
      line-height: 1.6;
    }

    .login-card {
      width: 100%;
      padding: 30px;
      border: 1px solid rgba(255, 255, 255, 0.64);
      border-radius: 22px;
      background: rgba(255, 255, 255, 0.72);
      box-shadow: 0 22px 56px rgba(53, 36, 26, 0.16);
      color: var(--ink);
      backdrop-filter: blur(22px) saturate(150%);
    }

    .card-label {
      margin-bottom: 8px;
      color: var(--brand);
      font-size: 13px;
      font-weight: 900;
      text-transform: uppercase;
    }

    .login-card h2 {
      margin-bottom: 10px;
      font-size: 30px;
      font-weight: 900;
      line-height: 1.08;
    }

    .login-subtitle {
      margin-bottom: 24px;
      color: var(--muted);
      font-size: 14px;
      font-weight: 500;
      line-height: 1.6;
    }

    .field-group {
      margin-bottom: 14px;
    }

    .field-label {
      display: block;
      margin-bottom: 8px;
      color: #303742;
      font-size: 13px;
      font-weight: 800;
    }

    .input-field {
      width: 100%;
      min-height: 48px;
      padding: 0 14px;
      border: 1px solid var(--line);
      border-radius: var(--radius);
      background: rgba(255, 255, 255, 0.86);
      color: var(--ink);
      font-size: 15px;
      font-weight: 600;
      outline: none;
      transition: border-color 0.2s ease, box-shadow 0.2s ease, background 0.2s ease;
    }

    .input-field::placeholder {
      color: rgba(92, 101, 116, 0.72);
      font-weight: 500;
    }

    .input-field:focus {
      border-color: var(--brand);
      background: var(--white);
      box-shadow: 0 0 0 4px rgba(216, 75, 34, 0.14);
    }

    .password-wrap {
      position: relative;
    }

    .password-wrap .input-field {
      padding-right: 52px;
    }

    .password-toggle {
      position: absolute;
      top: 50%;
      right: 8px;
      width: 36px;
      height: 36px;
      display: grid;
      place-items: center;
      border: 0;
      border-radius: 999px;
      background: transparent;
      color: var(--muted);
      cursor: pointer;
      transform: translateY(-50%);
      transition: background 0.18s ease, color 0.18s ease;
    }

    .password-toggle:hover,
    .password-toggle:focus {
      background: rgba(216, 75, 34, 0.1);
      color: var(--brand);
      outline: none;
    }

    .password-toggle svg {
      width: 20px;
      height: 20px;
      stroke: currentColor;
    }

    .password-toggle .icon-eye {
      display: none;
    }

    .password-toggle .icon-eye-off {
      display: block;
    }

    .password-toggle.is-visible .icon-eye {
      display: block;
    }

    .password-toggle.is-visible .icon-eye-off {
      display: none;
    }

    .login-btn {
      width: 100%;
      min-height: 48px;
      margin-top: 4px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      border: 1px solid var(--brand);
      border-radius: 999px;
      background: var(--brand);
      color: var(--white);
      box-shadow: 0 14px 30px rgba(216, 75, 34, 0.34);
      font-size: 15px;
      font-weight: 900;
      cursor: pointer;
      transition: transform 0.18s ease, background 0.18s ease, border-color 0.18s ease;
    }

    .login-btn:hover,
    .login-btn:focus {
      transform: translateY(-1px);
      border-color: var(--brand-dark);
      background: var(--brand-dark);
      outline: none;
    }

    .error-message {
      margin-top: 8px;
      color: #b42318;
      font-size: 13px;
      font-weight: 700;
    }

    @media (max-width: 900px) {
      body {
        background:
          linear-gradient(180deg, rgba(12, 14, 19, 0.92) 0%, rgba(12, 14, 19, 0.64) 100%),
          url("<?php echo e(asset('images/yammien-hero.png')); ?>") center / cover no-repeat;
      }

      .login-main {
        grid-template-columns: 1fr;
        gap: 18px;
        align-content: center;
      }

      .intro,
      .login-card {
        width: min(560px, 100%);
        margin: 0 auto;
      }
    }

    @media (max-width: 520px) {
      .login-shell {
        padding: 12px;
      }

      .topbar {
        min-height: 60px;
        padding-left: 16px;
      }

      .home-link {
        min-height: 38px;
        padding: 0 14px;
      }

      .login-main {
        padding-top: 32px;
      }

      .login-card {
        padding: 20px;
        border-radius: 18px;
      }

      .intro h1 {
        font-size: 40px;
      }
    }
  </style>
</head>
<body>
  <div class="login-shell">
    <header class="topbar" aria-label="Navigasi login">
      <a href="<?php echo e(url('/')); ?>" class="brand">Yammien 12K</a>
      <a href="<?php echo e(url('/')); ?>" class="home-link">Beranda</a>
    </header>

    <main class="login-main">
      <section class="intro" aria-label="Informasi akses kasir">
        <div class="kicker">Akses internal warung</div>
        <h1>Masuk kasir untuk mulai melayani.</h1>
        <p>Kelola menu, meja, order, pembayaran, dan riwayat transaksi dari satu dashboard yang terpisah dari halaman pelanggan.</p>
      </section>

      <section class="login-card" aria-label="Form login kasir">
        <div class="card-label">Login kasir</div>
        <h2>Selamat datang.</h2>
        <p class="login-subtitle">Gunakan akun admin atau kasir yang sudah terdaftar untuk masuk ke sistem Yammien 12K.</p>

        <form method="POST" action="<?php echo e(route('login')); ?>">
          <?php echo csrf_field(); ?>

          <div class="field-group">
            <label class="field-label" for="email">Email</label>
            <input
              id="email"
              type="email"
              name="email"
              placeholder="nama@email.com"
              value="<?php echo e(old('email')); ?>"
              required
              autofocus
              autocomplete="username"
              class="input-field"
            />
            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <div class="error-message"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>

          <div class="field-group">
            <label class="field-label" for="password">Password</label>
            <div class="password-wrap">
              <input
                id="password"
                type="password"
                name="password"
                placeholder="Masukkan password"
                required
                autocomplete="current-password"
                class="input-field"
              />
              <button
                class="password-toggle"
                type="button"
                aria-label="Tampilkan password"
                aria-pressed="false"
                data-password-toggle
              >
                <svg class="icon-eye" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                  <path d="M2.06 12.35a1 1 0 0 1 0-.7C3.6 7.78 7.36 5 12 5c4.64 0 8.4 2.78 9.94 6.65a1 1 0 0 1 0 .7C20.4 16.22 16.64 19 12 19c-4.64 0-8.4-2.78-9.94-6.65Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <svg class="icon-eye-off" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                  <path d="m3 3 18 18" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M10.58 10.58A2 2 0 0 0 12 14a2 2 0 0 0 1.42-.58" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M9.88 5.09A10.72 10.72 0 0 1 12 5c4.64 0 8.4 2.78 9.94 6.65a1 1 0 0 1 0 .7 12.46 12.46 0 0 1-2.19 3.37" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M6.1 6.09a11.1 11.1 0 0 0-4.04 5.56 1 1 0 0 0 0 .7C3.6 16.22 7.36 19 12 19c1.1 0 2.15-.16 3.12-.47" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </button>
            </div>
            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <div class="error-message"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>

          <button type="submit" class="login-btn">Masuk</button>
        </form>
      </section>
    </main>
  </div>

  <script>
    const passwordInput = document.querySelector("#password");
    const passwordToggle = document.querySelector("[data-password-toggle]");

    passwordToggle?.addEventListener("click", () => {
      const isVisible = passwordInput.type === "text";

      passwordInput.type = isVisible ? "password" : "text";
      passwordToggle.classList.toggle("is-visible", !isVisible);
      passwordToggle.setAttribute("aria-pressed", String(!isVisible));
      passwordToggle.setAttribute("aria-label", isVisible ? "Tampilkan password" : "Sembunyikan password");
      passwordInput.focus();
    });
  </script>
</body>
</html>
<?php /**PATH D:\Project-Kasir-Warung-Yamien-12-K\resources\views/auth/login.blade.php ENDPATH**/ ?>