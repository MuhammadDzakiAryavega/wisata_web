@extends('layout.template')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Daftar Wisata</h1>

    @if ($wisatas->isEmpty())
        <div class="alert alert-warning">
            Tidak ada data wisata untuk ditampilkan.
        </div>
    @else
        <div class="row">
            @foreach ($wisatas as $wisata)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
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
                            <a href="#" class="btn btn-primary mt-auto">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
