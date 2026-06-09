<?php $__env->startSection('title', 'Kategori - Yammien 12K'); ?>

<?php $__env->startPush('styles'); ?>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            background: #f2f2f2;
            overflow: hidden;
            color: #333;
        }

        .container {
            display: flex;
            height: 100vh;
        }

        .sidebar {
            width: 220px;
            background-color: #000;
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px 0;
        }

        .profile {
            text-align: center;
            margin-bottom: 40px;
        }

        .avatar {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background-color: #777;
            margin: 0 auto 10px;
        }

        .role {
            font-size: 12px;
            color: #aaa;
        }

        .name {
            font-size: 14px;
            color: #00c6ff;
        }

        .menu-nav {
            display: flex;
            flex-direction: column;
            gap: 20px;
            width: 100%;
            padding: 0 30px;
        }

        .menu-nav a {
            color: #ccc;
            text-decoration: none;
            font-size: 14px;
            transition: 0.3s;
            padding: 8px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .menu-nav a:hover,
        .menu-nav a.active {
            background-color: #ff6633;
            color: #fff;
        }

        .main-content {
            flex: 1;
            background: #fff;
            border-top-left-radius: 20px;
            border-bottom-left-radius: 20px;
            padding: 30px;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .alert {
            padding: 12px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert .btn-close {
            background: transparent;
            border: none;
            font-size: 20px;
            cursor: pointer;
            color: inherit;
        }

        .header-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .header-section h2 {
            font-size: 24px;
            color: #333;
            font-weight: 700;
        }

        .menu-actions {
            display: flex;
            gap: 10px;
        }

        .btn {
            padding: 10px 16px;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            transition: 0.3s ease;
            color: white;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            line-height: 1;
        }

        .btn.add {
            background-color: #22c55e;
        }

        .btn.edit {
            background-color: #3b82f6;
        }

        .btn.delete {
            background-color: #ef4444;
        }

        .btn:hover {
            transform: translateY(-2px);
            opacity: 0.9;
        }

        .category-list {
            flex: 1;
            overflow-y: auto;
            padding-right: 10px;
        }

        .category-list::-webkit-scrollbar {
            width: 6px;
        }

        .category-list::-webkit-scrollbar-thumb {
            background-color: #ccc;
            border-radius: 10px;
        }

        .cards {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            padding-bottom: 30px;
        }

        .card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 250px;
            text-align: center;
            transition: 0.3s;
            position: relative;
        }

        .card-actions {
            display: flex;
            gap: 8px;
            justify-content: center;
            margin-top: 15px;
            align-items: center;
        }

        .card-actions form {
            display: flex;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .category-id {
            font-size: 12px;
            color: #999;
            margin-bottom: 8px;
        }

        .title {
            font-weight: 600;
            color: #222;
            margin-bottom: 15px;
            font-size: 16px;
        }

        .card-actions {
            display: flex;
            gap: 8px;
            justify-content: center;
            margin-top: 15px;
        }

        .btn-sm {
            padding: 6px 12px;
            font-size: 12px;
            border-radius: 5px;
        }

        .btn-warning {
            background-color: #f59e0b;
        }

        .btn-danger {
            background-color: #ef4444;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                flex-direction: row;
                justify-content: space-around;
                padding: 10px 0;
            }

            .header-section {
                flex-direction: column;
                gap: 10px;
            }

            .menu-actions {
                justify-content: center;
                flex-wrap: wrap;
            }

            .cards {
                justify-content: center;
            }
        }

        body {
            overflow: hidden;
        }

        .main-content {
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="header-section">
        <h2>Manajemen Kategori</h2>
        <div class="menu-actions">
            <a href="<?php echo e(route('categories.create')); ?>" class="btn add">+ Tambah Kategori</a>
        </div>
    </section>

    <section class="category-list">
        <div class="cards">
            <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="card">
                    <p class="category-id">#ID: <?php echo e($category->id); ?></p>
                    <p class="title"><?php echo e($category->name); ?></p>

                    <div class="card-actions">
                        <a href="<?php echo e(route('categories.edit', $category->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
                        <form action="<?php echo e(route('categories.destroy', $category->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">Hapus</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div style="width: 100%; text-align: center; padding: 40px;">
                    <p style="color: #999;">Belum ada kategori. Klik tombol "Tambah Kategori" untuk menambahkan kategori
                        baru.</p>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\VICTUS\Documents\Project-Kasir-Warung-Yamien-12-K\resources\views/categories/index.blade.php ENDPATH**/ ?>