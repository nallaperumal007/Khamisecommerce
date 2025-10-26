<?php $__env->startSection('title', 'Orders List'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <h2 class="mb-4">Orders List</h2>

    <table class="table table-bordered table-striped align-middle">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Order Number</th>
                <th>Customer</th>
                <th>Email</th>
                <th>Total Amount (₹)</th>
                <th>Status</th>
                <th>Created At</th>
                <th width="120">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($order->id); ?></td>
                    <td><?php echo e($order->order_number); ?></td>
                    <td><?php echo e($order->customer_name); ?></td>
                    <td><?php echo e($order->customer_email); ?></td>
                    <td><?php echo e(number_format($order->total_amount, 2)); ?></td>
                    <td>
                        <?php if($order->status == 'Pending'): ?>
                            <span class="badge bg-warning text-dark">Pending</span>
                        <?php elseif($order->status == 'Completed'): ?>
                            <span class="badge bg-success">Completed</span>
                        <?php elseif($order->status == 'Cancelled'): ?>
                            <span class="badge bg-danger">Cancelled</span>
                        <?php else: ?>
                            <span class="badge bg-secondary"><?php echo e($order->status); ?></span>
                        <?php endif; ?>
                    </td>
                    <td><?php echo e($order->created_at->format('d M Y h:i A')); ?></td>
                    <td>
                        <a href="<?php echo e(route('admin.orders.show', $order->id)); ?>" class="btn btn-sm btn-primary">
                            View
                        </a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="8" class="text-center text-muted py-4">No orders found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Ecommerce\resources\views/admin/orders/index.blade.php ENDPATH**/ ?>