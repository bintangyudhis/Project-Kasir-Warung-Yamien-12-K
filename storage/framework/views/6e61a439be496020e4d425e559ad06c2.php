<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Yammien 12K - Mie Yammien & Kasir</title>
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
            --glass: rgba(255, 255, 255, 0.18);
            --glass-strong: rgba(255, 255, 255, 0.72);
            --radius: 8px;
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
            font-family: "Inter", Arial, sans-serif;
            color: var(--ink);
            background:
                radial-gradient(circle at 12% 8%, rgba(216, 75, 34, 0.16), transparent 28%),
                radial-gradient(circle at 88% 18%, rgba(56, 106, 75, 0.13), transparent 30%),
                var(--paper);
            line-height: 1.6;
        }

        img {
            display: block;
            max-width: 100%;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        .site-header {
            position: fixed;
            inset: 16px 0 auto;
            z-index: 30;
            color: var(--white);
            pointer-events: none;
        }

        .site-header::before {
            content: "";
            position: absolute;
            inset: -16px 0 auto;
            height: 112px;
            background: linear-gradient(180deg, rgba(12, 14, 19, 0.54), transparent);
            pointer-events: none;
        }

        .nav {
            position: relative;
            width: min(1160px, calc(100% - 32px));
            min-height: 64px;
            margin: 0 auto;
            padding: 0 14px 0 18px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            border: 1px solid rgba(255, 255, 255, 0.22);
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.13);
            box-shadow: 0 20px 54px rgba(9, 12, 18, 0.22);
            backdrop-filter: blur(22px) saturate(150%);
            color: var(--white);
            pointer-events: auto;
        }

        .brand {
            display: flex;
            align-items: center;
            min-height: 42px;
            font-weight: 900;
        }

        .brand-name {
            font-size: 17px;
            letter-spacing: 0;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 5px;
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.08);
            color: rgba(255, 255, 255, 0.8);
            font-size: 14px;
            font-weight: 700;
        }

        .nav-links a {
            min-height: 34px;
            display: inline-flex;
            align-items: center;
            padding: 0 13px;
            border-radius: 999px;
        }

        .nav-links a:hover,
        .nav-links a:focus {
            background: rgba(255, 255, 255, 0.16);
            color: var(--white);
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .btn {
            min-height: 42px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0 17px;
            border-radius: 999px;
            border: 1px solid rgba(255, 255, 255, 0.26);
            color: var(--white);
            font-size: 14px;
            font-weight: 800;
            white-space: nowrap;
            transition: transform 0.18s ease, background 0.18s ease, border-color 0.18s ease;
        }

        .btn:hover {
            transform: translateY(-1px);
            border-color: rgba(255, 255, 255, 0.55);
            background: rgba(255, 255, 255, 0.08);
        }

        .btn-primary {
            border-color: var(--brand);
            background: var(--brand);
            color: var(--white);
            box-shadow: 0 14px 30px rgba(216, 75, 34, 0.34);
        }

        .btn-primary:hover {
            background: var(--brand-dark);
            border-color: var(--brand-dark);
        }

        .hero {
            min-height: 88svh;
            display: grid;
            align-items: end;
            padding: 132px 0 56px;
            color: var(--white);
            background:
                linear-gradient(90deg, rgba(12, 14, 19, 0.82) 0%, rgba(12, 14, 19, 0.46) 48%, rgba(12, 14, 19, 0.08) 100%),
                url("<?php echo e(asset('images/yammien-hero.png')); ?>") center / cover no-repeat;
        }

        .hero-inner,
        .wrap,
        .footer-inner {
            width: min(1160px, calc(100% - 32px));
            margin: 0 auto;
        }

        .hero-copy {
            width: min(650px, 100%);
            text-shadow: 0 18px 46px rgba(8, 11, 16, 0.36);
        }

        .kicker {
            margin-bottom: 14px;
            color: #ffd2bd;
            font-size: 13px;
            font-weight: 900;
            letter-spacing: 0;
            text-transform: uppercase;
        }

        .hero h1 {
            margin-bottom: 18px;
            font-size: clamp(42px, 7vw, 82px);
            font-weight: 900;
            line-height: 0.98;
            letter-spacing: 0;
        }

        .hero p {
            width: min(570px, 100%);
            margin-bottom: 28px;
            color: rgba(255, 255, 255, 0.82);
            font-size: clamp(16px, 2vw, 20px);
            font-weight: 500;
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .quick-info {
            margin-top: -34px;
            background: transparent;
            color: var(--white);
            position: relative;
            z-index: 2;
        }

        .quick-info-grid {
            width: min(1160px, calc(100% - 32px));
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.26);
            border-radius: 22px;
            background: rgba(255, 255, 255, 0.2);
            box-shadow: 0 22px 54px rgba(53, 36, 26, 0.16);
            backdrop-filter: blur(22px) saturate(150%);
        }

        .quick-item {
            padding: 24px;
            border-right: 1px solid rgba(255, 255, 255, 0.12);
            color: var(--ink);
        }

        .quick-item strong {
            display: block;
            margin-bottom: 4px;
            font-size: 24px;
            line-height: 1.1;
        }

        .quick-item span {
            color: rgba(21, 24, 33, 0.68);
            font-size: 14px;
            font-weight: 600;
        }

        .section {
            padding: 76px 0;
        }

        .section-white {
            background: var(--white);
        }

        .section-head {
            max-width: 760px;
            margin-bottom: 32px;
        }

        .section-head h2 {
            margin-bottom: 12px;
            font-size: clamp(28px, 4vw, 46px);
            font-weight: 900;
            line-height: 1.08;
            letter-spacing: 0;
        }

        .section-head p {
            color: var(--muted);
            font-size: 17px;
            font-weight: 500;
        }

        .about-grid {
            display: grid;
            grid-template-columns: 1.05fr 0.95fr;
            gap: 34px;
            align-items: center;
        }

        .about-photo {
            min-height: 420px;
            border-radius: 22px;
            background: url("<?php echo e(asset('images/yammien-hero.png')); ?>") center / cover no-repeat;
            box-shadow: 0 24px 48px rgba(32, 36, 43, 0.16);
        }

        .about-copy {
            display: grid;
            gap: 18px;
            padding: 28px;
            border: 1px solid rgba(255, 255, 255, 0.64);
            border-radius: 22px;
            background: rgba(255, 255, 255, 0.58);
            box-shadow: 0 20px 50px rgba(53, 36, 26, 0.12);
            backdrop-filter: blur(18px);
        }

        .about-copy p {
            color: var(--muted);
            font-size: 17px;
            font-weight: 500;
        }

        .plain-list {
            display: grid;
            gap: 12px;
            margin-top: 8px;
        }

        .plain-list li {
            list-style: none;
            padding: 14px 0;
            border-top: 1px solid var(--line);
            color: #303742;
            font-weight: 800;
        }

        .services {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
        }

        .service {
            min-height: 240px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 24px;
            border: 1px solid rgba(255, 255, 255, 0.64);
            border-radius: 22px;
            background: rgba(255, 255, 255, 0.56);
            box-shadow: 0 18px 42px rgba(53, 36, 26, 0.1);
            backdrop-filter: blur(18px);
        }

        .service small {
            color: var(--brand);
            font-size: 13px;
            font-weight: 900;
            text-transform: uppercase;
        }

        .service h3 {
            margin: 18px 0 10px;
            font-size: 22px;
            line-height: 1.18;
        }

        .service p {
            color: var(--muted);
            font-weight: 500;
        }

        .menu-layout {
            display: grid;
            grid-template-columns: 0.92fr 1.08fr;
            gap: 28px;
            align-items: stretch;
        }

        .menu-feature {
            min-height: 430px;
            display: flex;
            align-items: flex-end;
            padding: 24px;
            border-radius: 22px;
            background:
                linear-gradient(180deg, rgba(21, 24, 33, 0.04) 0%, rgba(21, 24, 33, 0.78) 100%),
                url("<?php echo e(asset('images/yammien-hero.png')); ?>") center / cover no-repeat;
            color: var(--white);
        }

        .menu-feature h3 {
            width: min(360px, 100%);
            font-size: clamp(28px, 4vw, 44px);
            line-height: 1.05;
        }

        .menu-list {
            display: grid;
            gap: 12px;
            padding: 20px 26px;
            border: 1px solid rgba(255, 255, 255, 0.66);
            border-radius: 22px;
            background: rgba(255, 255, 255, 0.62);
            box-shadow: 0 18px 42px rgba(53, 36, 26, 0.1);
            backdrop-filter: blur(18px);
        }

        .menu-row {
            display: grid;
            grid-template-columns: 1fr auto;
            gap: 18px;
            padding: 19px 0;
            border-bottom: 1px solid var(--line);
        }

        .menu-row h3 {
            margin-bottom: 4px;
            font-size: 18px;
        }

        .menu-row p {
            color: var(--muted);
            font-size: 14px;
            font-weight: 500;
        }

        .menu-row strong {
            color: var(--leaf);
            font-size: 18px;
            white-space: nowrap;
        }

        .testimonials {
            position: relative;
            overflow: hidden;
        }

        .testimonial-shell {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.62);
            border-radius: 24px;
            background: rgba(255, 255, 255, 0.5);
            box-shadow: 0 22px 56px rgba(53, 36, 26, 0.12);
            backdrop-filter: blur(20px) saturate(150%);
        }

        .testimonial-track {
            display: flex;
            transition: transform 0.55s ease;
        }

        .testimonial-card {
            min-width: 100%;
            display: grid;
            grid-template-columns: 0.82fr 1.18fr;
            gap: 26px;
            align-items: center;
            padding: 28px;
        }

        .review-score {
            min-height: 250px;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 24px;
            border-radius: 18px;
            background:
                linear-gradient(180deg, rgba(21, 24, 33, 0.04), rgba(21, 24, 33, 0.78)),
                url("<?php echo e(asset('images/yammien-hero.png')); ?>") center / cover no-repeat;
            color: var(--white);
        }

        .review-score strong {
            font-size: 54px;
            line-height: 1;
        }

        .review-score span {
            margin-top: 8px;
            color: rgba(255, 255, 255, 0.78);
            font-weight: 700;
        }

        .review-text blockquote {
            margin-bottom: 24px;
            font-size: clamp(24px, 4vw, 42px);
            font-weight: 900;
            line-height: 1.08;
            letter-spacing: 0;
        }

        .review-text p {
            color: var(--muted);
            font-size: 16px;
            font-weight: 600;
        }

        .testimonial-controls {
            position: absolute;
            right: 22px;
            bottom: 22px;
            display: flex;
            gap: 8px;
        }

        .slide-btn {
            min-width: 44px;
            height: 44px;
            padding: 0 16px;
            border: 1px solid rgba(21, 24, 33, 0.14);
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.7);
            color: var(--ink);
            cursor: pointer;
            font-size: 13px;
            font-weight: 800;
            line-height: 1;
            backdrop-filter: blur(10px);
        }

        .slide-btn:hover {
            background: var(--white);
        }

        .pos-band {
            background:
                linear-gradient(135deg, rgba(21, 24, 33, 0.96), rgba(44, 32, 26, 0.94)),
                url("<?php echo e(asset('images/yammien-hero.png')); ?>") center / cover no-repeat;
            color: var(--white);
        }

        .pos-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 34px;
            align-items: center;
        }

        .pos-panel {
            border: 1px solid rgba(255, 255, 255, 0.14);
            border-radius: 22px;
            overflow: hidden;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(18px);
        }

        .pos-panel-head {
            display: flex;
            justify-content: space-between;
            gap: 12px;
            padding: 16px 18px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.7);
            font-size: 13px;
            font-weight: 800;
        }

        .pos-lines {
            padding: 8px 18px 18px;
        }

        .pos-line {
            display: grid;
            grid-template-columns: 1fr auto;
            gap: 16px;
            padding: 14px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        .pos-line:last-child {
            border-bottom: 0;
        }

        .pos-line span {
            color: rgba(255, 255, 255, 0.62);
            font-size: 14px;
            font-weight: 600;
        }

        .pos-line strong {
            color: var(--white);
        }

        .pos-copy h2 {
            margin-bottom: 14px;
            font-size: clamp(28px, 4vw, 46px);
            line-height: 1.08;
        }

        .pos-copy p {
            margin-bottom: 24px;
            color: rgba(255, 255, 255, 0.72);
            font-size: 17px;
            font-weight: 500;
        }

        .site-footer {
            padding: 28px 0;
            border-top: 1px solid var(--line);
            background: var(--white);
            color: var(--muted);
            font-size: 14px;
            font-weight: 700;
        }

        .footer-inner {
            display: flex;
            justify-content: space-between;
            gap: 16px;
        }

        @media (max-width: 980px) {
            .nav-links {
                display: none;
            }

            .about-grid,
            .menu-layout,
            .pos-grid,
            .testimonial-card {
                grid-template-columns: 1fr;
            }

            .services {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 640px) {
            .nav {
                width: calc(100% - 24px);
                min-height: 64px;
            }

            .nav-actions .btn:not(.btn-primary) {
                display: none;
            }

            .hero {
                min-height: 82svh;
                padding: 104px 0 42px;
                background:
                    linear-gradient(180deg, rgba(12, 14, 19, 0.92) 0%, rgba(12, 14, 19, 0.62) 100%),
                    url("<?php echo e(asset('images/yammien-hero.png')); ?>") center / cover no-repeat;
            }

            .quick-info-grid,
            .services {
                grid-template-columns: 1fr;
            }

            .quick-info-grid {
                border-left: 0;
                border-radius: 18px;
            }

            .quick-item {
                padding: 20px;
                border-right: 0;
                border-bottom: 1px solid rgba(21, 24, 33, 0.1);
            }

            .section {
                padding: 56px 0;
            }

            .about-photo,
            .menu-feature {
                min-height: 290px;
            }

            .menu-row {
                grid-template-columns: 1fr;
                gap: 4px;
            }

            .about-copy,
            .testimonial-card {
                padding: 20px;
            }

            .testimonial-controls {
                position: static;
                padding: 0 20px 20px;
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
                <span class="brand-name">Yammien 12K</span>
            </a>

            <div class="nav-links">
                <a href="#profil">Profil</a>
                <a href="#layanan">Layanan</a>
                <a href="#menu">Menu</a>
                <a href="#testimoni">Review</a>
                <a href="#kasir">Kasir</a>
            </div>

            <div class="nav-actions">
                <a href="#menu" class="btn">Lihat Menu</a>
                <a href="<?php echo e(route('kasir.entry')); ?>" class="btn btn-primary">Login Kasir</a>
            </div>
        </nav>
    </header>

    <main>
        <section id="home" class="hero">
            <div class="hero-inner">
                <div class="hero-copy">
                    <div class="kicker">Warung Mie Yammien dengan harga jelas</div>
                    <h1>Mie Yammien hangat, porsi pas, mulai 12 ribu.</h1>
                    <p>Yammien 12K dibuat untuk pelanggan yang ingin makan cepat tanpa kehilangan rasa rumahan: mie kenyal, ayam gurih, sayur segar, dan alur kasir yang rapi saat jam ramai.</p>
                    <div class="hero-actions">
                        <a href="#menu" class="btn btn-primary">Lihat Pilihan Menu</a>
                        <a href="<?php echo e(route('kasir.entry')); ?>" class="btn">Masuk Sistem Kasir</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="quick-info" aria-label="Ringkasan Yammien 12K">
            <div class="quick-info-grid">
                <div class="quick-item">
                    <strong>12K</strong>
                    <span>Harga menu utama dibuat ramah untuk makan harian.</span>
                </div>
                <div class="quick-item">
                    <strong>Dine in</strong>
                    <span>Pesanan meja diproses langsung melalui sistem kasir.</span>
                </div>
                <div class="quick-item">
                    <strong>Take away</strong>
                    <span>Alur bungkus dibuat singkat untuk pesanan cepat.</span>
                </div>
            </div>
        </section>

        <section id="profil" class="section section-white">
            <div class="wrap">
                <div class="about-grid">
                    <div class="about-photo" role="img" aria-label="Semangkuk Mie Yammien Yammien 12K di meja kayu"></div>
                    <div class="about-copy">
                        <div class="section-head">
                            <h2>Profil singkat Yammien 12K.</h2>
                            <p>Konsepnya sederhana: Mie Yammien yang mudah dipesan, harga tidak bikin ragu, dan pelayanan yang tetap teratur walau antrean sedang padat.</p>
                        </div>
                        <p>Landing page ini menampilkan sisi pelanggan, sementara akses kasir dipisahkan untuk pengguna internal. Data menu, meja, order, pembayaran, dan riwayat transaksi dikelola setelah login.</p>
                        <ul class="plain-list">
                            <li>Menu utama berfokus pada Mie Yammien, yammien, topping, dan minuman pendamping.</li>
                            <li>Transaksi kasir diarahkan ke dashboard sesuai role pengguna.</li>
                            <li>Riwayat penjualan dan struk tersimpan untuk kebutuhan operasional.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section id="layanan" class="section">
            <div class="wrap">
                <div class="section-head">
                    <h2>Layanan yang dekat dengan kebiasaan pelanggan.</h2>
                    <p>Tidak dibuat rumit. Pelanggan bisa makan di tempat, bawa pulang, atau memesan menu tambahan dengan alur yang mudah dipahami kasir.</p>
                </div>

                <div class="services">
                    <article class="service">
                        <div>
                            <small>01</small>
                            <h3>Makan di tempat</h3>
                            <p>Nomor meja, menu, jumlah pesanan, dan pembayaran dicatat agar pesanan tidak tercampur.</p>
                        </div>
                    </article>
                    <article class="service">
                        <div>
                            <small>02</small>
                            <h3>Bungkus cepat</h3>
                            <p>Untuk pelanggan yang buru-buru, kasir bisa langsung menambahkan item dan memproses pembayaran.</p>
                        </div>
                    </article>
                    <article class="service">
                        <div>
                            <small>03</small>
                            <h3>Operasional kasir</h3>
                            <p>Admin dan kasir masuk melalui halaman login, lalu diarahkan ke menu kerja masing-masing.</p>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <section id="menu" class="section section-white">
            <div class="wrap">
                <div class="section-head">
                    <h2>Menu Yammien 12K sesuai papan harga.</h2>
                    <p>Pilih yammien original, tambah pangsit atau bakso, sampai minuman dingin untuk menemani makan.</p>
                </div>

                <div class="menu-layout">
                    <div class="menu-feature">
                        <h3>Yammien hangat, topping jelas, harga langsung terlihat.</h3>
                    </div>
                    <div class="menu-list" aria-label="Daftar menu Yammien 12K">
                        <div class="menu-row">
                            <div>
                                <h3>Yammien</h3>
                                <p>Menu original dengan racikan yammien khas warung.</p>
                            </div>
                            <strong>12K</strong>
                        </div>
                        <div class="menu-row">
                            <div>
                                <h3>Yammien Pangsit</h3>
                                <p>Yammien dengan tambahan pangsit.</p>
                            </div>
                            <strong>15K</strong>
                        </div>
                        <div class="menu-row">
                            <div>
                                <h3>Yammien Bakso</h3>
                                <p>Yammien dengan tambahan bakso.</p>
                            </div>
                            <strong>15K</strong>
                        </div>
                        <div class="menu-row">
                            <div>
                                <h3>Yammien Carsiu</h3>
                                <p>Yammien dengan topping carsiu.</p>
                            </div>
                            <strong>15K</strong>
                        </div>
                        <div class="menu-row">
                            <div>
                                <h3>Yammien Bakso Pangsit</h3>
                                <p>Porsi lebih lengkap dengan bakso dan pangsit.</p>
                            </div>
                            <strong>18K</strong>
                        </div>
                        <div class="menu-row">
                            <div>
                                <h3>Es Campur</h3>
                                <p>Minuman dingin manis untuk pendamping yammien.</p>
                            </div>
                            <strong>10K</strong>
                        </div>
                        <div class="menu-row">
                            <div>
                                <h3>Es Milky Jelly</h3>
                                <p>Minuman susu jelly yang segar dan creamy.</p>
                            </div>
                            <strong>11K</strong>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="testimoni" class="section testimonials">
            <div class="wrap">
                <div class="section-head">
                    <h2>Kata pelanggan yang sudah mampir.</h2>
                    <p>Review dibuat singkat seperti obrolan setelah makan: soal rasa, harga, dan pelayanan saat warung sedang ramai.</p>
                </div>

                <div class="testimonial-shell" aria-label="Review pelanggan">
                    <div class="testimonial-track" data-testimonial-track>
                        <article class="testimonial-card">
                            <div class="review-score">
                                <strong>4.8</strong>
                                <span>Rasa gurih, harga aman</span>
                            </div>
                            <div class="review-text">
                                <blockquote>"Mienya enak, ayamnya berasa, dan porsinya pas buat makan siang. Harga 12 ribu masih masuk banget."</blockquote>
                                <p>Raka, pelanggan dine in</p>
                            </div>
                        </article>
                        <article class="testimonial-card">
                            <div class="review-score">
                                <strong>5.0</strong>
                                <span>Pesanan cepat dibungkus</span>
                            </div>
                            <div class="review-text">
                                <blockquote>"Biasanya beli buat dibawa ke kantor. Kasirnya cepat, pesanan jelas, dan kuahnya tetap rapi dipisah."</blockquote>
                                <p>Nadia, pelanggan take away</p>
                            </div>
                        </article>
                        <article class="testimonial-card">
                            <div class="review-score">
                                <strong>4.9</strong>
                                <span>Cocok untuk makan harian</span>
                            </div>
                            <div class="review-text">
                                <blockquote>"Tempatnya sederhana tapi bersih. Menu tidak banyak, jadi gampang pilih dan rasanya konsisten."</blockquote>
                                <p>Ardi, pelanggan reguler</p>
                            </div>
                        </article>
                    </div>

                    <div class="testimonial-controls" aria-label="Kontrol review">
                        <button class="slide-btn" type="button" data-slide-prev>Semula</button>
                        <button class="slide-btn" type="button" data-slide-next>Berikutnya</button>
                    </div>
                </div>
            </div>
        </section>

        <section id="kasir" class="section pos-band">
            <div class="wrap">
                <div class="pos-grid">
                    <div class="pos-copy">
                        <h2>Akses kasir dibuat terpisah dari halaman pelanggan.</h2>
                        <p>Halaman ini berfungsi sebagai company profile dan pintu masuk. Pengguna internal tetap harus login sebelum mengelola menu, meja, order, pembayaran, dan laporan.</p>
                        <a href="<?php echo e(route('kasir.entry')); ?>" class="btn btn-primary">Buka Login Kasir</a>
                    </div>

                    <div class="pos-panel" aria-label="Contoh ringkasan transaksi">
                        <div class="pos-panel-head">
                            <span>Ringkasan kasir</span>
                            <span>Hari ini</span>
                        </div>
                        <div class="pos-lines">
                            <div class="pos-line">
                                <span>Pesanan masuk</span>
                                <strong>Dine in / take away</strong>
                            </div>
                            <div class="pos-line">
                                <span>Data utama</span>
                                <strong>Menu, meja, stok</strong>
                            </div>
                            <div class="pos-line">
                                <span>Output</span>
                                <strong>Struk dan riwayat</strong>
                            </div>
                            <div class="pos-line">
                                <span>Akses</span>
                                <strong>Login role pengguna</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="site-footer">
        <div class="footer-inner">
            <span>Yammien 12K</span>
            <span>Company profile dan akses POS</span>
        </div>
    </footer>
    <script>
        const track = document.querySelector("[data-testimonial-track]");
        const slides = Array.from(document.querySelectorAll(".testimonial-card"));
        const prevButton = document.querySelector("[data-slide-prev]");
        const nextButton = document.querySelector("[data-slide-next]");
        let activeSlide = 0;
        let slideTimer;

        function showSlide(index) {
            if (!track || slides.length === 0) {
                return;
            }

            activeSlide = (index + slides.length) % slides.length;
            track.style.transform = `translateX(-${activeSlide * 100}%)`;
        }

        function startSlider() {
            window.clearInterval(slideTimer);
            slideTimer = window.setInterval(() => showSlide(activeSlide + 1), 4200);
        }

        prevButton?.addEventListener("click", () => {
            showSlide(activeSlide - 1);
            startSlider();
        });

        nextButton?.addEventListener("click", () => {
            showSlide(activeSlide + 1);
            startSlider();
        });

        showSlide(0);
        startSlider();
    </script>
</body>
</html>
<?php /**PATH D:\Project-Kasir-Warung-Yamien-12-K\resources\views/welcome.blade.php ENDPATH**/ ?>