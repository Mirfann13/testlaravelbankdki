

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        <h3 class="text-center">Welcome to Bank DKI - Sistem Pembukaan Rekening</h3>
    </div>
    <div class="card-body">
        <p class="text-center">Hello, <?php echo e(Auth::user()->name); ?>. Welcome to your dashboard.</p>
        <p class="text-center">Use the navigation menu to manage account openings or approve applications.</p>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\gotest\testlaravel\bank-dki-rekening\resources\views/dashboard.blade.php ENDPATH**/ ?>