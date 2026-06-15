<header class="mobile-header">
    <div class="mobile-logo">
        Yammien <span>12K</span>
    </div>
    <button class="mobile-menu-btn" onclick="toggleSidebar()" aria-label="Buka menu">
        <i class="fa-solid fa-bars"></i>
    </button>
</header>

<div id="sidebar-overlay" class="sidebar-overlay" onclick="toggleSidebar()"></div>

<aside id="sidebar" class="sidebar">
    <div class="brand-lockup">
        
        <div class="brand-copy">
            <div class="brand-name">Yammien <span>12K</span></div>
            <div class="brand-subtitle">Point of Sale</div>
        </div>
        <button type="button" class="sidebar-collapse-btn" onclick="toggleSidebarCollapse()" aria-label="Tutup sidebar">
            <i class="fa-solid fa-angles-left"></i>
        </button>
    </div>

    <div class="profile">
        <?php if(Auth::user()->photo): ?>
            <img src="<?php echo e(asset('storage/' . Auth::user()->photo)); ?>" alt="Avatar" class="sidebar-avatar-img">
        <?php else: ?>
            <div class="sidebar-avatar-placeholder">
                <i class="fas fa-user"></i>
            </div>
        <?php endif; ?>

        <p class="role"><?php echo e(Auth::user()->role); ?></p>
        <p class="name"><?php echo e(Auth::user()->username); ?></p>
    </div>

    <nav class="menu-nav">
        <a href="<?php echo e(route('profile.show')); ?>" class="<?php echo e(request()->routeIs('profile.show') ? 'active' : ''); ?>">
            <i class="fa-solid fa-user-circle"></i> <span>Profil Saya</span>
        </a>

        <?php if(Auth::user()->role === 'admin'): ?>
            <a href="<?php echo e(route('orders.index')); ?>" class="<?php echo e(request()->routeIs('orders.index') ? 'active' : ''); ?>">
                <i class="fa-solid fa-cash-register"></i> <span>Kasir</span>
            </a>
            <a href="<?php echo e(route('products.index')); ?>" class="<?php echo e(request()->routeIs('products.*') ? 'active' : ''); ?>">
                <i class="fa-solid fa-utensils"></i> <span>Manajemen Menu</span>
            </a>
            <a href="<?php echo e(route('tables.index')); ?>" class="<?php echo e(request()->routeIs('tables.*') ? 'active' : ''); ?>">
                <i class="fa-solid fa-table"></i> <span>Manajemen Meja</span>
            </a>
            <a href="<?php echo e(route('orders.history')); ?>" class="<?php echo e(request()->routeIs('orders.history') ? 'active' : ''); ?>">
                <i class="fa-solid fa-clock-rotate-left"></i> <span>Riwayat</span>
            </a>
            <a href="<?php echo e(route('categories.index')); ?>" class="<?php echo e(request()->routeIs('categories.*') ? 'active' : ''); ?>">
                <i class="fa-solid fa-list"></i> <span>Kategori</span>
            </a>
            <a href="<?php echo e(route('activity-logs.index')); ?>"
                class="<?php echo e(request()->routeIs('activity-logs.*') ? 'active' : ''); ?>">
                <i class="fa-solid fa-clipboard-list"></i> <span>Aktivitas Log</span>
            </a>
            <a href="<?php echo e(route('users.index')); ?>" class="<?php echo e(request()->routeIs('users.*') ? 'active' : ''); ?>">
                <i class="fa-solid fa-users-cog"></i> <span>Manajemen User</span>
            </a>
        <?php elseif(Auth::user()->role === 'cashier'): ?>
            <a href="<?php echo e(route('orders.index')); ?>" class="<?php echo e(request()->routeIs('orders.index') ? 'active' : ''); ?>">
                <i class="fa-solid fa-utensils"></i> <span>Menu</span>
            </a>
            <a href="<?php echo e(route('tables.index')); ?>" class="<?php echo e(request()->routeIs('tables.*') ? 'active' : ''); ?>">
                <i class="fa-solid fa-table"></i> <span>Manajemen Meja</span>
            </a>
            <a href="<?php echo e(route('orders.history')); ?>" class="<?php echo e(request()->routeIs('orders.history*') ? 'active' : ''); ?>">
                <i class="fa-solid fa-clock-rotate-left"></i> <span>Riwayat</span>
            </a>
        <?php endif; ?>

        <form method="POST" action="<?php echo e(route('logout')); ?>" style="margin-top:auto;">
            <?php echo csrf_field(); ?>
            <button type="submit" class="logout-btn">
                <i class="fa-solid fa-right-from-bracket"></i> <span>Logout</span>
            </button>
        </form>
    </nav>
</aside>

<style>
    /* =========================================
       STYLE UNTUK NAVBAR MOBILE (BARU)
       ========================================= */
    .mobile-header {
        display: none; /* Default: Hilang di Desktop */
    }

    /* =========================================
       STYLE SIDEBAR
       ========================================= */
    .sidebar {
        width: 260px;
        height: 100vh;
        background:
            linear-gradient(180deg, rgba(255, 255, 255, 0.08), transparent 34%),
            #111827;
        color: #fff;
        display: flex;
        flex-direction: column;
        position: sticky;
        top: 0;
        overflow-y: auto;
        overscroll-behavior: contain;
        -webkit-overflow-scrolling: touch;
        scrollbar-width: none;
        padding: 18px 14px;
        z-index: 100;
        transition: width 0.22s ease, transform 0.3s ease-in-out, padding 0.22s ease;
        border-right: 1px solid rgba(255, 255, 255, 0.08);
        box-shadow: 18px 0 40px rgba(17, 24, 39, 0.14);
    }

    .sidebar-collapse-btn {
        width: 34px;
        height: 34px;
        flex: 0 0 34px;
        display: grid;
        place-items: center;
        border: 1px solid rgba(255, 255, 255, 0.14);
        border-radius: 8px;
        background: rgba(255, 255, 255, 0.06);
        color: #cbd5e1;
        cursor: pointer;
        transition: background 0.2s ease, color 0.2s ease, transform 0.2s ease;
    }

    .sidebar-collapse-btn:hover {
        background: rgba(240, 90, 40, 0.18);
        color: #fff;
    }

    /* Sembunyikan tombol toggle lama yang mengambang agar tidak dobel/berantakan */
    .sidebar-toggle {
        display: none !important; 
    }

    .sidebar-overlay {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(17, 24, 39, 0.55);
        z-index: 1055;
        opacity: 0;
        transition: opacity 0.3s ease-in-out;
    }

    .brand-lockup {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 8px 0 18px;
        margin-bottom: 12px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
    }

    .brand-copy {
        min-width: 0;
        flex: 1;
    }

    .brand-copy,
    .menu-nav a span,
    .logout-btn span,
    .profile .role,
    .profile .name {
        transition: opacity 0.16s ease, width 0.16s ease;
    }

    .brand-mark {
        width: 42px;
        height: 42px;
        border-radius: 8px;
        display: grid;
        place-items: center;
        background: linear-gradient(135deg, #f05a28, #ff9a62);
        color: #fff;
        font-weight: 800;
        box-shadow: 0 12px 24px rgba(240, 90, 40, 0.28);
    }

    .brand-name {
        color: #fff;
        font-size: 18px;
        font-weight: 800;
        line-height: 1.1;
    }

    .brand-name span,
    .mobile-logo span {
        color: #ff9a62;
    }

    .brand-subtitle {
        margin-top: 4px;
        color: #9ca3af;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: 0;
    }

    .sidebar-avatar-img {
        width: 74px;
        height: 74px;
        border-radius: 50%;
        object-fit: cover;
        margin: 0 auto 10px;
        display: block;
        border: 3px solid rgba(255, 154, 98, 0.55);
        box-shadow: 0 10px 24px rgba(0, 0, 0, 0.24);
    }

    .sidebar-avatar-placeholder {
        width: 74px;
        height: 74px;
        border-radius: 50%;
        background: #1f2937;
        color: #d1d5db;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 30px;
        margin: 0 auto 10px;
        border: 3px solid rgba(255, 154, 98, 0.35);
    }

    .profile {
        text-align: center;
        margin: 8px 0 28px;
        flex-shrink: 0;
        padding: 14px 8px;
        border-radius: 8px;
        background: rgba(255, 255, 255, 0.04);
        border: 1px solid rgba(255, 255, 255, 0.06);
    }

    .role {
        font-size: 12px;
        color: #9ca3af;
        text-transform: capitalize;
        font-weight: 700;
    }

    .name {
        font-size: 14px;
        color: #ffb08a;
        font-weight: 700;
    }

    .menu-nav {
        display: flex;
        flex-direction: column;
        gap: 8px;
        width: 100%;
        padding: 0;
        flex: 1;
    }

    .menu-nav a {
        color: #d1d5db;
        text-decoration: none;
        font-size: 14px;
        transition: 0.18s ease;
        padding: 12px 12px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        gap: 10px;
        min-height: 46px;
    }

    .menu-nav a:hover,
    .menu-nav a.active {
        background: rgba(240, 90, 40, 0.16);
        color: #fff;
        box-shadow: inset 3px 0 0 #f05a28;
    }

    .menu-nav a i {
        width: 20px;
        min-width: 20px;
        text-align: center;
    }

    .logout-btn {
        width: 100%;
        background: transparent;
        border: 1px solid rgba(248, 113, 113, 0.45);
        color: #fecaca;
        padding: 12px;
        border-radius: 8px;
        font-size: 14px;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 10px;
        transition: 0.18s ease;
        margin-top: 20px;
        font-family: 'Inter', sans-serif;
    }

    .logout-btn:hover {
        background-color: #dc2626;
        color: #fff;
    }

    .logout-btn i {
        width: 20px;
        min-width: 20px;
        text-align: center;
    }

    body.sidebar-collapsed .sidebar {
        width: 88px;
        padding-left: 12px;
        padding-right: 12px;
    }

    body.sidebar-collapsed .sidebar-collapse-btn i {
        transform: rotate(180deg);
    }

    body.sidebar-collapsed .sidebar-collapse-btn {
        transform: none;
    }

    body.sidebar-collapsed .brand-lockup {
        justify-content: center;
        flex-direction: column;
        gap: 8px;
        padding-left: 0;
        padding-right: 0;
    }

    body.sidebar-collapsed .brand-copy,
    body.sidebar-collapsed .menu-nav a span,
    body.sidebar-collapsed .logout-btn span,
    body.sidebar-collapsed .profile .role,
    body.sidebar-collapsed .profile .name {
        width: 0;
        opacity: 0;
        overflow: hidden;
        white-space: nowrap;
    }

    body.sidebar-collapsed .profile {
        padding: 10px 0;
        margin-bottom: 18px;
    }

    body.sidebar-collapsed .sidebar-avatar-img,
    body.sidebar-collapsed .sidebar-avatar-placeholder {
        width: 44px;
        height: 44px;
        margin-bottom: 0;
        font-size: 18px;
        border-width: 2px;
    }

    body.sidebar-collapsed .menu-nav a,
    body.sidebar-collapsed .logout-btn {
        justify-content: center;
        padding-left: 0;
        padding-right: 0;
        gap: 0;
    }

    .sidebar-overlay.active {
        display: block;
        opacity: 1;
    }

    /* =========================================
       RESPONSIVE MOBILE / ANDROID (MAX 768px)
       ========================================= */
    @media (max-width: 768px) {
        
        /* 1. Tampilkan Navbar Header Mobile */
        .mobile-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 60px;
            background: rgba(17, 24, 39, 0.92);
            backdrop-filter: blur(12px);
            padding: 0 20px;
            z-index: 1060; /* Paling atas */
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        .mobile-logo {
            color: #fff;
            font-size: 20px;
            font-weight: bold;
            font-family: 'Inter', sans-serif;
        }

        .mobile-menu-btn {
            background: transparent;
            border: none;
            color: #fff;
            font-size: 24px;
            cursor: pointer;
        }

        /* 2. Sesuaikan Body agar konten tidak tertutup navbar */
        body {
            padding-top: 60px; 
        }

        /* 3. Atur Sidebar agar Overlay/Fixed */
        .sidebar {
            position: fixed;
            left: 0;
            top: 0; /* Sidebar muncul dari paling atas (menutupi navbar juga jika perlu) */
            height: 100vh;
            width: 280px;
            transform: translateX(-100%); /* Sembunyi ke kiri */
            z-index: 1070; /* Di atas navbar mobile */
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.5);
        }

        .sidebar-collapse-btn {
            display: none;
        }

        body.sidebar-collapsed .sidebar {
            width: 280px;
            padding: 18px 14px;
        }

        body.sidebar-collapsed .brand-lockup {
            justify-content: flex-start;
            flex-direction: row;
            gap: 12px;
        }

        body.sidebar-collapsed .brand-copy,
        body.sidebar-collapsed .menu-nav a span,
        body.sidebar-collapsed .logout-btn span,
        body.sidebar-collapsed .profile .role,
        body.sidebar-collapsed .profile .name {
            width: auto;
            opacity: 1;
            overflow: visible;
        }

        body.sidebar-collapsed .profile {
            padding: 14px 8px;
            margin: 8px 0 28px;
        }

        body.sidebar-collapsed .sidebar-avatar-img,
        body.sidebar-collapsed .sidebar-avatar-placeholder {
            width: 74px;
            height: 74px;
            margin: 0 auto 10px;
            font-size: 30px;
            border-width: 3px;
        }

        .sidebar.active {
            transform: translateX(0); /* Muncul */
        }
    }
</style>

<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebar-overlay');

        if (!sidebar || !overlay) return;

        // Toggle kelas 'active' pada sidebar dan overlay
        sidebar.classList.toggle('active');
        overlay.classList.toggle('active');

        // Mencegah scrolling di body saat sidebar terbuka
        document.body.style.overflow = sidebar.classList.contains('active') ? 'hidden' : 'auto';
    }

    function toggleSidebarCollapse() {
        const collapsed = document.body.classList.toggle('sidebar-collapsed');
        localStorage.setItem('sidebar-collapsed', collapsed ? '1' : '0');
    }

    if (localStorage.getItem('sidebar-collapsed') === '1') {
        document.body.classList.add('sidebar-collapsed');
    }
</script>
<?php /**PATH D:\Project-Kasir-Warung-Yamien-12-K\resources\views/components/sidebar.blade.php ENDPATH**/ ?>