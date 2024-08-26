

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="card">
            <div class="card-header">Daftar Pengajuan Pembukaan Rekening Menunggu Approval</div>
            <div class="card-body">
                <?php if(session('success')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session('success')); ?>

                    </div>
                <?php endif; ?>
                <?php if($rekenings->isEmpty()): ?>
                    <p>Tidak ada pengajuan menunggu approval.</p>
                <?php else: ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $rekenings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rekening): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($rekening->nama); ?></td>
                                    <td><?php echo e($rekening->tempat_lahir); ?></td>
                                    <td><?php echo e(\Carbon\Carbon::parse($rekening->tanggal_lahir)->format('Y-m-d')); ?></td>
                                    <td><?php echo e($rekening->jenis_kelamin); ?></td>
                                    <td>
                                        <form method="POST" action="<?php echo e(route('approval.approve', $rekening)); ?>" style="display:inline;">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('PUT'); ?>
                                            <button type="submit" class="btn btn-success btn-sm">Setujui</button>
                                        </form>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\gotest\testlaravel\bank-dki-rekening\resources\views/approval/index.blade.php ENDPATH**/ ?>