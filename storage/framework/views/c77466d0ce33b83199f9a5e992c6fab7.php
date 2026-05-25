<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk #<?php echo e($order->payment->transaction_id ?? $order->id); ?></title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Inter:wght@400;500&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-bg: #fffbf7; /* Putih Gading Sangat Muda (biar orennya stand out) */
            --card-bg: #ffffff;
            --text-dark: #2d3436;
            --text-muted: #636e72;
            
            /* Warna Status */
            --success-color: #28a745; /* Hijau */
            --success-bg: #d4edda;
            --pending-color: #ff6633; /* Warna Dasar Utama (#ff6633) */
            --pending-color-text: #e65c2e; /* Versi sedikit lebih gelap untuk teks agar terbaca */
            --pending-bg: #ffefe5; /* Versi pudar dari #ff6633 (Matching banget) */
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--primary-bg);
            /* Pattern titik-titik pakai turunan warna oren */
            background-image: radial-gradient(#ffdccf 1px, transparent 1px);
            background-size: 20px 20px;
            color: var(--text-dark);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 2rem;
        }

        .app-container {
            width: 100%;
            max-width: 420px;
            padding: 0 1.5rem;
            margin-bottom: 3rem;
        }

        .receipt-card {
            background: var(--card-bg);
            border-radius: 24px;
            /* Shadow pakai warna oren transparan */
            box-shadow: 0 20px 40px rgba(255, 102, 51, 0.15);
            position: relative;
            overflow: hidden;
            animation: slideUp 0.5s ease-out;
        }

        @keyframes slideUp {
            from { transform: translateY(20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        .success-header {
            
            background: linear-gradient(180deg, #fccdb0 0%, #ffffff 100%);
            padding: 2.5rem 1.5rem 1rem 1.5rem;
            text-align: center;
            position: relative;
        }

        .success-icon-wrapper {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            margin: 0 auto 1rem auto;
            animation: bounceIn 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        /* Styling warna icon berdasarkan status */
        .status-paid .success-icon-wrapper {
            background: var(--success-bg);
            color: var(--success-color);
            box-shadow: 0 10px 20px rgba(40, 167, 69, 0.2);
        }
        .status-pending .success-icon-wrapper {
            /* Background icon pakai pending-bg yang sudah dimatching */
            background: var(--pending-bg);
            color: var(--pending-color);
            box-shadow: 0 10px 20px rgba(255, 102, 51, 0.25);
        }

        @keyframes bounceIn {
            0% { transform: scale(0); }
            80% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }

        .brand-title {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-size: 1.4rem;
            color: var(--text-dark);
        }

        .receipt-body {
            padding: 1.5rem;
        }

        .zigzag-bottom {
            width: 100%;
            height: 15px;
            background: 
                linear-gradient(-45deg, transparent 16px, var(--card-bg) 0), 
                linear-gradient(45deg, transparent 16px, var(--card-bg) 0);
            background-repeat: repeat-x;
            background-position: left bottom;
            background-size: 20px 32px;
            margin-top: -10px;
            position: relative;
            z-index: 2;
            /* Filter drop-shadow oren tipis */
            filter: drop-shadow(0 4px 2px rgba(255, 102, 51, 0.05));
        }

        .info-row { display: flex; justify-content: space-between; margin-bottom: 0.8rem; font-size: 0.9rem; }
        .info-label { color: var(--text-muted); }
        .info-val { font-weight: 600; color: var(--text-dark); }
        .dashed-line { border-top: 2px dashed #ececec; margin: 1.5rem 0; }
        .item-row { display: flex; justify-content: space-between; margin-bottom: 0.8rem; font-size: 0.95rem; }
        .item-meta { font-size: 0.85rem; color: var(--text-muted); }

        .total-box {
            background-color: #fffbf9; /* Putih kemerahan dikit */
            border: 1px solid #ffece5; /* Border senada */
            border-radius: 12px;
            padding: 1rem;
            margin-top: 1rem;
        }
        .total-label { font-size: 1rem; font-weight: 600; }
        .total-price { font-size: 1.2rem; font-weight: 700; color: var(--text-dark); }

        .action-area { margin-top: 2rem; display: flex; flex-direction: column; gap: 12px; }
        .btn-main {
            background-color: var(--text-dark); color: white; border: none; padding: 14px;
            border-radius: 12px; font-weight: 600; width: 100%; transition: transform 0.2s;
            display: flex; align-items: center; justify-content: center; gap: 8px;
        }
        .btn-main:active { transform: scale(0.98); }
        .btn-group-row { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }
        .btn-outline {
            background-color: white; border: 1px solid #ffccbb; color: var(--text-dark); padding: 12px;
            border-radius: 12px; font-weight: 600; text-align: center; text-decoration: none;
            transition: all 0.2s; display: flex; align-items: center; justify-content: center; gap: 6px; font-size: 0.9rem;
        }
        .btn-outline:hover { background-color: #fff5f0; border-color: #ff6633; }

        .thermal-print-area { display: none; }
        @media print {
            @page { size: 58mm auto; margin: 0; }
            body { background: none; padding: 0; }
            .app-container, .screen-only { display: none !important; }
            .thermal-print-area {
                display: block; width: 100%; padding: 2mm 1mm; font-family: 'Space Mono', monospace;
                font-size: 11px; color: black; line-height: 1.2;
            }
            .thermal-center { text-align: center; } .thermal-right { text-align: right; }
            .thermal-bold { font-weight: bold; } .thermal-divider { border-top: 1px dashed black; margin: 5px 0; }
            .thermal-table { width: 100%; } .thermal-table td { vertical-align: top; }
        }
    </style>
</head>
<body>

    <div class="app-container screen-only">
        
        <?php if(session('success')): ?>
        <div class="alert alert-success shadow-sm border-0 d-flex align-items-center mb-4" style="border-radius: 12px; background-color: #d1f2eb; color: #00b894;">
            <i class="fas fa-check-circle me-2"></i> Transaksi berhasil disimpan!
        </div>
        <?php endif; ?>

        <div class="receipt-card <?php echo e($order->payment->status == 'paid' ? 'status-paid' : 'status-pending'); ?>">
            <div class="success-header">
                <div class="success-icon-wrapper">
                    <?php if($order->payment->status == 'paid'): ?>
                        <i class="fas fa-check"></i>
                    <?php else: ?>
                        <i class="fas fa-exclamation"></i>
                    <?php endif; ?>
                </div>
                <div class="brand-title">Metime</div>
                <div style="color: var(--text-muted); font-size: 0.9rem;">
                    <?php if($order->payment->status == 'paid'): ?>
                        Terima kasih atas pesanan Anda
                    <?php else: ?>
                        Menunggu Pembayaran
                    <?php endif; ?>
                </div>
            </div>

            <div class="receipt-body">
                <div class="info-row">
                    <span class="info-label">No. Transaksi</span>
                    <span class="info-val"><?php echo e($order->payment->transaction_id ?? 'TRX-'.$order->id); ?></span>
                </div>
                <div class="info-row">
                    <span class="info-label">Waktu (WIB)</span>
                    <span class="info-val"><?php echo e($order->created_at->setTimezone('Asia/Jakarta')->format('d M, H:i')); ?></span>
                </div>
                <div class="info-row">
                    <span class="info-label">Tipe</span>
                    <span class="info-val">
                        <?php if($order->booking): ?>
                            <span class="badge bg-primary rounded-pill">Meja <?php echo e($order->booking->table->table_number); ?></span>
                        <?php else: ?>
                            <span class="badge bg-warning text-dark rounded-pill">Take Away</span>
                        <?php endif; ?>
                    </span>
                </div>

                <div class="dashed-line"></div>

                <div class="item-list">
                    <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item-row">
                        <div style="flex: 1;">
                            <div style="font-weight: 600;"><?php echo e($item->product->name ?? 'Item'); ?></div>
                            <div class="item-meta"><?php echo e($item->quantity); ?> x <?php echo e(number_format($item->price, 0, ',', '.')); ?></div>
                        </div>
                        <div style="font-weight: 600;">
                            <?php echo e(number_format($item->quantity * $item->price, 0, ',', '.')); ?>

                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <div class="dashed-line"></div>

                <div class="total-box">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <span class="total-label">Total Bayar</span>
                        <span class="total-price">Rp <?php echo e(number_format($order->total_amount, 0, ',', '.')); ?></span>
                    </div>
                    
                    <div class="d-flex justify-content-between align-items-center text-muted small">
                        <span>Metode: <?php echo e(strtoupper($order->payment->payment_method)); ?></span>
                        
                        <?php if($order->payment->status == 'paid'): ?>
                            <span class="text-success fw-bold" style="color: var(--success-color) !important;">LUNAS</span>
                        <?php else: ?>
                            <span class="text-danger fw-bold" style="color: var(--pending-color-text) !important;">PENDING</span>
                        <?php endif; ?>
                    </div>
                </div>
                
                <div class="text-center mt-3 text-muted" style="font-size: 0.8rem;">
                    Kasir: <?php echo e(Auth::user()->username ?? 'Admin'); ?>

                </div>
            </div>
            
            <div class="zigzag-bottom"></div>
        </div>

        <div class="action-area">
            <button onclick="printReceipt()" class="btn-main shadow-sm">
                <i class="fas fa-print"></i> Cetak Struk
            </button>
            
            <div class="btn-group-row">
                <a href="<?php echo e(route('orders.index')); ?>" class="btn-outline">
                    <i class="fas fa-plus-circle"></i> Pesanan Baru
                </a>
                <a href="<?php echo e(route('orders.history')); ?>" class="btn-outline">
                    <i class="fas fa-history"></i> Riwayat
                </a>
            </div>
        </div>
    </div>


    <div class="thermal-print-area">
        <div class="thermal-center thermal-bold" style="font-size: 14px;">MeTime</div>
        <div class="thermal-center" style="font-size: 10px;">Delicious Moments</div>
        <div class="thermal-center" style="font-size: 10px;">www.metime.web.id</div>
        <div class="thermal-divider"></div>
        
        <table class="thermal-table">
            <tr><td>No</td><td class="thermal-right"><?php echo e($order->payment->transaction_id ?? $order->id); ?></td></tr>
            <tr><td>Tgl</td><td class="thermal-right"><?php echo e($order->created_at->setTimezone('Asia/Jakarta')->format('d/m/y H:i')); ?></td></tr>
            <tr><td>Cust</td><td class="thermal-right"><?php echo e(substr($order->customer_name, 0, 15)); ?></td></tr>
            <tr>
                <td>Tipe</td>
                <td class="thermal-right"><?php echo e($order->booking ? 'Meja '.$order->booking->table->table_number : 'Take Away'); ?></td>
            </tr>
        </table>
        
        <div class="thermal-divider"></div>

        <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div style="margin-bottom: 2px;">
            <div class="thermal-bold"><?php echo e($item->product->name ?? 'Item'); ?></div>
            <div style="display: flex; justify-content: space-between;">
                <span><?php echo e($item->quantity); ?> x <?php echo e(number_format($item->price, 0, ',', '.')); ?></span>
                <span><?php echo e(number_format($item->quantity * $item->price, 0, ',', '.')); ?></span>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <div class="thermal-divider"></div>
        
        <div style="display: flex; justify-content: space-between;" class="thermal-bold">
            <span>TOTAL</span>
            <span>Rp <?php echo e(number_format($order->total_amount, 0, ',', '.')); ?></span>
        </div>
        
        <div class="thermal-divider"></div>
        
        <table class="thermal-table">
            <tr><td>Bayar</td><td class="thermal-right"><?php echo e(strtoupper($order->payment->payment_method)); ?></td></tr>
            <tr>
                <td>Status</td>
                <td class="thermal-right"><?php echo e($order->payment->status == 'paid' ? 'LUNAS' : 'PENDING'); ?></td>
            </tr>
            <tr><td>Kasir</td><td class="thermal-right"><?php echo e(Auth::user()->username ?? '-'); ?></td></tr>
        </table>

        <br>
        <div class="thermal-center">Terima Kasih!</div>
        <div class="thermal-center">Simpan bukti pembayaran ini.</div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/qz-tray/qz-tray.js"></script>
    <script>
        let qzConnected = false;
        qz.websocket.connect()
            .then(() => { 
                qzConnected = true; 
                console.log("✅ QZ Tray Connected"); 
            })
            .catch((e) => { 
                console.log("⚠️ QZ Tray not found, using browser print."); 
            });

        function printReceipt() {
            if (qzConnected) {
                printQZ();
            } else {
                window.print();
            }
        }

        function printQZ() {
            qz.printers.getDefault().then(printer => {
                let config = qz.configs.create(printer);
                const fmt = (n) => new Intl.NumberFormat('id-ID').format(n);

                let itemsData = [];
                <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    itemsData.push('<?php echo e($item->product->name ?? "Item"); ?>\n');
                    itemsData.push('  <?php echo e($item->quantity); ?> x ' + fmt(<?php echo e($item->price); ?>) + '     Rp ' + fmt(<?php echo e($item->quantity * $item->price); ?>) + '\n');
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                // LOGIKA JS QZ TRAY: PAID = LUNAS, LAINNYA = PENDING
                let statusText = "<?php echo e($order->payment->status == 'paid' ? 'LUNAS' : 'PENDING'); ?>";

                let data = [
                    '\x1B\x61\x01', // Center
                    '\x1B\x45\x01', // Bold
                    'MeTime Resto\n',
                    '\x1B\x45\x00', // No Bold
                    'Delicious Moments\n',
                    '--------------------------------\n',
                    '\x1B\x61\x00', // Left
                    'No Trx : <?php echo e($order->payment->transaction_id ?? "-"); ?>\n',
                    'Tgl    : <?php echo e($order->created_at->setTimezone("Asia/Jakarta")->format("d/m/y H:i")); ?>\n',
                    'Cust   : <?php echo e($order->customer_name); ?>\n',
                    'Tipe   : <?php echo e($order->booking ? "Meja ".$order->booking->table->table_number : "Take Away"); ?>\n',
                    '--------------------------------\n',
                    ...itemsData,
                    '--------------------------------\n',
                    '\x1B\x61\x02', // Right
                    '\x1B\x45\x01', // Bold
                    'TOTAL: Rp ' + fmt(<?php echo e($order->total_amount); ?>) + '\n',
                    '\x1B\x45\x00', // No Bold
                    '--------------------------------\n',
                    '\x1B\x61\x00', // Left
                    'Bayar  : <?php echo e(strtoupper($order->payment->payment_method)); ?>\n',
                    'Status : ' + statusText + '\n',
                    'Kasir  : <?php echo e(Auth::user()->username ?? "-"); ?>\n',
                    '\x1B\x61\x01', // Center
                    '\nTerima Kasih!\n\n\n',
                    '\x1D\x56\x41\x00' // Cut Paper
                ];

                return qz.print(config, data);
            }).catch(err => {
                alert("Gagal cetak QZ Tray: " + err);
                window.print();
            });
        }
    </script>
</body>
</html><?php /**PATH C:\Users\VICTUS\Documents\metimev4\resources\views/orders/show.blade.php ENDPATH**/ ?>