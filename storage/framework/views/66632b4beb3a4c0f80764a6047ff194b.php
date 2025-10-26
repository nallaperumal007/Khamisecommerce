

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
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tr><td colspan="4" class="text-center">No products found.</td></tr>
        <?php endif; ?>
    </tbody>
</table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('account.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Ecommerce\resources\views/account/products.blade.php ENDPATH**/ ?>