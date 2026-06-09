<?php $__env->startSection('title', 'Manajemen Akun'); ?>

<?php $__env->startPush('styles'); ?>
<style>
    .am-wrap {
        width: 100%;
        min-height: 100%;
        color: var(--ink);
    }

    .am-header {
        display: flex;
        align-items: center;
        gap: 14px;
        margin-bottom: 22px;
    }

    .am-header-icon {
        width: 48px;
        height: 48px;
        display: grid;
        place-items: center;
        flex: 0 0 auto;
        border-radius: 8px;
        background: #fff7f2;
        border: 1px solid #ffd8c7;
        color: var(--brand);
        font-size: 20px;
        box-shadow: var(--shadow-sm);
    }

    .am-header h1 {
        margin: 0;
        font-size: clamp(24px, 3vw, 36px);
        font-weight: 800;
        line-height: 1.1;
    }

    .am-grid {
        display: grid;
        grid-template-columns: minmax(230px, 300px) minmax(0, 1fr);
        gap: 18px;
        align-items: start;
    }

    .am-sidebar {
        display: grid;
        gap: 14px;
    }

    .am-add-card,
    .am-info-card,
    .am-main-card {
        padding: 18px;
        border: 1px solid var(--line);
        border-radius: 8px;
        background: #fff;
        box-shadow: var(--shadow-sm);
    }

    .am-card-label {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 12px;
        color: #667085;
        font-size: 12px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0;
    }

    .am-card-label i {
        color: var(--brand);
    }

    .am-btn-add,
    .am-btn-search {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        min-height: 44px;
        padding: 0 16px;
        border: 0;
        border-radius: 8px;
        background: linear-gradient(135deg, var(--brand), #ff8a4c);
        color: #fff;
        font-weight: 800;
        text-decoration: none;
        cursor: pointer;
        box-shadow: 0 12px 24px rgba(240, 90, 40, 0.18);
    }

    .am-btn-add {
        width: 100%;
    }

    .am-stats {
        position: relative;
        overflow: hidden;
        min-height: 140px;
        display: grid;
        place-items: center;
        padding: 22px;
        border-radius: 8px;
        background: linear-gradient(135deg, var(--brand), #ff7744);
        color: #fff;
        box-shadow: 0 16px 32px rgba(240, 90, 40, 0.2);
    }

    .am-stats::after {
        content: "";
        position: absolute;
        width: 108px;
        height: 108px;
        right: -24px;
        top: -24px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.14);
    }

    .am-stats-num {
        position: relative;
        z-index: 1;
        display: block;
        font-size: 54px;
        font-weight: 900;
        line-height: 1;
        text-align: center;
    }

    .am-stats-lbl {
        position: relative;
        z-index: 1;
        display: block;
        margin-top: 8px;
        color: rgba(255, 255, 255, 0.86);
        font-weight: 800;
        text-align: center;
    }

    .am-info-card p {
        margin: 0;
        color: #667085;
        font-size: 14px;
        line-height: 1.7;
    }

    .am-info-card strong {
        color: var(--ink);
    }

    .am-main-card {
        min-width: 0;
    }

    .am-toolbar {
        display: grid;
        grid-template-columns: minmax(220px, 1fr) minmax(150px, 210px) auto;
        gap: 12px;
        margin-bottom: 18px;
    }

    .am-search-wrap {
        position: relative;
        min-width: 0;
    }

    .am-search-wrap i {
        position: absolute;
        top: 50%;
        left: 14px;
        transform: translateY(-50%);
        color: var(--brand);
        pointer-events: none;
    }

    .am-input,
    .am-select {
        width: 100%;
        min-height: 44px;
        padding: 0 14px;
        border: 1px solid var(--line);
        border-radius: 8px;
        background: #fff;
        color: var(--ink);
        font-size: 14px;
    }

    .am-input {
        padding-left: 42px;
    }

    .am-table-wrap {
        width: 100%;
        overflow: hidden;
        border: 1px solid var(--line);
        border-radius: 8px;
        background: #fff;
        box-shadow: var(--shadow-sm);
    }

    .am-table {
        width: 100%;
        table-layout: fixed;
        border-collapse: collapse;
    }

    .am-table th,
    .am-table td {
        padding: 14px 16px;
        border-bottom: 1px solid var(--line);
        text-align: left;
        vertical-align: middle;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .am-table th:nth-child(1),
    .am-table td:nth-child(1) {
        width: 64px;
    }

    .am-table th:nth-child(2),
    .am-table td:nth-child(2) {
        width: 86px;
    }

    .am-table th:nth-child(6),
    .am-table td:nth-child(6) {
        width: 112px;
    }

    .am-table th:nth-child(7),
    .am-table td:nth-child(7) {
        width: 104px;
    }

    .am-table th {
        background: #fff7f2;
        color: #a83d13;
        font-size: 12px;
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: 0;
    }

    .am-table th.tc,
    .am-table td.tc {
        text-align: center;
    }

    .am-table td {
        color: var(--ink);
        font-size: 14px;
    }

    .am-table tbody tr:last-child td {
        border-bottom: 0;
    }

    .am-cell-text {
        display: inline-block;
        max-width: 100%;
        overflow: hidden;
        text-overflow: ellipsis;
        vertical-align: middle;
    }

    .am-avatar,
    .am-avatar-placeholder {
        width: 40px;
        height: 40px;
        margin: 0 auto;
        border-radius: 50%;
    }

    .am-avatar {
        object-fit: cover;
        border: 1px solid #ffd8c7;
    }

    .am-avatar-placeholder {
        display: grid;
        place-items: center;
        background: #fff0e8;
        color: var(--brand);
        border: 1px solid #ffd8c7;
    }

    .am-uname {
        color: var(--brand);
        font-weight: 900;
    }

    .am-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 28px;
        padding: 0 12px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 900;
    }

    .am-badge-kasir {
        background: #ecfdf3;
        color: #067647;
        border: 1px solid #bbf7d0;
    }

    .am-badge-admin {
        background: #eef2ff;
        color: #1d4ed8;
        border: 1px solid #c7d2fe;
    }

    .am-actions {
        display: inline-flex;
        gap: 8px;
        justify-content: center;
    }

    .am-btn-icon {
        width: 38px;
        height: 38px;
        display: inline-grid;
        place-items: center;
        border: 1px solid var(--line);
        border-radius: 8px;
        background: #fff;
        text-decoration: none;
        cursor: pointer;
    }

    .am-btn-edit {
        color: #d97706;
    }

    .am-btn-del {
        color: #dc2626;
    }

    .am-mobile-list {
        display: none;
        gap: 12px;
    }

    .am-user-card {
        padding: 14px;
        border: 1px solid var(--line);
        border-radius: 8px;
        background: #fff;
        box-shadow: var(--shadow-sm);
    }

    .am-user-top {
        display: grid;
        grid-template-columns: 44px minmax(0, 1fr) auto;
        gap: 12px;
        align-items: center;
    }

    .am-user-main {
        min-width: 0;
    }

    .am-user-main strong,
    .am-user-main span {
        display: block;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .am-user-main span {
        margin-top: 2px;
        color: #667085;
        font-size: 13px;
        font-weight: 700;
    }

    .am-user-meta {
        display: grid;
        gap: 8px;
        margin-top: 14px;
        padding-top: 14px;
        border-top: 1px dashed #ffd8c7;
        color: #475467;
        font-size: 13px;
        font-weight: 700;
    }

    .am-user-meta div {
        display: flex;
        justify-content: space-between;
        gap: 12px;
    }

    .am-empty {
        padding: 44px 16px;
        text-align: center;
        color: #667085;
    }

    .am-empty i {
        display: block;
        margin-bottom: 10px;
        font-size: 34px;
        color: #cbd5e1;
    }

    .am-pagination {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        margin-top: 18px;
        padding-top: 16px;
        border-top: 1px dashed #ffd8c7;
    }

    .am-page-info {
        color: #667085;
        font-size: 13px;
        font-weight: 800;
    }

    .am-page-ctrl {
        display: flex;
        gap: 8px;
    }

    .am-page-btn {
        width: 40px;
        height: 40px;
        display: grid;
        place-items: center;
        border: 1px solid var(--line);
        border-radius: 8px;
        background: #fff;
        color: var(--ink);
        text-decoration: none;
    }

    .am-page-btn--disabled {
        opacity: 0.45;
        pointer-events: none;
    }

    @media (max-width: 1100px) {
        .am-grid {
            grid-template-columns: 1fr;
        }

        .am-sidebar {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }
    }

    @media (max-width: 820px) {
        .am-sidebar {
            grid-template-columns: 1fr;
        }

        .am-toolbar {
            grid-template-columns: 1fr;
        }

        .am-btn-search {
            width: 100%;
        }
    }

    @media (max-width: 640px) {
        .am-wrap {
            padding: 0;
        }

        .am-header {
            margin-bottom: 16px;
        }

        .am-header-icon {
            width: 42px;
            height: 42px;
            font-size: 18px;
        }

        .am-add-card,
        .am-info-card,
        .am-main-card {
            padding: 14px;
        }

        .am-table-wrap {
            display: none;
        }

        .am-mobile-list {
            display: grid;
        }

        .am-pagination {
            align-items: stretch;
            flex-direction: column;
        }

        .am-page-ctrl {
            justify-content: space-between;
        }
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="am-wrap">
    <div class="am-header">
        <div class="am-header-icon">
            <i class="fas fa-users-cog"></i>
        </div>
        <h1>Manajemen Akun</h1>
    </div>

    <div class="am-grid">
        <aside class="am-sidebar">
            <div class="am-add-card">
                <div class="am-card-label">
                    <i class="fas fa-plus"></i> Buat Akun
                </div>
                <a href="<?php echo e(route('users.create')); ?>" class="am-btn-add">
                    <i class="fas fa-plus-circle"></i> Tambah Akun Baru
                </a>
            </div>

            <div class="am-stats">
                <div>
                    <span class="am-stats-num"><?php echo e($users->total()); ?></span>
                    <span class="am-stats-lbl">Akun Terdaftar</span>
                </div>
            </div>

            <div class="am-info-card">
                <div class="am-card-label">
                    <i class="fas fa-info-circle"></i> Informasi
                </div>
                <p>
                    Gunakan halaman ini untuk mengelola akses pengguna sistem.
                    Pastikan peran diatur dengan benar antara <strong>Admin</strong>
                    dan <strong>Kasir</strong> untuk keamanan data.
                </p>
            </div>
        </aside>

        <main class="am-main-card">
            <form action="<?php echo e(route('users.index')); ?>" method="GET">
                <div class="am-toolbar">
                    <div class="am-search-wrap">
                        <i class="fas fa-search"></i>
                        <input
                            type="text"
                            name="search"
                            class="am-input"
                            placeholder="Cari nama atau username..."
                            value="<?php echo e(request('search')); ?>"
                        >
                    </div>
                    <div class="am-filter-wrap">
                        <select name="role" class="am-select" onchange="this.form.submit()">
                            <option value="">Semua Peran</option>
                            <option value="admin" <?php echo e(request('role') == 'admin' ? 'selected' : ''); ?>>Admin</option>
                            <option value="cashier" <?php echo e(request('role') == 'cashier' ? 'selected' : ''); ?>>Kasir</option>
                        </select>
                    </div>
                    <button type="submit" class="am-btn-search">
                        <i class="fas fa-search"></i> Cari
                    </button>
                </div>
            </form>

            <div class="am-table-wrap">
                <table class="am-table">
                    <thead>
                        <tr>
                            <th>
                                <a href="<?php echo e(request()->fullUrlWithQuery(['sort' => request('sort') == 'asc' ? 'desc' : 'asc'])); ?>">
                                    ID
                                    <?php if(request('sort') == 'asc'): ?>
                                        <i class="fas fa-caret-up"></i>
                                    <?php else: ?>
                                        <i class="fas fa-caret-down"></i>
                                    <?php endif; ?>
                                </a>
                            </th>
                            <th class="tc">Foto</th>
                            <th>Username</th>
                            <th>Nama Lengkap</th>
                            <th>Email</th>
                            <th class="tc">Peran</th>
                            <th class="tc">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td>#<?php echo e($user->id); ?></td>
                                <td class="tc">
                                    <?php if($user->photo): ?>
                                        <img src="<?php echo e(asset('storage/' . $user->photo)); ?>" class="am-avatar" alt="Foto <?php echo e($user->username); ?>">
                                    <?php else: ?>
                                        <div class="am-avatar-placeholder">
                                            <i class="fas fa-user"></i>
                                        </div>
                                    <?php endif; ?>
                                </td>
                                <td><span class="am-uname am-cell-text"><?php echo e($user->username); ?></span></td>
                                <td><span class="am-cell-text"><?php echo e($user->fullname); ?></span></td>
                                <td title="<?php echo e($user->email); ?>"><span class="am-cell-text"><?php echo e($user->email); ?></span></td>
                                <td class="tc">
                                    <span class="am-badge <?php echo e($user->role === 'admin' ? 'am-badge-admin' : 'am-badge-kasir'); ?>">
                                        <?php echo e(ucfirst($user->role)); ?>

                                    </span>
                                </td>
                                <td class="tc">
                                    <div class="am-actions">
                                        <a href="<?php echo e(route('users.edit', $user->id)); ?>" class="am-btn-icon am-btn-edit" title="Edit <?php echo e($user->username); ?>">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <form
                                            action="<?php echo e(route('users.destroy', $user->id)); ?>"
                                            method="POST"
                                            style="display:inline;"
                                            onsubmit="return confirm('Hapus akun <?php echo e($user->username); ?>?')"
                                        >
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="am-btn-icon am-btn-del" title="Hapus <?php echo e($user->username); ?>">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="7">
                                    <div class="am-empty">
                                        <i class="fas fa-folder-open"></i>
                                        <p>Tidak ada data ditemukan</p>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <div class="am-mobile-list">
                <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <article class="am-user-card">
                        <div class="am-user-top">
                            <?php if($user->photo): ?>
                                <img src="<?php echo e(asset('storage/' . $user->photo)); ?>" class="am-avatar" alt="Foto <?php echo e($user->username); ?>">
                            <?php else: ?>
                                <div class="am-avatar-placeholder">
                                    <i class="fas fa-user"></i>
                                </div>
                            <?php endif; ?>

                            <div class="am-user-main">
                                <strong class="am-uname"><?php echo e($user->username); ?></strong>
                                <span><?php echo e($user->fullname); ?></span>
                            </div>

                            <span class="am-badge <?php echo e($user->role === 'admin' ? 'am-badge-admin' : 'am-badge-kasir'); ?>">
                                <?php echo e(ucfirst($user->role)); ?>

                            </span>
                        </div>

                        <div class="am-user-meta">
                            <div>
                                <span>ID</span>
                                <strong>#<?php echo e($user->id); ?></strong>
                            </div>
                            <div>
                                <span>Email</span>
                                <strong title="<?php echo e($user->email); ?>"><?php echo e($user->email); ?></strong>
                            </div>
                            <div>
                                <span>Aksi</span>
                                <span class="am-actions">
                                    <a href="<?php echo e(route('users.edit', $user->id)); ?>" class="am-btn-icon am-btn-edit" title="Edit <?php echo e($user->username); ?>">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <form
                                        action="<?php echo e(route('users.destroy', $user->id)); ?>"
                                        method="POST"
                                        style="display:inline;"
                                        onsubmit="return confirm('Hapus akun <?php echo e($user->username); ?>?')"
                                    >
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="am-btn-icon am-btn-del" title="Hapus <?php echo e($user->username); ?>">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </span>
                            </div>
                        </div>
                    </article>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="am-empty">
                        <i class="fas fa-folder-open"></i>
                        <p>Tidak ada data ditemukan</p>
                    </div>
                <?php endif; ?>
            </div>

            <div class="am-pagination">
                <div class="am-page-info">
                    Data <?php echo e($users->firstItem() ?? 0); ?> - <?php echo e($users->lastItem() ?? 0); ?> dari <?php echo e($users->total()); ?>

                </div>
                <div class="am-page-ctrl">
                    <?php if($users->onFirstPage()): ?>
                        <span class="am-page-btn am-page-btn--disabled">
                            <i class="fas fa-chevron-left"></i>
                        </span>
                    <?php else: ?>
                        <a href="<?php echo e($users->previousPageUrl()); ?>" class="am-page-btn">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    <?php endif; ?>

                    <?php if($users->hasMorePages()): ?>
                        <a href="<?php echo e($users->nextPageUrl()); ?>" class="am-page-btn">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    <?php else: ?>
                        <span class="am-page-btn am-page-btn--disabled">
                            <i class="fas fa-chevron-right"></i>
                        </span>
                    <?php endif; ?>
                </div>
            </div>
        </main>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\VICTUS\Documents\Project-Kasir-Warung-Yamien-12-K\resources\views/users/index.blade.php ENDPATH**/ ?>