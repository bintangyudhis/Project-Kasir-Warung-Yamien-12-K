<?php $__env->startSection('title', 'Edit Akun Pengguna'); ?>

<?php $__env->startSection('content'); ?>
    <div class="account-edit-wrapper">
        <div class="account-edit-card">
            <h2><i class="fa-solid fa-user-pen"></i> Edit Akun Pengguna</h2>

            <form class="account-form" action="<?php echo e(route('users.update', $user->id)); ?>" method="POST"
                enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="form-group" style="text-align: center; margin-bottom: 20px;">
                    <?php if($user->photo): ?>
                        <img src="<?php echo e(asset('storage/' . $user->photo)); ?>" alt="Foto Profil" class="current-photo-preview avatar-img">
                        <p style="font-size: 0.8rem; color: #888; margin-top: 5px;">Foto saat ini</p>
                    <?php else: ?>
                        <div class="no-photo-placeholder">
                            <i class="fa-solid fa-user"></i>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="photo">Ganti Foto Profil <small>(Opsional)</small></label>
                    <input type="file" id="photo" name="photo" accept="image/*">
                    <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <small style="color: red;"><?php echo e($message); ?></small>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="form-group">
                    <label for="fullname">Nama Lengkap (Fullname)</label>
                    <input type="text" id="fullname" name="fullname" value="<?php echo e(old('fullname', $user->fullname)); ?>"
                        required>
                    <?php $__errorArgs = ['fullname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <small style="color: red;"><?php echo e($message); ?></small>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" value="<?php echo e(old('username', $user->username)); ?>"
                        required>
                    <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <small style="color: red;"><?php echo e($message); ?></small>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="form-group">
                    <label for="email">Alamat Email</label>
                    <input type="email" id="email" name="email" value="<?php echo e(old('email', $user->email)); ?>" required>
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <small style="color: red;"><?php echo e($message); ?></small>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="form-group">
                    <label for="password">Kata Sandi Baru <small>(Kosongkan jika tidak ingin diubah)</small></label>
                    <input type="password" id="password" name="password" placeholder="********">
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <small style="color: red;"><?php echo e($message); ?></small>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="form-group">
                    <label for="role">Hak Akses (Role)</label>
                    <select id="role" name="role" required>
                        <option value="admin" <?php echo e(old('role', $user->role) == 'admin' ? 'selected' : ''); ?>>Admin</option>
                        <option value="cashier" <?php echo e(old('role', $user->role) == 'cashier' ? 'selected' : ''); ?>>Kasir
                        </option>
                        <option value="user" <?php echo e(old('role', $user->role) == 'user' ? 'selected' : ''); ?>>User</option>
                    </select>
                    <?php $__errorArgs = ['role'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <small style="color: red;"><?php echo e($message); ?></small>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan
                    </button>
                    <a href="<?php echo e(route('users.index')); ?>" class="btn btn-secondary">
                        <i class="fa-solid fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* ===== Hilangkan scrollbar di semua browser ===== */
        html,
        body {
            overflow: hidden;
            /* tidak bisa scroll */
            height: 100%;
        }

        /* Firefox */
        body {
            scrollbar-width: none;
        }


        /* Chrome, Safari, Edge */
        ::-webkit-scrollbar {
            display: none;
        }

        .avatar-img {
            width: 140px;
            height: 140px;
            border-radius: 50%;
            object-fit: cover;
            margin: 0 auto 10px;
            display: block;
            border: 2px solid #333;
        }

        /* ===== Container utama ===== */
        .account-edit-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 15px;
            background-color: #f5f6fa;
            height: 100vh;
            /* penuh satu layar */
        }

        .account-edit-card {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            padding: 40px 50px;
            width: 100%;
            max-width: 650px;
            animation: fadeIn 0.4s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .account-edit-card h2 {
            font-size: 1.5rem;
            color: #2c3e50;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 10px;
            border-bottom: 2px solid #eaeaea;
            padding-bottom: 10px;
        }

        /* ===== Form styling ===== */
        .account-form {
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        .form-group label {
            font-weight: 600;
            color: #34495e;
            margin-bottom: 6px;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px 14px;
            border: 1px solid #dcdde1;
            border-radius: 6px;
            transition: all 0.3s ease;
            font-size: 0.95rem;
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: #3498db;
            box-shadow: 0 0 4px rgba(52, 152, 219, 0.3);
            outline: none;
        }

        .form-group small {
            color: #888;
            font-size: 0.8em;
            font-weight: normal;
        }

        /* ===== Tombol aksi ===== */
        .form-actions {
            margin-top: 25px;
            display: flex;
            gap: 15px;
            justify-content: flex-end;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 10px 18px;
            border: none;
            border-radius: 6px;
            font-weight: 600;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.25s ease;
            text-decoration: none;
        }

        .btn i {
            margin-right: 8px;
        }

        .btn-primary {
            background-color: #3498db;
            color: white;
        }

        .btn-primary:hover {
            background-color: #2c80b4;
        }

        .btn-secondary {
            background-color: #bdc3c7;
            color: #2c3e50;
        }

        .btn-secondary:hover {
            background-color: #a7b1b6;
        }

        /* ===== Responsif ===== */
        @media (max-width: 600px) {
            .account-edit-card {
                padding: 25px;
            }

            .form-actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\KULIAH\Semester 6\Infromatika untuk Masyarakat\Tugas Besar\IPPL\resources\views/users/edit.blade.php ENDPATH**/ ?>