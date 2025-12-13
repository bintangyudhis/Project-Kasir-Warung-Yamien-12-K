<aside class="sidebar">
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
            <a href="<?php echo e(route('categories.index')); ?>"
                class="<?php echo e(request()->routeIs('categories.*') ? 'active' : ''); ?>">
                <i class="fa-solid fa-list"></i>Kategori
            </a>
            <a href="<?php echo e(route('activity-logs.index')); ?>"
                class="<?php echo e(request()->routeIs('activity-logs.*') ? 'active' : ''); ?>">
                <i class="fa-solid fa-clipboard-list"></i> Aktivitas Log
            </a>
            <a href="<?php echo e(route('users.index')); ?>" class="<?php echo e(request()->routeIs('users.*') ? 'active' : ''); ?>">
                <i class="fa-solid fa-users-cog"></i>
                <span>Manajemen User</span>
            </a>
        <?php elseif(Auth::user()->role === 'cashier'): ?>
            <a href="<?php echo e(route('orders.index')); ?>" class="<?php echo e(request()->routeIs('orders.index') ? 'active' : ''); ?>">
                <i class="fa-solid fa-utensils"></i> Menu
            </a>
            <a href="<?php echo e(route('tables.index')); ?>" class="<?php echo e(request()->routeIs('tables.*') ? 'active' : ''); ?>">
                <i class="fa-solid fa-table"></i> Manajemen Meja
            </a>
            <a href="<?php echo e(route('orders.history')); ?>"
                class="<?php echo e(request()->routeIs('orders.riwayat') ? 'active' : ''); ?>">
                <i class="fa-solid fa-clock-rotate-left"></i> Riwayat
            </a>
        <?php endif; ?>

        <form method="POST" action="<?php echo e(route('logout')); ?>" style="margin-top: auto;">
            <?php echo csrf_field(); ?>
            <button type="submit" class="logout-btn">
                <i class="fa-solid fa-right-from-bracket"></i> Logout
            </button>
        </form>
    </nav>
</aside>

<style>
    .sidebar {
        width: 220px;
        background-color: #000;
        color: #fff;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 20px 0;
        position: relative;
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
        margin-bottom: 40px;
    }

    .avatar {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        background: #777;
        margin: 0 auto 10px;
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
</style>
<?php /**PATH D:\kuliah\semester-5\ippl\TUBES\metimev2\resources\views/components/sidebar.blade.php ENDPATH**/ ?>