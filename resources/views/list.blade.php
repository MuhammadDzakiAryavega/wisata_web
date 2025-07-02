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
            padding: 20px;
            transition: margin-left 0.3s ease;
        }

        .sidebar.expanded ~ .content {
            margin-left: 200px;
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="toggle-btn" onclick="toggleSidebar()">
        <i class="fas fa-bars"></i>
    </div>

    <!-- Menu Utama -->
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

    <!-- Menu Bawah -->
    <div class="bottom-menu">
        <a href="/" class="menu-item mb-2">
                <i class="fas fa-home"></i>
                <span>Lihat Web</span>
            </a>

            <a href="{{ url('/dashboard') }}" class="menu-item mb-2">
                <i class="fas fa-tachometer-alt"></i>
                <span>Back Dashboard</span>
            </a>

        <a href="#" class="menu-item" onclick="event.preventDefault(); confirmLogout();">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
    </div>

    <!-- Logout form -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>

<!-- Konten -->
<div class="content">
    <div class="container">
        <h1 class="mb-4">Daftar Wisata</h1>

        <div class="text-end mb-3">
            <a href="{{ route('wisata.create') }}" class="btn btn-primary">
                <i class="fas fa-plus-circle"></i> Tambah Wisata
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($wisatas->count())
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-sm">
                <thead class="table-success">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Kabupaten</th>
                        <th>Kecamatan</th>
                        <th>Tahun</th>
                        <th>Kategori</th>
                        <th>Cover</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($wisatas as $wisata)
                    <tr>
                        <td>{{ $wisatas->firstItem() + $loop->index }}</td>
                        <td>{{ $wisata->title }}</td>
                        <td>{{ Str::limit($wisata->description, 100) }}</td>
                        <td>{{ $wisata->kabupaten->kabupaten_name ?? '-' }}</td>
                        <td>{{ $wisata->kecamatan }}</td>
                        <td>{{ $wisata->year }}</td>
                        <td>{{ $wisata->category->category_name ?? '-' }}</td>
                        <td>
                            @if(Str::startsWith($wisata->cover_image, 'http'))
                                <img src="{{ $wisata->cover_image }}" width="230" class="img-thumbnail" alt="Cover">
                            @else
                                <img src="{{ asset('images/' . $wisata->cover_image) }}" width="230" class="img-thumbnail" alt="Cover">
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('wisata.edit', $wisata->id) }}" class="btn btn-warning btn-sm mb-1">Edit</a>
                            <form action="{{ route('wisata.destroy', $wisata->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $wisatas->links('pagination::bootstrap-5') }}
        </div>
        @else
            <div class="alert alert-info">Belum ada data wisata.</div>
        @endif
    </div>
</div>

<!-- Script Sidebar -->
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
