

<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <h2 class="text-danger fw-bold mb-4 text-center">Our Products</h2>
    <div class="row g-4">
        <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="col-md-3 col-sm-6">
                <div class="card shadow-sm border-0 h-100 position-relative">
                    <?php if(isset($product->discount) && $product->discount > 0): ?>
                        <div class="position-absolute top-0 start-0 bg-danger text-white px-2 py-1 small fw-bold" style="border-bottom-right-radius: 8px;">
                            <?php echo e($product->discount); ?>% OFF
                        </div>
                    <?php endif; ?>
                    <img src="<?php echo e($product->image ? asset('storage/'.$product->image) : asset('default.jpg')); ?>" 
                         class="card-img-top" style="height:220px; object-fit:cover;">
                    <div class="card-body text-center">
                        <h5 class="text-success fw-semibold mb-2"><?php echo e($product->name); ?></h5>
                        <div class="d-flex justify-content-center align-items-center mb-2">
                            <span class="fw-bold text-success">₹<?php echo e(number_format($product->price,2)); ?></span>
                        </div>
                        <div class="d-flex justify-content-between mt-3">
                            <button class="btn btn-warning fw-semibold addToCartBtn me-2"
                                    data-id="<?php echo e($product->id); ?>" data-name="<?php echo e($product->name); ?>" data-price="<?php echo e($product->price); ?>">
                                <i class="bi bi-cart-plus me-1"></i> Add
                            </button>
                            <a href="<?php echo e(route('user.product.detail', $product->id)); ?>" class="btn btn-success w-100">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-12 text-center text-muted py-4">No products found</div>
        <?php endif; ?>
    </div>
</div>

<?php echo $__env->make('includes.cart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <!-- Include cart -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Ecommerce\resources\views/user/products.blade.php ENDPATH**/ ?>