

<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <h2 class="text-danger fw-bold mb-3">Our Products</h2>
    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Laravel Starter Kit</h5>
                    <p class="card-text">$99</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">E-commerce Package</h5>
                    <p class="card-text">$199</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">CRM Dashboard</h5>
                    <p class="card-text">$299</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Ecommerce\resources\views/user/products.blade.php ENDPATH**/ ?>