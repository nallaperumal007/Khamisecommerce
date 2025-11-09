
<?php $__env->startSection('content'); ?>

<div class="container mt-5">
  <div class="row">
    <!-- Billing Form -->
    <div class="col-md-7">
      <h4>Billing/Shipping Address</h4>
      <form id="checkoutForm" method="POST" action="<?php echo e(route('checkout.store')); ?>">
        <?php echo csrf_field(); ?>
        <div class="mb-3"><input type="text" name="recipient_name" class="form-control" placeholder="Recipient Name" required></div>
        <div class="mb-3"><input type="text" name="address_line1" class="form-control" placeholder="Address Line 1" required></div>
        <div class="mb-3"><input type="text" name="address_line2" class="form-control" placeholder="Address Line 2"></div>
        <div class="mb-3"><input type="text" name="city" class="form-control" placeholder="City" required></div>
        <div class="mb-3"><input type="text" name="state" class="form-control" placeholder="State" required></div>
        <div class="mb-3"><input type="text" name="postal_code" class="form-control" placeholder="Postal Code" required></div>
        <div class="mb-3"><input type="text" name="country" class="form-control" placeholder="Country" required></div>
        <div class="mb-3"><input type="text" name="phone_number" class="form-control" placeholder="Phone Number" required></div>
        <div class="mb-3"><input type="email" name="email_address" class="form-control" placeholder="Email Address" required></div>

        <input type="hidden" name="cart_items" id="cart_items">
        <input type="hidden" name="total" id="total">

        <button type="submit" class="btn btn-success w-100">Pay Now</button>
      </form>
    </div>

    <!-- Cart Summary -->
    <div class="col-md-5">
      <h4>Your Cart</h4>
      <div id="cartSummary"></div>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
  const cart = JSON.parse(localStorage.getItem('cart')) || [];
  const summaryDiv = document.getElementById('cartSummary');
  const totalField = document.getElementById('total');
  const cartItemsField = document.getElementById('cart_items');

  if(cart.length === 0){
    summaryDiv.innerHTML = '<p>No items in cart.</p>';
    return;
  }

  let total = 0;
  let html = '<ul class="list-group mb-3">';
  cart.forEach(item=>{
    html += `<li class="list-group-item d-flex justify-content-between align-items-center">
      ${item.name} (${item.price.toFixed(2)} x ${item.quantity})
      <span>₹${item.total.toFixed(2)}</span>
    </li>`;
    total += item.total;
  });
  html += `<li class="list-group-item d-flex justify-content-between fw-bold">
      Total <span>₹${total.toFixed(2)}</span>
  </li></ul>`;

  summaryDiv.innerHTML = html;
  totalField.value = total;
  cartItemsField.value = JSON.stringify(cart);
});
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Ecommerce\resources\views/checkout.blade.php ENDPATH**/ ?>