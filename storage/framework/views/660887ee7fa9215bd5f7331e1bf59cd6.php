<?php $__env->startSection('title', 'Aktivitas Log - Admin Yammien 12K'); ?>

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
            padding: 40px;
            overflow-y: auto;
        }

        .main-content h2 {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .search-bar {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
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

        .btn-search {
            padding: 8px 16px;
            border: none;
            border-radius: 8px;
            background-color: #ff6633;
            color: white;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-search:hover {
            opacity: 0.85;
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

        .activity-table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .activity-table th {
            background: #ff6633;
            color: #fff;
            padding: 12px;
            font-size: 14px;
            text-align: left;
        }

        .activity-table td {
            padding: 12px;
            border-bottom: 1px solid #eee;
            font-size: 14px;
        }

        .activity-table tr:nth-child(even) {
            background-color: #fafafa;
        }

        .activity-table tr:hover {
            background-color: #fff3ee;
        }

        .status {
            padding: 5px 10px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
            color: #fff;
        }

        .status.success {
            background: #22c55e;
        }

        .status.info {
            background: #3b82f6;
        }

        .status.warning {
            background: #f59e0b;
        }

        .status.danger {
            background: #ef4444;
        }

        .pagination {
            display: flex;
            justify-content: center;
            gap: 5px;
            margin-top: 20px;
        }

        .pagination a,
        .pagination span {
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            text-decoration: none;
            color: #333;
            font-size: 14px;
        }

        .pagination .active {
            background-color: #ff6633;
            color: white;
            border-color: #ff6633;
        }

        .pagination a:hover {
            background-color: #f0f0f0;
        }

        @media (max-width: 768px) {
            .activity-table th,
            .activity-table td {
                font-size: 13px;
            }

            .main-content {
                padding: 20px;
            }

            .container {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                flex-direction: row;
                justify-content: space-around;
                padding: 10px 0;
            }
        }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<h2>Log Aktivitas <?php echo e(Auth::user()->role == 'admin' ? 'Admin' : 'User'); ?></h2>

            <div class="export-bar">
                <a href="<?php echo e(route('activity-logs.export-pdf', ['date' => request('date')])); ?>" class="export-btn pdf">📄 Ekspor PDF</a>
                <a href="<?php echo e(route('activity-logs.export-excel', ['date' => request('date')])); ?>" class="export-btn excel">📊 Ekspor Excel</a>
            </div>

            <form action="<?php echo e(route('activity-logs.index')); ?>" method="GET" class="search-bar">
                <label for="search-activity">Cari tanggal:</label>
                <input type="date" id="search-activity" name="date" class="search-input" value="<?php echo e(request('date')); ?>" />
                <button type="submit" class="btn-search">Cari</button>
                <?php if(request('date')): ?>
                    <a href="<?php echo e(route('activity-logs.index')); ?>" class="btn-search" style="background-color: #6b7280;">Reset</a>
                <?php endif; ?>
            </form>

            <section class="activity-log">
                <table class="activity-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Waktu</th>
                            <th>User</th>
                            <th>Aktivitas</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $activityLogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e(($activityLogs->currentPage() - 1) * $activityLogs->perPage() + $index + 1); ?></td>
                                <td><?php echo e($log->created_at->format('Y-m-d H:i')); ?></td>
                                <td><?php echo e($log->user->fullname ?? $log->user->name ?? 'Unknown'); ?></td>
                                <td><?php echo e($log->description); ?></td>
                                <td>
                                    <?php if($log->activity_type == 'login'): ?>
                                        <span class="status success">Berhasil</span>
                                    <?php elseif($log->activity_type == 'logout'): ?>
                                        <span class="status danger">Logout</span>
                                    <?php elseif($log->activity_type == 'make order'): ?>
                                        <span class="status info">Pesanan</span>
                                    <?php elseif($log->activity_type == 'check payment'): ?>
                                        <span class="status warning">Pembayaran</span>
                                    <?php elseif($log->activity_type == 'update'): ?>
                                        <span class="status info">Diperbarui</span>
                                    <?php elseif(str_contains($log->description, 'Menghapus') || str_contains($log->description, 'hapus')): ?>
                                        <span class="status warning">Dihapus</span>
                                    <?php elseif(str_contains($log->description, 'Menambahkan') || str_contains($log->description, 'tambah')): ?>
                                        <span class="status info">Ditambahkan</span>
                                    <?php elseif(str_contains($log->description, 'Mengupdate') || str_contains($log->description, 'Edit')): ?>
                                        <span class="status info">Diperbarui</span>
                                    <?php else: ?>
                                        <span class="status info">Info</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="5" style="text-align: center; padding: 40px; color: #999;">
                                    Belum ada log aktivitas.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>

                <?php if($activityLogs->hasPages()): ?>
                    <div class="pagination">
                        <?php if($activityLogs->onFirstPage()): ?>
                            <span>&laquo;</span>
                        <?php else: ?>
                            <a href="<?php echo e($activityLogs->previousPageUrl()); ?>&date=<?php echo e(request('date')); ?>">&laquo;</a>
                        <?php endif; ?>

                        <?php $__currentLoopData = $activityLogs->getUrlRange(1, $activityLogs->lastPage()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($page == $activityLogs->currentPage()): ?>
                                <span class="active"><?php echo e($page); ?></span>
                            <?php else: ?>
                                <a href="<?php echo e($url); ?>&date=<?php echo e(request('date')); ?>"><?php echo e($page); ?></a>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php if($activityLogs->hasMorePages()): ?>
                            <a href="<?php echo e($activityLogs->nextPageUrl()); ?>&date=<?php echo e(request('date')); ?>">&raquo;</a>
                        <?php else: ?>
                            <span>&raquo;</span>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Project-Kasir-Warung-Yamien-12-K\resources\views/activity-logs/index.blade.php ENDPATH**/ ?>