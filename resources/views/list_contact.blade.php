<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>List Contact</title>

    <!-- Bootstrap dan Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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

        .content {
            margin-left: 60px;
            padding: 20px;
            transition: margin-left 0.3s ease;
        }

        .sidebar.expanded ~ .content {
            margin-left: 200px;
        }

        table.table-hover tbody tr:hover {
            background-color: #f9fafb;
        }

        .badge-date {
            font-size: 0.85rem;
            background-color: #e2e8f0;
            color: #2d3748;
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
    <div class="container">
        <div class="card shadow rounded-4 p-4">
            <h3 class="mb-4">📬 Daftar Pesan Masuk</h3>

            @if(session('success'))
                <div class="alert alert-success rounded-3">{{ session('success') }}</div>
            @endif

            @if($contacts->isEmpty())
                <div class="alert alert-warning text-center rounded-3">Belum ada pesan yang masuk.</div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover align-middle table-bordered text-start">
                        <thead class="table-info text-center">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Subjek</th>
                                <th>Pesan</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($contacts as $index => $contact)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->gmail }}</td>
                                    <td>{{ $contact->subject }}</td>
                                    <td class="text-start">{{ Str::limit($contact->message, 100) }}</td>
                                    <td>
                                        <span class="badge badge-date">
                                            {{ $contact->created_at->format('d M Y, H:i') }}
                                        </span>
                                    </td>
                                    <td>
                                        <form action="{{ route('contact.destroy', $contact->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm rounded-pill">
                                                <i class="fas fa-trash-alt"></i> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
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
