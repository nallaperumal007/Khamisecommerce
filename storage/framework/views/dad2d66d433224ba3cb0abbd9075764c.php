<?php $__env->startSection('title', 'Orders List'); ?>

<?php $__env->startSection('content'); ?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');
    body {
        font-family: 'Poppins', sans-serif;
        background: #f8f9fc;
        color: #2c3e50;
    }
    .table-container {
        background: linear-gradient(135deg, #f8f9fa, #eef1f7);
        border-radius: 12px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
        padding: 30px;
        animation: fadeIn 0.8s ease;
        margin: 40px auto;
    }
    h2 {
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 1.5rem;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(15px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .table {
        width: 100%;
        border-collapse: collapse;
    }
    .table th {
        background-color: #4e73df;
        color: #fff;
        padding: 12px;
        text-align: left;
        font-weight: 500;
    }
    .table td {
        padding: 12px;
        vertical-align: top;
        border-bottom: 1px solid #dee2e6;
    }
    .badge {
        background: linear-gradient(135deg, #4e73df, #6f42c1);
        color: #fff;
        border-radius: 6px;
        padding: 5px 10px;
        font-size: 0.85rem;
    }
    .order-items {
        background-color: #f8f9fc;
        border-radius: 8px;
        padding: 10px;
        font-size: 0.9rem;
    }
    .order-items li {
        list-style: none;
        border-bottom: 1px solid #e9ecef;
        padding: 6px 0;
    }
    .order-items li:last-child {
        border-bottom: none;
    }
    .text-muted {
        font-size: 0.85rem;
    }
</style>

<div class="table-container">
    <h2>🛒 Customer Orders</h2>

    <?php if($orders->isEmpty()): ?>
        <div class="alert alert-warning text-center">No orders found.</div>
    <?php else: ?>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Customer Info</th>
                        <th>Shipping Address</th>
                        <th>Items Ordered</th>
                        <th>Total (₹)</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($index + 1); ?></td>

                        <td>
                            <strong><?php echo e($order->recipient_name); ?></strong><br>
                            <span class="text-muted"><i class="bi bi-telephone"></i> <?php echo e($order->phone_number); ?></span><br>
                            <span class="text-muted"><i class="bi bi-envelope"></i> <?php echo e($order->email_address); ?></span>
                        </td>

                        <td>
                            <?php echo e($order->address_line1); ?><br>
                            <?php echo e($order->address_line2 ? $order->address_line2 . ',' : ''); ?> 
                            <?php echo e($order->city); ?>, <?php echo e($order->state); ?> - <?php echo e($order->postal_code); ?><br>
                            <span class="badge"><?php echo e($order->country); ?></span>
                        </td>

                        <td>
                            <?php $items = json_decode($order->cart_items, true); ?>
                            <ul class="order-items">
                                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <strong><?php echo e($item['name']); ?></strong><br>
                                        ₹<?php echo e(number_format($item['price'],2)); ?> × <?php echo e($item['quantity']); ?>

                                        <span class="text-muted float-end">₹<?php echo e(number_format($item['total'],2)); ?></span>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </td>

                        <td><strong>₹<?php echo e(number_format($order->total, 2)); ?></strong></td>
                        <td><?php echo e($order->created_at->format('d M Y, h:i A')); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Ecommerce\resources\views/admin/orders/index.blade.php ENDPATH**/ ?>