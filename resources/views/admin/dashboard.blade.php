<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

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
            padding-left: 15px;
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
            justify-content: center;
            width: 100%;
            padding: 10px 0;
            color: white;
            text-decoration: none;
            transition: background 0.2s, padding 0.3s;
            opacity: 0;
            transform: translateX(-20px);
            animation: none;
        }

        .sidebar.expanded a.menu-item {
            justify-content: flex-start;
            padding-left: 15px;
            animation: fadeSlideIn 0.4s forwards;
        }

        @keyframes fadeSlideIn {
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .sidebar a.menu-item:hover {
            background-color: #2b6cb0;
        }

        .sidebar span {
            color: white;
            margin-left: 10px;
            display: none;
            white-space: nowrap;
        }

        .sidebar.expanded span {
            display: inline-block;
        }

        .content {
            margin-left: 60px;
            width: calc(100% - 60px);
            transition: margin-left 0.3s ease, width 0.3s ease;
        }

        .sidebar.expanded ~ .content {
            margin-left: 200px;
            width: calc(100% - 200px);
        }

        .dashboard-wrapper {
            position: relative;
            width: 100%;
            height: 100vh;
            overflow: hidden;
        }

        .dashboard-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: brightness(0.6);
        }

        .dashboard-overlay {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            text-align: center;
        }

        .dashboard-overlay h1,
        .dashboard-overlay p {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 1s forwards;
        }

        .dashboard-overlay h1 {
            font-size: 3rem;
            font-weight: bold;
            animation-delay: 0.3s;
        }

        .dashboard-overlay p {
            font-size: 1.2rem;
            animation-delay: 0.6s;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>

    {{-- Sidebar --}}
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

        <a href="#" class="menu-item mt-auto mb-4" onclick="event.preventDefault(); confirmLogout();">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>

        {{-- Form logout tersembunyi --}}
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>

    {{-- Konten Utama --}}
    <div class="content">
        <div class="dashboard-wrapper">
            <img src="{{ asset('images/dashboard2.jpg') }}" alt="Dashboard Image" class="dashboard-image">
            <div class="dashboard-overlay">
                <h1>Selamat Datang di halaman Dashboard</h1>
                <p>Kelola data wisata Anda dengan mudah dan efisien.</p>
            </div>
        </div>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('expanded');

            // Trigger reflow to restart animations
            const items = sidebar.querySelectorAll('.menu-item');
            items.forEach(item => {
                item.style.animation = 'none';
                void item.offsetWidth; // trigger reflow
                item.style.animation = '';
            });
        }

        function confirmLogout() {
            if (confirm("Apakah Anda yakin ingin keluar?")) {
                document.getElementById('logout-form').submit();
            }
        }
    </script>

</body>
</html>
