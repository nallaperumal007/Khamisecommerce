

<?php $__env->startSection('content'); ?>
<div class="container py-5">
  <div class="row justify-content-center">
    
    <!-- Left: Contact Information -->
    <div class="col-md-5 mb-4">
      <h2 class="fw-bold mb-4" style="color:#1c1c1c;">Contact information</h2>
      <div style="height:3px; width:60px; background:#6a7c42; margin-bottom:20px;"></div>

      <div class="mb-3 d-flex align-items-start">
        <i class="bi bi-geo-alt-fill text-success fs-4 me-3"></i>
        <div>
          <strong>Khamis Healthy Foods</strong><br>
          15B, Old Shop Street, Eruvadi-627103,<br>
          Tirunelveli Dist, Tamilnadu, India
        </div>
      </div>

      <hr>

      <div class="mb-2 d-flex align-items-center">
        <i class="bi bi-telephone-fill text-success fs-5 me-3"></i>
        <span>+91 8903284284</span>
      </div>

      <div class="mb-2 d-flex align-items-center">
        <i class="bi bi-telephone-fill text-success fs-5 me-3"></i>
        <span>+91 9894518855</span>
      </div>

      <hr>

      <div class="mb-2 d-flex align-items-center">
        <i class="bi bi-envelope-fill text-success fs-5 me-3"></i>
        <span>khamisfoodie@gmail.com</span>
      </div>
    </div>

    <!-- Right: Send a Message Form -->
    <div class="col-md-6">
      <div class="p-4 shadow rounded bg-white">
        <h3 class="fw-bold mb-4">Send a message</h3>

        <form>
          <div class="row">
            <div class="col-md-6 mb-3">
              <input type="text" class="form-control" placeholder="Your Name" required>
            </div>
            <div class="col-md-6 mb-3">
              <input type="text" class="form-control" placeholder="Your Phone" required>
            </div>
          </div>

          <div class="mb-3">
            <input type="email" class="form-control" placeholder="Your Email" required>
          </div>

          <div class="mb-3">
            <textarea class="form-control" rows="5" placeholder="Message" required></textarea>
          </div>

          <button type="submit" class="btn btn-primary px-4 py-2">Submit</button>
        </form>
      </div>
    </div>

  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Ecommerce\resources\views/user/contact.blade.php ENDPATH**/ ?>