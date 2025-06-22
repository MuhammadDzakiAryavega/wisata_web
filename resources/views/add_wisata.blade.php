@extends('layout.template')

@section('content')
<div class="container">

    {{-- Tampilkan pesan sukses jika ada --}}
    @if (session('success'))
      <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <h2>Tambah Wisata Baru</h2>

    <form action="{{ route('wisata.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <a href="" class="btn btn-primary mb-3">Data Wisata</a>

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
          <option value="" selected disabled>Pilih Kategori</option>
          <option value="1">Mesjid</option>
          <option value="2">Air Terjun</option>
          <option value="3">Pantai</option>
          <option value="4">Danau</option>
          <option value="5">Museum</option>
          <option value="6">Jembatan</option>
         </select>
      </div>


      <div class="mb-3">
        <label for="year" class="form-label">Tahun</label>
        <select name="year" class="form-select" required>
          <option value="" selected disabled>Pilih Tahun</option>
          @for ($i = date('Y'); $i >= 1900; $i--)
            <option value="{{ $i }}">{{ $i }}</option>
          @endfor
        </select>
      </div>

      <div class="mb-3">
        <label for="cover_image" class="form-label">Gambar</label>
        <div class="input-group mb-3">
          <input type="file" class="form-control" id="inputGroupFile02" name="cover_image" accept="image/*">
          <label class="input-group-text" for="inputGroupFile02">Upload</label>
        </div>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>
@endsection
