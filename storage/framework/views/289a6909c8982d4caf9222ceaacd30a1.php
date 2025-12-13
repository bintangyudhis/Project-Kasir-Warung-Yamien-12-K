<?php $__env->startSection('title', 'Menu - Kasir MeTime'); ?>

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
            flex: 1.5;
            background: white;
            border-top-left-radius: 20px;
            border-bottom-left-radius: 20px;
            padding: 30px;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .kategori {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .search-bar {
            display: flex;
            gap: 10px;
        }

        .search-bar input {
            flex: 1;
            padding: 10px 15px;
            border-radius: 20px;
            border: 1px solid #ddd;
        }

        .search-bar button {
            background: white;
            border: none;
            cursor: pointer;
        }

        .kategori-buttons {
            display: flex;
            gap: 15px;
        }

        .kategori-buttons a {
            text-decoration: none;
        }

        .kategori-buttons button {
            padding: 10px 20px;
            border: none;
            border-radius: 10px;
            background: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            font-weight: 500;
            transition: 0.3s;
        }

        .kategori-buttons button:hover {
            background: #f5f5f5;
        }

        .kategori-buttons button.active {
            background: #e75b27;
            color: white;
        }

        .kategori-buttons button.active:hover {
            background: #d14a1f;
        }

        .menu-list {
            margin-top: 20px;
            flex: 1;
            overflow-y: auto;
            padding-right: 10px;
        }

        .menu-list::-webkit-scrollbar {
            width: 6px;
        }

        .menu-list::-webkit-scrollbar-thumb {
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
            padding: 15px;
            width: 140px;
            text-align: center;
        }

        .card .title {
            font-size: 13px;
            font-weight: 500;
            margin: 5px 0;
        }

        .card .price {
            font-size: 12px;
            color: #e75b27;
            font-weight: 600;
            margin: 3px 0;
        }

        .card .status {
            font-size: 11px;
            color: #666;
            margin: 3px 0 8px 0;
        }

        .img-placeholder {
            width: 100%;
            height: 80px;
            background: #ccc;
            border-radius: 10px;
            margin-bottom: 10px;
        }

        .btn-add-cart {
            width: 100%;
            padding: 8px;
            background: #e75b27;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 13px;
            cursor: pointer;
            font-weight: 500;
            transition: 0.3s;
        }

        .btn-add-cart:hover {
            background: #d14a1f;
        }

        .order-section {
            width: 380px;
            background: #f4f4f4;
            border-top-right-radius: 20px;
            border-bottom-right-radius: 20px;
            padding: 30px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .order-item {
            display: flex;
            align-items: center;
            gap: 10px;
            background: white;
            padding: 12px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .img-placeholder.small {
            width: 60px;
            height: 60px;
            background: #ccc;
            border-radius: 8px;
            flex-shrink: 0;
            overflow: hidden;
        }

        .img-placeholder.small img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .order-info {
            flex: 1;
            min-width: 0;
        }

        .order-info .item-name {
            font-size: 13px;
            font-weight: 500;
            margin: 0 0 4px 0;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .order-info .item-price {
            font-size: 12px;
            color: #666;
            margin: 0;
        }

        .qty-control {
            display: grid;
            grid-template-columns: auto auto; 
            grid-template-rows: 1fr 1fr;      
            gap: 5px;                         
            width: max-content;               
        }

        .qty-control form {
            display: contents !important;
        }

        .qty-control input[type="number"] {
            grid-column: 1 / 2;         
            grid-row: 1 / 3;            
            
            width: 45px !important;
            height: 100% !important;    
            padding: 0 !important;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            text-align: center;
            outline: none;
            margin: 0 !important;
        }

        .btn-update {
            grid-column: 2 / 3;
            grid-row: 1 / 2;

            width: 70px !important;
            height: 30px !important;
            background-color: #e75b27 !important;
            color: white !important;
            border: none !important;
            border-radius: 5px !important;
            font-size: 12px !important;
            font-weight: 500;
            cursor: pointer;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-remove {
            grid-column: 2 / 3; 
            grid-row: 2 / 3;   
            
            width: 70px !important;
            height: 30px !important;
            background-color: #c82333 !important;
            color: white !important;
            border: none !important;
            border-radius: 5px !important;
            font-size: 12px !important;
            font-weight: 500;
            cursor: pointer;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-update {
            background: #e75b27;
        }

        .btn-remove {
            background: #c82333;
        }

        .btn-update:hover {
            background: #d14a1f;
        }

        .btn-remove:hover {
            background: #c82333;
        }

        .order-total {
            display: flex;
            justify-content: space-between;
            font-weight: 600;
        }

        .btn-pay {
            background: #e75b27;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 12px;
            font-size: 15px;
            cursor: pointer;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="kategori">
        <h2>Menu Kasir</h2>
        <form action="<?php echo e(route('orders.index')); ?>" method="GET" class="search-bar">
            <input type="text" name="search" placeholder="search menu" value="<?php echo e(request('search')); ?>" />
            <input type="hidden" name="category" value="<?php echo e(request('category', 'semua')); ?>" />
            <button type="submit">🔍</button>
        </form>
        <div class="kategori-buttons">
            <a href="<?php echo e(route('orders.index', ['category' => 'semua', 'search' => request('search')])); ?>">
                <button type="button" class="<?php echo e(request('category', 'semua') == 'semua' ? 'active' : ''); ?>">semua</button>
            </a>
            
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $categoryName = strtolower($category->name);
                ?>

                <a href="<?php echo e(route('orders.index', ['category' => $categoryName, 'search' => request('search')])); ?>">
                    <button type="button" class="<?php echo e(request('category') == $categoryName ? 'active' : ''); ?>"> <?php echo e($category->name); ?> </button>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>

    <section class="menu-list">
        <h3>Menu</h3>
        <div class="cards" style="margin-top:20px;">
            <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="card">
                    <?php if($product->photo): ?>
                        <img src="<?php echo e(asset('storage/' . $product->photo)); ?>" alt="<?php echo e($product->name); ?>"
                            style="width: 100%; height: 80px; object-fit: cover; border-radius: 10px; margin-bottom: 10px;">
                    <?php else: ?>
                        <div class="img-placeholder"></div>
                    <?php endif; ?>
                    <p class="title"><?php echo e($product->name); ?></p>
                    <p class="price">Rp<?php echo e(number_format($product->price, 0, ',', '.')); ?></p>
                    <p class="status"><?php echo e($product->stock_quantity > 0 ? 'tersedia' : 'tidak tersedia'); ?></p>

                    <?php if($product->stock_quantity > 0): ?>
                        <form action="<?php echo e(route('cart.add', $product->id)); ?>" method="POST" style="margin-top: 5px;">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="btn-add-cart">Tambah</button>
                        </form>
                    <?php endif; ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div style="width: 100%; text-align: center; padding: 40px;">
                    <p style="color: #999;">Belum ada produk.</p>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('right-sidebar'); ?>
    <aside class="order-section">
        <h3>Pesanan</h3>

        <div style="flex: 1; overflow-y: auto; display: flex; flex-direction: column; gap: 10px;">
            <?php $__empty_1 = true; $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="order-item">
                    <div class="img-placeholder small">
                        <?php if(isset($item['photo']) && $item['photo']): ?>
                            <img src="<?php echo e(asset('storage/' . $item['photo'])); ?>" alt="<?php echo e($item['name']); ?>">
                        <?php endif; ?>
                    </div>

                    <div class="order-info">
                        <p class="item-name"><?php echo e($item['name']); ?></p>
                        <p class="item-price">Rp<?php echo e(number_format($item['price'], 0, ',', '.')); ?></p>
                    </div>

                    <div class="qty-control">
                        <form action="<?php echo e(route('cart.update', $id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PATCH'); ?>
                            <input type="number" name="quantity" value="<?php echo e($item['quantity']); ?>" min="1" required>
                            <button type="submit" class="btn-update">Update</button>
                        </form>

                        <form action="<?php echo e(route('cart.remove', $id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn-remove">Hapus</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div style="text-align: center; padding: 20px;">
                    <p style="color: #999; font-size: 14px;">Keranjang masih kosong.</p>
                </div>
            <?php endif; ?>
        </div>

        <?php if(!empty($cart)): ?>
            <div class="order-total">
                <p>Total</p>
                <p>Rp <?php echo e(number_format($totalAmount)); ?></p>
            </div>

            <center>
                <a href="<?php echo e(route('orders.create')); ?>">
                    <button class="btn-pay">
                        Lanjutkan Pembayaran
                    </button>
                </a>
            </center>
        <?php endif; ?>
    </aside>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.kasir', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\VICTUS\Downloads\metimev2\resources\views/kasir/menu/index.blade.php ENDPATH**/ ?>