

<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <div class="row align-items-center">
        <!-- Left Side: Product Image -->
        <div class="col-lg-6 col-md-6 text-center mb-4 mb-md-0">
            <?php if($product->image): ?>
                <img src="<?php echo e(asset('storage/' . $product->image)); ?>" 
                     alt="<?php echo e($product->name); ?>" 
                     class="img-fluid rounded shadow" 
                     style="max-height:420px; object-fit:cover; width:100%;">
            <?php else: ?>
                <div class="bg-light d-flex justify-content-center align-items-center rounded" 
                     style="height:400px;">
                    <span class="text-muted">No Image Available</span>
                </div>
            <?php endif; ?>
        </div>

        <!-- Right Side: Product Info -->
        <div class="col-lg-6 col-md-6">
            <h2 class="fw-bold mb-3" style="color:#2c3e50;"><?php echo e($product->name); ?></h2>

            <p class="text-muted mb-3" style="font-size:1.1rem; line-height:1.6;">
                <?php echo e($product->description ?? 'No description available.'); ?>

            </p>

            <div class="mb-3">
                <?php if(isset($product->old_price)): ?>
                    <span class="text-muted text-decoration-line-through me-2" style="font-size:1.1rem;">
                        ₹<?php echo e(number_format($product->old_price, 2)); ?>

                    </span>
                <?php else: ?>
                    <span class="text-muted text-decoration-line-through me-2" style="font-size:1.1rem;">
                        ₹<?php echo e(number_format($product->price + 10, 2)); ?>

                    </span>
                <?php endif; ?>

                <span class="fw-bold text-success" style="font-size:1.4rem;">
                    ₹<?php echo e(number_format($product->price, 2)); ?>

                </span>
            </div>

            <?php if(isset($product->discount) && $product->discount > 0): ?>
                <div class="mb-3">
                    <span class="badge bg-danger fs-6"><?php echo e($product->discount); ?>% OFF</span>
                </div>
            <?php endif; ?>

            <div class="mb-4">
                <span class="badge bg-light text-dark border px-3 py-2">
                    Category: <?php echo e($product->category->name ?? 'Uncategorized'); ?>

                </span>
            </div>

            <button class="btn btn-success fw-semibold px-4 py-2" style="border-radius: 25px;">
                <i class="bi bi-cart-plus me-2"></i> Add to Cart
            </button>

            <div class="mt-4">
                <a href="<?php echo e(route('products')); ?>" class="btn btn-outline-secondary">
                    ← Back to Products
                </a>
            </div>
        </div>
    </div>
</div>

<style>
    .btn-success {
        background-color: #4b752a;
        border: none;
    }
    .btn-success:hover {
        background-color: #3d6023;
    }
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Ecommerce\resources\views/user/product-detail.blade.php ENDPATH**/ ?>