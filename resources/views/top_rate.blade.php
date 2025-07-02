@extends('layout.template')

@section('title', 'Top Rated')

@section('content')

<style>
    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-radius: 10px;
        overflow: hidden;
        opacity: 0;
        transform: translateY(20px);
        animation: fadeInUp 0.5s forwards;
    }

    .card:hover {
        transform: translateY(-5px) scale(1.02);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
    }

    .card-img-top {
        height: 200px;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .card:hover .card-img-top {
        transform: scale(1.05);
    }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<div class="container mt-4">
    <h1 class="mb-4">Wisata Favorit</h1>

    @if ($wisatas->isEmpty())
        <div class="alert alert-warning">
            Tidak ada data top rated.
        </div>
    @else
        <div class="row">
            @foreach ($wisatas as $index => $wisata)
                <div class="col-md-4 mb-4">
                    <div class="card h-100" style="animation-delay: {{ $index * 0.1 }}s;">
                        @php
                            $imagePath = Str::startsWith($wisata->cover_image, 'http') 
                                ? $wisata->cover_image 
                                : asset('images/' . $wisata->cover_image);
                        @endphp
                        <img src="{{ $imagePath }}" class="card-img-top" alt="Gambar {{ $wisata->title }}">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $wisata->title }}</h5>
                            <p class="card-text mb-3">
                                {{ \Illuminate\Support\Str::limit($wisata->description, 100) }}
                            </p>
                            <a href="{{ route('wisata.show', $wisata->id) }}" class="btn btn-success mt-auto">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
