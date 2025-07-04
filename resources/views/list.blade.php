@extends('admin.sidebar')

@section('title', 'Daftar Wisata')

@section('content')

<style>
    .table-hover tbody tr:hover {
        background-color: #f1f5f9;
    }

    .content-wrapper {
        padding: 20px;
    }
</style>

<div class="content-wrapper">
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
                    <thead class="table-success text-center">
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

@endsection
