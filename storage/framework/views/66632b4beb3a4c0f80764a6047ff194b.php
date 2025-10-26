

<?php $__env->startSection('title', 'Products'); ?>

<?php $__env->startSection('content'); ?>
<h2>Products</h2>
<style>
/* --- Card Hover Animation --- */
.product-card {
    transition: all 0.4s ease;
    border: none;
    background: #fff;
    border-radius: 18px;
    overflow: hidden;
    position: relative;
}
.product-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 12px 25px rgba(0, 0, 0, 0.12);
}

/* --- Image Section --- */
.product-card img {
    transition: transform 0.5s ease;
}
.product-card:hover img {
    transform: scale(1.05);
}

/* --- Price Badge --- */
.price-badge {
    background: linear-gradient(135deg, #00b09b, #96c93d);
    font-weight: 600;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}

/* --- Gradient Button --- */
.btn-gradient {
    background: linear-gradient(135deg, #007bff, #6610f2);
    color: #fff;
    border: none;
    transition: all 0.3s ease;
}
.btn-gradient:hover {
    background: linear-gradient(135deg, #6610f2, #007bff);
    transform: translateY(-2px);
}

/* --- Category Icon + Text --- */
.category-text {
    display: flex;
    align-items: center;
    gap: 5px;
    color: #6c757d;
}
.category-text i {
    color: #ffb703;
}

/* --- Fallback Image Area --- */
.no-image {
    height: 230px;
    display: flex;
    justify-content: center;
    align-items: center;
    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
    color: #adb5bd;
    font-weight: 500;
    font-size: 15px;
    border-bottom: 1px solid #dee2e6;
}
</style>

<div class="row">
    <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="col-md-4 mb-4">
            <div class="card product-card h-100 shadow-sm">

                
                <?php if($product->image): ?>
                    <div class="position-relative">
                        <img src="<?php echo e(asset('storage/'.$product->image)); ?>" 
                             class="card-img-top" 
                             alt="<?php echo e($product->name); ?>">
                        <span class="badge price-badge position-absolute top-0 end-0 m-2 px-3 py-2 rounded-pill">
                            ₹<?php echo e(number_format($product->price, 2)); ?>

                        </span>
                    </div>
                <?php else: ?>
                    <div class="no-image">
                        <i class="bi bi-image-alt fs-4 me-2"></i> No Image
                    </div>
                <?php endif; ?>

                
                <div class="card-body d-flex flex-column p-3">
                    <h5 class="card-title fw-semibold text-dark text-truncate mb-2">
                        <?php echo e($product->name); ?>

                    </h5>

                    <p class="category-text small mb-2">
                        <i class="bi bi-tag-fill"></i>
                        <span><?php echo e($product->category->name ?? 'N/A'); ?></span>
                    </p>

                    <div class="mt-auto">
                        <form action="<?php echo e(route('cart.add')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                            <button type="submit" 
                                    class="btn btn-gradient w-100 fw-bold py-2 rounded-3">
                                <i class="bi bi-cart-fill me-2"></i>Add to Cart
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="col-12 text-center">
            <p class="text-muted mt-5">No products found.</p>
        </div>
    <?php endif; ?>
</div>


<h3>Cart</h3>
<?php if(session('cart') && count(session('cart')) > 0): ?>
<table class="table table-bordered">
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
            <?php $total = $details['price'] * $details['quantity']; $grandTotal += $total; ?>
        <tr>
            <td><?php echo e($details['name']); ?></td>
            <td>
                <form action="<?php echo e(route('cart.update')); ?>" method="POST" class="d-flex">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="product_id" value="<?php echo e($id); ?>">
                    <input type="number" name="quantity" value="<?php echo e($details['quantity']); ?>" min="1" class="form-control form-control-sm" style="width:60px;">
                    <button type="submit" class="btn btn-secondary btn-sm ms-1">Update</button>
                </form>
            </td>
            <td>₹<?php echo e(number_format($details['price'],2)); ?></td>
            <td>₹<?php echo e(number_format($total,2)); ?></td>
            <td>
                <form action="<?php echo e(route('cart.remove', $id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td colspan="3" class="text-end"><strong>Grand Total:</strong></td>
            <td colspan="2"><strong>₹<?php echo e(number_format($grandTotal,2)); ?></strong></td>
        </tr>
    </tbody>
</table>
<a href="<?php echo e(route('checkout')); ?>" class="btn btn-success">Proceed to Payment</a>
<?php else: ?>
<p>No products in cart.</p>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('account.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Ecommerce\resources\views/account/products.blade.php ENDPATH**/ ?>