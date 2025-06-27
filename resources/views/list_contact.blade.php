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
            padding: 20px;
            transition: margin-left 0.3s ease;
        }

        .sidebar.expanded ~ .content {
            margin-left: 200px;
        }
    </style>
</head>
<body>

{{-- Sidebar --}}
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

    <a href="#" class="menu-item mt-auto mb-4" onclick="event.preventDefault(); confirmLogout();">
        <i class="fas fa-sign-out-alt"></i>
        <span>Logout</span>
    </a>

    {{-- Logout form --}}
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>

{{-- Konten --}}
<div class="content">
    <div class="container">
        <h1 class="mb-4">Daftar Pesan Masuk</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($contacts->isEmpty())
            <div class="alert alert-warning">Belum ada pesan yang masuk.</div>
        @else
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-info">
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
                                <td>{{ $contact->message }}</td>
                                <td>{{ $contact->created_at->format('d M Y, H:i') }}</td>
                                <td>
                                    <form action="{{ route('contact.destroy', $contact->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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
        @endif
    </div>
</div>

<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('expanded');

        const items = sidebar.querySelectorAll('.menu-item');
        items.forEach(item => {
            item.style.animation = 'none';
            void item.offsetWidth;
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
