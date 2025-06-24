<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Wisata Website</title>

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500&display=swap" rel="stylesheet" />

  <!-- Bootstrap & Font Awesome -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

  <style>
    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
      font-family: 'Poppins', sans-serif;
      font-size: 0.92rem;
      background-color: transparent; /* Menghindari latar belakang putih */
    }

    * {
      box-sizing: border-box;
    }

    .navbar {
      padding-top: 0.4rem;
      padding-bottom: 0.4rem;
      font-size: 1rem;
    }

    .navbar-brand img {
      width: 50px;
      height: auto;
    }

    .navbar-brand span {
      font-size: 1.4rem;
      font-weight: 500;
    }

    .nav-link {
      font-size: 1.05rem;
      padding: 0.4rem 0.8rem;
      transition: color 0.3s;
    }

    .nav-link:hover {
      color: #ffc107 !important;
    }

    .form-control {
      height: 32px;
      font-size: 1rem;
    }

    .btn-outline-light {
      padding: 4px 12px;
      font-size: 1rem;
    }

    .navbar-toggler {
      padding: 0.25rem 0.5rem;
      font-size: 0.875rem;
    }

    main {
      padding: 0;
      margin: 0;
      background-color: transparent;
    }

    footer {
      font-size: 0.85rem;
      color: white;
      background-color: rgb(14, 124, 38); /* agar menyatu dengan hero */
      text-align: center;
      padding: 1rem;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-success shadow-sm">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center" href="#">
        <img src="{{ asset('images/rancak.png') }}" alt="Logo" class="me-2" />
        <span>Wisata</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
        aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link active" href="/">Home</a></li>
          <li class="nav-item"><a class="nav-link active" href="/form">Destination</a></li>
          <li class="nav-item"><a class="nav-link active" href="/list">List Data</a></li>
        </ul>

        <!-- Search -->
        <form class="d-flex me-3" role="search" action="{{ url('/') }}" method="GET">
          <input class="form-control me-2" type="search" name="search" placeholder="Search" />
          <button class="btn btn-outline-light" type="submit"><i class="fas fa-search"></i></button>
        </form>

        <!-- Auth -->
        @auth
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link disabled text-white">{{ Auth::user()->name }}</a>
          </li>
          <li class="nav-item">
            <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Yakin ingin logout?')">
              @csrf
              <button type="submit" class="nav-link btn btn-link text-white p-0" style="text-decoration: none;">Logout</button>
            </form>
          </li>
        </ul>
        @else
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link text-white" href="/login">Login</a>
          </li>
        </ul>
        @endauth
      </div>
    </div>
  </nav>

  <!-- Main -->
  <main>
    @yield('content')
  </main>

  <!-- Footer -->
  <footer>
    <small>&copy; {{ date('Y') }} by Arya A.Md.Kom. All rights reserved.</small>
  </footer>

  <!-- Script -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
