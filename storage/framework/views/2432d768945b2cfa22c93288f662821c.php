<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank DKI - Sistem Pembukaan Rekening</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Bank DKI</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('dashboard')); ?>">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('pembukaan-rekening.index')); ?>">Pembukaan Rekening</a>
                    </li>
                    <?php if(Auth::user()->role === 'Supervisi'): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('approval.index')); ?>">Approval</a>
                    </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('unblock.index')); ?>">Unblock Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('pekerjaan.index')); ?>">Master Data Pekerjaan</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <span class="navbar-text me-3"><?php echo e(Auth::user()->name); ?></span>
                    </li>
                    <li class="nav-item">
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-inline">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="btn btn-outline-danger">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container mt-4">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH E:\gotest\testlaravel\bank-dki-rekening\resources\views/layouts/app.blade.php ENDPATH**/ ?>