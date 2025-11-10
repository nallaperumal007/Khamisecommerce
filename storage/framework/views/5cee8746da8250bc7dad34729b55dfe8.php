

<?php $__env->startSection('content'); ?>
<div class="container py-5">

    
    <div class="row align-items-center mb-5">
        <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
            <h2 class="fw-bold mb-3"><?php echo e($category->name); ?></h2>
            <p style="font-size:1.1rem; line-height:1.6;">
                <?php echo e($category->description ?? 'No description available.'); ?>

            </p>
            <a href="<?php echo e(route('user.category')); ?>" class="btn btn-success mt-3">Back to Categories</a>
        </div>

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

    
    <h3 class="fw-bold mb-4 text-center">Products in <?php echo e($category->name); ?></h3>

    <?php if($products->count() > 0): ?>
        <div class="row">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="<?php echo e(asset('storage/' . $product->image)); ?>" 
                             alt="<?php echo e($product->name); ?>" 
                             class="card-img-top" 
                             style="height: 220px; object-fit: cover;">

                        <div class="card-body">
                            <h5 class="card-title fw-semibold"><?php echo e($product->name); ?></h5>
                            <p class="text-muted mb-1">₹<?php echo e(number_format($product->price, 2)); ?></p>
                            <a href="<?php echo e(route('user.product.detail', $product->id)); ?>" class="btn btn-outline-success btn-sm mt-2">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php else: ?>
        <p class="text-center text-muted">No products available in this category.</p>
    <?php endif; ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Ecommerce\resources\views/user/category-detail.blade.php ENDPATH**/ ?>