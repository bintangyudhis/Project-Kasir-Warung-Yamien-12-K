<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $__env->yieldContent('title', 'Yammien 12K - POS System'); ?></title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Inter", sans-serif;
        }

        body {
            background: #f6f7fb;
            color: #333;
        }

        .container {
            display: flex;
            height: 100vh;
        }

        /* =====================
           SIDEBAR
        ===================== */
        .sidebar {
            width: 220px;
            background: #111827;
            color: #fff;
            padding: 20px 0;
            flex-shrink: 0;
        }

        /* =====================
           MAIN CONTENT
        ===================== */
        .main-content {
            flex: 1;
            background: #fff;
            border-radius: 8px;
            padding: 30px;
            overflow-y: auto;
        }

        /* =====================
           ALERT (UPDATED)
        ===================== */
        .alert {
            padding: 15px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            
            /* Flexbox Settings */
            display: flex;
            align-items: center;
            gap: 10px;
            
            /* Fix agar rata kiri */
            justify-content: flex-start; 
            text-align: left;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
        }

        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
        }

        .alert-warning {
            background-color: #fff3cd;
            color: #856404;
        }

        .alert-info {
            background-color: #d1ecf1;
            color: #0c5460;
        }

        /* =====================
           MOBILE
        ===================== */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                display: flex;
                overflow-x: auto;
                padding: 10px 15px;
            }

            .main-content {
                border-radius: 20px 20px 0 0;
                padding: 20px;
            }
        }
    </style>

    <?php echo $__env->yieldPushContent('styles'); ?>
    <?php echo $__env->make('layouts.partials.modern-styles', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</head>
<body>
<div class="container">
    <?php echo $__env->make('components.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <main class="main-content">
        <?php if($message = Session::get('success')): ?>
            <div class="alert alert-success">
                <i class="fa-solid fa-circle-check"></i> 
                <span><?php echo e($message); ?></span>
            </div>
        <?php endif; ?>

        <?php if($message = Session::get('error')): ?>
            <div class="alert alert-error">
                <i class="fa-solid fa-circle-exclamation"></i> 
                <span><?php echo e($message); ?></span>
            </div>
        <?php endif; ?>

        <?php if($message = Session::get('warning')): ?>
            <div class="alert alert-warning">
                <i class="fa-solid fa-triangle-exclamation"></i> 
                <span><?php echo e($message); ?></span>
            </div>
        <?php endif; ?>

        <?php if($message = Session::get('info')): ?>
            <div class="alert alert-info">
                <i class="fa-solid fa-circle-info"></i> 
                <span><?php echo e($message); ?></span>
            </div>
        <?php endif; ?>

        <?php echo $__env->yieldContent('content'); ?>
    </main>
</div>

<?php echo $__env->make('layouts.partials.final-overrides', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\Users\VICTUS\Documents\Project-Kasir-Warung-Yamien-12-K\resources\views/layouts/admin.blade.php ENDPATH**/ ?>