<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Wisata</title>

    <!-- Bootstrap & Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f2f4f7;
            font-family: 'Segoe UI', sans-serif;
        }
        .card {
            border-radius: 1rem;
        }
        .card-header {
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
            font-size: 1.1rem;
            font-weight: 500;
        }
        .form-control:focus, .form-select:focus {
            box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.25);
            border-color: #ffc107;
        }
        .input-group-text {
            background-color: #e9ecef;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="mb-4 text-center">
        <h2 class="fw-semibold">Edit Data Wisata</h2>
        <p class="text-muted">Perbarui informasi wisata sesuai kebutuhan.</p>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-header bg-warning text-dark">
            <i class="fas fa-edit me-2"></i> Form Edit Wisata
        </div>
        <div class="card-body p-4">
            <form action="{{ route('wisata.update', $wisata->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Nama Wisata</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                            <input type="text" class="form-control" name="title" value="{{ $wisata->title }}" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Kabupaten</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-city"></i></span>
                            <select class="form-select" name="kabupaten_id" required>
                                <option disabled>Pilih Kabupaten</option>
                                @foreach ($kabupatens as $kabupaten)
                                    <option value="{{ $kabupaten->id }}" {{ $wisata->kabupaten_id == $kabupaten->id ? 'selected' : '' }}>
                                        {{ $kabupaten->kabupaten_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Kecamatan</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-road"></i></span>
                            <input type="text" class="form-control" name="kecamatan" value="{{ $wisata->kecamatan }}" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Kategori</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-tags"></i></span>
                            <select class="form-select" name="category_id" required>
                                <option disabled>Pilih Kategori</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $wisata->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->category_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label">Deskripsi</label>
                        <textarea class="form-control" name="description" rows="3" required>{{ $wisata->description }}</textarea>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Tahun Dibuat</label>
                        <select class="form-select" name="year" required>
                            <option disabled>Pilih Tahun</option>
                            @for ($i = date('Y'); $i >= 1900; $i--)
                                <option value="{{ $i }}" {{ $wisata->year == $i ? 'selected' : '' }}>{{ $i }}</option>
                            @endfor
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Gambar Saat Ini</label><br>
                        @if($wisata->cover_image)
                            <img src="{{ asset('images/' . $wisata->cover_image) }}" width="150" class="img-thumbnail mb-2" alt="Gambar">
                        @endif
                        <input type="file" class="form-control mt-2" name="cover_image" accept="image/*">
                    </div>

                    <div class="col-12 d-flex justify-content-between mt-4">
                        <a href="{{ url('/list') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left me-1"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-warning text-dark">
                            <i class="fas fa-save me-1"></i> Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
