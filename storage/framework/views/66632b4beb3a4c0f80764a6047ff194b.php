

<?php $__env->startSection('title', 'Products'); ?>

<?php $__env->startSection('content'); ?>
<style>
/* ===== Global Layout ===== */
body {
    background: linear-gradient(135deg, #f9fafc, #eef1f7);
    font-family: 'Poppins', sans-serif;
    color: #2c3e50;
}

/* ===== Section Headings ===== */
h2, h3 {
    font-weight: 600;
    margin-bottom: 25px;
    color: #2c3e50;
}

/* ===== Product Grid ===== */
.product-card {
    border: none;
    background: rgba(255, 255, 255, 0.9);
    border-radius: 18px;
    overflow: hidden;
    transition: all 0.4s ease;
    position: relative;
    box-shadow: 0 8px 25px rgba(0,0,0,0.05);
    backdrop-filter: blur(10px);
}
.product-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 12px 35px rgba(78,115,223,0.25);
}
.product-card img {
    width: 100%;
    height: 230px;
    object-fit: cover;
    transition: transform 0.5s ease;
    border-bottom: 1px solid #f1f1f1;
}
.product-card:hover img {
    transform: scale(1.05);
}

/* Price Badge */
.price-badge {
    position: absolute;
    top: 12px;
    right: 12px;
    background: linear-gradient(135deg, #00b09b, #96c93d);
    color: #fff;
    font-weight: 600;
    border-radius: 30px;
    padding: 6px 14px;
    font-size: 0.9rem;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
}

/* Category + Ratings */
.category-text {
    display: flex;
    align-items: center;
    gap: 6px;
    color: #6c757d;
    font-size: 0.9rem;
}
.category-text i {
    color: #ffb703;
}
.star-rating {
    color: #f7b731;
    font-size: 0.85rem;
}

/* Quick View Overlay */
.quick-view-overlay {
    position: absolute;
    inset: 0;
    background: rgba(0,0,0,0.4);
    backdrop-filter: blur(6px);
    opacity: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: opacity 0.3s ease;
}
.product-card:hover .quick-view-overlay {
    opacity: 1;
}
.quick-view-overlay button {
    background: rgba(255,255,255,0.9);
    border: none;
    border-radius: 30px;
    padding: 8px 20px;
    font-weight: 500;
    color: #2c3e50;
    transition: all 0.3s ease;
}
.quick-view-overlay button:hover {
    background: #4e73df;
    color: #fff;
    transform: scale(1.05);
}

/* Gradient Button */
.btn-gradient {
    background: linear-gradient(135deg, #4e73df, #6f42c1);
    color: #fff;
    border: none;
    transition: all 0.3s ease;
    border-radius: 12px;
    font-weight: 500;
}
.btn-gradient:hover {
    background: linear-gradient(135deg, #6f42c1, #4e73df);
    transform: translateY(-2px);
}

/* No Image */
.no-image {
    height: 230px;
    display: flex;
    justify-content: center;
    align-items: center;
    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
    color: #adb5bd;
    font-weight: 500;
}

/* ===== Cart Section ===== */
.cart-wrapper {
    margin-top: 60px;
    background: rgba(255, 255, 255, 0.95);
    border-radius: 20px;
    padding: 30px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
    backdrop-filter: blur(10px);
}
.cart-table {
    width: 100%;
    border-collapse: collapse;
}
.cart-table thead {
    background: linear-gradient(135deg, #eef1fb, #f8f9fc);
    font-weight: 600;
}
.cart-table th, .cart-table td {
    padding: 14px 12px;
    border-bottom: 1px solid #dee2e6;
    vertical-align: middle;
}
.cart-table tr:hover {
    background: rgba(78, 115, 223, 0.05);
    transition: background 0.3s ease;
}
.cart-table img {
    width: 45px;
    height: 45px;
    object-fit: cover;
    border-radius: 8px;
    margin-right: 10px;
}
.cart-table input[type="number"] {
    border-radius: 8px;
    border: 1px solid #ced4da;
    padding: 4px 6px;
    text-align: center;
    width: 70px;
}
.btn-sm {
    border-radius: 8px;
    font-weight: 500;
}
.total-row td {
    background: linear-gradient(135deg, #f8f9fc, #eef1fb);
    font-size: 1.1rem;
    font-weight: 600;
}
.grand-total {
    color: #4e73df;
    font-weight: 700;
    font-size: 1.25rem;
}

/* Checkout Button */
.btn-checkout {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: linear-gradient(135deg, #4e73df, #6f42c1);
    color: #fff;
    padding: 12px 28px;
    border-radius: 40px;
    font-weight: 500;
    transition: all 0.3s ease;
    border: none;
}
.btn-checkout:hover {
    transform: translateY(-2px);
    background: linear-gradient(135deg, #6f42c1, #4e73df);
}

/* Empty States */
.empty-cart {
    text-align: center;
    padding: 80px 20px;
    background: rgba(255, 255, 255, 0.8);
    border-radius: 18px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.05);
    margin-top: 30px;
}
.empty-cart .icon {
    font-size: 3rem;
    margin-bottom: 10px;
    background: linear-gradient(135deg, #4e73df, #6f42c1);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}
.empty-cart p {
    color: #6c757d;
    font-size: 1rem;
}

/* Floating Cart Summary (desktop) */
.cart-summary {
    width: 220px;
    z-index: 10;
}
.cart-summary h6 {
    font-size: 0.95rem;
    color: #2c3e50;
}

/* Sticky Checkout Bar (mobile) */
.checkout-bar {
    border-top: 1px solid #dee2e6;
}
@media (max-width: 991px) {
    .cart-summary { display: none; }
}
</style>

<!-- ===== Products Section ===== -->
<h2>🛍️ Products</h2>
<div class="row">
    <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
            <div class="card product-card h-100">

                
                <?php if($product->image): ?>
                    <div class="position-relative">
                        <img src="<?php echo e(asset('storage/'.$product->image)); ?>" class="card-img-top" alt="<?php echo e($product->name); ?>">
                        <span class="price-badge">₹<?php echo e(number_format($product->price, 2)); ?></span>
                        <div class="quick-view-overlay">
                            <button type="button"><i class="bi bi-eye me-1"></i>Quick View</button>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="no-image">
                        <i class="bi bi-image-alt fs-4 me-2"></i>No Image
                    </div>
                <?php endif; ?>

                
                <div class="card-body d-flex flex-column p-3">
                    <h5 class="card-title fw-semibold text-truncate mb-2"><?php echo e($product->name); ?></h5>
                    <p class="star-rating mb-2">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-half"></i>
                        <i class="bi bi-star"></i>
                    </p>
                    <p class="category-text mb-3"><i class="bi bi-tag-fill"></i><?php echo e($product->category->name ?? 'N/A'); ?></p>

                    <div class="mt-auto">
                        <form action="<?php echo e(route('cart.add')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                            <button type="submit" class="btn btn-gradient w-100 py-2">
                                <i class="bi bi-cart-fill me-2"></i>Add to Cart
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="col-12 text-center">
            <div class="empty-cart">
                <div class="icon">📭</div>
                <h5>No products found</h5>
                <p>Check back later or explore new categories.</p>
            </div>
        </div>
    <?php endif; ?>
</div>

<!-- ===== Cart Section ===== -->
<div class="cart-wrapper mt-5">
    <h3>🧺 Your Cart</h3>

    <?php if(session('cart') && count(session('cart')) > 0): ?>
        <table class="cart-table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $grandTotal = 0; ?>
                <?php $__currentLoopData = session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php 
                        $total = $details['price'] * $details['quantity'];
                        $grandTotal += $total;
                    ?>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <?php if(isset($details['image'])): ?>
                                    <img src="<?php echo e(asset('storage/'.$details['image'])); ?>" alt="<?php echo e($details['name']); ?>">
                                <?php else: ?>
                                    <img src="https://via.placeholder.com/45" alt="Product">
                                <?php endif; ?>
                                <span><?php echo e($details['name']); ?></span>
                            </div>
                        </td>
                        <td>
                            <form action="<?php echo e(route('cart.update')); ?>" method="POST" class="d-flex align-items-center">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="product_id" value="<?php echo e($id); ?>">
                                <input type="number" name="quantity" value="<?php echo e($details['quantity']); ?>" min="1">
                                <button type="submit" class="btn btn-sm btn-outline-secondary ms-2">Update</button>
                            </form>
                        </td>
                        <td>₹<?php echo e(number_format($details['price'], 2)); ?></td>
                        <td>₹<?php echo e(number_format($total, 2)); ?></td>
                        <td>
                            <form action="<?php echo e(route('cart.remove', $id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-sm btn-outline-danger">Remove</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr class="total-row">
                    <td colspan="3" class="text-end">Grand Total:</td>
                    <td colspan="2" class="grand-total">₹<?php echo e(number_format($grandTotal, 2)); ?></td>
                </tr>
            </tbody>
        </table>

        <div class="text-end mt-4">
            <a href="<?php echo e(route('checkout')); ?>" class="btn-checkout">
                Proceed to Payment <i class="bi bi-arrow-right-circle"></i>
            </a>
        </div>
    <?php else: ?>
        <div class="empty-cart">
            <div class="icon">🛒</div>
            <h5>Your cart is empty</h5>
            <p>Add some products to get started!</p>
        </div>
    <?php endif; ?>
</div>

<!-- Floating Cart Summary (Desktop) -->
<?php if(session('cart') && count(session('cart')) > 0): ?>
<div class="cart-summary position-fixed end-0 top-50 translate-middle-y me-4 d-none d-lg-block p-3 shadow-lg rounded-4 bg-white">
    <h6 class="fw-semibold mb-2">🛒 Cart Summary</h6>
    <p class="mb-1 text-muted">Items: <?php echo e(count(session('cart'))); ?></p>
    <p class="fw-bold text-primary">Total: ₹<?php echo e(number_format($grandTotal, 2)); ?></p>
    <a href="<?php echo e(route('checkout')); ?>" class="btn btn-gradient btn-sm w-100">Checkout</a>
</div>

<!-- Sticky Checkout Bar (Mobile) -->
<div class="checkout-bar fixed-bottom bg-white shadow-lg p-3 d-lg-none">
    <div class="d-flex justify-content-between align-items-center">
        <strong>Total: ₹<?php echo e(number_format($grandTotal, 2)); ?></strong>
        <a href="<?php echo e(route('checkout')); ?>" class="btn btn-gradient btn-sm rounded-pill px-4">
            Checkout <i class="bi bi-arrow-right-circle ms-1"></i>
        </a>
    </div>
</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('account.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Ecommerce\resources\views/account/products.blade.php ENDPATH**/ ?>