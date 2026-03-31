<?php $__env->startSection('title', 'Riwayat Transaksi - MeTime'); ?>

<?php $__env->startPush('styles'); ?>
    <style>
        .main-content {
            background-color: #f8f8f8;
            padding: 30px 100px;
            overflow-y: auto;
        }

        .main-content h2 {
            margin-bottom: 20px;
            color: #222;
        }

        .riwayat-container {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-right: 90px;
        }

        details summary {
            list-style: none;
            cursor: pointer;
        }

        details summary::-webkit-details-marker {
            display: none;
        }

        .transaksi {
            background: #fff;
            border-radius: 0px;
            padding: 12px 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .transaksi:hover {
            transform: scale(1.01);
        }

        .info-transaksi {
            display: grid;
            grid-template-columns: 25px 100px 110px 120px 100px 130px 100px 90px 40px;
            align-items: center;
            gap: 10px;
        }

        .arrow {
            color: #666;
            transition: transform 0.3s ease;
        }

        details[open] .arrow {
            transform: rotate(90deg);
            color: #ff6633;
        }

        .kode {
            font-weight: bold;
            color: #222;
        }

        .tanggal,
        .jam,
        .pesanan,
        .pembayaran {
            font-size: 13px;
            color: #666;
        }

        .pembayaran i,
        .jam i {
            margin-right: 4px;
            color: #555;
        }

        .total {
            font-weight: bold;
            color: #000;
        }

        .status {
            font-size: 13px;
            font-weight: 600;
            padding: 4px 10px;
            border-radius: 6px;
            text-align: center;
        }

        .status.selesai {
            color: #0c8800;
            background-color: #ccf8cc;
        }

        .status.pending {
            color: #ff8c00;
            background-color: #ffe4cc;
        }

        .status.failed {
            color: #cc0000;
            background-color: #ffcccc;
        }

        .btn-detail {
            background-color: #ff6633;
            color: #fff;
            border: none;
            border-radius: 6px;
            width: 30px;
            height: 30px;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: 0.2s;
            text-decoration: none;
        }

        .btn-detail:hover {
            background-color: #e45522;
            transform: scale(1.05);
        }

        .btn-detail i {
            pointer-events: none;
        }

        .detail-transaksi {
            margin-top: 12px;
            padding-top: 10px;
            border-top: 1px solid #eee;
            animation: fade 0.3s ease;
        }

        .detail-transaksi ul {
            list-style: none;
        }

        .detail-transaksi li {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
            color: #333;
        }

        .total-detail {
            display: flex;
            justify-content: space-between;
            margin-top: 8px;
            font-weight: bold;
        }

        @keyframes fade {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        body {
            background-color: #f2f32f2;
        }

        .main-content {
            background-color: #f8f8f8;
            padding: 30px 100px;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <h2>Riwayat Transaksi</h2>
    <div class="riwayat-container">

        <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <details class="transaksi">
                <summary>
                    <div class="info-transaksi">
                        <i class="fa-solid fa-chevron-right arrow"></i>
                        <div class="kode">
                            <?php echo e($order->payment->transaction_id ?? 'TRX' . str_pad($order->id, 3, '0', STR_PAD_LEFT)); ?></div>
                        <div class="tanggal"><?php echo e(\Carbon\Carbon::parse($order->order_date)->format('d M Y')); ?></div>
                        <div class="jam"><i class="fa-regular fa-clock"></i>
                            <?php echo e(\Carbon\Carbon::parse($order->created_at)->format('H:i')); ?></div>
                        <div class="pesanan"><?php echo e($order->items->count()); ?> Item</div>
                        <div class="pembayaran">
                            <?php if($order->payment): ?>
                                <?php if($order->payment->payment_method == 'cash'): ?>
                                    <i class="fa-solid fa-money-bill-wave"></i> Cash
                                <?php elseif(in_array($order->payment->payment_method, ['gopay', 'shopeepay', 'dana'])): ?>
                                    <i class="fa-solid fa-wallet"></i> E-Wallet
                                <?php elseif($order->payment->payment_method == 'qris'): ?>
                                    <i class="fa-solid fa-qrcode"></i> QRIS
                                <?php else: ?>
                                    <i class="fa-solid fa-credit-card"></i> <?php echo e(ucfirst($order->payment->payment_method)); ?>

                                <?php endif; ?>
                            <?php else: ?>
                                <i class="fa-solid fa-question"></i> -
                            <?php endif; ?>
                        </div>
                        <div class="total">Rp<?php echo e(number_format($order->total_amount, 0, ',', '.')); ?></div>
                         <a href="<?php echo e(route('orders.show', $order->id)); ?>" class="btn-detail" onclick="event.stopPropagation();">
                            <i class="fa-solid fa-receipt"></i>
                        </a>

                    </div>
                </summary>
                <div class="detail-transaksi">
                    <ul>
                        <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <span><?php echo e($item->product->name); ?> (x<?php echo e($item->quantity); ?>)</span>
                                <span>Rp<?php echo e(number_format($item->price * $item->quantity, 0, ',', '.')); ?></span>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <div class="total-detail">
                        <strong>Total</strong>
                        <span>Rp<?php echo e(number_format($order->total_amount, 0, ',', '.')); ?></span>
                    </div>
                </div>
            </details>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div style="text-align: center; padding: 40px; color: #999;">
                <i class="fa-solid fa-inbox" style="font-size: 48px; margin-bottom: 10px;"></i>
                <p>Belum ada transaksi</p>
            </div>
        <?php endif; ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\KULIAH\Semester 6\Infromatika untuk Masyarakat\Tugas Besar\IPPL\resources\views/kasir/history/kasir.blade.php ENDPATH**/ ?>