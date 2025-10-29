

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <h2>Edit Product</h2>
    <a href="<?php echo e(route('admin.products.index')); ?>" class="btn btn-secondary mb-3">Back</a>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <strong>Error!</strong> Please fix the following:<br>
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('admin.products.update', $product->id)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>

        <div class="mb-3">
            <label class="form-label">Product Name</label>
            <input type="text" name="name" value="<?php echo e(old('name', $product->name)); ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Select Category</label>
            <select name="category_id" class="form-control">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($cat->id); ?>" <?php echo e($cat->id == $product->category_id ? 'selected' : ''); ?>>
                        <?php echo e($cat->name); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Price (₹)</label>
            <input type="number" name="price" value="<?php echo e(old('price', $product->price)); ?>" class="form-control" step="0.01" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Product Image</label>
            <?php if($product->image): ?>
                <div class="mb-2">
                    <img src="<?php echo e(asset('storage/'.$product->image)); ?>" width="100" height="100" style="object-fit:cover">
                </div>
            <?php endif; ?>
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Ecommerce\resources\views/admin/products/edit.blade.php ENDPATH**/ ?>