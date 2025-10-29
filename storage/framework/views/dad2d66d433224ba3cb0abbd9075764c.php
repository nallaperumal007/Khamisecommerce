<?php $__env->startSection('title', 'Orders List'); ?>

<?php $__env->startSection('content'); ?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

    body {
        font-family: 'Poppins', sans-serif;
        background: #f8f9fc;
        color: #2c3e50;
    }

    /* 🌈 Table Container */
    .orders-container {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
        padding: 25px;
        margin-top: 40px;
        animation: fadeIn 0.8s ease;
    }

    .orders-container h2 {
        font-weight: 600;
        margin-bottom: 25px;
        color: #2c3e50;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(15px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* 📋 Table Styling */
    .table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0 8px;
    }

    thead th {
        background: linear-gradient(135deg, #4e73df, #6f42c1);
        color: #fff !important;
        font-weight: 600;
        border: none !important;
        padding: 14px;
    }

    tbody tr {
        background: #fff;
        transition: all 0.3s ease;
    }

    tbody tr:hover {
        background-color: #f1f3f7;
        transform: scale(1.01);
        border-radius: 8px;
    }

    td {
        vertical-align: middle;
        color: #2c3e50;
        padding: 12px 16px !important;
        border-top: none !important;
    }

    /* 🏷️ Status Badges */
    .badge {
        font-weight: 500;
        padding: 6px 12px;
        border-radius: 30px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
    }

    .badge:hover {
        transform: scale(1.05);
    }

    .badge.bg-warning {
        background: #fff3cd !important;
        color: #856404 !important;
    }

    .badge.bg-success {
        background: #d4edda !important;
        color: #155724 !important;
    }

    .badge.bg-danger {
        background: #f8d7da !important;
        color: #721c24 !important;
    }

    .badge.bg-secondary {
        background: #e2e3e5 !important;
        color: #383d41 !important;
    }

    /* 🔘 Buttons */
    .btn-view {
        background: linear-gradient(135deg, #4e73df, #6f42c1);
        color: #fff;
        border: none;
        border-radius: 8px;
        padding: 6px 14px;
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }

    .btn-view:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(78, 115, 223, 0.3);
    }

    /* 🔍 Search Bar */
    .search-bar {
        display: flex;
        justify-content: flex-end;
        margin-bottom: 15px;
    }

    .search-bar input {
        border-radius: 8px;
        border: 1px solid #d1d3e2;
        padding: 8px 12px;
        width: 260px;
        transition: all 0.3s ease;
    }

    .search-bar input:focus {
        border-color: #4e73df;
        box-shadow: 0 0 6px rgba(78, 115, 223, 0.3);
        outline: none;
    }

    /* 📱 Responsive */
    @media (max-width: 992px) {
        .table-responsive {
            overflow-x: auto;
        }
    }

    @media (max-width: 768px) {
        .btn-view {
            display: block;
            width: 100%;
            text-align: center;
            margin-bottom: 8px;
        }

        .search-bar {
            justify-content: center;
            margin-bottom: 20px;
        }

        .search-bar input {
            width: 100%;
        }
    }
</style>

<div class="container">
    <div class="orders-container">
        <div class="d-flex justify-content-between align-items-center flex-wrap mb-3">
            <h2>📦 Orders List</h2>
            <div class="search-bar">
                <input type="text" placeholder="🔍 Search orders..." id="orderSearch" onkeyup="filterOrders()">
            </div>
        </div>

        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
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
                <tbody id="ordersTable">
                    <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($order->id); ?></td>
                            <td><?php echo e($order->order_number); ?></td>
                            <td><?php echo e($order->customer_name); ?></td>
                            <td><?php echo e($order->customer_email); ?></td>
                            <td><?php echo e(number_format($order->total_amount, 2)); ?></td>
                            <td>
                                <?php if($order->status == 'Pending'): ?>
                                    <span class="badge bg-warning">Pending</span>
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
                                <a href="<?php echo e(route('admin.orders.show', $order->id)); ?>" class="btn btn-sm btn-view">
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
    </div>
</div>

<script>
    // 🔍 Simple client-side search filter
    function filterOrders() {
        const input = document.getElementById("orderSearch");
        const filter = input.value.toLowerCase();
        const rows = document.querySelectorAll("#ordersTable tr");

        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(filter) ? "" : "none";
        });
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Ecommerce\resources\views/admin/orders/index.blade.php ENDPATH**/ ?>