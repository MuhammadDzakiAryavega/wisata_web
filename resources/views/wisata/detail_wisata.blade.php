@extends('layout.template')

@section('title', 'Detail Wisata')

@section('content')
<style>
    .card-custom {
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
    }

    .img-left {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 16px 0 0 16px;
    }

    .card-body-custom {
        padding: 30px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .info-label {
        font-weight: 600;
        color: #333;
        margin-bottom: 4px;
    }

    .info-value {
        margin-bottom: 16px;
        color: #555;
    }

    .btn-custom {
        padding: 10px 20px;
        border-radius: 8px;
        font-weight: 500;
    }

    @media (max-width: 768px) {
        .img-left {
            border-radius: 16px 16px 0 0;
            height: 250px;
        }

        .card-body-custom {
            padding: 20px;
        }
    }
</style>

<div class="container mt-5">
    <div class="card card-custom">
        <div class="row g-0">
            {{-- Gambar kiri --}}
            <div class="col-md-6">
                @if ($wisata->cover_image)
                    <img src="{{ asset('images/' . $wisata->cover_image) }}" alt="{{ $wisata->title }}" class="img-left h-100">
                @else
                    <img src="https://via.placeholder.com/600x400" alt="Tidak ada gambar" class="img-left h-100">
                @endif
            </div>

            {{-- Informasi kanan --}}
            <div class="col-md-6">
                <div class="card-body card-body-custom">
                    <h3 class="mb-4">{{ $wisata->title }}</h3>

                    <div>
                        <div class="info-label">Kabupaten:</div>
                        <div class="info-value">{{ $wisata->kabupaten->kabupaten_name ?? '-' }}</div>
                    </div>

                    <div>
                        <div class="info-label">Kecamatan:</div>
                        <div class="info-value">{{ $wisata->kecamatan }}</div>
                    </div>

                    <div>
                        <div class="info-label">Deskripsi:</div>
                        <div class="info-value text-justify">{{ $wisata->description }}</div>
                    </div>

                    <div>
                        <div class="info-label">Tahun diresmikan:</div>
                        <div class="info-value">{{ $wisata->year }}</div>
                    </div>

                    <div>
                        <div class="info-label">Kategori:</div>
                        <div class="info-value">{{ $wisata->category->category_name ?? '-' }}</div>
                    </div>

                    <a href="/form" class="btn btn-outline-secondary btn-custom mt-2">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
