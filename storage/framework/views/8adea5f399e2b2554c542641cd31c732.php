<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $__env->yieldContent('title', 'Admin Dashboard'); ?></title>

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #4e73df;
            --accent: #6f42c1;
            --gradient-bg: linear-gradient(135deg, #2c3e50, #4e73df);
            --gradient-accent: linear-gradient(135deg, #4e73df, #6f42c1);
            --text-color: #212529;
            --bg-color: #f4f6fb;
            --card-bg: #ffffff;
        }

        body.dark-mode {
            --text-color: #f8f9fa;
            --bg-color: #1a1d24;
            --card-bg: #242834;
            --gradient-bg: linear-gradient(135deg, #111827, #1f2937);
            --gradient-accent: linear-gradient(135deg, #4e73df, #6f42c1);
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: var(--bg-color);
            color: var(--text-color);
            min-height: 100vh;
            transition: all 0.3s ease;
        }

        /* ===== SIDEBAR ===== */
        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: var(--gradient-bg);
            color: #fff;
            padding-top: 70px;
            transition: all 0.4s ease;
            box-shadow: 4px 0 20px rgba(0,0,0,0.2);
            z-index: 1040;
        }
        .sidebar.collapsed {
            width: 80px;
        }
        .sidebar a {
            display: flex;
            align-items: center;
            gap: 12px;
            color: rgba(255, 255, 255, 0.85);
            padding: 12px 20px;
            margin: 6px 12px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        .sidebar a:hover {
            background: rgba(255,255,255,0.15);
            transform: translateX(6px);
        }
        .sidebar a.active {
            background: var(--gradient-accent);
            color: #fff;
            box-shadow: 0 0 12px rgba(78,115,223,0.7);
        }
        .sidebar a i {
            font-size: 1.3rem;
        }

        /* ===== NAVBAR ===== */
        .navbar {
            position: fixed;
            top: 0;
            left: 250px;
            right: 0;
            background: var(--gradient-bg);
            color: #fff;
            padding: 12px 25px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            z-index: 1030;
            transition: all 0.4s ease;
        }
        .navbar.collapsed {
            left: 80px;
        }
        .navbar .navbar-brand {
            font-weight: 700;
            color: #fff;
        }
        .navbar .profile-info {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #fff;
        }
        .navbar .profile-info img {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            border: 2px solid #fff;
            object-fit: cover;
        }
        .navbar button {
            border: none;
            background: transparent;
            color: #fff;
        }
        .navbar .theme-toggle {
            font-size: 1.4rem;
            cursor: pointer;
            margin-right: 15px;
        }

        /* ===== MAIN CONTENT ===== */
        .main-content {
            margin-left: 250px;
            padding: 100px 30px 60px;
            transition: all 0.4s ease;
            animation: fadeIn 0.4s ease;
        }
        .collapsed + .main-content {
            margin-left: 80px;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(8px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .card {
            border: none;
            border-radius: 18px;
            background: var(--card-bg);
            box-shadow: 0 8px 25px rgba(0,0,0,0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: translateY(-6px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        /* ===== FOOTER ===== */
        footer {
            background: var(--gradient-bg);
            text-align: center;
            padding: 18px;
            font-size: 0.9rem;
            color: rgba(255,255,255,0.85);
            border-top-left-radius: 16px;
            border-top-right-radius: 16px;
            box-shadow: 0 -4px 20px rgba(0,0,0,0.15);
        }
        footer:hover {
            color: #fff;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
            }
            .sidebar.active {
                transform: translateX(0);
            }
            .navbar {
                left: 0;
            }
            .main-content {
                margin-left: 0;
            }
        }

        /* ===== Buttons ===== */
        .btn-primary {
            background: var(--gradient-accent);
            border: none;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            transform: scale(1.03);
            box-shadow: 0 0 14px rgba(111,66,193,0.4);
        }
    </style>
</head>
<body>

    
    <nav class="navbar d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center">
            <button class="btn d-lg-none me-3" id="toggleSidebar">
                <i class="bi bi-list text-white fs-4"></i>
            </button>
            <span class="navbar-brand mb-0">Ecommerce Admin</span>
        </div>

        <div class="d-flex align-items-center">
            <i class="bi bi-brightness-high theme-toggle" id="themeToggle" title="Toggle Dark/Light"></i>
            <div class="profile-info">
                <img src="https://ui-avatars.com/api/?name=<?php echo e(urlencode(Auth::guard('admin')->user()->name ?? 'Admin')); ?>&background=4e73df&color=fff" alt="Admin Avatar">
                <span class="fw-semibold"><?php echo e(Auth::guard('admin')->user()->name ?? 'Admin'); ?></span>
                <a href="<?php echo e(route('admin.logout')); ?>" class="btn btn-outline-light btn-sm ms-3">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </a>
            </div>
        </div>
    </nav>

    
    <div class="sidebar" id="sidebar">
        <a href="<?php echo e(route('admin.dashboard')); ?>" class="<?php echo e(request()->routeIs('admin.dashboard') ? 'active' : ''); ?>">
            <i class="bi bi-house-door-fill"></i> <span>Dashboard</span>
        </a>
        <a href="<?php echo e(route('admin.categories.index')); ?>" class="<?php echo e(request()->routeIs('admin.categories.*') ? 'active' : ''); ?>">
            <i class="bi bi-collection-fill"></i> <span>Categories</span>
        </a>
        <a href="<?php echo e(route('admin.products.index')); ?>" class="<?php echo e(request()->routeIs('admin.products.*') ? 'active' : ''); ?>">
            <i class="bi bi-bag-check-fill"></i> <span>Products</span>
        </a>
        <a href="<?php echo e(route('admin.orders.index')); ?>" class="<?php echo e(request()->routeIs('admin.orders.*') ? 'active' : ''); ?>">
            <i class="bi bi-receipt-cutoff"></i> <span>Orders</span>
        </a>
    </div>

    
    <main class="main-content">
        <div class="container-fluid">
            <?php echo $__env->yieldContent('content'); ?>
        </div>

        
        <footer>
            <p class="mb-0">© <?php echo e(date('Y')); ?> Ecommerce Admin Panel. All rights reserved.</p>
        </footer>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const sidebar = document.getElementById('sidebar');
        const toggleBtn = document.getElementById('toggleSidebar');
        const themeToggle = document.getElementById('themeToggle');
        const body = document.body;

        toggleBtn?.addEventListener('click', () => {
            sidebar.classList.toggle('active');
        });

        // Dark / Light mode toggle
        themeToggle?.addEventListener('click', () => {
            body.classList.toggle('dark-mode');
            if (body.classList.contains('dark-mode')) {
                themeToggle.classList.replace('bi-brightness-high', 'bi-moon-stars');
            } else {
                themeToggle.classList.replace('bi-moon-stars', 'bi-brightness-high');
            }
        });
    </script>
</body>
</html>
<?php /**PATH D:\Ecommerce\resources\views/admin/layout/master.blade.php ENDPATH**/ ?>