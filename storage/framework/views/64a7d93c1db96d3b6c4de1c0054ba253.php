<?php $__env->startSection('title', 'Riwayat Transaksi - Yammien 12K'); ?>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    
    <style>
        /* Global Reset */
        * { box-sizing: border-box; outline: none; }

        :root {
            --primary: #ff6633;
            --primary-light: #fff0e6;
            --text-dark: #2d3436;
            --text-muted: #64748b;
            --bg-page: #f8f9fa;
            --border-color: #f1f5f9;
            --radius: 12px;
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-page);
            color: var(--text-dark);
        }

        .main-content {
            padding: 30px;
            /* Scrollbar logic tetap default browser/hidden sesuai preferensi sebelumnya */
            overflow-x: hidden;
            overflow-y: auto;
        }

        .main-content h2 {
            font-family: 'Poppins', sans-serif;
            margin-bottom: 25px;
            color: var(--text-dark);
            font-weight: 700;
            font-size: 1.5rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .riwayat-container {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-right: 0; /* Diperbaiki agar tidak ada margin kanan aneh */
            max-width: 100%;
        }

        /* --- CARD STYLE (DIPERCANTIK) --- */
        details.transaksi {
            background: #fff;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            border: 1px solid var(--border-color);
            transition: all 0.2s ease-in-out;
            overflow: hidden;
        }

        details.transaksi:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05);
            border-color: #ffccbb; /* Border oranye tipis saat hover */
        }

        details[open].transaksi {
            border-color: var(--primary); /* Border oranye saat dibuka */
            box-shadow: 0 4px 12px rgba(255, 102, 51, 0.15);
        }

        /* --- SUMMARY HEADER --- */
        summary {
            list-style: none;
            cursor: pointer;
            padding: 16px 20px;
            background: #fff;
            position: relative;
        }

        summary::-webkit-details-marker { display: none; }

        /* --- GRID LAYOUT (TIDAK DIUBAH LOGIKANYA) --- */
        .info-transaksi {
            display: grid;
            grid-template-columns: 
                30px        /* arrow */
                1.5fr       /* kode */
                1fr         /* tanggal */
                0.8fr       /* jam */
                0.8fr       /* item */
                1.2fr       /* pembayaran */
                1.2fr       /* total */
                40px;       /* tombol */
            align-items: center;
            gap: 12px;
        }

        /* --- ELEMEN DI DALAM HEADER --- */
        .arrow {
            color: #94a3b8;
            font-size: 0.9rem;
            transition: transform 0.3s ease;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f1f5f9;
            border-radius: 50%;
        }

        details[open] .arrow {
            transform: rotate(90deg);
            color: #fff;
            background: var(--primary);
        }

        .kode {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            color: var(--primary);
            font-size: 0.95rem;
        }

        .tanggal, .jam, .pesanan {
            font-size: 0.9rem;
            color: var(--text-muted);
            font-weight: 500;
        }
        
        .jam i, .pesanan i { margin-right: 5px; color: #cbd5e1; }

        /* Badge Pembayaran */
        .pembayaran {
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--text-dark);
            background: #f8fafc;
            padding: 6px 12px;
            border-radius: 20px;
            border: 1px solid #e2e8f0;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            width: fit-content;
        }
        .pembayaran i { color: var(--text-muted); }

        .total {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            color: var(--text-dark);
            font-size: 1rem;
            text-align: right;
        }

        /* Tombol Detail */
        .btn-detail {
            background-color: #fff;
            color: var(--primary);
            border: 1px solid var(--primary);
            border-radius: 8px;
            width: 36px;
            height: 36px;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: all 0.2s;
            text-decoration: none;
            font-size: 1rem;
        }

        .btn-detail:hover {
            background-color: var(--primary);
            color: #fff;
            box-shadow: 0 4px 10px rgba(255, 102, 51, 0.3);
        }

        /* --- DETAIL SECTION (EXPANDABLE) --- */
        .detail-transaksi {
            background-color: #fafafa; /* Warna abu muda */
            padding: 20px 25px 25px 65px; /* Indentasi supaya sejajar teks */
            border-top: 1px dashed #e2e8f0;
            animation: slideDown 0.3s ease;
        }

        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .detail-transaksi ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .detail-transaksi li {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
            color: var(--text-dark);
            font-size: 0.9rem;
            border-bottom: 1px solid #f1f5f9;
            padding-bottom: 8px;
        }
        
        .detail-transaksi li:last-child {
            border-bottom: none;
            padding-bottom: 0;
            margin-bottom: 0;
        }

        .item-name { font-weight: 500; }
        .item-qty { color: var(--text-muted); font-size: 0.85rem; margin-left: 5px; }

        .total-detail {
            display: flex;
            justify-content: flex-end;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 2px solid #e2e8f0;
            font-weight: 700;
            font-size: 1.1rem;
            color: var(--primary);
            gap: 20px;
        }

        .total-label { font-size: 0.9rem; color: var(--text-muted); font-weight: 500; align-self: center; }

        /* --- RESPONSIVE LOGIC (TIDAK DIUBAH SESUAI REQUEST) --- */
        @media (max-width: 768px) {
            .info-transaksi {
                grid-template-columns: 20px 1fr auto;
                row-gap: 8px;
            }

            .arrow { width: 20px; height: 20px; font-size: 0.7rem; }

            .tanggal, .jam, .pesanan, .pembayaran, .total {
                grid-column: 2 / -1;
                font-size: 13px;
                margin-left: 0;
            }
            
            .kode { font-size: 0.9rem; }
            .total { text-align: left; color: var(--primary); margin-top: 5px; }

            .btn-detail {
                grid-column: 3;
                grid-row: 1;
                width: 30px;
                height: 30px;
                font-size: 0.8rem;
            }
            
            .detail-transaksi { padding: 15px; }
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="main-content">
    <h2><i class="fa-solid fa-clock-rotate-left"></i> Riwayat Transaksi</h2>
    
    <div class="riwayat-container">
        <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <details class="transaksi">
                <summary>
                    <div class="info-transaksi">
                        <div style="display:flex; justify-content:center;">
                            <i class="fa-solid fa-chevron-right arrow"></i>
                        </div>
                        
                        <div class="kode">
                            <?php echo e($order->payment->transaction_id ?? 'TRX' . str_pad($order->id, 3, '0', STR_PAD_LEFT)); ?>

                        </div>

                        <div class="tanggal">
                            <i class="fa-regular fa-calendar-alt" style="margin-right: 5px; color: #cbd5e1;"></i>
                            <?php echo e(\Carbon\Carbon::parse($order->order_date)->format('d M Y')); ?>

                        </div>

                        <div class="jam">
                            <i class="fa-regular fa-clock"></i>
                            <?php echo e(\Carbon\Carbon::parse($order->created_at)->format('H:i')); ?>

                        </div>

                        <div class="pesanan">
                            <i class="fa-solid fa-bag-shopping"></i>
                            <?php echo e($order->items->count()); ?> Item
                        </div>

                        <div class="pembayaran">
                            <?php if($order->payment): ?>
                                <?php if($order->payment->payment_method == 'cash'): ?>
                                    <i class="fa-solid fa-money-bill-wave text-success"></i> Cash
                                <?php elseif(in_array($order->payment->payment_method, ['gopay', 'shopeepay', 'dana', 'ovo'])): ?>
                                    <i class="fa-solid fa-wallet text-primary"></i> <?php echo e(ucfirst($order->payment->payment_method)); ?>

                                <?php elseif($order->payment->payment_method == 'qris'): ?>
                                    <i class="fa-solid fa-qrcode text-dark"></i> QRIS
                                <?php else: ?>
                                    <i class="fa-solid fa-credit-card text-secondary"></i> <?php echo e(ucfirst($order->payment->payment_method)); ?>

                                <?php endif; ?>
                            <?php else: ?>
                                <i class="fa-solid fa-minus"></i> -
                            <?php endif; ?>
                        </div>

                        <div class="total">
                            Rp<?php echo e(number_format($order->total_amount, 0, ',', '.')); ?>

                        </div>

                        <a href="<?php echo e(route('orders.show', $order->id)); ?>" class="btn-detail" title="Lihat Struk" onclick="event.stopPropagation();">
                            <i class="fa-solid fa-receipt"></i>
                        </a>
                    </div>
                </summary>

                <div class="detail-transaksi">
                    <ul>
                        <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <div>
                                    <span class="item-name"><?php echo e($item->product->name); ?></span>
                                    <span class="item-qty">(x<?php echo e($item->quantity); ?>)</span>
                                </div>
                                <span>Rp<?php echo e(number_format($item->price * $item->quantity, 0, ',', '.')); ?></span>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <div class="total-detail">
                        <span class="total-label">Total Bayar</span>
                        <span>Rp<?php echo e(number_format($order->total_amount, 0, ',', '.')); ?></span>
                    </div>
                </div>
            </details>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div style="text-align: center; padding: 50px; color: #94a3b8; background: #fff; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05);">
                <i class="fa-solid fa-box-open" style="font-size: 48px; margin-bottom: 15px; color: #cbd5e1;"></i>
                <p style="font-weight: 500;">Belum ada riwayat transaksi yang tercatat.</p>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\VICTUS\Documents\Project-Kasir-Warung-Yamien-12-K\resources\views/kasir/history/kasir.blade.php ENDPATH**/ ?>