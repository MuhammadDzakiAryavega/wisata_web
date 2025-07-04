<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Wisata</title>

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
            background-color: #f1f5f9;
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
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="mb-0">📍 Daftar Wisata</h3>
                <a href="{{ route('wisata.create') }}" class="btn btn-success rounded-pill">
                    <i class="fas fa-plus-circle me-1"></i> Tambah Wisata
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success rounded-3">{{ session('success') }}</div>
            @endif

            @if($wisatas->count())
                <div class="table-responsive">
                    <table class="table table-hover align-middle table-bordered text-start">
                        <thead class="table-success text-center"> <!-- atau text-start jika ingin rata kiri semua -->
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Kabupaten</th>
                                <th>Kecamatan</th>
                                <th>Tahun</th>
                                <th>Kategori</th>
                                <th>Rating</th>
                                <th>Cover</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($wisatas as $wisata)
                            <tr>
                                <td>{{ $wisatas->firstItem() + $loop->index }}</td>
                                <td>{{ $wisata->title }}</td>
                                <td class="text-start">{{ Str::limit($wisata->description, 80) }}</td>
                                <td>{{ $wisata->kabupaten->kabupaten_name ?? '-' }}</td>
                                <td>{{ $wisata->kecamatan }}</td>
                                <td>{{ $wisata->year }}</td>
                                <td>{{ $wisata->category->category_name ?? '-' }}</td>
                                <td>
                                    <span class="badge bg-warning text-dark fs-6">
                                        ★ {{ number_format($wisata->rating, 1) ?? '-' }}
                                    </span>
                                </td>
                                <td>
                                    @if(Str::startsWith($wisata->cover_image, 'http'))
                                        <img src="{{ $wisata->cover_image }}" class="img-thumbnail rounded shadow-sm" style="max-width: 100px;" alt="Cover">
                                    @else
                                        <img src="{{ asset('images/' . $wisata->cover_image) }}" class="img-thumbnail rounded shadow-sm" style="max-width: 100px;" alt="Cover">
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('wisata.edit', $wisata->id) }}" class="btn btn-warning btn-sm mb-1">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('wisata.destroy', $wisata->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-center mt-3">
                    {{ $wisatas->links('pagination::bootstrap-5') }}
                </div>
            @else
                <div class="alert alert-info text-center rounded-3">Belum ada data wisata.</div>
            @endif
        </div>
    </div>
</div>

<!-- Script Sidebar -->
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
