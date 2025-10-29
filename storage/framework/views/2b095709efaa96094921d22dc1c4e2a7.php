

<?php $__env->startSection('title', 'Categories'); ?>

<?php $__env->startSection('content'); ?>
<style>
    /* ---- General Theme ---- */
    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #f8f9fc, #eef1f7);
    }

    .categories-container {
        animation: fadeIn 0.6s ease-in-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* ---- Header Section ---- */
    .page-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 1.5rem;
    }

    .page-header h2 {
        font-weight: 600;
        color: #1a1c2b;
    }

    .page-header p {
        color: #6c757d;
        font-size: 0.95rem;
        margin: 0;
    }

    .btn-add {
        background: linear-gradient(135deg, #4e73df, #6f42c1);
        border: none;
        color: white;
        padding: 0.6rem 1.2rem;
        border-radius: 10px;
        font-weight: 500;
        transition: all 0.3s ease;
        box-shadow: 0 3px 6px rgba(78, 115, 223, 0.2);
    }

    .btn-add:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 10px rgba(78, 115, 223, 0.3);
    }

    /* ---- Table Container ---- */
    .table-card {
        background: white;
        border-radius: 16px;
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.05);
        padding: 1.2rem;
        overflow: hidden;
    }

    .table thead th {
        background: linear-gradient(135deg, #4e73df, #6f42c1);
        color: white;
        font-weight: 500;
        border: none;
        vertical-align: middle;
    }

    .table tbody tr {
        transition: all 0.2s ease-in-out;
    }

    .table tbody tr:hover {
        background: rgba(78, 115, 223, 0.05);
        box-shadow: inset 0 0 0 9999px rgba(78, 115, 223, 0.03);
    }

    .table tbody td {
        vertical-align: middle;
        color: #444;
        border-color: #f1f3f7;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #fafbff;
    }

    /* ---- Empty State ---- */
    .empty-state {
        text-align: center;
        padding: 2rem;
        color: #6c757d;
    }

    .empty-state span {
        font-size: 2rem;
        display: block;
        margin-bottom: 0.5rem;
    }
</style>

<div class="container py-4 categories-container">

    <!-- Header Section -->
    <div class="page-header">
        <div>
            <h2>📁 Categories</h2>
           
        </div>
    
    </div>

    <!-- Table Card -->
    <div class="table-card">
        <table class="table table-striped align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($key + 1); ?></td>
                    <td><?php echo e($category->name); ?></td>
                    <td><?php echo e($category->description ?? '-'); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="3" class="empty-state">
                        <span>📂</span>
                        No categories found. Start by adding a new one!
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('account.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Ecommerce\resources\views/account/categories.blade.php ENDPATH**/ ?>