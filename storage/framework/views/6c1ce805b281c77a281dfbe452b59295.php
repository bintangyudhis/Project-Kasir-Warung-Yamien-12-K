<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Yammien 12K - Company Profile</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        :root {
            --brand: #f05a28;
            --brand-dark: #bd4216;
            --ink: #18212f;
            --muted: #667085;
            --line: #e8ebf1;
            --panel: #ffffff;
            --soft: #fff3ec;
            --canvas: #f7f8fb;
            --radius: 8px;
            --shadow: 0 18px 46px rgba(24, 33, 47, 0.12);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: "Inter", sans-serif;
            color: var(--ink);
            background: var(--canvas);
            line-height: 1.6;
        }

        img {
            max-width: 100%;
            display: block;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        .site-header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 20;
            background: rgba(255, 255, 255, 0.88);
            border-bottom: 1px solid rgba(232, 235, 241, 0.9);
            backdrop-filter: blur(14px);
        }

        .nav {
            width: min(1180px, calc(100% - 32px));
            min-height: 72px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
        }

        .brand {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            font-weight: 900;
        }

        .brand-mark {
            width: 42px;
            height: 42px;
            display: grid;
            place-items: center;
            border-radius: var(--radius);
            background: linear-gradient(135deg, var(--brand), #ff9a62);
            color: #fff;
            box-shadow: 0 12px 24px rgba(240, 90, 40, 0.24);
        }

        .brand-text {
            font-size: 18px;
            letter-spacing: 0;
        }

        .brand-text span {
            color: var(--brand);
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 22px;
            color: #475467;
            font-size: 14px;
            font-weight: 700;
        }

        .nav-links a:hover {
            color: var(--brand);
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-height: 42px;
            padding: 0 16px;
            border-radius: var(--radius);
            border: 1px solid var(--line);
            background: #fff;
            color: var(--ink);
            font-size: 14px;
            font-weight: 800;
            white-space: nowrap;
            transition: transform 0.18s ease, box-shadow 0.18s ease, border-color 0.18s ease;
        }

        .btn:hover {
            transform: translateY(-1px);
            border-color: rgba(240, 90, 40, 0.35);
            box-shadow: 0 12px 24px rgba(24, 33, 47, 0.12);
        }

        .btn-primary {
            border: 0;
            background: linear-gradient(135deg, var(--brand), #ff8a4c);
            color: #fff;
            box-shadow: 0 14px 28px rgba(240, 90, 40, 0.25);
        }

        .hero {
            position: relative;
            min-height: calc(100svh - 34px);
            display: grid;
            align-items: center;
            padding: 112px 0 76px;
            overflow: hidden;
            color: #fff;
            background:
                linear-gradient(90deg, rgba(11, 18, 32, 0.88) 0%, rgba(11, 18, 32, 0.72) 38%, rgba(11, 18, 32, 0.22) 72%),
                url("<?php echo e(asset('images/yammien-hero.png')); ?>") center / cover no-repeat;
        }

        .hero-inner {
            width: min(1180px, calc(100% - 32px));
            margin: 0 auto;
        }

        .hero-copy {
            width: min(620px, 100%);
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 10px;
            margin-bottom: 18px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.1);
            color: #ffe3d4;
            font-size: 13px;
            font-weight: 800;
            backdrop-filter: blur(10px);
        }

        .hero h1 {
            font-size: clamp(42px, 7vw, 82px);
            line-height: 0.98;
            font-weight: 900;
            letter-spacing: 0;
            margin-bottom: 20px;
        }

        .hero h1 span {
            color: #ffb088;
        }

        .hero p {
            width: min(560px, 100%);
            color: rgba(255, 255, 255, 0.86);
            font-size: clamp(16px, 2vw, 20px);
            margin-bottom: 28px;
        }

        .hero-actions {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        .hero-stats {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 12px;
            width: min(640px, 100%);
            margin-top: 34px;
        }

        .stat {
            padding: 16px;
            border-radius: var(--radius);
            border: 1px solid rgba(255, 255, 255, 0.18);
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(12px);
        }

        .stat strong {
            display: block;
            font-size: 24px;
            line-height: 1;
        }

        .stat span {
            display: block;
            margin-top: 6px;
            color: rgba(255, 255, 255, 0.72);
            font-size: 13px;
            font-weight: 700;
        }

        .section {
            padding: 72px 0;
        }

        .section.alt {
            background: #fff;
        }

        .wrap {
            width: min(1180px, calc(100% - 32px));
            margin: 0 auto;
        }

        .section-head {
            display: flex;
            align-items: end;
            justify-content: space-between;
            gap: 22px;
            margin-bottom: 28px;
        }

        .section-head h2 {
            font-size: clamp(26px, 4vw, 44px);
            line-height: 1.08;
            font-weight: 900;
        }

        .section-head p {
            width: min(420px, 100%);
            color: var(--muted);
            font-weight: 600;
        }

        .grid-3 {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
        }

        .card {
            border: 1px solid var(--line);
            border-radius: var(--radius);
            background: var(--panel);
            padding: 24px;
            box-shadow: 0 10px 24px rgba(24, 33, 47, 0.06);
        }

        .card-icon {
            width: 44px;
            height: 44px;
            display: grid;
            place-items: center;
            margin-bottom: 18px;
            border-radius: var(--radius);
            background: var(--soft);
            color: var(--brand);
            font-size: 18px;
        }

        .card h3 {
            font-size: 18px;
            margin-bottom: 8px;
        }

        .card p {
            color: var(--muted);
            font-weight: 500;
        }

        .profile-band {
            display: grid;
            grid-template-columns: 0.9fr 1.1fr;
            gap: 28px;
            align-items: center;
        }

        .profile-photo {
            min-height: 420px;
            border-radius: var(--radius);
            background:
                linear-gradient(180deg, rgba(240, 90, 40, 0.08), rgba(24, 33, 47, 0.22)),
                url("<?php echo e(asset('images/yammien-hero.png')); ?>") center / cover no-repeat;
            box-shadow: var(--shadow);
        }

        .profile-copy {
            padding: 32px;
            border-radius: var(--radius);
            background: #fff;
            border: 1px solid var(--line);
            box-shadow: var(--shadow);
        }

        .profile-copy h2 {
            font-size: clamp(28px, 4vw, 46px);
            line-height: 1.08;
            margin-bottom: 16px;
            font-weight: 900;
        }

        .profile-copy p {
            color: var(--muted);
            font-weight: 600;
            margin-bottom: 18px;
        }

        .check-list {
            display: grid;
            gap: 12px;
            margin-top: 22px;
        }

        .check-list li {
            list-style: none;
            display: flex;
            align-items: center;
            gap: 10px;
            color: #344054;
            font-weight: 800;
        }

        .check-list i {
            color: var(--brand);
        }

        .menu-strip {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 14px;
        }

        .menu-item {
            min-height: 170px;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 18px;
            border-radius: var(--radius);
            background: linear-gradient(135deg, #fff, #fff3ec);
            border: 1px solid #ffd8c7;
        }

        .menu-item span {
            color: var(--brand);
            font-size: 13px;
            font-weight: 900;
        }

        .menu-item strong {
            margin-top: 4px;
            font-size: 18px;
        }

        .cta {
            margin-bottom: 34px;
        }

        .cta-box {
            display: grid;
            grid-template-columns: 1fr auto;
            gap: 22px;
            align-items: center;
            padding: 30px;
            border-radius: var(--radius);
            background: #111827;
            color: #fff;
            box-shadow: var(--shadow);
        }

        .cta-box h2 {
            font-size: clamp(26px, 4vw, 42px);
            line-height: 1.1;
            margin-bottom: 8px;
        }

        .cta-box p {
            color: rgba(255, 255, 255, 0.74);
            font-weight: 600;
        }

        .site-footer {
            padding: 28px 0;
            border-top: 1px solid var(--line);
            background: #fff;
            color: var(--muted);
            font-size: 14px;
            font-weight: 700;
        }

        .footer-inner {
            width: min(1180px, calc(100% - 32px));
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            gap: 16px;
        }

        @media (max-width: 980px) {
            .nav-links {
                display: none;
            }

            .profile-band,
            .cta-box {
                grid-template-columns: 1fr;
            }

            .grid-3,
            .menu-strip {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 640px) {
            .nav {
                width: calc(100% - 24px);
                min-height: 64px;
            }

            .brand-text {
                font-size: 16px;
            }

            .nav-actions .btn:not(.btn-primary) {
                display: none;
            }

            .hero {
                min-height: auto;
                padding: 104px 0 54px;
                background:
                    linear-gradient(180deg, rgba(11, 18, 32, 0.9), rgba(11, 18, 32, 0.55)),
                    url("<?php echo e(asset('images/yammien-hero.png')); ?>") center / cover no-repeat;
            }

            .hero-stats,
            .grid-3,
            .menu-strip {
                grid-template-columns: 1fr;
            }

            .stat,
            .card,
            .profile-copy,
            .cta-box {
                padding: 20px;
            }

            .section {
                padding: 52px 0;
            }

            .section-head {
                align-items: flex-start;
                flex-direction: column;
            }

            .profile-photo {
                min-height: 280px;
            }

            .footer-inner {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <header class="site-header">
        <nav class="nav" aria-label="Navigasi utama">
            <a href="#home" class="brand">
                <span class="brand-mark">Y</span>
                <span class="brand-text">Yammien <span>12K</span></span>
            </a>

            <div class="nav-links">
                <a href="#profil">Profil</a>
                <a href="#layanan">Layanan</a>
                <a href="#menu">Menu</a>
                <a href="#kontak">Kontak</a>
            </div>

            <div class="nav-actions">
                <a href="#profil" class="btn">Tentang Kami</a>
                <a href="<?php echo e(route('kasir.entry')); ?>" class="btn btn-primary">
                    <i class="fa-solid fa-right-to-bracket"></i> Login Kasir
                </a>
            </div>
        </nav>
    </header>

    <main>
        <section id="home" class="hero">
            <div class="hero-inner">
                <div class="hero-copy">
                    <div class="eyebrow">
                        <i class="fa-solid fa-bowl-food"></i> Mie ayam hangat, cepat, dan ramah kantong
                    </div>
                    <h1>Yammien <span>12K</span></h1>
                    <p>Warung mie ayam modern dengan rasa rumahan, harga bersahabat, dan operasional kasir yang tertata untuk layanan dine in maupun take away.</p>

                    <div class="hero-actions">
                        <a href="#menu" class="btn btn-primary">
                            <i class="fa-solid fa-utensils"></i> Lihat Menu
                        </a>
                        <a href="<?php echo e(route('kasir.entry')); ?>" class="btn">
                            <i class="fa-solid fa-cash-register"></i> Akses Kasir
                        </a>
                    </div>

                    <div class="hero-stats" aria-label="Ringkasan Yammien 12K">
                        <div class="stat">
                            <strong>12K</strong>
                            <span>Harga mulai</span>
                        </div>
                        <div class="stat">
                            <strong>Dine In</strong>
                            <span>Makan di tempat</span>
                        </div>
                        <div class="stat">
                            <strong>Take Away</strong>
                            <span>Pesanan cepat</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="layanan" class="section">
            <div class="wrap">
                <div class="section-head">
                    <h2>Layanan yang sederhana, cepat, dan konsisten.</h2>
                    <p>Kami menjaga pengalaman pelanggan dari pemilihan menu, meja, pembayaran, hingga struk transaksi.</p>
                </div>

                <div class="grid-3">
                    <article class="card">
                        <div class="card-icon"><i class="fa-solid fa-store"></i></div>
                        <h3>Dine In</h3>
                        <p>Area makan nyaman untuk pelanggan yang ingin menikmati mie langsung di tempat.</p>
                    </article>
                    <article class="card">
                        <div class="card-icon"><i class="fa-solid fa-bag-shopping"></i></div>
                        <h3>Take Away</h3>
                        <p>Pesanan dibungkus cepat dengan alur kasir yang ringkas untuk jam ramai.</p>
                    </article>
                    <article class="card">
                        <div class="card-icon"><i class="fa-solid fa-receipt"></i></div>
                        <h3>Kasir Digital</h3>
                        <p>Transaksi, menu, meja, riwayat, dan laporan dikelola dalam satu sistem terproteksi login.</p>
                    </article>
                </div>
            </div>
        </section>

        <section id="profil" class="section alt">
            <div class="wrap">
                <div class="profile-band">
                    <div class="profile-photo" role="img" aria-label="Hidangan mie Yammien 12K"></div>
                    <div class="profile-copy">
                        <h2>Company Profile Yammien 12K</h2>
                        <p>Yammien 12K hadir sebagai warung mie ayam yang menggabungkan cita rasa lokal, harga terjangkau, dan pelayanan yang tertata. Fokus kami adalah makanan yang enak, cepat disajikan, dan mudah diakses pelanggan harian.</p>
                        <p>Untuk operasional internal, sistem kasir hanya dapat diakses melalui URL khusus dan wajib login agar data transaksi tetap aman.</p>
                        <ul class="check-list">
                            <li><i class="fa-solid fa-check"></i> Menu mie ayam dan minuman pendamping</li>
                            <li><i class="fa-solid fa-check"></i> Pengelolaan meja dan stok menu</li>
                            <li><i class="fa-solid fa-check"></i> Riwayat transaksi dan struk pembayaran</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section id="menu" class="section">
            <div class="wrap">
                <div class="section-head">
                    <h2>Menu favorit pelanggan.</h2>
                    <p>Pilihan sederhana yang mudah dipesan dan cocok untuk makan cepat.</p>
                </div>

                <div class="menu-strip">
                    <div class="menu-item">
                        <span>Favorit</span>
                        <strong>Mie Ayam Original</strong>
                    </div>
                    <div class="menu-item">
                        <span>Hangat</span>
                        <strong>Mie Yammien Gurih</strong>
                    </div>
                    <div class="menu-item">
                        <span>Tambahan</span>
                        <strong>Pangsit & Bakso</strong>
                    </div>
                    <div class="menu-item">
                        <span>Minuman</span>
                        <strong>Es Teh & Jeruk</strong>
                    </div>
                </div>
            </div>
        </section>

        <section id="kontak" class="cta">
            <div class="wrap">
                <div class="cta-box">
                    <div>
                        <h2>Akses sistem kasir Yammien 12K.</h2>
                        <p>Gunakan URL kasir untuk masuk ke dashboard. Pengguna yang belum login akan diarahkan ke halaman login terlebih dahulu.</p>
                    </div>
                    <a href="<?php echo e(route('kasir.entry')); ?>" class="btn btn-primary">
                        <i class="fa-solid fa-lock"></i> Buka URL Kasir
                    </a>
                </div>
            </div>
        </section>
    </main>

    <footer class="site-footer">
        <div class="footer-inner">
            <span>Yammien 12K</span>
            <span>Company profile & POS access</span>
        </div>
    </footer>
</body>
</html>
<?php /**PATH C:\Users\VICTUS\Documents\Project-Kasir-Warung-Yamien-12-K\resources\views/welcome.blade.php ENDPATH**/ ?>