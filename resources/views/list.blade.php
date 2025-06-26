@extends('layout.template')

@section('title', 'Daftar Wisata')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Daftar Wisata</h1>

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
    <table class="table table-bordered table-striped mt-3">
        <thead class="table-success">
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Deskripsi</th>
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
                <td>{{ $loop->iteration }}</td>
                <td>{{ $wisata->title }}</td>
                <td>{{ Str::limit($wisata->description, 100) }}</td>
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
                    <a href="{{ route('wisata.show', $wisata->id) }}" class="btn btn-success btn-sm">Detail</a>
                    <a href="{{ route('wisata.edit', $wisata->id) }}" class="btn btn-warning btn-sm">Edit</a>
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
    <div class="mt-4">
        {{ $wisatas->links('pagination::bootstrap-5') }}
    </div>
    @else
        <div class="alert alert-info mt-4">Belum ada data wisata.</div>
    @endif
</div>
@endsection
