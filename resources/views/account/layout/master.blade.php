<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'User Panel')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --primary: #4e73df;
            --secondary: #6f42c1;
            --gradient: linear-gradient(135deg, #4e73df, #6f42c1);
            --text-light: rgba(255,255,255,0.85);
            --sidebar-width: 250px;
            --glass-bg: rgba(255, 255, 255, 0.2);
            --dark-bg: #1b1d29;
            --dark-card: #232636;
            --transition: all 0.3s ease;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #f5f7fb;
            color: #333;
            transition: var(--transition);
            overflow-x: hidden;
        }

        /* ==== SIDEBAR ==== */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: var(--sidebar-width);
            background: var(--gradient);
            backdrop-filter: blur(12px);
            color: #fff;
            display: flex;
            flex-direction: column;
            padding-top: 80px;
            transition: var(--transition);
            border-right: 1px solid rgba(255,255,255,0.15);
            z-index: 1000;
        }

        .sidebar.collapsed {
            width: 80px;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 25px;
            color: var(--text-light);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
            border-left: 3px solid transparent;
            position: relative;
        }

        .sidebar a i {
            font-size: 18px;
            transition: var(--transition);
        }

        .sidebar a span {
            transition: var(--transition);
        }

        .sidebar a:hover {
            background: rgba(255,255,255,0.15);
            border-left: 3px solid #fff;
            color: #fff;
            transform: translateX(5px);
        }

        .sidebar a.active {
            background: rgba(255,255,255,0.25);
            border-left: 3px solid #fff;
            color: #fff;
        }

        .sidebar.collapsed a span {
            opacity: 0;
            visibility: hidden;
            width: 0;
        }

        /* ==== NAVBAR ==== */
        .navbar {
            position: fixed;
            top: 0;
            left: var(--sidebar-width);
            right: 0;
            height: 70px;
            background: rgba(255,255,255,0.8);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(0,0,0,0.05);
            box-shadow: 0 2px 10px rgba(0,0,0,0.06);
            transition: var(--transition);
            z-index: 999;
        }

        .navbar.dark {
            background: rgba(27,29,41,0.85);
            color: #f0f0f0;
        }

        .navbar .navbar-brand {
            font-weight: 600;
            color: var(--primary) !important;
            letter-spacing: 0.3px;
        }

        .menu-toggle {
            border: none;
            background: none;
            font-size: 24px;
            color: var(--primary);
        }

        .dark-mode-toggle {
            border: none;
            background: none;
            font-size: 20px;
            color: #555;
            margin-left: 15px;
            transition: var(--transition);
        }

        .dark-mode-toggle:hover {
            color: var(--primary);
        }

        /* ==== MAIN CONTENT ==== */
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 90px 30px 60px;
            transition: var(--transition);
        }

        .sidebar.collapsed ~ .main-content {
            margin-left: 80px;
        }

        .content-header {
            background: linear-gradient(90deg, rgba(78,115,223,0.1), rgba(111,66,193,0.1));
            padding: 20px 25px;
            border-radius: 15px;
            margin-bottom: 25px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }

        .content-header h4 {
            font-weight: 600;
            color: var(--primary);
        }

        .card-custom {
            border: none;
            border-radius: 20px;
            background: rgba(255,255,255,0.8);
            backdrop-filter: blur(12px);
            box-shadow: 0 8px 24px rgba(0,0,0,0.08);
            transition: var(--transition);
        }

        .card-custom:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 30px rgba(0,0,0,0.1);
        }

        footer {
            margin-top: 50px;
            background: var(--gradient);
            color: #fff;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            text-align: center;
            padding: 20px;
            font-size: 14px;
            box-shadow: 0 -2px 10px rgba(0,0,0,0.1);
        }

        /* ==== DARK MODE ==== */
        body.dark-mode {
            background: var(--dark-bg);
            color: #e0e0e0;
        }

        body.dark-mode .navbar {
            background: rgba(27,29,41,0.9);
            color: #fff;
        }

        body.dark-mode .sidebar {
            background: linear-gradient(135deg, #2b2e45, #232636);
        }

        body.dark-mode .card-custom {
            background: var(--dark-card);
            box-shadow: 0 6px 20px rgba(0,0,0,0.3);
        }

        body.dark-mode footer {
            background: linear-gradient(135deg, #2b2e45, #1b1d29);
        }

        /* ==== RESPONSIVE ==== */
        @media (max-width: 991px) {
            .sidebar {
                left: -250px;
            }
            .sidebar.active {
                left: 0;
            }
            .main-content {
                margin-left: 0;
            }
            .navbar {
                left: 0;
            }
        }

        /* ==== SCROLLBAR ==== */
        ::-webkit-scrollbar {
            width: 6px;
        }
        ::-webkit-scrollbar-thumb {
            background: rgba(0,0,0,0.2);
            border-radius: 4px;
        }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg px-4">
        <button class="menu-toggle me-3" onclick="toggleSidebar()">
            <i class="bi bi-list"></i>
        </button>
        <span class="navbar-brand">Ecommerce User Panel</span>

        <div class="ms-auto d-flex align-items-center">
            <span class="me-3 fw-semibold text-secondary">
                👋 Hello, {{ Auth::user()->name ?? 'User' }}
            </span>
            <button class="dark-mode-toggle" id="darkModeBtn" title="Toggle Dark Mode">
                <i class="bi bi-moon-stars"></i>
            </button>
            <a href="{{ route('account.logout') }}" class="btn btn-sm btn-outline-danger rounded-pill px-3 ms-3">
                <i class="bi bi-box-arrow-right me-1"></i> Logout
            </a>
        </div>
    </nav>

    <!-- SIDEBAR -->
    <div class="sidebar" id="sidebar">
        <a href="{{ route('account.dashboard') }}" class="{{ request()->routeIs('account.dashboard') ? 'active' : '' }}">
            <i class="bi bi-house-door"></i> <span>Dashboard</span>
        </a>
        <a href="{{ route('account.categories') }}" class="{{ request()->routeIs('account.categories') ? 'active' : '' }}">
            <i class="bi bi-tags"></i> <span>Categories</span>
        </a>
        <a href="{{ route('account.products') }}" class="{{ request()->routeIs('account.products') ? 'active' : '' }}">
            <i class="bi bi-bag-check"></i> <span>Products</span>
        </a>
        {{-- <a href="{{ route('account.orders') }}">
            <i class="bi bi-receipt"></i> <span>Orders</span>
        </a> --}}
    </div>

    <!-- MAIN CONTENT -->
    <main class="main-content">
        <div class="content-header">
            <h4>@yield('title', 'Dashboard')</h4>
        </div>

        <div class="container-fluid">
            @yield('content')
        </div>

        <footer>
            © {{ date('Y') }} <strong>Ecommerce User Panel</strong>. All rights reserved.
        </footer>
    </main>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('collapsed');
        }

        const darkModeBtn = document.getElementById('darkModeBtn');
        darkModeBtn.addEventListener('click', () => {
            document.body.classList.toggle('dark-mode');
            const icon = darkModeBtn.querySelector('i');
            if (document.body.classList.contains('dark-mode')) {
                icon.classList.replace('bi-moon-stars', 'bi-brightness-high');
            } else {
                icon.classList.replace('bi-brightness-high', 'bi-moon-stars');
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
