<?php $__env->startSection('title', 'Riwayat Penjualan - Admin MeTime'); ?>

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
            padding: 40px;
            overflow-y: auto;
        }

        .main-content h2 {
            font-size: 24px;
            font-weight: 700;
            margin: 20px 0 10px;
        }

        .search-bar {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
        }

        .search-bar label {
            font-size: 14px;
            color: #444;
        }

        .search-input {
            padding: 8px 12px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 14px;
            outline: none;
            transition: 0.3s;
        }

        .search-input:focus {
            border-color: #ff6633;
            box-shadow: 0 0 4px rgba(255, 102, 51, 0.3);
        }

        .export-bar {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-bottom: 15px;
        }

        .export-btn {
            padding: 8px 14px;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            cursor: pointer;
            font-weight: 600;
            transition: 0.3s;
            display: flex;
            align-items: center;
            gap: 6px;
            text-decoration: none;
        }

        .export-btn.pdf {
            background-color: #ef4444;
            color: white;
        }

        .export-btn.excel {
            background-color: #22c55e;
            color: white;
        }

        .export-btn:hover {
            opacity: 0.85;
        }

        .transactions {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-bottom: 40px;
        }

        .transaction-card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .transaction-card summary {
            list-style: none;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #f9f9f9;
            padding: 15px 20px;
            cursor: pointer;
            font-weight: 600;
            font-size: 14px;
            flex-wrap: wrap;
            gap: 10px;
        }

        .transaction-card summary::-webkit-details-marker {
            display: none;
        }

        .transaction-card summary:hover {
            background: #fff3ee;
        }

        .trx-id {
            flex: 1;
            font-weight: 700;
            min-width: 120px;
        }

        .trx-date,
        .trx-time,
        .trx-buyer,
        .trx-item,
        .trx-pay,
        .trx-total,
        .trx-type {
            flex: 1;
            text-align: center;
            min-width: 80px;
        }

        .trx-total {
            font-weight: 700;
            color: #e75b27;
        }

        .trx-type {
            flex: 0.7;
            padding: 5px 10px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
        }

        .trx-type.dinein {
            background: #dcfce7;
            color: #15803d;
        }

        .trx-type.takeaway {
            background: #fef3c7;
            color: #92400e;
        }

        .trx-details {
            padding: 20px;
            background: #fff;
            animation: fadeIn 0.3s ease;
        }

        .trx-details p {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid #f0f0f0;
            font-size: 14px;
        }

        .trx-details p.total {
            border-top: 2px solid #ddd;
            border-bottom: none;
            font-weight: 700;
            font-size: 16px;
            color: #e75b27;
            margin-top: 10px;
            padding-top: 12px;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 992px) {
            .main-content {
                padding: 24px 36px;
            }

            .riwayat-container {
                max-width: 820px;
            }

            .info-center {
                gap: 12px;
            }

            .info-left {
                min-width: 150px;
            }
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                flex-direction: row;
                justify-content: space-between;
                padding: 12px 16px;
            }

            .menu-nav {
                flex-direction: row;
                gap: 12px;
                padding: 0 8px;
            }

            .main-content {
                padding: 18px 14px;
            }

            .riwayat-container {
                max-width: 100%;
                padding: 0 6px;
            }

            .info-transaksi {
                display: flex;
                flex-wrap: wrap;
                align-items: center;
                gap: 8px;
            }

            .info-left {
                min-width: 120px;
            }

            .info-center {
                flex: 1 1 50%;
                gap: 10px;
                display: flex;
                flex-wrap: wrap;
            }

            .info-right {
                margin-left: auto;
                display: flex;
                align-items: center;
                gap: 8px;
            }

            .kode {
                font-size: 14px;
            }

            .tanggal,
            .jam,
            .pesanan,
            .pembayaran,
            .total,
            .status {
                font-size: 12px;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    </head>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <h2>Riwayat Penjualan Harian</h2>

    <div class="export-bar">
        <a href="<?php echo e(route('orders.export-pdf', ['filter' => 'daily', 'date' => request('date')])); ?>" class="export-btn pdf">📄
            Ekspor PDF</a>
        <a href="<?php echo e(route('orders.export-excel', ['filter' => 'daily', 'date' => request('date')])); ?>"
            class="export-btn excel">📊 Ekspor Excel</a>
    </div>

    <form action="<?php echo e(route('orders.history')); ?>" method="GET" class="search-bar">
        <label for="search-date">Cari tanggal:</label>
        <input type="date" id="search-date" name="date" class="search-input" value="<?php echo e(request('date')); ?>">
        <button type="submit"
            style="padding: 8px 16px; border: none; border-radius: 8px; background: #ff6633; color: white; cursor: pointer; font-weight: 600;">Cari</button>
        <?php if(request('date')): ?>
            <a href="<?php echo e(route('orders.history')); ?>"
                style="padding: 8px 16px; border: none; border-radius: 8px; background: #6b7280; color: white; cursor: pointer; font-weight: 600; text-decoration: none;">Reset</a>
        <?php endif; ?>
    </form>

    <section class="transactions">
        <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <details class="transaction-card">
                <summary>
                    <span class="trx-id"><?php echo e($order->payment->transaction_id ?? 'N/A'); ?></span>
                    <span class="trx-date"><?php echo e(\Carbon\Carbon::parse($order->order_date)->format('d M Y')); ?></span>
                    <span class="trx-time"><?php echo e(\Carbon\Carbon::parse($order->created_at)->format('H:i')); ?></span>
                    <span class="trx-buyer">👤 <?php echo e($order->customer_name); ?></span>
                    <span class="trx-item"><?php echo e($order->items->count() ?? ($order->orderItems->count() ?? 0)); ?> Item</span>
                    <span class="trx-pay"><?php echo e(ucfirst($order->payment->payment_method ?? 'N/A')); ?></span>
                    <span class="trx-total">Rp<?php echo e(number_format($order->total_amount, 0, ',', '.')); ?></span>
                    <span class="trx-type <?php echo e($order->booking_id ? 'dinein' : 'takeaway'); ?>">
                        <?php echo e($order->booking_id ? 'Dine In' : 'Take Away'); ?>

                    </span>
                </summary>
                <div class="trx-details">
                    <?php $items = $order->items ?? $order->orderItems ?? collect(); ?>
                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <p>
                            <?php echo e($item->product->name ?? 'Item'); ?>

                            <span>Rp<?php echo e(number_format($item->price * $item->quantity, 0, ',', '.')); ?></span>
                        </p>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <p class="total">Total <span>Rp<?php echo e(number_format($order->total_amount, 0, ',', '.')); ?></span></p>

                    <div
                        style="margin-top: 15px; padding-top: 15px; border-top: 1px dashed #eee; display: flex; justify-content: flex-end;">
                        <a href="<?php echo e(route('orders.show', $order->id)); ?>" target="_blank"
                            style="background-color: #4b5563; color: white; padding: 8px 16px; border-radius: 6px; text-decoration: none; font-size: 13px; font-weight: 600; display: inline-flex; align-items: center; gap: 8px; transition: 0.3s;"
                            onmouseover="this.style.backgroundColor='#374151'"
                            onmouseout="this.style.backgroundColor='#4b5563'">
                            <i class="fas fa-print"></i> Cetak Struk
                        </a>
                    </div>
                </div>
            </details>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div style="text-align: center; padding: 40px; color: #999;">
                <p>Belum ada transaksi untuk tanggal yang dipilih.</p>
            </div>
        <?php endif; ?>
    </section>

    <h2>Riwayat Penjualan Bulanan</h2>

    <div class="export-bar">
        <a href="<?php echo e(route('orders.export-pdf', ['filter' => 'monthly', 'month' => request('month', date('m')), 'year' => request('year', date('Y'))])); ?>"
            class="export-btn pdf">📄 Ekspor PDF</a>
        <a href="<?php echo e(route('orders.export-excel', ['filter' => 'monthly', 'month' => request('month', date('m')), 'year' => request('year', date('Y'))])); ?>"
            class="export-btn excel">📊 Ekspor Excel</a>
    </div>

    <form action="<?php echo e(route('orders.history')); ?>" method="GET" class="search-bar">
        <label for="search-month">Cari bulan:</label>
        <select id="search-month" name="month" class="search-input">
            <option value="">Pilih Bulan</option>
            <?php for($i = 1; $i <= 12; $i++): ?>
                <option value="<?php echo e($i); ?>" <?php echo e(request('month', date('m')) == $i ? 'selected' : ''); ?>>
                    <?php echo e(\Carbon\Carbon::create()->month($i)->translatedFormat('F')); ?>

                </option>
            <?php endfor; ?>
        </select>
        <select name="year" class="search-input">
            <?php for($y = date('Y'); $y >= date('Y') - 5; $y--): ?>
                <option value="<?php echo e($y); ?>" <?php echo e(request('year', date('Y')) == $y ? 'selected' : ''); ?>>
                    <?php echo e($y); ?></option>
            <?php endfor; ?>
        </select>
        <button type="submit"
            style="padding: 8px 16px; border: none; border-radius: 8px; background: #ff6633; color: white; cursor: pointer; font-weight: 600;">Cari</button>
    </form>

    <section class="transactions">
        <?php
            $monthlyData = $orders->groupBy(function ($order) {
                return \Carbon\Carbon::parse($order->order_date)->format('Y-m');
            });
        ?>

        <?php $__empty_1 = true; $__currentLoopData = $monthlyData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $monthKey => $monthOrders): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php
                $monthDate = \Carbon\Carbon::createFromFormat('Y-m', $monthKey);
                $totalAmount = $monthOrders->sum('total_amount');
                $totalTransactions = $monthOrders->count();

                $paymentMethods = $monthOrders->groupBy('payment.payment_method');
                $dominantMethod = $paymentMethods
                    ->sortByDesc(function ($group) {
                        return $group->count();
                    })
                    ->keys()
                    ->first();

                $methodStats = [];
                foreach ($paymentMethods as $method => $group) {
                    $percentage = round(($group->count() / $totalTransactions) * 100);
                    $methodStats[] = ucfirst($method) . ' ' . $percentage . '%';
                }

                $allItems = $monthOrders->flatMap(function ($order) {
                    return $order->items ?? ($order->orderItems ?? []);
                });
                $topProduct = $allItems
                    ->groupBy('product_id')
                    ->map(function ($items) {
                        return [
                            'name' => $items->first()->product->name ?? 'Unknown',
                            'qty' => $items->sum('quantity'),
                        ];
                    })
                    ->sortByDesc('qty')
                    ->first();

                $avgPerDay = round($totalAmount / $monthDate->daysInMonth);
            ?>

            <details class="transaction-card">
                <summary>
                    <span class="trx-id"><?php echo e($monthDate->translatedFormat('F Y')); ?></span>
                    <span class="trx-date">Total Transaksi: <?php echo e($totalTransactions); ?></span>
                    <span class="trx-pay">Metode Dominan: <?php echo e(ucfirst($dominantMethod ?? 'N/A')); ?></span>
                    <span class="trx-total">Rp<?php echo e(number_format($totalAmount, 0, ',', '.')); ?></span>
                </summary>
                <div class="trx-details">
                    <p>Penjualan tertinggi: <span><?php echo e($topProduct['name'] ?? 'N/A'); ?> (<?php echo e($topProduct['qty'] ?? 0); ?>

                            porsi)</span></p>
                    <p>Metode pembayaran: <span><?php echo e(implode(', ', $methodStats)); ?></span></p>
                    <p>Rata-rata pendapatan per hari: <span>Rp<?php echo e(number_format($avgPerDay, 0, ',', '.')); ?></span></p>
                    <div style="margin-top: 20px; padding-top: 15px; border-top: 2px solid #eee;">
                        <h4 style="margin-bottom: 10px; color: #333;">📅 Data Penjualan Harian
                            <?php echo e($monthDate->translatedFormat('F Y')); ?></h4>
                        <ul style="list-style: none; padding: 0;">
                            <?php
                                $dailyOrders = $monthOrders
                                    ->groupBy(function ($order) {
                                        return \Carbon\Carbon::parse($order->order_date)->format('Y-m-d');
                                    })
                                    ->sortKeys();
                            ?>
                            <?php $__currentLoopData = $dailyOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $date => $dayOrders): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li style="padding: 5px 0; font-size: 13px; color: #555;">
                                    <?php echo e(\Carbon\Carbon::parse($date)->translatedFormat('d M Y')); ?> -
                                    Rp<?php echo e(number_format($dayOrders->sum('total_amount'), 0, ',', '.')); ?>

                                    (<?php echo e($dayOrders->count()); ?> pesanan)
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            </details>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div style="text-align: center; padding: 40px; color: #999;">
                <p>Belum ada transaksi untuk bulan yang dipilih.</p>
            </div>
        <?php endif; ?>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\VICTUS\Downloads\metimev2\resources\views/kasir/history/index.blade.php ENDPATH**/ ?>