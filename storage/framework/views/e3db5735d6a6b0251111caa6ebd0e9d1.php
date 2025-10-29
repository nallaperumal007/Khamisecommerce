

<?php $__env->startSection('title', 'Checkout'); ?>

<?php $__env->startSection('content'); ?>
<style>
    /* === General Theme === */
    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #f5f7fa, #ffffff);
        color: #333;
    }

    .checkout-container {
        max-width: 700px;
        margin: 3rem auto;
        background: rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        padding: 2.5rem;
        animation: fadeIn 0.6s ease-in-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* === Header === */
    .checkout-header {
        text-align: center;
        margin-bottom: 2rem;
    }

    .checkout-header h2 {
        font-weight: 600;
        color: #1a1c2b;
    }

    .checkout-header p {
        color: #6c757d;
        font-size: 0.95rem;
    }

    /* === Product List === */
    .product-list {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .product-item {
        background: #ffffff;
        border-radius: 12px;
        padding: 1rem 1.2rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        display: flex;
        justify-content: space-between;
        align-items: center;
        transition: all 0.25s ease;
    }

    .product-item:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 16px rgba(78, 115, 223, 0.15);
    }

    .product-details {
        font-weight: 500;
        color: #222;
    }

    .product-price {
        text-align: right;
        font-weight: 600;
        color: #4e73df;
    }

    /* === Divider === */
    .divider {
        border-top: 2px solid #f1f3f6;
        margin: 1.5rem 0;
    }

    /* === Total Section === */
    .total-box {
        text-align: right;
        background: linear-gradient(135deg, #4e73df, #6f42c1);
        color: #fff;
        padding: 1rem 1.5rem;
        border-radius: 12px;
        font-size: 1.2rem;
        font-weight: 600;
        box-shadow: 0 4px 10px rgba(78, 115, 223, 0.3);
    }

    /* === Pay Now Button === */
    .btn-pay {
        display: inline-block;
        background: linear-gradient(135deg, #4e73df, #6f42c1);
        color: #fff;
        border: none;
        border-radius: 12px;
        padding: 0.8rem 2rem;
        font-size: 1rem;
        font-weight: 500;
        margin-top: 1.8rem;
        text-align: center;
        transition: all 0.3s ease;
        text-decoration: none;
        box-shadow: 0 6px 16px rgba(78, 115, 223, 0.3);
    }

    .btn-pay:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(78, 115, 223, 0.4);
    }

    /* === Empty Cart === */
    .empty-cart {
        text-align: center;
        padding: 3rem 1rem;
    }

    .empty-cart span {
        font-size: 3rem;
        display: block;
        margin-bottom: 1rem;
    }

    .btn-continue {
        background: linear-gradient(135deg, #4e73df, #6f42c1);
        color: #fff;
        border-radius: 12px;
        padding: 0.7rem 1.4rem;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(78, 115, 223, 0.25);
    }

    .btn-continue:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 18px rgba(111, 66, 193, 0.35);
    }
</style>

<div class="checkout-container">
    <div class="checkout-header">
        <h2>💳 Checkout</h2>
        <p>Review your cart items and confirm payment.</p>
    </div>

    <?php if(session('cart') && count(session('cart')) > 0): ?>
        <?php $grandTotal = 0; ?>
        <div class="product-list">
            <?php $__currentLoopData = session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $total = $details['price'] * $details['quantity']; $grandTotal += $total; ?>
                <div class="product-item">
                    <div class="product-details">
                        <?php echo e($details['name']); ?><br>
                        <small>Qty: <?php echo e($details['quantity']); ?> × ₹<?php echo e(number_format($details['price'], 2)); ?></small>
                    </div>
                    <div class="product-price">₹<?php echo e(number_format($total, 2)); ?></div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="divider"></div>

        <div class="total-box">
            Grand Total: ₹<?php echo e(number_format($grandTotal, 2)); ?>

        </div>

        <div class="text-center">
            <a href="#" class="btn-pay mt-4">Pay Now</a>
        </div>
    <?php else: ?>
        <div class="empty-cart">
            <span>🛒</span>
            <p>Your cart is empty.</p>
            <a href="#" class="btn-continue">Continue Shopping</a>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('account.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Ecommerce\resources\views/account/checkout.blade.php ENDPATH**/ ?>