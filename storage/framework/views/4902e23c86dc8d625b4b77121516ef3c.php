

<?php $__env->startSection('content'); ?>
<div class="container py-5 text-center">
    <h2 class="fw-bold mb-4" style="color:#2c3e50; border-bottom:3px solid #6ab04c; display:inline-block;">Categories</h2>

    <div class="row justify-content-center mt-4">
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0" style="border-radius:12px; overflow:hidden;">
                    <a href="<?php echo e(route('user.category.detail', $cat->id)); ?>" style="text-decoration:none; color:inherit;">
                        <?php if($cat->image): ?>
                            <img src="<?php echo e(asset('storage/' . $cat->image)); ?>" class="card-img-top" alt="<?php echo e($cat->name); ?>" style="height:250px; object-fit:cover;">
                        <?php else: ?>
                            <img src="<?php echo e(asset('default.jpg')); ?>" class="card-img-top" alt="No Image" style="height:250px; object-fit:cover;">
                        <?php endif; ?>
                        <div class="card-body bg-light text-center">
                            <h5 class="fw-bold text-uppercase mb-0" style="color:#34495e;"><?php echo e($cat->name); ?></h5>
                        </div>
                    </a>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Ecommerce\resources\views/user/category.blade.php ENDPATH**/ ?>