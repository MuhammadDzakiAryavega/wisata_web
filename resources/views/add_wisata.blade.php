@extends('layout.template')

@section('content')
<div class="container mt-5">

  @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  @endif

  <div class="card shadow-sm border-0">
    <div class="card-header bg-success text-white">
      <h5 class="mb-0">Tambah Wisata Baru</h5>
    </div>
    <div class="card-body">
      <form action="{{ route('wisata.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
          <label for="title" class="form-label">Nama Wisata</label>
          <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div class="mb-3">
          <label for="kecamatan" class="form-label">Kecamatan</label>
          <input type="text" class="form-control" id="kecamatan" name="kecamatan" required>
        </div>

        <div class="mb-3">
          <label for="description" class="form-label">Deskripsi</label>
          <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>

        <div class="mb-3">
          <label for="category_id" class="form-label">Kategori</label>
          <select class="form-select" name="category_id" required>
            <option value="" disabled selected>Pilih Kategori</option>
            @foreach ($categories as $category)
              <option value="{{ $category->id }}">{{ $category->category_name }}</option>
            @endforeach
          </select>
        </div>

        <div class="mb-3">
          <label for="year" class="form-label">Tahun Dibuat</label>
          <select name="year" class="form-select" required>
            <option value="" disabled selected>Pilih Tahun</option>
            @for ($i = date('Y'); $i >= 1900; $i--)
              <option value="{{ $i }}">{{ $i }}</option>
            @endfor
          </select>
        </div>

        <div class="mb-3">
          <label for="cover_image" class="form-label">Gambar</label>
          <input type="file" class="form-control" name="cover_image" accept="image/*">
        </div>

        <div class="d-flex justify-content-between">
          <a href="/" class="btn btn-secondary">Kembali</a>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
