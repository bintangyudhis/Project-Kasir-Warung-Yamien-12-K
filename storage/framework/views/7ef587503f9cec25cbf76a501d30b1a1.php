<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Aktivitas Log</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 5px;
        }
        .subtitle {
            text-align: center;
            color: #666;
            margin-bottom: 20px;
            font-size: 14px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th {
            background-color: #ff6633;
            color: white;
            padding: 10px;
            text-align: left;
            font-weight: bold;
        }
        td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .badge {
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 10px;
            font-weight: bold;
            display: inline-block;
        }
        .badge-success { background-color: #28a745; color: white; }
        .badge-info { background-color: #17a2b8; color: white; }
        .badge-warning { background-color: #ffc107; color: #000; }
        .badge-danger { background-color: #dc3545; color: white; }
        .footer {
            margin-top: 30px;
            text-align: right;
            font-size: 10px;
            color: #666;
        }
    </style>
</head>
<body>
    <h1>Laporan Aktivitas Log</h1>
    <div class="subtitle">
        <?php if(request('date')): ?>
            Tanggal: <?php echo e(\Carbon\Carbon::parse(request('date'))->format('d F Y')); ?>

        <?php else: ?>
            Semua Data
        <?php endif; ?>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 5%">No</th>
                <th style="width: 15%">Tanggal</th>
                <th style="width: 15%">User</th>
                <th style="width: 15%">Tipe Aktivitas</th>
                <th style="width: 50%">Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $activityLogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($index + 1); ?></td>
                <td><?php echo e($log->created_at->format('d/m/Y H:i')); ?></td>
                <td><?php echo e($log->user->username); ?></td>
                <td>
                    <?php
                        $statusClass = 'badge-info';
                        if(str_contains(strtolower($log->activity_type), 'hapus') || str_contains(strtolower($log->activity_type), 'logout')) {
                            $statusClass = 'badge-danger';
                        } elseif(str_contains(strtolower($log->activity_type), 'tambah') || str_contains(strtolower($log->activity_type), 'login')) {
                            $statusClass = 'badge-success';
                        } elseif(str_contains(strtolower($log->activity_type), 'update')) {
                            $statusClass = 'badge-warning';
                        }
                    ?>
                    <span class="badge <?php echo e($statusClass); ?>"><?php echo e($log->activity_type); ?></span>
                </td>
                <td><?php echo e($log->description); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <div class="footer">
        <p>Dicetak pada: <?php echo e(\Carbon\Carbon::now()->format('d F Y H:i:s')); ?></p>
        <p>Total Data: <?php echo e(count($activityLogs)); ?> aktivitas</p>
    </div>
</body>
</html>
<?php /**PATH C:\Users\VICTUS\Documents\Project-Kasir-Warung-Yamien-12-K\resources\views/activity-logs/pdf.blade.php ENDPATH**/ ?>