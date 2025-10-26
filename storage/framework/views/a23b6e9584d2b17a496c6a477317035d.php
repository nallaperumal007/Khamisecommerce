<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $__env->yieldContent('title', 'User Panel'); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .sidebar {
            width: 220px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: #343a40;
            padding-top: 60px;
        }
        .sidebar a {
            display: block;
            color: #adb5bd;
            padding: 10px 20px;
            text-decoration: none;
        }
        .sidebar a:hover { background-color: #495057; color: #fff; }
        .main-content { margin-left: 220px; padding: 20px; }
        footer { background: #fff; text-align: center; padding: 15px; border-top: 1px solid #ddd; margin-top: 30px; }
        .navbar { position: fixed; top: 0; left: 220px; right: 0; z-index: 1000; }
    </style>
</head>
<body>

    
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container-fluid">
            <span class="navbar-brand fw-bold">Ecommerce User Panel</span>
            <div class="d-flex ms-auto">
                <span class="me-3">Hello, <?php echo e(Auth::user()->name ?? 'User'); ?></span>
                <a href="<?php echo e(route('account.logout')); ?>" class="btn btn-outline-danger btn-sm">Logout</a>
            </div>
        </div>
    </nav>

    
    <div class="sidebar">
        <a href="<?php echo e(route('account.dashboard')); ?>">🏠 Dashboard</a>
         <a href="<?php echo e(route('account.categories')); ?>">📦 Categories</a>
        
    </div>

    
    <main class="main-content">
        <div class="container-fluid mt-5 pt-3">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
<br /><br/><br/><br /><br/><br/>
        
        <footer class="shadow-sm">
            <p class="mb-0">© <?php echo e(date('Y')); ?> Ecommerce User Panel. All rights reserved.</p>
        </footer>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH D:\Ecommerce\resources\views/account/layout/master.blade.php ENDPATH**/ ?>