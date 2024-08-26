

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="card">
            <div class="card-header">Detail Pengajuan Pembukaan Rekening</div>
            <div class="card-body">
                <div class="mb-3">
                    <strong>Nama:</strong>
                    <p><?php echo e($pembukaanRekening->nama); ?></p>
                </div>

                <div class="mb-3">
                    <strong>Tempat Lahir:</strong>
                    <p><?php echo e($pembukaanRekening->tempat_lahir); ?></p>
                </div>

                <div class="mb-3">
                    <strong>Tanggal Lahir:</strong>
                    <p> 
                        <?php if($pembukaanRekening->tanggal_lahir): ?>
                            <?php echo e(\Carbon\Carbon::parse($pembukaanRekening->tanggal_lahir)->format('d-m-Y')); ?>

                        <?php else: ?>
                            -
                        <?php endif; ?>
                    </p>
                </div>

                <div class="mb-3">
                    <strong>Jenis Kelamin:</strong>
                    <p><?php echo e($pembukaanRekening->jenis_kelamin); ?></p>
                </div>

                <div class="mb-3">
                    <strong>Pekerjaan:</strong>
                    <p><?php echo e($pembukaanRekening->pekerjaan->nama); ?></p>
                </div>

                <div class="mb-3">
                    <strong>Provinsi:</strong>
                    <p><?php echo e($pembukaanRekening->provinsi->nama); ?></p>
                </div>

                <div class="mb-3">
                    <strong>Kabupaten:</strong>
                    <p><?php echo e($pembukaanRekening->kabupaten->nama); ?></p>
                </div>

                <div class="mb-3">
                    <strong>Kecamatan:</strong>
                    <p><?php echo e($pembukaanRekening->kecamatan->nama); ?></p>
                </div>

                <div class="mb-3">
                    <strong>Kelurahan:</strong>
                    <p><?php echo e($pembukaanRekening->kelurahan->nama); ?></p>
                </div>

                <div class="mb-3">
                    <strong>Alamat:</strong>
                    <p><?php echo e($pembukaanRekening->alamat); ?></p>
                </div>

                <div class="mb-3">
                    <strong>RT:</strong>
                    <p><?php echo e($pembukaanRekening->rt); ?></p>
                </div>

                <div class="mb-3">
                    <strong>RW:</strong>
                    <p><?php echo e($pembukaanRekening->rw); ?></p>
                </div>

                <div class="mb-3">
                    <strong>Nominal Setor:</strong>
                    <p><?php echo e(number_format($pembukaanRekening->nominal_setor, 0, ',', '.')); ?></p>
                </div>

                <a href="<?php echo e(route('pembukaan-rekening.index')); ?>" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\gotest\testlaravel\bank-dki-rekening\resources\views/pembukaan-rekening/show.blade.php ENDPATH**/ ?>