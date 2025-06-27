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
        }

        .sidebar {
            position: fixed;
            height: 100vh;
            width: 60px;
            background-color: #2c5282;
            transition: width 0.3s;
            display: flex;
            flex-direction: column;
            align-items: center;
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
            transition: background 0.2s;
        }

        .sidebar.expanded a.menu-item {
            justify-content: flex-start;
            padding-left: 15px;
        }

        .sidebar a.menu-item:hover {
            background-color: #2b6cb0;
        }

        .sidebar span {
            color: white;
            margin-left: 10px;
            display: none;
        }

        .sidebar.expanded span {
            display: inline;
        }

        .content {
            margin-left: 60px;
            width: calc(100% - 60px);
            transition: margin-left 0.3s, width 0.3s;
        }

        .sidebar.expanded ~ .content {
            margin-left: 200px;
            width: calc(100% - 200px);
        }

        .dashboard-image {
            width: 100%;
            height: 100vh;
            object-fit: cover;
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

        <a href="{{ url('/wisata') }}" class="menu-item">
            <i class="fas fa-table"></i>
            <span>Data masukan</span>
        </a>

        <a href="/" class="menu-item mt-auto mb-4">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
    </div>

    {{-- Konten Utama --}}
    <div class="content">
        <img src="{{ asset('images/dashboard.jpg') }}" alt="Dashboard Image" class="dashboard-image">
    </div>

    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('expanded');
        }
    </script>

</body>
</html>
