

<?php $__env->startSection('content'); ?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f8f9fc;
    }

    h2 {
        font-weight: 600;
        color: #333;
    }

    /* Add Product Button */
    .btn-primary {
        background: linear-gradient(135deg, #4e73df, #6f42c1);
        border: none;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(78, 115, 223, 0.3);
        transition: all 0.3s ease;
        font-weight: 500;
    }
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(78, 115, 223, 0.4);
    }

    /* Success Alert */
    .alert {
        border-radius: 10px;
        font-weight: 500;
        box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    }

    /* Table Styling */
    .table-container {
        background: #fff;
        border-radius: 12px;
        padding: 1.5rem;
        box-shadow: 0 8px 25px rgba(0,0,0,0.05);
        overflow-x: auto;
    }

    .table {
        border-collapse: separate;
        border-spacing: 0 0.5rem;
        width: 100%;
    }

    .table thead {
        background: linear-gradient(135deg, #4e73df, #6f42c1);
        color: #fff;
        border-radius: 10px;
    }

    .table thead th {
        font-weight: 600;
        padding: 1rem;
        border: none;
        white-space: nowrap;
    }

    .table tbody tr {
        background: #fff;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(0,0,0,0.03);
    }

    .table tbody tr:nth-child(even) {
        background-color: #f8f9fc;
    }

    .table tbody tr:hover {
        transform: scale(1.01);
        background-color: #eef1fb;
        box-shadow: 0 6px 15px rgba(0,0,0,0.05);
    }

    .table td, .table th {
        vertical-align: middle;
        text-align: center;
        padding: 0.9rem;
        border: none;
    }

    /* Product Image */
    img {
        border-radius: 10px;
        object-fit: cover;
        width: 60px;
        height: 60px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
    }
    img:hover {
        transform: scale(1.05);
    }

    /* Buttons */
    .btn-warning {
        background-color: #f6c23e;
        color: #fff;
        border: none;
        border-radius: 6px;
        transition: all 0.3s ease;
        font-weight: 500;
    }
    .btn-warning:hover {
        background-color: #dda20a;
        transform: translateY(-2px);
    }

    .btn-danger {
        background-color: #e74a3b;
        border: none;
        border-radius: 6px;
        transition: all 0.3s ease;
        font-weight: 500;
    }
    .btn-danger:hover {
        background-color: #c82333;
        transform: translateY(-2px);
    }

    /* Responsive Scroll */
    @media (max-width: 768px) {
        .table-container {
            padding: 1rem;
        }
        .table thead {
            font-size: 0.9rem;
        }
        .table td {
            font-size: 0.9rem;
        }
    }
</style>

<div class="container mt-4">
    <h2 class="mb-3">Products List</h2>

    <a href="<?php echo e(route('admin.products.create')); ?>" class="btn btn-primary mb-3">+ Add New Product</a>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <div class="table-container">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price (₹)</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($key+1); ?></td>
                    <td>
                        <?php if($product->image): ?>
                            <img src="<?php echo e(asset('storage/'.$product->image)); ?>" alt="Product">
                        <?php else: ?>
                            <span class="text-muted">No Image</span>
                        <?php endif; ?>
                    </td>
                    <td><strong><?php echo e($product->name); ?></strong></td>
                    <td><span class="badge bg-light text-dark px-3 py-2" style="border-radius:8px;"><?php echo e($product->category->name ?? 'N/A'); ?></span></td>
                    <td><span class="badge bg-primary-subtle text-primary px-3 py-2" style="border-radius:8px;">₹<?php echo e(number_format($product->price, 2)); ?></span></td>
                    <td>
                        <a href="<?php echo e(route('admin.products.edit', $product->id)); ?>" class="btn btn-sm btn-warning">Edit</a>
                        <form action="<?php echo e(route('admin.products.destroy', $product->id)); ?>" method="POST" class="d-inline">
                            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this product?')">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr><td colspan="6" class="text-center text-muted py-4">No products found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Ecommerce\resources\views/admin/products/index.blade.php ENDPATH**/ ?>