<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar User</title>

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
        }

        .sidebar a.menu-item:hover {
            background-color: #2b6cb0;
        }

        .sidebar a.menu-item span {
            color: white;
            margin-left: 10px;
            display: none;
            white-space: nowrap;
        }

        .sidebar.expanded a.menu-item {
            justify-content: flex-start;
            padding-left: 15px;
        }

        .sidebar.expanded a.menu-item span {
            display: inline-block;
        }

        .bottom-menu {
            margin-top: auto;
            margin-bottom: 20px;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .sidebar.expanded .bottom-menu {
            align-items: flex-start;
            padding-left: 15px;
        }

        .content {
            margin-left: 60px;
            width: calc(100% - 60px);
            transition: margin-left 0.3s ease, width 0.3s ease;
            padding: 30px;
        }

        .sidebar.expanded ~ .content {
            margin-left: 200px;
            width: calc(100% - 200px);
        }

        .table-container {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }
    </style>
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
            <a href="/" class="menu-item mb-2">
                <i class="fas fa-arrow-left"></i>
                <span>Lihat Web</span>
            </a>
            
            <a href="{{ url('/dashboard') }}" class="menu-item mb-2">
                <i class="fas fa-arrow-left"></i>
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

    <!-- Konten -->
    <div class="content">
        <h2 class="mb-4">Daftar User</h2>

        <div class="table-container">
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Role</th>
                        <th>Create</th>
                        <th>Update</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->password }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->updated_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

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
</body>
</html>
