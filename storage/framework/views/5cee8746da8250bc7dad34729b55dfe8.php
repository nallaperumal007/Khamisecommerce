

<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <div class="row align-items-center">
        <!-- Left Side: Content -->
        <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
            <h2 class="fw-bold mb-3"><?php echo e($category->name); ?></h2>
            <p style="font-size:1.1rem; line-height:1.6;">
                <?php echo e($category->description ?? 'No description available.'); ?>

            </p>
            <a href="<?php echo e(route('user.category')); ?>" class="btn btn-success mt-3">Back to Categories</a>
        </div>

        <!-- Right Side: Image -->
        <div class="col-lg-6 col-md-6 text-center">
            <?php if($category->image): ?>
                <img src="<?php echo e(asset('storage/' . $category->image)); ?>" 
                     alt="<?php echo e($category->name); ?>" 
                     class="img-fluid rounded shadow" 
                     style="max-height:400px; object-fit:cover; width:100%;">
            <?php else: ?>
                <div class="bg-light d-flex justify-content-center align-items-center rounded" 
                     style="height:400px;">
                    <span class="text-muted">No Image Available</span>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Ecommerce\resources\views/user/category-detail.blade.php ENDPATH**/ ?>