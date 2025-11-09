

<?php $__env->startSection('content'); ?>

<div class="container py-5">
    <div class="row">
        <div class="col-md-12">

            <div class="card shadow-sm">
                <div class="card-header bg-warning text-dark d-flex justify-content-between align-items-center">
                    <h3 class="card-title mb-0">My Cart</h3>
                    <a href="<?php echo e(route('user.shop')); ?>" class="btn btn-sm btn-dark">
                        <i class="fa fa-arrow-left"></i> Continue Shopping
                    </a>
                </div>

                <div class="card-body">
                    <?php if(Session::has('success')): ?>
                        <div class="alert alert-success"><?php echo e(Session::get('success')); ?></div>
                    <?php endif; ?>

                    <?php if(count($cartItems) > 0): ?>
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle">
                                <thead class="bg-light">
                                    <tr>
                                        <th>Image</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td width="100">
                                                <img src="<?php echo e(asset('uploads/products/'.$item->product->image)); ?>" 
                                                     alt="<?php echo e($item->product->name); ?>" 
                                                     class="img-fluid rounded" style="max-height:80px;">
                                            </td>
                                            <td><?php echo e($item->product->name); ?></td>
                                            <td>₹<?php echo e(number_format($item->product->price, 2)); ?></td>
                                            <td>
                                                <form action="<?php echo e(route('user.cart.update', $item->id)); ?>" method="POST" class="d-flex">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('PUT'); ?>
                                                    <input type="number" name="quantity" value="<?php echo e($item->quantity); ?>" 
                                                           min="1" class="form-control w-50 text-center me-2">
                                                    <button type="submit" class="btn btn-sm btn-success">Update</button>
                                                </form>
                                            </td>
                                            <td>₹<?php echo e(number_format($item->product->price * $item->quantity, 2)); ?></td>
                                            <td>
                                                <form action="<?php echo e(route('user.cart.remove', $item->id)); ?>" method="POST" onsubmit="return confirm('Remove this item?')">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        <i class="fa fa-trash"></i> Remove
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <div class="card p-4 shadow-sm" style="min-width:300px;">
                                <h5 class="mb-3">Cart Summary</h5>
                                <p class="mb-1">Subtotal: <strong>₹<?php echo e(number_format($subtotal, 2)); ?></strong></p>
                                <p class="mb-1">Tax (5%): <strong>₹<?php echo e(number_format($subtotal * 0.05, 2)); ?></strong></p>
                                <hr>
                                <h5>Total: <strong class="text-success">₹<?php echo e(number_format($subtotal * 1.05, 2)); ?></strong></h5>
                                <a href="<?php echo e(route('user.checkout')); ?>" class="btn btn-success w-100 mt-3">
                                    Proceed to Checkout
                                </a>
                            </div>
                        </div>

                    <?php else: ?>
                        <div class="text-center py-5">
                            <img src="<?php echo e(asset('images/empty-cart.png')); ?>" alt="Empty Cart" width="150" class="mb-3">
                            <h4>Your cart is empty!</h4>
                            <a href="<?php echo e(route('user.shop')); ?>" class="btn btn-warning mt-3">
                                <i class="fa fa-shopping-cart"></i> Shop Now
                            </a>
                        </div>
                    <?php endif; ?>

                </div>
            </div>

        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Ecommerce\resources\views/user/cart.blade.php ENDPATH**/ ?>