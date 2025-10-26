<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<h2>Welcome to your Dashboard</h2>
<p>Here you can manage your orders, products, and view categories.</p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('account.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Ecommerce\resources\views/account/dashboard.blade.php ENDPATH**/ ?>