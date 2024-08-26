

<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>Daftar User Terblokir</h2>

    <?php if($blockedUsers->isEmpty()): ?>
        <div class="alert alert-info text-center" role="alert">
            Tidak ada data
        </div>
    <?php else: ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $blockedUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($user->name); ?></td>
                    <td><?php echo e($user->email); ?></td>
                    <td>
                        <form action="<?php echo e(route('unblock.user', $user->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PATCH'); ?>
                            <button type="submit" class="btn btn-sm btn-primary">Buka Blokir</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\gotest\testlaravel\bank-dki-rekening\resources\views/unblock/index.blade.php ENDPATH**/ ?>