<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome | Laravel App</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            font-family: "Poppins", sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        nav {
            background: #ff2d20;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        nav .nav-link {
            color: white !important;
            font-weight: 500;
            transition: 0.3s ease;
        }
        nav .nav-link:hover {
            color: #ffe9e6 !important;
            text-decoration: underline;
        }
        .welcome-section {
            flex-grow: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem;
        }
        .welcome-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 25px rgba(0,0,0,0.1);
            padding: 3rem;
            text-align: center;
            max-width: 550px;
            width: 100%;
        }
        .welcome-card h1 {
            font-weight: 700;
            color: #ff2d20;
        }
        .welcome-card p {
            color: #6c757d;
        }
        .btn-laravel {
            background: #ff2d20;
            border: none;
            color: white;
            transition: 0.3s ease;
        }
        .btn-laravel:hover {
            background: #e0251c;
        }
        footer {
            background: #212529;
            color: #adb5bd;
            text-align: center;
            padding: 1rem 0;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

    <!-- ✅ Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold text-white" href="#">LaravelApp</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav gap-3">
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Category</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Gallery</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- ✅ Main Welcome Section -->
    <div class="welcome-section">
        <div class="welcome-card">
            <img src="https://laravel.com/img/logomark.min.svg" alt="Laravel" width="80" class="mb-3">
            <h1>Welcome to Laravel</h1>
            <p class="mb-4">Your Laravel application is ready! Let’s build something amazing together.</p>

            @if (Route::has('login'))
                <div class="d-flex justify-content-center gap-3">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-laravel px-4">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-laravel px-4">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-outline-secondary px-4">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </div>

    <!-- ✅ Footer -->
    <footer>
        © {{ date('Y') }} LaravelApp — All Rights Reserved
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
