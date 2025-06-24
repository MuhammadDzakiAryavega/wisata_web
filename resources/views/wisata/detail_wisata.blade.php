@extends('layout.template')

@section('title', 'Detail Wisata')

@section('content')
<div class="container mt-5">
    <div class="card shadow">
        <div class="row g-0">
            {{-- Gambar di sebelah kiri --}}
            <div class="col-md-5">
                @if ($wisata->cover_image)
                    <img src="{{ asset('images/' . $wisata->cover_image) }}" class="img-fluid rounded-start" alt="{{ $wisata->title }}">
                @else
                    <img src="https://via.placeholder.com/400x300" class="img-fluid rounded-start" alt="Tidak ada gambar">
                @endif
            </div>

            {{-- Informasi di sebelah kanan --}}
            <div class="col-md-7">
                <div class="card-body">
                    <h3 class="card-title">{{ $wisata->title }}</h3>
                    <p><strong>Kecamatan:</strong> {{ $wisata->kecamatan }}</p>
                    <p><strong>Deskripsi:</strong> {{ $wisata->description }}</p>
                    <p><strong>Tahun di buat:</strong> {{ $wisata->year }}</p>
                    <p><strong>Kategori:</strong> {{ $wisata->category->category_name ?? '-' }}</p>

                    <a href="{{ route('wisata.list') }}" class="btn btn-secondary mt-3">Kembali ke List</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
