<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>@yield('title', 'Admin')</title>

  <!-- Bootstrap & Font Awesome -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

  <style>
    body {
      margin: 0;
      padding: 0;
      overflow-x: hidden;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .sidebar {
      position: fixed;
      height: 100vh;
      width: 60px;
      background-color: #2c5282;
      transition: width 0.4s ease;
      display: flex;
      flex-direction: column;
      align-items: center;
      z-index: 1000;
      overflow: hidden;
    }

    .sidebar.expanded {
      width: 200px;
      align-items: flex-start;
    }

    .sidebar .toggle-btn {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 60px;
      width: 100%;
      color: white;
      font-size: 20px;
      cursor: pointer;
    }

    .sidebar a.menu-item {
      display: flex;
      align-items: center;
      justify-content: flex-start;
      width: 100%;
      padding: 10px 15px;
      color: white;
      text-decoration: none;
      transition: background 0.2s;
      gap: 12px;
    }

    .sidebar a.menu-item:hover {
      background-color: #2b6cb0;
    }

    .sidebar a.menu-item i {
      min-width: 20px;
      text-align: center;
    }

    .sidebar a.menu-item span {
      display: none;
      white-space: nowrap;
    }

    .sidebar.expanded a.menu-item span {
      display: inline;
    }

    .bottom-menu {
      margin-top: auto;
      padding: 15px 0;
      width: 100%;
      display: flex;
      flex-direction: column;
    }

    .sidebar.expanded .bottom-menu {
      padding-left: 0;
    }

    .content {
      margin-left: 60px;
      width: calc(100% - 60px);
      transition: margin-left 0.3s ease, width 0.3s ease;
      padding: 20px;
    }

    .sidebar.expanded ~ .content {
      margin-left: 200px;
      width: calc(100% - 200px);
    }
  </style>

  @stack('styles') <!-- jika ingin tambahkan style tambahan dari halaman -->
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar" id="sidebar">
    <div class="toggle-btn" onclick="toggleSidebar()">
      <i class="fas fa-bars"></i>
    </div>

    <a href="/list" class="menu-item">
      <i class="fas fa-th-large"></i>
      <span>Data Wisata</span>
    </a>
    <a href="{{ url('/list_contact') }}" class="menu-item">
      <i class="fas fa-table"></i>
      <span>Data Masukan</span>
    </a>
    <a href="{{ url('/users') }}" class="menu-item">
      <i class="fas fa-users"></i>
      <span>Data User</span>
    </a>

    <div class="bottom-menu">
      <a href="/" class="menu-item">
        <i class="fas fa-home"></i>
        <span>Lihat Web</span>
      </a>
      <a href="{{ url('/dashboard') }}" class="menu-item">
        <i class="fas fa-tachometer-alt"></i>
        <span>Back Dashboard</span>
      </a>
      <a href="#" class="menu-item" onclick="event.preventDefault(); confirmLogout();">
        <i class="fas fa-sign-out-alt"></i>
        <span>Logout</span>
      </a>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
    </form>
  </div>

  <!-- Konten Halaman -->
  <div class="content">
    @yield('content')
  </div>

  <!-- JS -->
  <script>
    function toggleSidebar() {
      const sidebar = document.getElementById('sidebar');
      sidebar.classList.toggle('expanded');
    }

    function confirmLogout() {
      if (confirm("Apakah Anda yakin ingin keluar?")) {
        document.getElementById('logout-form').submit();
      }
    }
  </script>

  @stack('scripts') <!-- jika ingin tambahkan script tambahan dari halaman -->
</body>
</html>
