

<?php $__env->startSection('title', 'Categories'); ?>

<?php $__env->startSection('content'); ?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');
    body { font-family: 'Poppins', sans-serif; background-color: #f8f9fc; color: #2c3e50; }
    .page-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem; flex-wrap: wrap; }
    .btn-gradient-primary { background: linear-gradient(135deg, #4e73df, #6f42c1); border: none; border-radius: 8px; padding: 10px 18px; color: #fff; font-weight: 500; transition: all 0.3s ease; }
    .btn-gradient-primary:hover { transform: translateY(-2px); box-shadow: 0 4px 12px rgba(78,115,223,0.3); }
    .table-container { background: #fff; border-radius: 12px; box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05); overflow: hidden; animation: fadeIn 0.8s ease; }
    .img-thumb { width: 70px; height: 70px; object-fit: cover; border-radius: 10px; border: 2px solid #eee; }
</style>

<div class="container mt-4">
    <div class="page-header">
        <h2 class="mb-0">📦 Categories</h2>
        <a href="<?php echo e(route('admin.categories.create')); ?>" class="btn btn-gradient-primary">+ Add Category</a>
    </div>

    <?php if(session('success')): ?>
        <div class="alert alert-success mt-2"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <div class="table-container mt-3">
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th width="150">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($category->id); ?></td>
                            <td>
                                <?php if($category->image): ?>
                                    <img src="<?php echo e(asset('storage/' . $category->image)); ?>" class="img-thumb" alt="Image">
                                <?php else: ?>
                                    <span class="text-muted">No Image</span>
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($category->name); ?></td>
                            <td><?php echo e($category->description); ?></td>
                            <td>
                                <a href="<?php echo e(route('admin.categories.edit', $category->id)); ?>" class="btn btn-sm btn-warning me-1">Edit</a>
                                <form action="<?php echo e(route('admin.categories.destroy', $category->id)); ?>" method="POST" class="d-inline">
                                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this category?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr><td colspan="5" class="text-center text-muted">No categories found.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Ecommerce\resources\views/admin/categories/index.blade.php ENDPATH**/ ?>