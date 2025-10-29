<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<style>
    /* ====== Dashboard Styles ====== */
    body {
        background: linear-gradient(135deg, #f8f9fc, #eef1fb);
        font-family: 'Poppins', sans-serif;
    }

    .dashboard-wrapper {
        max-width: 1100px;
        margin: 50px auto;
        padding: 40px;
        border-radius: 20px;
        background: rgba(255, 255, 255, 0.6);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
        backdrop-filter: blur(15px);
        animation: fadeIn 0.8s ease-in-out;
    }

    .dashboard-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .dashboard-header h2 {
        font-size: 2rem;
        font-weight: 600;
        color: #2c3e50;
        display: inline-flex;
        align-items: center;
        gap: 10px;
    }

    .dashboard-header h2 span.icon {
        font-size: 1.8rem;
        background: linear-gradient(135deg, #4e73df, #6f42c1);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .dashboard-header p {
        color: #5a5c69;
        font-size: 1rem;
        margin-top: 8px;
    }

    .dashboard-header .tagline {
        font-size: 1.05rem;
        color: #4e73df;
        margin-top: 12px;
        font-weight: 500;
        animation: slideUp 1s ease;
    }

    .dashboard-cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 25px;
        margin-top: 40px;
    }

    .dashboard-card {
        background: rgba(255, 255, 255, 0.8);
        border-radius: 16px;
        padding: 25px 20px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.3);
        transition: all 0.3s ease;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .dashboard-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 8px 25px rgba(78, 115, 223, 0.2);
    }

    .dashboard-card::before {
        content: "";
        position: absolute;
        inset: 0;
        border-radius: 16px;
        border: 2px solid transparent;
        background: linear-gradient(135deg, #4e73df, #6f42c1) border-box;
        mask: linear-gradient(#fff 0 0) padding-box, linear-gradient(#fff 0 0);
        -webkit-mask-composite: destination-out;
        mask-composite: exclude;
        opacity: 0;
        transition: opacity 0.4s ease;
    }

    .dashboard-card:hover::before {
        opacity: 1;
    }

    .dashboard-card h5 {
        font-size: 1.2rem;
        color: #2c3e50;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .dashboard-card .value {
        font-size: 1.6rem;
        font-weight: 700;
        background: linear-gradient(135deg, #4e73df, #6f42c1);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes slideUp {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @media (max-width: 768px) {
        .dashboard-wrapper {
            padding: 25px;
        }
        .dashboard-header h2 {
            font-size: 1.6rem;
        }
    }
</style>

<div class="dashboard-wrapper">
    <div class="dashboard-header">
        <h2><span class="icon">📊</span> Welcome to your Dashboard</h2>
        <p>Here you can manage your orders, products, and view categories.</p>
        <div class="tagline">Here’s an overview of your store performance today 🚀</div>
    </div>

    <div class="dashboard-cards">
        <div class="dashboard-card">
            <h5>Total Orders</h5>
            <div class="value">12</div>
        </div>

        <div class="dashboard-card">
            <h5>Products</h5>
            <div class="value">3</div>
        </div>

        <div class="dashboard-card">
            <h5>Categories</h5>
            <div class="value">5</div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('account.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Ecommerce\resources\views/account/dashboard.blade.php ENDPATH**/ ?>