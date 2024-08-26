

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row mb-3">
            <div class="col-md-12">
                <a href="<?php echo e(route('pembukaan-rekening.create')); ?>" class="btn btn-primary">Tambah Pengajuan</a>
            </div>
        </div>
        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>
        <div class="card">
            <div class="card-header">Daftar Pengajuan Pembukaan Rekening</div>
            <div class="card-body">
                <?php if($rekenings->isEmpty()): ?>
                    <p>Tidak ada data untuk ditampilkan.</p>
                <?php else: ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $rekenings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rekening): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($rekening->nama); ?></td>
                                    <td><?php echo e($rekening->tempat_lahir); ?></td>
                                    <td>
                                        <?php if($rekening->tanggal_lahir): ?>
                                            <?php echo e(\Carbon\Carbon::parse($rekening->tanggal_lahir)->format('Y-m-d')); ?>

                                        <?php else: ?>
                                            -
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($rekening->jenis_kelamin); ?></td>
                                    <td><?php echo e($rekening->status); ?></td>
                                    <td>
                                        <a href="<?php echo e(route('pembukaan-rekening.show', $rekening)); ?>" class="btn btn-info btn-sm">Detail</a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\gotest\testlaravel\bank-dki-rekening\resources\views/pembukaan-rekening/index.blade.php ENDPATH**/ ?>