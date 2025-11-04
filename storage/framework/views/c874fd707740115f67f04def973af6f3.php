

<?php $__env->startSection('content'); ?>
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></button>
    </div>

    
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="<?php echo e(asset('storage/1.jpeg')); ?>" class="d-block w-100" alt="Slide 1" style="height: 100vh; object-fit: cover;">
        </div>
        <div class="carousel-item">
            <img src="<?php echo e(asset('storage/2.jpg')); ?>" class="d-block w-100" alt="Slide 2" style="height: 100vh; object-fit: cover;">
        </div>
    </div>

    
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Ecommerce\resources\views/user/home.blade.php ENDPATH**/ ?>