<?php $__env->startSection('title', 'Menu - Kasir Yammien 12K'); ?>

<?php $__env->startPush('styles'); ?>
<style>
    .kasir-menu-shell {
        display: flex;
        flex-direction: column;
        gap: 18px;
        min-height: 100%;
    }

    .kasir-menu-head {
        display: grid;
        grid-template-columns: 1fr;
        gap: 14px;
        align-items: stretch;
        padding-bottom: 18px;
        border-bottom: 1px solid var(--line);
    }

    .kasir-menu-title h2 {
        margin: 0;
        font-size: clamp(22px, 1.9vw, 28px);
        font-weight: 800;
        line-height: 1.15;
    }

    .kasir-menu-title p {
        margin-top: 8px;
        color: var(--muted);
        font-size: 13px;
        font-weight: 600;
        max-width: 680px;
    }

    .search-bar {
        display: grid;
        grid-template-columns: minmax(0, 1fr) 50px;
        gap: 10px;
        width: 100%;
        max-width: 760px;
    }

    .search-bar input[type="text"] {
        width: 100%;
        min-height: 46px;
        padding: 0 14px;
        border: 1px solid var(--line);
        border-radius: 8px;
        background: #fff;
        color: var(--ink);
        font-size: 13px;
        font-weight: 500;
    }

    .search-bar button {
        width: 50px;
        min-height: 46px;
        display: grid;
        place-items: center;
        border: 0;
        border-radius: 8px;
        background: linear-gradient(135deg, var(--brand), #ff8a4c);
        color: #fff;
        cursor: pointer;
        box-shadow: 0 12px 24px rgba(240, 90, 40, 0.18);
    }

    .kategori-buttons {
        display: flex;
        gap: 10px;
        overflow-x: auto;
        padding: 2px 2px 8px;
        scrollbar-width: thin;
    }

    .kategori-buttons a {
        flex: 0 0 auto;
        text-decoration: none;
    }

    .kategori-buttons button {
        min-height: 38px;
        padding: 0 14px;
        border: 1px solid var(--line);
        border-radius: 8px;
        background: #fff;
        color: var(--ink);
        font-size: 13px;
        font-weight: 700;
        white-space: nowrap;
        cursor: pointer;
    }

    .kategori-buttons button.active {
        border: 0;
        background: linear-gradient(135deg, var(--brand), #ff8a4c);
        color: #fff;
    }

    .menu-list {
        min-height: 0;
    }

    .menu-list h3 {
        margin: 0 0 14px;
        font-size: clamp(20px, 1.8vw, 24px);
        font-weight: 800;
    }

    .menu-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(170px, 1fr));
        gap: 14px;
        padding-bottom: 10px;
    }

    .menu-card {
        display: flex;
        flex-direction: column;
        min-width: 0;
        overflow: hidden;
        border: 1px solid var(--line);
        border-radius: 8px;
        background: #fff;
        box-shadow: var(--shadow-sm);
    }

    .menu-card-media {
        width: 100%;
        aspect-ratio: 4 / 3;
        overflow: hidden;
        background: linear-gradient(135deg, #fff2ea, #edf5ff);
    }

    .menu-card-media img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .img-placeholder {
        width: 100%;
        height: 100%;
        display: grid;
        place-items: center;
        color: var(--brand);
        font-size: 32px;
    }

    .menu-card-body {
        display: flex;
        flex-direction: column;
        gap: 8px;
        flex: 1;
        padding: 14px;
        text-align: left;
    }

    .menu-card .title {
        margin: 0;
        color: var(--ink);
        font-size: 14px;
        font-weight: 700;
        line-height: 1.3;
    }

    .menu-card .price {
        margin: 0;
        color: var(--brand);
        font-size: 13px;
        font-weight: 800;
    }

    .menu-card .status {
        display: inline-flex;
        align-items: center;
        width: fit-content;
        min-height: 26px;
        padding: 0 10px;
        border-radius: 999px;
        background: #ecfdf3;
        color: #067647;
        font-size: 12px;
        font-weight: 700;
    }

    .menu-card .status.is-empty {
        background: #fff1f2;
        color: #be123c;
    }

    .btn-add-cart {
        width: 100%;
        min-height: 40px;
        margin-top: auto;
        border: 0;
        border-radius: 8px;
        background: linear-gradient(135deg, var(--brand), #ff8a4c);
        color: #fff;
        font-size: 13px;
        font-weight: 800;
        cursor: pointer;
    }

    .empty-menu {
        grid-column: 1 / -1;
        padding: 44px 16px;
        border: 1px dashed #ffd8c7;
        border-radius: 8px;
        background: #fff;
        color: var(--muted);
        text-align: center;
        font-weight: 800;
    }

    .order-section {
        width: 380px;
        display: flex;
        flex-direction: column;
        gap: 16px;
        min-height: 0;
        padding: 22px;
        border: 1px solid rgba(255, 255, 255, 0.82);
        border-radius: 8px;
        background: rgba(255, 255, 255, 0.94);
        box-shadow: var(--shadow-md);
    }

    .order-section h3 {
        margin: 0;
        font-size: 22px;
        font-weight: 800;
    }

    .order-items {
        flex: 1;
        min-height: 0;
        overflow-y: auto;
        display: flex;
        flex-direction: column;
        gap: 10px;
        padding-right: 2px;
    }

    .order-item {
        display: grid;
        grid-template-columns: 56px minmax(0, 1fr);
        gap: 10px;
        padding: 12px;
        border: 1px solid var(--line);
        border-radius: 8px;
        background: #fff;
        box-shadow: var(--shadow-sm);
    }

    .img-placeholder.small {
        width: 56px;
        height: 56px;
        overflow: hidden;
        border-radius: 8px;
        background: linear-gradient(135deg, #fff2ea, #edf5ff);
    }

    .img-placeholder.small img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .order-info {
        min-width: 0;
    }

    .order-info .item-name,
    .order-info .item-price {
        margin: 0;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .order-info .item-name {
        color: var(--ink);
        font-size: 14px;
        font-weight: 700;
    }

    .order-info .item-price {
        margin-top: 3px;
        color: var(--muted);
        font-size: 13px;
        font-weight: 600;
    }

    .qty-control {
        grid-column: 1 / -1;
        display: grid;
        grid-template-columns: 64px minmax(0, 1fr) minmax(0, 1fr);
        gap: 8px;
        align-items: center;
    }

    .qty-control form:first-child {
        display: contents;
    }

    .qty-control form:last-child {
        display: contents;
    }

    .qty-control input[type="number"] {
        width: 64px;
        min-height: 38px;
        padding: 0;
        border: 1px solid var(--line);
        border-radius: 8px;
        text-align: center;
        font-weight: 700;
    }

    .btn-update,
    .btn-remove {
        width: 100%;
        min-height: 38px;
        border: 0;
        border-radius: 8px;
        color: #fff;
        font-size: 13px;
        font-weight: 700;
        cursor: pointer;
    }

    .btn-update {
        background: linear-gradient(135deg, var(--brand), #ff8a4c);
    }

    .btn-remove {
        background: #dc2626;
    }

    .order-empty {
        padding: 24px 12px;
        border: 1px dashed #ffd8c7;
        border-radius: 8px;
        background: #fff;
        color: var(--muted);
        text-align: center;
        font-size: 14px;
        font-weight: 800;
    }

    .order-total {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        padding-top: 14px;
        border-top: 1px dashed #ffd8c7;
        color: var(--ink);
        font-size: 16px;
        font-weight: 800;
    }

    .order-total p {
        margin: 0;
    }

    .btn-pay {
        width: 100%;
        min-height: 46px;
        border: 0;
        border-radius: 8px;
        background: #111827;
        color: #fff;
        font-size: 14px;
        font-weight: 800;
        cursor: pointer;
    }

    @media (max-width: 1180px) {
        .menu-grid {
            grid-template-columns: repeat(auto-fill, minmax(155px, 1fr));
        }

        .order-section {
            width: 340px;
        }
    }

    @media (max-width: 980px) {
        .order-section {
            width: auto;
            max-height: none;
        }

        .order-items {
            max-height: 360px;
        }
    }

    @media (max-width: 640px) {
        .kasir-menu-shell {
            gap: 14px;
        }

        .search-bar {
            grid-template-columns: 1fr;
            max-width: none;
        }

        .search-bar button {
            width: 100%;
        }

        .menu-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 10px;
        }

        .menu-card-body {
            padding: 12px;
        }

        .menu-card .title {
            font-size: 14px;
        }

        .order-section {
            padding: 16px;
        }

        .qty-control {
            grid-template-columns: 56px 1fr;
        }

        .qty-control input[type="number"] {
            width: 56px;
        }

        .btn-remove {
            grid-column: 1 / -1;
        }
    }

    @media (max-width: 420px) {
        .menu-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="kasir-menu-shell">
        <div class="kasir-menu-head">
            <div class="kasir-menu-title">
                <h2>Menu Kasir</h2>
                <p>Pilih menu, filter kategori, lalu tambahkan ke pesanan.</p>
            </div>

            <form action="<?php echo e(route('orders.index')); ?>" method="GET" class="search-bar">
                <input type="text" name="search" placeholder="Cari menu" value="<?php echo e(request('search')); ?>" />
                <input type="hidden" name="category" value="<?php echo e(request('category', 'semua')); ?>" />
                <button type="submit" aria-label="Cari menu"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>

        <div class="kategori-buttons">
            <a href="<?php echo e(route('orders.index', ['category' => 'semua', 'search' => request('search')])); ?>">
                <button type="button" class="<?php echo e(request('category', 'semua') == 'semua' ? 'active' : ''); ?>">Semua</button>
            </a>

            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $categoryName = strtolower($category->name);
                ?>

                <a href="<?php echo e(route('orders.index', ['category' => $categoryName, 'search' => request('search')])); ?>">
                    <button type="button" class="<?php echo e(request('category') == $categoryName ? 'active' : ''); ?>">
                        <?php echo e($category->name); ?>

                    </button>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <section class="menu-list">
            <h3>Menu</h3>
            <div class="menu-grid">
                <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <article class="menu-card">
                        <div class="menu-card-media">
                            <?php if($product->photo): ?>
                                <img src="<?php echo e(asset('storage/' . $product->photo)); ?>" alt="<?php echo e($product->name); ?>">
                            <?php else: ?>
                                <div class="img-placeholder">
                                    <i class="fa-solid fa-utensils"></i>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="menu-card-body">
                            <p class="title"><?php echo e($product->name); ?></p>
                            <p class="price">Rp<?php echo e(number_format($product->price, 0, ',', '.')); ?></p>
                            <p class="status <?php echo e($product->stock_quantity > 0 ? '' : 'is-empty'); ?>">
                                <?php echo e($product->stock_quantity > 0 ? 'Tersedia' : 'Tidak tersedia'); ?>

                            </p>

                            <?php if($product->stock_quantity > 0): ?>
                                <form action="<?php echo e(route('cart.add', $product->id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="btn-add-cart">Tambah</button>
                                </form>
                            <?php endif; ?>
                        </div>
                    </article>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="empty-menu">
                        Belum ada produk.
                    </div>
                <?php endif; ?>
            </div>
        </section>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('right-sidebar'); ?>
    <aside class="order-section">
        <h3>Pesanan</h3>

        <div class="order-items">
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
                <div class="order-empty">
                    Keranjang masih kosong.
                </div>
            <?php endif; ?>
        </div>

        <?php if(!empty($cart)): ?>
            <div class="order-total">
                <p>Total</p>
                <p>Rp <?php echo e(number_format($totalAmount)); ?></p>
            </div>

            <a href="<?php echo e(route('orders.create')); ?>">
                <button class="btn-pay">
                    Lanjutkan Pembayaran
                </button>
            </a>
        <?php endif; ?>
    </aside>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.kasir', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\VICTUS\Documents\Project-Kasir-Warung-Yamien-12-K\resources\views/kasir/menu/index.blade.php ENDPATH**/ ?>