<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Akun</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        /* 1. Global Reset & Scrollbar Killer */
        * {
            box-sizing: border-box;
            outline: none;
            
            /* Matikan scrollbar di Firefox untuk SEMUA elemen */
            scrollbar-width: none !important; 
            
            /* Matikan scrollbar di IE/Edge untuk SEMUA elemen */
            -ms-overflow-style: none !important; 
        }

        /* Matikan scrollbar di Chrome/Safari/Opera untuk SEMUA elemen */
        *::-webkit-scrollbar {
            display: none !important;
            width: 0 !important;
            height: 0 !important;
        }

        html, body {
            overflow-x: hidden; /* Mencegah scroll samping pada window utama */
            width: 100%;
            height: 100%;
        }

        :root {
            /* Palette */
            --primary: #ff6633;
            --primary-dark: #e64a19;
            --primary-light: #fff0e6; 
            --secondary: #64748b;
            --success: #28a745;
            --warning: #f59e0b;
            --danger: #ef4444;
            --bg-light: #fff9f7; 
            --bg-white: #ffffff;
            --text-dark: #1e293b;
            --text-light: #64748b;
            --border: #ffccbb;
            --radius: 20px;
            --radius-sm: 12px;
            --shadow: 0 4px 20px rgba(255, 102, 51, 0.06);
            --shadow-hover: 0 10px 25px rgba(255, 102, 51, 0.12);
            --font-header: 'Poppins', sans-serif;
            --font-body: 'Inter', sans-serif;
        }

        body {
            font-family: var(--font-body);
            background-color: var(--bg-light);
            background-image: radial-gradient(#ffccbb 0.8px, transparent 0.8px);
            background-size: 24px 24px;
            color: var(--text-dark);
            margin: 0;
            padding: 0;
        }

        /* 2. Layout Container */
        .admin-container {
            margin-left: 250px; 
            width: calc(100% - 250px); 
            min-height: 100vh;
            padding: 30px 40px; 
            display: flex;
            flex-direction: column;
            transition: all 0.3s ease;
        }

        /* Responsive Tablet & Mobile */
        @media (max-width: 1024px) {
            .admin-container {
                margin-left: 0;
                width: 100%;
                padding: 20px; /* Padding lebih kecil di mobile */
            }
        }

        /* 3. Header */
        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 35px;
        }

        .page-title {
            font-family: var(--font-header);
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--text-dark);
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .page-title i {
            color: var(--primary);
            background: #fff;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 14px;
            box-shadow: var(--shadow);
            font-size: 1.4rem;
        }

        /* 4. Grid Layout Responsive */
        .content-grid {
            display: grid;
            grid-template-columns: 320px 1fr; 
            gap: 30px;
            align-items: start;
        }

        @media (max-width: 900px) {
            .content-grid {
                grid-template-columns: 1fr; /* Stack satu kolom di layar kecil */
            }
            
            /* Order: Form pencarian/tabel di atas widget info (opsional, jika mau) */
            /* .right-section { order: -1; } */
        }

        /* 5. Cards & Sections */
        .card {
            background: var(--bg-white);
            border-radius: var(--radius);
            padding: 25px;
            box-shadow: var(--shadow);
            border: 1px solid rgba(255, 204, 187, 0.3);
            margin-bottom: 25px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .card:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-hover);
            border-color: var(--primary);
        }

        /* Widget Title Center Fix */
        .widget-title {
            font-family: var(--font-header);
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 20px;
            display: flex;
            align-items: center; 
            justify-content: center; /* Center Horizontal */
            gap: 10px;
            color: var(--text-dark);
            line-height: 1; 
        }
        
        .widget-title i { 
            color: var(--primary); 
            display: flex; 
            align-items: center;
        }

        .widget-title.left-align {
            justify-content: flex-start; 
        }

        .btn-add-wrapper {
            background: linear-gradient(135deg, #fff 0%, #fff5f0 100%);
            padding: 20px;
            border-radius: var(--radius);
            text-align: center;
            border: 1px solid var(--border);
        }

        .btn-add {
            background: linear-gradient(135deg, #ff8c66 0%, #ff6633 100%);
            color: white;
            width: 100%;
            padding: 14px;
            border-radius: var(--radius-sm);
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            box-shadow: 0 4px 15px rgba(255, 102, 51, 0.3);
            transition: 0.3s;
        }
        .btn-add:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(255, 102, 51, 0.4);
            color: white;
        }

        .stats-box {
            background: linear-gradient(135deg, #ff6633 0%, #e64a19 100%);
            color: white;
            padding: 25px;
            border-radius: var(--radius);
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            box-shadow: 0 10px 20px rgba(255, 102, 51, 0.25);
        }
        
        .stats-box::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.2) 0%, transparent 60%);
        }

        .stats-count { font-size: 3rem; font-weight: 700; font-family: var(--font-header); position: relative; z-index: 1; }
        .stats-label { font-size: 1rem; opacity: 0.9; font-weight: 500; position: relative; z-index: 1; }

        .info-card p { font-size: 0.9rem; line-height: 1.6; color: var(--text-light); }

        /* 6. Toolbar & Form */
        .toolbar {
            display: flex;
            gap: 15px;
            margin-bottom: 25px;
            flex-wrap: wrap;
        }

        .search-container {
            flex: 2;
            min-width: 200px;
            position: relative;
        }

        .search-container i {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary);
            font-size: 1rem;
        }

        .form-control {
            width: 100%;
            padding: 14px 14px 14px 48px;
            border: 1px solid #e2e8f0;
            border-radius: var(--radius-sm);
            background: #f8fafc;
            font-size: 0.95rem;
            color: var(--text-dark);
            transition: 0.3s;
        }

        .form-control:focus {
            border-color: var(--primary);
            background: #fff;
            box-shadow: 0 0 0 4px rgba(255, 102, 51, 0.1);
        }

        .filter-container { flex: 1; min-width: 150px; }
        .filter-select {
            width: 100%;
            padding: 14px 18px;
            border: 1px solid #e2e8f0;
            border-radius: var(--radius-sm);
            background: #f8fafc;
            font-size: 0.95rem;
            cursor: pointer;
        }
        .filter-select:focus { border-color: var(--primary); }

        /* Table Design */
        .table-responsive {
            width: 100%;
            overflow-x: auto;
            border-radius: var(--radius-sm);
            /* Scrollbar table juga di-hide visualnya, tapi tetap bisa digeser */
            scrollbar-width: none; 
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 700px; 
        }

        thead {
            background: var(--primary-light);
        }

        th {
            text-align: left;
            padding: 18px 20px;
            font-weight: 600;
            color: var(--primary-dark);
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 2px solid var(--border);
            white-space: nowrap;
        }
        
        th a { text-decoration: none; color: inherit; display: flex; align-items: center; gap: 6px; }

        td {
            padding: 16px 20px;
            vertical-align: middle;
            border-bottom: 1px solid #f1f5f9;
            color: var(--text-dark);
            font-size: 0.95rem;
        }

        tbody tr:last-child td { border-bottom: none; }
        tbody tr:hover { background-color: #fff9f5; }

        /* Avatar */
        .avatar-wrap { display: flex; justify-content: center; }
        .avatar-img {
            width: 48px; height: 48px; border-radius: 50%;
            object-fit: cover; border: 2px solid #fff;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        .avatar-placeholder {
            width: 48px; height: 48px; border-radius: 50%;
            background: linear-gradient(135deg, #fff0e6, #ffccbb);
            color: var(--primary); display: flex; align-items: center; justify-content: center;
            font-size: 20px; border: 1px solid var(--border);
        }

        /* Role Badge */
        .role-badge {
            display: inline-block;
            padding: 6px 14px;
            border-radius: 30px;
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            background: #fff5f0;
            color: #ff6633;
            border: 1px solid #ffccbb;
        }

        /* Action Buttons */
        .actions { display: flex; gap: 8px; justify-content: center; }
        .btn-icon {
            width: 38px; height: 38px; border-radius: 10px;
            border: none; display: flex; align-items: center; justify-content: center;
            cursor: pointer; transition: 0.2s; font-size: 1rem;
        }
        .btn-edit { background: #fff8e1; color: #f59e0b; }
        .btn-edit:hover { background: #ffecb3; transform: scale(1.05); }
        
        .btn-delete { background: #fee2e2; color: #ef4444; }
        .btn-delete:hover { background: #fecaca; transform: scale(1.05); }

        /* Pagination */
        .pagination {
            display: flex; justify-content: space-between; align-items: center;
            margin-top: 25px; flex-wrap: wrap; gap: 15px; padding-top: 15px;
            border-top: 1px dashed var(--border);
        }
        .page-info { font-size: 0.9rem; color: var(--text-light); }
        .page-ctrl { display: flex; gap: 8px; }
        .page-btn {
            width: 36px; height: 36px; display: flex; align-items: center; justify-content: center;
            border-radius: 8px; border: 1px solid #e2e8f0; background: #fff;
            color: var(--text-dark); text-decoration: none; transition: 0.2s;
        }
        .page-btn:hover:not(.disabled) { border-color: var(--primary); color: var(--primary); }
        .page-btn.disabled { opacity: 0.5; cursor: default; background: #f8fafc; }
    </style>
</head>

<body>
    
    <?php $__env->startSection('title', 'Manajemen Akun'); ?>

    <?php $__env->startSection('content'); ?>
        <div class="admin-container">
            <div class="page-header">
                <div class="page-title">
                    <i class="fas fa-users-cog"></i>
                    <span>Manajemen Akun</span>
                </div>
            </div>

            <div class="content-grid">
                
                <div class="left-section">
                    <div class="card btn-add-wrapper">
                        <div class="widget-title">
                            <i class="fas fa-plus"></i> Buat Akun
                        </div>
                        <a href="<?php echo e(route('users.create')); ?>" class="btn-add">
                            <i class="fas fa-plus-circle"></i> Tambah Akun Baru
                        </a>
                    </div>

                    <div class="stats-box">
                        <div class="stats-count"><?php echo e($users->total()); ?></div>
                        <div class="stats-label">Akun Terdaftar</div>
                    </div>

                    <div class="card info-card">
                        <div class="widget-title left-align">
                            <i class="fas fa-info-circle"></i> Informasi
                        </div>
                        <p>
                            Gunakan halaman ini untuk mengelola akses pengguna sistem. Pastikan peran (Role) diatur dengan benar antara <strong>Admin</strong> dan <strong>Kasir</strong> untuk keamanan data.
                        </p>
                    </div>
                </div>

                <div class="right-section">
                    <div class="card" style="min-height: 500px;">
                        
                        <form action="<?php echo e(route('users.index')); ?>" method="GET">
                            <div class="toolbar">
                                <div class="search-container">
                                    <i class="fas fa-search"></i>
                                    <input type="text" name="search" class="form-control"
                                        placeholder="Cari berdasarkan nama atau username..." value="<?php echo e(request('search')); ?>">
                                </div>
                                <div class="filter-container">
                                    <select name="role" class="filter-select" onchange="this.form.submit()">
                                        <option value="">Semua Peran</option>
                                        <option value="admin" <?php echo e(request('role') == 'admin' ? 'selected' : ''); ?>>Admin</option>
                                        <option value="cashier" <?php echo e(request('role') == 'cashier' ? 'selected' : ''); ?>>Kasir</option>
                                    </select>
                                </div>
                            </div>
                        </form>

                        <div class="table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>
                                            <a href="<?php echo e(request()->fullUrlWithQuery(['sort' => request('sort') == 'asc' ? 'desc' : 'asc'])); ?>">
                                                ID <?php if(request('sort') == 'asc'): ?> <i class="fas fa-caret-up"></i> <?php else: ?> <i class="fas fa-caret-down"></i> <?php endif; ?>
                                            </a>
                                        </th>
                                        <th style="text-align: center;">Foto</th>
                                        <th>Username</th>
                                        <th>Nama Lengkap</th>
                                        <th>Email</th>
                                        <th style="text-align: center;">Peran</th>
                                        <th style="text-align: center;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td>#<?php echo e($user->id); ?></td>
                                            <td align="center">
                                                <div class="avatar-wrap">
                                                    <?php if($user->photo): ?>
                                                        <img src="<?php echo e(asset('storage/' . $user->photo)); ?>" class="avatar-img" alt="Foto">
                                                    <?php else: ?>
                                                        <div class="avatar-placeholder"><i class="fas fa-user"></i></div>
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                            <td><span style="font-weight: 600; color: var(--primary);"><?php echo e($user->username); ?></span></td>
                                            <td><?php echo e($user->fullname); ?></td>
                                            <td><?php echo e($user->email); ?></td>
                                            <td align="center"><span class="role-badge"><?php echo e(ucfirst($user->role)); ?></span></td>
                                            <td align="center">
                                                <div class="actions">
                                                    <a href="<?php echo e(route('users.edit', $user->id)); ?>" class="btn-icon btn-edit" title="Edit">
                                                        <i class="fas fa-pen"></i>
                                                    </a>
                                                    <form action="<?php echo e(route('users.destroy', $user->id)); ?>" method="POST" style="display:inline;" onsubmit="return confirm('Hapus akun <?php echo e($user->username); ?>?');">
                                                        <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                                        <button type="submit" class="btn-icon btn-delete" title="Hapus">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="7" style="text-align:center; padding: 60px 20px;">
                                                <i class="fas fa-folder-open" style="font-size: 3rem; color: #cbd5e1; margin-bottom: 15px;"></i>
                                                <p style="color: var(--text-light); margin: 0;">Tidak ada data ditemukan</p>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="pagination">
                            <div class="page-info">
                                Data <?php echo e($users->firstItem() ?? 0); ?> - <?php echo e($users->lastItem() ?? 0); ?> dari <?php echo e($users->total()); ?>

                            </div>
                            <div class="page-ctrl">
                                <?php if($users->onFirstPage()): ?>
                                    <span class="page-btn disabled"><i class="fas fa-chevron-left"></i></span>
                                <?php else: ?>
                                    <a href="<?php echo e($users->previousPageUrl()); ?>" class="page-btn"><i class="fas fa-chevron-left"></i></a>
                                <?php endif; ?>

                                <?php if($users->hasMorePages()): ?>
                                    <a href="<?php echo e($users->nextPageUrl()); ?>" class="page-btn"><i class="fas fa-chevron-right"></i></a>
                                <?php else: ?>
                                    <span class="page-btn disabled"><i class="fas fa-chevron-right"></i></span>
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
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\kuliah\semester-5\ippl\metimev4\resources\views/users/index.blade.php ENDPATH**/ ?>