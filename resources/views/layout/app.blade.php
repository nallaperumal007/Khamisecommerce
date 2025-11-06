<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Khamis Healthy Foods</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
    /* Navbar */
    .navbar {
      background-color: #fff;
      border-bottom: 2px solid #f1f1f1;
    }
    .navbar-brand {
      font-weight: bold;
      color: #4a7c12 !important;
      font-size: 1.8rem;
    }
    .nav-link {
      color: #000 !important;
      font-weight: 500;
    }
    .nav-link:hover {
      color: #4a7c12 !important;
    }
    .btn-login {
      background: #4a7c12;
      color: #fff;
      border: none;
    }
    .btn-signup {
      background: #6c9c2a;
      color: #fff;
      border: none;
    }

    /* Footer */
    footer {
      background-color: #111;
      color: #fff;
      padding: 40px 0;
    }
    footer h5 {
      color: #fff;
      font-weight: 600;
      margin-bottom: 15px;
    }
    footer ul {
      list-style: none;
      padding: 0;
    }
    footer ul li {
      margin-bottom: 8px;
      border-bottom: 1px solid rgba(255,255,255,0.1);
      padding-bottom: 4px;
    }
    footer ul li a {
      color: #ccc;
      text-decoration: none;
    }
    footer ul li a:hover {
      color: #a6e22e;
    }
    footer .social-icons a {
      font-size: 20px;
      color: #fff;
      margin-right: 15px;
      transition: 0.3s;
    }
    footer .social-icons a:hover {
      color: #a6e22e;
    }
    .footer-bottom {
      background: #000;
      color: #ccc;
      padding: 10px 0;
      font-size: 0.9rem;
    }
  </style>
</head>
<body>

  <!-- ✅ Header -->
  <nav class="navbar navbar-expand-lg sticky-top shadow-sm">
    <div class="container">
      <a class="navbar-brand" href="{{ route('home') }}">
   <img src="{{ asset('storage/logo.png') }}" alt="Khamis" height="50">

      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-end" id="navbarMenu">
         <ul class="navbar-nav align-items-center gap-3">
  <li><a class="nav-link" href="{{ route('home') }}">HOME</a></li>
  <li><a class="nav-link" href="{{ route('about') }}">ABOUT</a></li>
  <li><a class="nav-link" href="{{ route('user.category') }}">CATEGORY</a></li>
  <li><a class="nav-link" href="{{ route('products') }}">PRODUCTS</a></li>
  <li><a class="nav-link" href="{{ route('gallery') }}">GALLERY</a></li>
  <li><a class="nav-link" href="{{ route('contact') }}">CONTACT-US</a></li>
</ul>
      </div>
    </div>
  </nav>

  <!-- ✅ Page Content -->
  <main>
    @yield('content')
  </main>

  <!-- ✅ Footer -->
  <footer class="mt-5">
    <div class="container">
      <div class="row gy-4">
        <div class="col-md-3">
          <h5>Products</h5>
          <ul>
            <li>Wheat Burfi - BUR40P06</li>
            <li>Pearl Burfi - BUR40P05</li>
            <li>Multimillets Burfi - BUR40P04</li>
            <li>Millet Burfi</li>
            <li>Foxtail Burfi - BUR40P02</li>
            <li>Peanut Burfi - BUR40P01</li>
          </ul>
        </div>
        <div class="col-md-3">
          <h5>TERMS & POLICY</h5>
          <ul>
            <li><a href="#">Terms and Policy</a></li>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Return and Refund</a></li>
            <li><a href="#">Shipping Policy</a></li>
          </ul>
        </div>
        <div class="col-md-3">
          <h5>Contact Address</h5>
          <p>
            Khamis Healthy Foods<br>
            15B, Old Shop Street, Eruvadi-627103,<br>
            Tirunelveli Dist, Tamilnadu, India
          </p>
        </div>
        <div class="col-md-3">
          <h5>Social Media</h5>
          <div class="social-icons">
            <a href="#"><i class="bi bi-facebook"></i></a>
            <a href="#"><i class="bi bi-instagram"></i></a>
            <a href="#"><i class="bi bi-twitter"></i></a>
            <a href="#"><i class="bi bi-whatsapp"></i></a>
          </div>
        </div>
      </div>
    </div>

    <div class="footer-bottom text-center mt-4">
      © {{ date('Y') }}. All rights reserved. | Asraaz Business Solutions
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
