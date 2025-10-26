

<?php $__env->startSection('title', 'Checkout'); ?>

<?php $__env->startSection('content'); ?>
<h2>Checkout</h2>
<?php if(session('cart') && count(session('cart')) > 0): ?>
<ul>
    <?php $grandTotal = 0; ?>
    <?php $__currentLoopData = session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php $total = $details['price'] * $details['quantity']; $grandTotal += $total; ?>
        <li><?php echo e($details['name']); ?> - <?php echo e($details['quantity']); ?> x ₹<?php echo e($details['price']); ?> = ₹<?php echo e($total); ?></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<h3>Total: ₹<?php echo e(number_format($grandTotal,2)); ?></h3>
<a href="#" class="btn btn-success">Pay Now</a>
<?php else: ?>
<p>No products in cart.</p>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('account.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Ecommerce\resources\views/account/checkout.blade.php ENDPATH**/ ?>