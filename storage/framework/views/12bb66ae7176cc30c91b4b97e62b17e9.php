

<?php $__env->startSection('title', 'Edit Category'); ?>

<?php $__env->startSection('content'); ?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

    body {
        font-family: 'Poppins', sans-serif;
        background: #f8f9fc;
        color: #2c3e50;
    }

    /* 🌈 Form Container */
    .form-container {
        background: linear-gradient(135deg, #f8f9fa, #eef1f7);
        border-radius: 12px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
        padding: 30px;
        max-width: 650px;
        margin: 40px auto;
        animation: fadeIn 0.8s ease;
    }

    .form-container h2 {
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 1.5rem;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(15px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* 💡 Inputs */
    .form-control {
        border-radius: 8px;
        border: 1px solid #d1d3e2;
        padding: 10px 14px;
        font-size: 0.95rem;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #4e73df;
        box-shadow: 0 0 5px rgba(78, 115, 223, 0.3);
    }

    label.form-label {
        font-weight: 500;
        margin-bottom: 6px;
    }

    /* 🌟 Buttons */
    .btn-gradient-primary {
        background: linear-gradient(135deg, #4e73df, #6f42c1);
        border: none;
        color: #fff;
        font-weight: 500;
        border-radius: 8px;
        padding: 10px 20px;
        transition: all 0.3s ease;
    }

    .btn-gradient-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(78, 115, 223, 0.3);
    }

    .btn-back {
        background-color: #e9ecef;
        color: #2c3e50;
        font-weight: 500;
        border-radius: 8px;
        padding: 10px 20px;
        transition: all 0.3s ease;
    }

    .btn-back:hover {
        background-color: #d6d8db;
        transform: translateY(-2px);
    }

    /* 🚨 Error Alert */
    .alert-danger {
        border: none;
        border-radius: 10px;
        background: #ffe5e5;
        color: #b71c1c;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        animation: fadeIn 0.8s ease;
    }

    .alert-danger strong {
        font-weight: 600;
    }

    /* 📱 Responsive */
    @media (max-width: 768px) {
        .form-container {
            padding: 20px;
            margin: 20px;
        }

        button, .btn {
            width: 100%;
            margin-bottom: 10px;
        }
    }
</style>

<div class="form-container">
    <h2>✏️ Edit Category</h2>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger mb-4">
            <strong>⚠ Oops!</strong> Please fix the following errors:
            <ul class="mt-2 mb-0">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($err); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('admin.categories.update', $category->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="mb-3">
            <label class="form-label">Category Name</label>
            <input type="text" name="name" value="<?php echo e($category->name); ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="3"><?php echo e($category->description); ?></textarea>
        </div>

        <div class="d-flex gap-2 mt-4">
            <button type="submit" class="btn btn-gradient-primary">💾 Update</button>
            <a href="<?php echo e(route('admin.categories.index')); ?>" class="btn btn-back">← Back</a>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Ecommerce\resources\views/admin/categories/edit.blade.php ENDPATH**/ ?>