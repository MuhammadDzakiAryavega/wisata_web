<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar User</title>

    <!-- Bootstrap & Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
        }

        .sidebar {
            position: fixed;
            height: 100vh;
            width: 60px;
            background-color: #2c5282;
            transition: width 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            overflow: hidden;
            z-index: 1000;
        }

        .sidebar.expanded {
            width: 200px;
            align-items: flex-start;
        }

        .sidebar .toggle-btn {
            width: 100%;
            height: 60px;
            color: white;
            font-size: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
        }

        .sidebar a.menu-item {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            padding: 10px 15px;
            width: 100%;
            color: white;
            text-decoration: none;
            gap: 12px;
            transition: background 0.2s ease;
        }

        .sidebar a.menu-item:hover {
            background-color: #2b6cb0;
        }

        .sidebar a.menu-item span {
            display: none;
        }

        .sidebar.expanded a.menu-item span {
            display: inline;
        }

        .bottom-menu {
            margin-top: auto;
            width: 100%;
            display: flex;
            flex-direction: column;
        }

        .content {
            margin-left: 60px;
            padding: 30px;
            transition: margin-left 0.3s ease;
        }

        .sidebar.expanded ~ .content {
            margin-left: 200px;
        }

        .table-container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        table.table-hover tbody tr:hover {
            background-color: #f8f9fa;
        }

        .table thead th,
        .table tbody td {
            vertical-align: middle;
            text-align: start;
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="toggle-btn" onclick="toggleSidebar()">
        <i class="fas fa-bars"></i>
    </div>

    <a href="{{ url('/list') }}" class="menu-item">
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

<!-- Konten -->
<div class="content">
    <h2 class="mb-4"><i class="fas fa-users me-2 text-primary"></i>Daftar User</h2>

    <div class="table-container">
        <div class="table-responsive">
            <table class="table table-hover table-bordered text-start align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Password (hash)</th>
                        <th>Role</th>
                        <th>Dibuat</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <span class="text-muted" style="font-size: 0.8rem;">{{ Str::limit($user->password, 15, '...') }}</span>
                        </td>
                        <td>
                            <span class="badge {{ $user->role === 'admin' ? 'bg-success' : 'bg-secondary' }}">
                                {{ ucfirst($user->role) }}
                            </span>
                        </td>
                        <td>{{ $user->created_at->format('d-m-Y H:i') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Script -->
<script>
    function toggleSidebar() {
        document.getElementById('sidebar').classList.toggle('expanded');
    }

    function confirmLogout() {
        if (confirm("Apakah Anda yakin ingin keluar?")) {
            document.getElementById('logout-form').submit();
        }
    }
</script>

</body>
</html>
