<?php $__env->startSection('title', 'Pembayaran - Kasir MeTime'); ?>

<?php $__env->startPush('styles'); ?>
<style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #111;
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
            background: #777;
        }

        .role {
            font-size: 12px;
            color: #aaa;
        }

        .name {
            font-size: 14px;
            color: #00c6ff;
            margin-top: 4px;
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
            background-color: #f8f8f8;
            border-radius: 0;
            padding: 30px;
            overflow-y: auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }


        .pesanan-container {
            display: flex;
            gap: 20px;
            margin-top: 20px;
        }

        .daftar-pesanan {
            flex: 2;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .pesanan-item {
            display: flex;
            align-items: center;
            background: #fff;
            border-radius: 0px;
            padding: 10px 20px;
            justify-content: space-between;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .img-placeholder {
            width: 60px;
            height: 60px;
            border-radius: 10px;
            background: #ddd;
        }

        .info {
            flex: 1;
            margin-left: 15px;
        }

        .nama {
            font-weight: 600;
        }

        .harga {
            color: #888;
            font-size: 13px;
        }

        .jumlah {
            display: flex;
            align-items: center;
            gap: 8px;
        }


        .jumlah input[type="number"] {
            width: 60px;
            padding: 5px 8px;
            border: 1px solid #ddd;
            border-radius: 6px;
            text-align: center;
            outline: none;
        }

        .jumlah input[type="number"]:focus {
            border-color: #ff6633;
        }

        .btn-update {
            background: #ff6633;
            color: white;
            border: none;
            padding: 5px 12px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 12px;
            font-weight: 500;
        }



        .ringkasan {
            flex: 1;
            background: #fff;
            border-radius: 0px;
            padding: 20px;
            height: fit-content;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .ringkasan h3 {
            margin-bottom: 5px;
        }

        .tanggal {
            font-size: 12px;
            color: #888;
            text-align: right;
            margin-bottom: 10px;
            margin-top: -5px;
            margin-right: 5px;
        }

        .garis {
            border: none;
            border-top: 1px solid #ddd;
            margin-bottom: 10px;
        }

        .ringkasan ul {
            list-style: none;
            margin-bottom: 10px;
        }

        .ringkasan li {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
        }

        .total {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
            font-weight: bold;
        }

        .btn-bayar {
            background-color: #ff6633;
            color: white;
            border: none;
            border-radius: 6px;
            padding: 10px;
            width: 100%;
            margin-top: 20px;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-bayar:hover {
            background-color: #ff3300;
        }

        .btn-bayar:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }

        .btn-bayar:disabled:hover {
            background-color: #ccc;
        }

        .input-section {
            margin-bottom: 15px;
            display: flex;
            flex-direction: column;
        }

        .input-section label {
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 6px;
        }

        .input-section input {
            padding: 8px 10px;
            border: 1px solid #ddd;
            border-radius: 6px;
            outline: none;
            transition: 0.2s;
        }

        .input-section input:focus {
            border-color: #ff6633;
            box-shadow: 0 0 4px rgba(255, 102, 51, 0.3);
        }

        .pilihan-section {
            margin-bottom: 20px;
        }

        .pilihan-section label {
            display: block;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 8px;
        }

        .radio-group {
            display: flex;
            gap: 20px;
        }

        .radio-group label {
            font-size: 13px;
            color: #555;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .radio-group input[type="radio"] {
            accent-color: #ff6633;
            cursor: pointer;
        }

        .input-section select {
            padding: 8px 10px;
            border: 1px solid #ddd;
            border-radius: 6px;
            outline: none;
            transition: 0.2s;
            width: 100%;
            background-color: white;
            cursor: pointer;
        }

        .input-section select:focus {
            border-color: #ff6633;
            box-shadow: 0 0 4px rgba(255, 102, 51, 0.3);
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="header">
                <h2>Semua Pesanan</h2>

            </div>

            <div class="pesanan-container">
                <div class="daftar-pesanan">
                    <?php $__empty_1 = true; $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="pesanan-item">
                            <div class="img-placeholder">
                                <img src="<?php echo e(asset('storage/' . $item['photo'])); ?>" alt="<?php echo e($item['name']); ?>"
                                    style="width: 60px; object-fit: cover; border-radius: 10px;">
                            </div>
                            <div class="info">
                                <p class="nama"><?php echo e($item['name']); ?></p>
                                <p class="harga">Rp<?php echo e(number_format($item['price'], 0, ',', '.')); ?></p>
                            </div>
                            <div class="jumlah">
                                <form action="<?php echo e(route('cart.update', $id)); ?>" method="POST"
                                    style="display: flex; align-items: center; gap: 8px;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PATCH'); ?>
                                    <input type="number" name="quantity" value="<?php echo e($item['quantity']); ?>" min="1" required>
                                    <button type="submit" class="btn-update">Update</button>
                                </form>
                                <form action="<?php echo e(route('cart.remove', $id)); ?>" method="POST"
                                    style="margin-left: 5px;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit"
                                        style="background: #dc3545; color: white; border: none; padding: 5px 10px; border-radius: 50%; cursor: pointer; font-size: 12px;">x</button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div style="text-align: center; padding: 40px; background: #fff; border-radius: 10px;">
                            <p style="color: #999;">Keranjang masih kosong.</p>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="ringkasan">
                    <form action="<?php echo e(route('orders.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>

                        <div class="input-section">
                            <label for="customer_name">Nama Customer</label>
                            <input type="text" placeholder="Masukkan nama pemesan" id="customer_name"
                                name="customer_name" value="<?php echo e(old('customer_name')); ?>" required>
                            <?php $__errorArgs = ['customer_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div style="color: #dc3545; font-size: 12px; margin-top: 4px;"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="input-section">
                            <label for="order_date">Tanggal Order</label>
                            <input type="date" id="order_date" name="order_date"
                                value="<?php echo e(old('order_date', date('Y-m-d'))); ?>" required>
                            <?php $__errorArgs = ['order_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div style="color: #dc3545; font-size: 12px; margin-top: 4px;"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="input-section">
                            <label for="table_id">Pilih Meja (Opsional)</label>
                            <select id="table_id" name="table_id">
                                <option value="">-- Take Away / Tidak Pilih Meja --</option>
                                <?php $__currentLoopData = $availableTables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $table): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($table->id ?? ''); ?>"><?php echo e($table->table_number); ?> (Kapasitas: <?php echo e($table->capacity); ?>)</option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="input-section">
                            <label for="payment_method">Metode Bayar</label>
                            <select id="payment_method" name="payment_method" required>
                                <option value="cash">Cash</option>
                                <option value="midtrans">Midtrans (Digital)</option>
                            </select>
                            <?php $__errorArgs = ['payment_method'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div style="color: #dc3545; font-size: 12px; margin-top: 4px;"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <h3>Pesanan</h3>
                        <hr class="garis" />
                        <ul>
                            <?php $__empty_1 = true; $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <li><?php echo e($item['name']); ?> (<?php echo e($item['quantity']); ?>x)
                                    <span>Rp<?php echo e(number_format($item['price'] * $item['quantity'], 0, ',', '.')); ?></span>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <li style="text-align: center; color: #999;">Belum ada pesanan</li>
                            <?php endif; ?>
                        </ul>
                        <div class="total">
                            <strong>Total</strong>
                            <span>Rp<?php echo e(number_format($totalAmount ?? 0, 0, ',', '.')); ?></span>
                        </div>
                        <button class="btn-bayar" <?php echo e(empty($cart) ? 'disabled' : ''); ?>>lanjutkan pembayaran</button>
                    </form>
                </div>
            </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.kasir', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\VICTUS\Downloads\metimev2\resources\views/kasir/menu/create.blade.php ENDPATH**/ ?>