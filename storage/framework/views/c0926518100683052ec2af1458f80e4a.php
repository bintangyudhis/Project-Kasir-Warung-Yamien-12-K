

<?php $__env->startSection('title', 'Profil Saya'); ?>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        /* Menggunakan style yang sama dengan form edit/add agar konsisten */
        .profile-container {
            max-width: 620px;
            margin: 50px auto;
            background: #fff;
            border-radius: 18px;
            padding: 35px 45px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            animation: fadeIn 0.4s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Header (Foto, Nama, Role) */
        .profile-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .profile-photo {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #f0f2f5;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 15px;
        }

        .profile-placeholder {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background-color: #f0f2f5;
            color: #a0aec0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 60px;
            border: 4px solid #f0f2f5;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 15px;
        }

        .profile-fullname {
            font-size: 1.6rem;
            font-weight: 700;
            color: #1e293b;
            margin: 0;
        }

        .profile-username {
            font-size: 1rem;
            color: #64748b;
            margin-top: 2px;
        }

        .profile-role {
            display: inline-block;
            background-color: #fdf8f0; /* Biru muda (sesuai tema) */
            color: #ff6633; /* Biru tua */
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-top: 10px;
            text-transform: capitalize;
        }

        /* Detail Info (Email, dll) */
        .profile-details {
            border-top: 1px solid #e2e8f0;
            margin-top: 25px;
        }

        .detail-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 18px 5px;
            border-bottom: 1px solid #e2e8f0;
        }

        .detail-item:last-child {
            border-bottom: none;
        }

        .detail-label {
            font-weight: 600;
            color: #334155;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .detail-label i {
            width: 16px;
            text-align: center;
            color: #ff6633;
        }

        .detail-value {
            color: #1e293b;
            font-weight: 500;
        }

        /* Tombol Aksi */
        .profile-actions {
            display: flex;
            justify-content: flex-end; /* Hanya tombol Edit di kanan */
            align-items: center;
            margin-top: 30px;
            gap: 10px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px 20px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.95rem;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: all 0.25s ease-in-out;
        }
        
        /* Menggunakan style tombol yang sama dari add.blade.php */
        .btn-save-edit {
            background: linear-gradient(135deg, #ff6633, #f9774b);
            color: #fff;
            box-shadow: 0 4px 14px rgba(99, 102, 241, 0.25);
        }
        .btn-save-edit:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(99, 102, 241, 0.35);
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="profile-container">
        
        <div class="profile-header">
            <?php if(Auth::user()->photo): ?>
                <img src="<?php echo e(asset('storage/' . Auth::user()->photo)); ?>" alt="Foto Profil" class="profile-photo">
            <?php else: ?>
                <div class="profile-placeholder">
                    <i class="fas fa-user"></i>
                </div>
            <?php endif; ?>

            <h1 class="profile-fullname"><?php echo e(Auth::user()->fullname); ?></h1>
            <p class="profile-username"><?php echo e('@' . Auth::user()->username); ?></p>
        <span class="profile-role"><?php echo e(Auth::user()->role); ?></span>
        </div>

        <div class="profile-details">
            <div class="detail-item">
                <span class="detail-label"><i class="fas fa-envelope"></i> Email</span>
                <span class="detail-value"><?php echo e(Auth::user()->email); ?></span>
            </div>
            
            <div class="detail-item">
                <span class="detail-label"><i class="fas fa-user-tag"></i> Nama Lengkap</span>
                <span class="detail-value"><?php echo e(Auth::user()->fullname); ?></span>
            </div>

            </div>

        <div class="profile-actions">
            <a href="<?php echo e(route('cashier.edit', ['user' => Auth::id()])); ?>" class="btn btn-save-edit">
                <i class="fas fa-pen"></i> Edit Profil
            </a>
        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\kuliah\semester-5\ippl\metimev4\resources\views/users/profile.blade.php ENDPATH**/ ?>