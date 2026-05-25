<header class="mobile-header">
    <div class="mobile-logo">
        Metime <span style="color: #ff6633;">App</span>
    </div>
    <button class="mobile-menu-btn" onclick="toggleSidebar()">
        <i class="fa-solid fa-bars"></i>
    </button>
</header>

<div id="sidebar-overlay" class="sidebar-overlay" onclick="toggleSidebar()"></div>

<aside id="sidebar" class="sidebar">
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
            <i class="fa-solid fa-user-circle"></i> Profil Saya
        </a>

        <?php if(Auth::user()->role === 'admin'): ?>
            <a href="<?php echo e(route('orders.index')); ?>" class="<?php echo e(request()->routeIs('orders.index') ? 'active' : ''); ?>">
                <i class="fa-solid fa-cash-register"></i> Kasir
            </a>
            <a href="<?php echo e(route('products.index')); ?>" class="<?php echo e(request()->routeIs('products.*') ? 'active' : ''); ?>">
                <i class="fa-solid fa-utensils"></i> Manajemen Menu
            </a>
            <a href="<?php echo e(route('tables.index')); ?>" class="<?php echo e(request()->routeIs('tables.*') ? 'active' : ''); ?>">
                <i class="fa-solid fa-table"></i> Manajemen Meja
            </a>
            <a href="<?php echo e(route('orders.history')); ?>" class="<?php echo e(request()->routeIs('orders.history') ? 'active' : ''); ?>">
                <i class="fa-solid fa-clock-rotate-left"></i> Riwayat
            </a>
            <a href="<?php echo e(route('categories.index')); ?>" class="<?php echo e(request()->routeIs('categories.*') ? 'active' : ''); ?>">
                <i class="fa-solid fa-list"></i> Kategori
            </a>
            <a href="<?php echo e(route('activity-logs.index')); ?>"
                class="<?php echo e(request()->routeIs('activity-logs.*') ? 'active' : ''); ?>">
                <i class="fa-solid fa-clipboard-list"></i> Aktivitas Log
            </a>
            <a href="<?php echo e(route('users.index')); ?>" class="<?php echo e(request()->routeIs('users.*') ? 'active' : ''); ?>">
                <i class="fa-solid fa-users-cog"></i> Manajemen User
            </a>
        <?php elseif(Auth::user()->role === 'cashier'): ?>
            <a href="<?php echo e(route('orders.index')); ?>" class="<?php echo e(request()->routeIs('orders.index') ? 'active' : ''); ?>">
                <i class="fa-solid fa-utensils"></i> Menu
            </a>
            <a href="<?php echo e(route('tables.index')); ?>" class="<?php echo e(request()->routeIs('tables.*') ? 'active' : ''); ?>">
                <i class="fa-solid fa-table"></i> Manajemen Meja
            </a>
            <a href="<?php echo e(route('orders.history')); ?>" class="<?php echo e(request()->routeIs('orders.history*') ? 'active' : ''); ?>">
                <i class="fa-solid fa-clock-rotate-left"></i> Riwayat
            </a>
        <?php endif; ?>

        <form method="POST" action="<?php echo e(route('logout')); ?>" style="margin-top:auto;">
            <?php echo csrf_field(); ?>
            <button type="submit" class="logout-btn">
                <i class="fa-solid fa-right-from-bracket"></i> Logout
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
       STYLE SIDEBAR (DEFAULT DESKTOP - TETAP)
       ========================================= */
    .sidebar {
        width: 220px;
        height: 100vh;
        background-color: #000;
        color: #fff;
        display: flex;
        flex-direction: column;
        position: sticky;
        top: 0;
        overflow-y: auto;
        overscroll-behavior: contain;
        -webkit-overflow-scrolling: touch;
        scrollbar-width: none;
        padding: 20px 0;
        z-index: 100;
        transition: transform 0.3s ease-in-out;
    }

    /* Sembunyikan tombol toggle lama yang mengambang agar tidak dobel/berantakan */
    .sidebar-toggle {
        display: none !important; 
    }

    .sidebar-overlay {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, 0.5);
        z-index: 1055;
        opacity: 0;
        transition: opacity 0.3s ease-in-out;
    }

    .sidebar-avatar-img {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        object-fit: cover;
        margin: 0 auto 10px;
        display: block;
        border: 2px solid #333;
    }

    .sidebar-avatar-placeholder {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        background-color: #333;
        color: #ccc;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 30px;
        margin: 0 auto 10px;
        border: 2px solid #444;
    }

    .profile {
        text-align: center;
        margin-bottom: 30px;
        flex-shrink: 0;
    }

    .role {
        font-size: 12px;
        color: #aaa;
        text-transform: capitalize;
    }

    .name {
        font-size: 14px;
        color: #00c6ff;
    }

    .menu-nav {
        display: flex;
        flex-direction: column;
        gap: 15px;
        width: 100%;
        padding: 0 20px;
        flex: 1;
    }

    .menu-nav a {
        color: #ccc;
        text-decoration: none;
        font-size: 14px;
        transition: 0.3s;
        padding: 10px 12px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .menu-nav a:hover,
    .menu-nav a.active {
        background-color: #ff6633;
        color: #fff;
    }

    .menu-nav a i {
        width: 20px;
        text-align: center;
    }

    .logout-btn {
        width: 100%;
        background: transparent;
        border: 1px solid #ff3333;
        color: #ff3333;
        padding: 10px 12px;
        border-radius: 8px;
        font-size: 14px;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 10px;
        transition: 0.3s;
        margin-top: 20px;
        font-family: 'Poppins', sans-serif;
    }

    .logout-btn:hover {
        background-color: #ff3333;
        color: #fff;
    }

    .logout-btn i {
        width: 20px;
        text-align: center;
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
            background-color: #000; /* Hitam agar match dengan sidebar */
            padding: 0 20px;
            z-index: 1060; /* Paling atas */
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
            border-bottom: 1px solid #333;
        }

        .mobile-logo {
            color: #fff;
            font-size: 20px;
            font-weight: bold;
            font-family: 'Poppins', sans-serif;
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
            width: 250px;
            transform: translateX(-100%); /* Sembunyi ke kiri */
            z-index: 1070; /* Di atas navbar mobile */
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.5);
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
</script><?php /**PATH D:\kuliah\semester-5\ippl\metimev4\resources\views/components/sidebar.blade.php ENDPATH**/ ?>