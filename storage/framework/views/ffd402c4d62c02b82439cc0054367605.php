

<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>Daftar Pekerjaan</h2>
    <a href="<?php echo e(route('pekerjaan.create')); ?>" class="btn btn-primary mb-3">Tambah Pekerjaan</a>

    <?php if($pekerjaans->isEmpty()): ?>
        <div class="alert alert-info text-center" role="alert">
            Tidak ada data
        </div>
    <?php else: ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $pekerjaans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pekerjaan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($pekerjaan->nama); ?></td>
                    <td>
                        <a href="<?php echo e(route('pekerjaan.edit', $pekerjaan)); ?>" class="btn btn-warning btn-sm">Edit</a>
                        <form action="<?php echo e(route('pekerjaan.destroy', $pekerjaan)); ?>" method="POST" style="display:inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\gotest\testlaravel\bank-dki-rekening\resources\views/pekerjaan/index.blade.php ENDPATH**/ ?>