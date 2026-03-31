<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Akun</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        :root {
            --primary: #3b82f6;
            --primary-dark: #2563eb;
            --primary-light: #dbeafe;
            --secondary: #64748b;
            --secondary-dark: #475569;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --bg-light: #f8fafc;
            --bg-white: #ffffff;
            --text-dark: #1e293b;
            --text-light: #64748b;
            --border: #e2e8f0;
            --radius: 12px;
            --radius-sm: 8px;
            --shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 25px rgba(0, 0, 0, 0.08);
            --font: 'Inter', 'Segoe UI', sans-serif;
        }

        /* ===== Base ===== */
        body {
            font-family: var(--font);
            background-color: var(--bg-light);
            color: var(--text-dark);
            margin: 0;
            padding: 0;
        }

        /* ===== Main Container ===== */
        .admin-container {
            margin-left: 220px;
            padding: 30px 20px;
            min-height: 100vh;
            transition: margin-left 0.3s ease;

            display: flex;
            flex-direction: column;
        }

        .page-header,
        .content-grid,
        .alert {
            width: 100%;
            max-width: 100%;
        }

        .page-header {
            justify-content: space-between;
        }

        @media (max-width: 1024px) {
            .admin-container {
                margin-left: 0;
                padding: 20px;
            }
        }

        /* ===== Page Header ===== */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 1px solid var(--border);
        }

        .page-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--text-dark);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .page-title i {
            color: var(--primary);
        }

        /* ===== Main Content Grid ===== */
        .content-grid {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 30px;
        }

        @media (max-width: 900px) {
            .content-grid {
                grid-template-columns: 1fr;
            }
        }

        /* ===== Card ===== */
        .card {
            background: var(--bg-white);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            padding: 25px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }

        /* ===== Left Section ===== */
        .left-section {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .section-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-title i {
            color: var(--primary);
        }

        .btn-group {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .btn {
            border: none;
            border-radius: var(--radius-sm);
            padding: 12px 18px;
            font-weight: 600;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: all 0.3s ease;
            text-decoration: none;
            font-size: 0.95rem;
        }

        .btn i {
            font-size: 1rem;
        }

        .btn-add {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: #fff;
        }

        .btn-add:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
        }

        .stats-card {
            background: var(--primary-light);
            border-left: 4px solid var(--primary);
        }

        .stats-value {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary-dark);
        }

        .stats-label {
            font-size: 0.9rem;
            color: var(--text-light);
        }

        /* ===== Right Section ===== */
        .right-section {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .toolbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;

            margin-bottom: 25px;
        }

        .search-wrapper {
            position: relative;
            width: 100%;
            max-width: 300px;
        }

        .search-wrapper i {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-light);
        }

        .search-input {
            width: 100%;
            padding: 10px 14px 10px 40px;
            border-radius: var(--radius-sm);
            border: 1px solid var(--border);
            background: var(--bg-white);
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .search-input:focus {
            border-color: var(--primary);
            outline: none;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .filter-group {
            display: flex;
            gap: 10px;
        }

        .filter-select {
            padding: 10px 14px;
            border-radius: var(--radius-sm);
            border: 1px solid var(--border);
            background: var(--bg-white);
            font-size: 0.95rem;
            cursor: pointer;
        }

        /* ===== Table ===== */
        .table-container {
            overflow-x: auto;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: var(--bg-white);
        }

        thead {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: #fff;
        }

        th {
            padding: 16px 18px;
            text-align: left;
            font-weight: 600;
            font-size: 0.9rem;
        }

        td {
            padding: 14px 18px;
            text-align: left;
            border-bottom: 1px solid var(--border);
            font-size: 0.9rem;
        }

        tbody tr {
            transition: background-color 0.2s ease;
        }

        tbody tr:hover {
            background-color: #f1f5ff;
        }

        .status-badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .status-active {
            background-color: rgba(16, 185, 129, 0.1);
            color: var(--success);
        }

        .status-inactive {
            background-color: rgba(239, 68, 68, 0.1);
            color: var(--danger);
        }

        .action-buttons {
            display: flex;
            gap: 8px;
            align-items: center;
            justify-content: center
        }

        .action-buttons form {
            margin: 0;
            display: flex;
        }

        .btn-action {
            padding: 0;
            width: 32px;
            height: 32px;
            border-radius: var(--radius-sm);
            border: none;
            background: transparent;
            cursor: pointer;
            transition: all 0.2s ease;

            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn-edit-action {
            color: var(--warning);
        }

        .btn-edit-action:hover {
            background-color: rgba(245, 158, 11, 0.1);
        }

        .btn-delete-action {
            color: var(--danger);
        }

        .btn-delete-action:hover {
            background-color: rgba(239, 68, 68, 0.1);
        }

        /* ===== Profile Picture ===== */
        .avatar-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--primary-light);
            display: block;
        }

        .avatar-placeholder {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--primary-light);
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }


        /* ===== Pagination ===== */
        .pagination {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
            padding: 15px 0;
        }

        .pagination-info {
            font-size: 0.9rem;
            color: var(--text-light);
        }

        .pagination-controls {
            display: flex;
            gap: 8px;
        }

        .pagination-btn {
            padding: 8px 12px;
            border-radius: var(--radius-sm);
            border: 1px solid var(--border);
            background: var(--bg-white);
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .pagination-btn:hover {
            background: var(--primary-light);
            border-color: var(--primary);
        }

        .pagination-btn.active {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
        }
    </style>
</head>

<body>
    
    <?php $__env->startSection('title', 'Manajemen Akun'); ?>

    <?php $__env->startSection('content'); ?>
        <div class="admin-container">
            <div class="page-header">
                <h1 class="page-title"><i class="fas fa-users-cog"></i>Manajemen Akun Pengguna</h1>
            </div>

            <?php if(session('success')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('success')); ?>

                    <button onclick="this.parentElement.style.display='none'"
                        style="background:none; border:none; cursor:pointer; font-size:1.2rem;">&times;</button>
                </div>
            <?php endif; ?>
            <?php if(session('error')): ?>
                <div class="alert alert-danger">
                    <?php echo e(session('error')); ?>

                    <button onclick="this.parentElement.style.display='none'"
                        style="background:none; border:none; cursor:pointer; font-size:1.2rem;">&times;</button>
                </div>
            <?php endif; ?>

            <div class="content-grid">
                <div class="left-section">
                    <div class="card">
                        <h2 class="section-title"><i class="fas fa-tachometer-alt"></i>Dashboard</h2>
                        <div class="btn-group">
                            <a href="<?php echo e(route('users.create')); ?>" class="btn btn-add">
                                <i class="fas fa-user-plus"></i> Tambah Akun
                            </a>
                        </div>
                    </div>

                    <div class="card stats-card">
                        <div class="stats-value"><?php echo e($users->total()); ?></div>
                        <div class="stats-label">Total Akun</div>
                    </div>

                    <div class="card">
                        <h2 class="section-title"><i class="fas fa-info-circle"></i>Informasi</h2>
                        <p style="font-size: 0.9rem; color: var(--text-light); line-height: 1.5;">
                            Halaman ini memungkinkan Anda untuk mengelola semua akun pengguna dalam sistem.
                            Anda dapat menambah, mengedit, atau menghapus akun sesuai kebutuhan.
                        </p>
                    </div>
                </div>

                <div class="right-section">
                    <div class="card">
                        <form action="<?php echo e(route('users.index')); ?>" method="GET">
                            <div class="toolbar">
                                <div class="search-wrapper">
                                    <i class="fas fa-search"></i>
                                    <input type="text" name="search" class="search-input"
                                        placeholder="Cari nama akun, username, email..." value="<?php echo e(request('search')); ?>">
                                </div>
                                <div class="filter-group">
                                    <select name="role" class="filter-select" onchange="this.form.submit()">
                                        <option value="">Semua Peran</option>
                                        <option value="admin" <?php echo e(request('role') == 'admin' ? 'selected' : ''); ?>>Admin
                                        </option>
                                        <option value="cashier" <?php echo e(request('role') == 'cashier' ? 'selected' : ''); ?>>Kasir
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </form>


                        <div class="table-container">
                            <table>
                                <thead>
                                    <tr>
                                        <th>
                                            <a href="<?php echo e(request()->fullUrlWithQuery(['sort' => request('sort') == 'asc' ? 'desc' : 'asc'])); ?>"
                                                style="text-decoration: none; color: inherit; display: flex; align-items: center; gap: 5px;">
                                                ID Akun
                                                <?php if(request('sort') == 'asc'): ?>
                                                    <i class="fa-solid fa-sort-up"></i>
                                                <?php else: ?>
                                                    <i class="fa-solid fa-sort-down"></i>
                                                <?php endif; ?>
                                            </a>
                                        </th>
                                        <th>Foto</th>
                                        <th>Nama Pengguna</th>
                                        <th>Nama Lengkap</th>
                                        <th>Email</th>
                                        <th>Peran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td>#<?php echo e($user->id); ?></td>
                                            <td>
                                                <div class="user-profile">
                                                    <?php if($user->photo): ?>
                                                        <img src="<?php echo e(asset('storage/' . $user->photo)); ?>" alt="Foto"
                                                            class="avatar-img">
                                                    <?php else: ?>
                                                        <div class="avatar-placeholder">
                                                            <i class="fas fa-user"></i>
                                                        </div>
                                                    <?php endif; ?>
                                            </td>
                                            <td>
                                                <div class="user-info">
                                                    <span class="user-username"><?php echo e($user->username); ?></span>
                                                </div>

                                            </td>
                                            <td>
                                                <div class="user-infor">
                                                    <span class="user-fullname"><?php echo e($user->fullname); ?></span>
                                                </div>
                                            </td>
                                            <td><?php echo e($user->email); ?></td>
                                            <td><span
                                                    style="background: #eee; padding: 4px 8px; border-radius: 4px; font-size: 0.85rem; font-weight: 600;">
                                                    <?php echo e(ucfirst($user->role)); ?>

                                                </span>
                                            </td>
                                            <td>
                                                <div class="action-buttons">
                                                    <a href="<?php echo e(route('users.edit', $user->id)); ?>"
                                                        class="btn-action btn-edit" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>

                                                    <form action="<?php echo e(route('users.destroy', $user->id)); ?>" method="POST"
                                                        style="display:inline;"
                                                        onsubmit="return confirm('Yakin ingin menghapus akun <?php echo e($user->username); ?>?');">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <button type="submit" class="btn-action btn-delete-action"
                                                            title="Hapus">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="6"
                                                style="text-align:center; padding: 20px; color: var(--text-light);">
                                                Tidak ada data pengguna ditemukan.
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="pagination">
                            <div class="pagination-info">
                                Menampilkan <?php echo e($users->firstItem() ?? 0); ?>-<?php echo e($users->lastItem() ?? 0); ?> dari
                                <?php echo e($users->total()); ?> akun
                            </div>
                            <div class="pagination-controls">
                                <?php if($users->onFirstPage()): ?>
                                    <button class="pagination-btn" disabled style="opacity: 0.5;">
                                        <i class="fas fa-chevron-left"></i>
                                    </button>
                                <?php else: ?>
                                    <a href="<?php echo e($users->previousPageUrl()); ?>" class="pagination-btn">
                                        <i class="fas fa-chevron-left"></i>
                                    </a>
                                <?php endif; ?>

                                <?php if($users->hasMorePages()): ?>
                                    <a href="<?php echo e($users->nextPageUrl()); ?>" class="pagination-btn">
                                        <i class="fas fa-chevron-right"></i>
                                    </a>
                                <?php else: ?>
                                    <button class="pagination-btn" disabled style="opacity: 0.5;">
                                        <i class="fas fa-chevron-right"></i>
                                    </button>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php $__env->stopSection(); ?>
</body>

</html>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\KULIAH\Semester 6\Infromatika untuk Masyarakat\Tugas Besar\IPPL\resources\views/users/index.blade.php ENDPATH**/ ?>