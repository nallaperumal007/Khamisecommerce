

<?php $__env->startSection('title', 'Products'); ?>

<?php $__env->startSection('content'); ?>
<h2>Products</h2>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Image</th>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <tr>
            <td><?php echo e($key + 1); ?></td>
            <td>
                <?php if($product->image): ?>
                    <img src="<?php echo e(asset('storage/'.$product->image)); ?>" width="60" height="60" style="object-fit:cover">
                <?php else: ?>
                    <span>No Image</span>
                <?php endif; ?>
            </td>
            <td><?php echo e($product->name); ?></td>
            <td><?php echo e($product->category->name ?? 'N/A'); ?></td>
            <td>₹<?php echo e(number_format($product->price,2)); ?></td>
            <td>
                <form action="<?php echo e(route('cart.add')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                    <button type="submit" class="btn btn-primary btn-sm">Add to Cart</button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tr><td colspan="6" class="text-center">No products found.</td></tr>
        <?php endif; ?>
    </tbody>
</table>

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