

<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <h2 class="text-danger fw-bold mb-3">Gallery</h2>
    <div class="row g-3">
        <?php for($i = 1; $i <= 6; $i++): ?>
        <div class="col-md-4">
            <img src="https://picsum.photos/400?random=<?php echo e($i); ?>" class="img-fluid rounded shadow-sm" alt="Gallery Image">
        </div>
        <?php endfor; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Ecommerce\resources\views/user/gallery.blade.php ENDPATH**/ ?>