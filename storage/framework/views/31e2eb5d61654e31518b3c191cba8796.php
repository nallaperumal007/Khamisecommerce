

<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <div class="row align-items-center">
        <div class="col-lg-6 col-md-6 text-center mb-4 mb-md-0">
            <?php if($product->image): ?>
                <img src="<?php echo e(asset('storage/' . $product->image)); ?>" class="img-fluid rounded shadow" style="max-height:420px; object-fit:cover; width:100%;">
            <?php else: ?>
                <div class="bg-light d-flex justify-content-center align-items-center rounded" style="height:400px;">
                    <span class="text-muted">No Image Available</span>
                </div>
            <?php endif; ?>
        </div>

        <div class="col-lg-6 col-md-6">
            <h2 class="fw-bold mb-3"><?php echo e($product->name); ?></h2>
            <p class="text-muted mb-3"><?php echo e($product->description ?? 'No description available.'); ?></p>
            <div class="mb-3">
                <span class="fw-bold text-success">₹<?php echo e(number_format($product->price,2)); ?></span>
            </div>
            <div class="d-flex align-items-center mb-4">
                <label class="me-3 fw-semibold">Quantity:</label>
                <div class="input-group" style="width:140px;">
                    <button class="btn btn-outline-secondary" id="decreaseBtn">−</button>
                    <input type="text" id="quantity" class="form-control text-center" value="1" readonly>
                    <button class="btn btn-outline-secondary" id="increaseBtn">+</button>
                </div>
            </div>
            <button class="btn btn-success addToCartBtn" 
                    data-id="<?php echo e($product->id); ?>" 
                    data-name="<?php echo e($product->name); ?>" 
                    data-price="<?php echo e($product->price); ?>">
                <i class="bi bi-cart-plus me-2"></i> Add to Cart
            </button>
            <div class="mt-4">
                <a href="<?php echo e(route('products')); ?>" class="btn btn-outline-secondary">← Back to Products</a>
            </div>
        </div>
    </div>
</div>

<?php echo $__env->make('includes.cart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <!-- Include cart -->
<script>
document.getElementById('increaseBtn').addEventListener('click', ()=>{
    document.getElementById('quantity').value = parseInt(document.getElementById('quantity').value)+1;
});
document.getElementById('decreaseBtn').addEventListener('click', ()=>{
    let val = parseInt(document.getElementById('quantity').value);
    if(val>1) document.getElementById('quantity').value = val-1;
});
document.querySelector('.addToCartBtn').addEventListener('click',()=>{
    let qty = parseInt(document.getElementById('quantity').value);
    let btn = document.querySelector('.addToCartBtn');
    addToCart(btn.dataset.id, btn.dataset.name, parseFloat(btn.dataset.price), qty);
    document.getElementById('quantity').value = 1;
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Ecommerce\resources\views/user/product-detail.blade.php ENDPATH**/ ?>