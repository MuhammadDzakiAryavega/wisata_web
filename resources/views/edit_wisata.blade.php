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
    <div class="card-header bg-warning text-dark">
      <h5 class="mb-0">Edit Data Wisata</h5>
    </div>
    <div class="card-body">
      <form action="{{ route('wisata.update', $wisata->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
          <label for="title" class="form-label">Nama Wisata</label>
          <input type="text" class="form-control" id="title" name="title" value="{{ $wisata->title }}" required>
        </div>

        <div class="mb-3">
          <label for="kabupaten_id" class="form-label">Kategori</label>
          <select class="form-select" name="kabupaten_id" required>
            <option value="" disabled>Pilih Kategori</option>
            @foreach ($kabupatens as $kabupaten)
              <option value="{{ $kabupaten->id }}" {{ $wisata->kabupaten_id == $kabupaten->id ? 'selected' : '' }}>
                {{ $kabupaten->kabupaten_name }}
              </option>
            @endforeach
          </select>
        </div>

        <div class="mb-3">
          <label for="kecamatan" class="form-label">Kecamatan</label>
          <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="{{ $wisata->kecamatan }}" required>
        </div>

        <div class="mb-3">
          <label for="description" class="form-label">Deskripsi</label>
          <textarea class="form-control" id="description" name="description" rows="3" required>{{ $wisata->description }}</textarea>
        </div>

        <div class="mb-3">
          <label for="category_id" class="form-label">Kategori</label>
          <select class="form-select" name="category_id" required>
            <option value="" disabled>Pilih Kategori</option>
            @foreach ($categories as $category)
              <option value="{{ $category->id }}" {{ $wisata->category_id == $category->id ? 'selected' : '' }}>
                {{ $category->category_name }}
              </option>
            @endforeach
          </select>
        </div>

        <div class="mb-3">
          <label for="year" class="form-label">Tahun Dibuat</label>
          <select name="year" class="form-select" required>
            <option value="" disabled>Pilih Tahun</option>
            @for ($i = date('Y'); $i >= 1900; $i--)
              <option value="{{ $i }}" {{ $wisata->year == $i ? 'selected' : '' }}>{{ $i }}</option>
            @endfor
          </select>
        </div>

        <div class="mb-3">
          <label class="form-label">Gambar Saat Ini</label><br>
          @if($wisata->cover_image)
            <img src="{{ asset('images/' . $wisata->cover_image) }}" width="150" class="img-thumbnail mb-2" alt="Gambar">
          @endif
          <input type="file" class="form-control" name="cover_image" accept="image/*">
        </div>

        <div class="d-flex justify-content-between">
          <a href="/" class="btn btn-secondary">Kembali</a>
          <button type="submit" class="btn btn-warning">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
