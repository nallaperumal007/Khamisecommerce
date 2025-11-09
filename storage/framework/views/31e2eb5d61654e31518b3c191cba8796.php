

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

            <!-- Product Price -->
            <div class="mb-3">
                <span class="fw-bold text-success fs-5">
                    ₹<span id="priceDisplay"><?php echo e(number_format($product->price,2)); ?></span>
                </span>
            </div>

            <!-- Quantity Control -->
            <div class="d-flex align-items-center mb-4">
                <label class="me-3 fw-semibold">Quantity:</label>
                <div class="input-group" style="width:140px;">
                    <button class="btn btn-outline-secondary" id="decreaseBtn">−</button>
                    <input type="text" id="quantity" class="form-control text-center" value="1" readonly>
                    <button class="btn btn-outline-secondary" id="increaseBtn">+</button>
                </div>
            </div>

            <!-- Add to Cart -->
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

<?php echo $__env->make('includes.cart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <!-- Cart modal include -->

<script>
document.addEventListener("DOMContentLoaded", () => {
    const increaseBtn = document.getElementById('increaseBtn');
    const decreaseBtn = document.getElementById('decreaseBtn');
    const quantityInput = document.getElementById('quantity');
    const priceDisplay = document.getElementById('priceDisplay');
    const basePrice = parseFloat("<?php echo e($product->price); ?>"); // Base price of single item

    // Update total price on screen
    function updatePrice() {
        const qty = parseInt(quantityInput.value);
        priceDisplay.textContent = (basePrice * qty).toFixed(2);
    }

    increaseBtn.addEventListener('click', () => {
        quantityInput.value = parseInt(quantityInput.value) + 1;
        updatePrice();
    });

    decreaseBtn.addEventListener('click', () => {
        let val = parseInt(quantityInput.value);
        if (val > 1) {
            quantityInput.value = val - 1;
            updatePrice();
        }
    });

    // Add to Cart logic
    document.querySelector('.addToCartBtn').addEventListener('click', () => {
        let qty = parseInt(quantityInput.value);
        let btn = document.querySelector('.addToCartBtn');
        addToCart(btn.dataset.id, btn.dataset.name, basePrice, qty);

        // Reset quantity and price
        quantityInput.value = 1;
        updatePrice();
    });
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Ecommerce\resources\views/user/product-detail.blade.php ENDPATH**/ ?>