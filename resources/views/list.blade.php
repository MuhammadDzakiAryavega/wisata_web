<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Wisata</title>

    <!-- Bootstrap dan Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Daftar Wisata</h1>

        {{-- Tombol tambah --}}
        <div class="mt-3 text-end">
            <a href="{{ route('wisata.create') }}" class="btn btn-primary">
                <i class="fas fa-plus-circle"></i> Add Wisata
            </a>
        </div>

        {{-- Notifikasi sukses --}}
        @if(session('success'))
            <div class="alert alert-success mt-3">{{ session('success') }}</div>
        @endif

        {{-- Tabel data wisata --}}
        @if($wisatas->count())
        <table class="table table-bordered table-striped table-sm mt-3">
            <thead class="table-success">
                <tr>
                    <th>No</th>
                    <th>Judul</th>
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
                            <img src="{{ $wisata->cover_image }}" width="80" alt="Cover">
                        @else
                            <img src="{{ asset('images/' . $wisata->cover_image) }}" width="80" alt="Cover">
                        @endif
                    </td>
                    <td>
                        {{--" class="btn btn-success btn-sm mb-1">Detail</a>--}}
                        <a href="{{ route('wisata.edit', $wisata->id) }}" class="btn btn-warning btn-sm mb-1">Edit</a>
                        <form action="{{ route('wisata.destroy', $wisata->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Pagination --}}
        <div class="mt-3">
            {{ $wisatas->links('pagination::bootstrap-5') }}
        </div>
        @else
            <div class="alert alert-info mt-4">Belum ada data wisata.</div>
        @endif
    </div>

    {{-- CSS tambahan --}}
    <style>
        table.table {
            font-size: 14px;
        }

        table.table tr {
            line-height: 1.3rem;
        }

        table.table td, table.table th {
            padding-top: 6px;
            padding-bottom: 6px;
            vertical-align: middle;
        }

        table.table img {
            max-height: 64px;
            object-fit: cover;
        }

        .btn-sm {
            padding: 3px 8px;
            font-size: 0.8rem;
        }
    </style>
</body>
</html>
