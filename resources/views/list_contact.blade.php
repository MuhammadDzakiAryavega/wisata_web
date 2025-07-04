@extends('admin.sidebar')

@section('title', 'List Contact')

@section('content')

<style>
    table.table-hover tbody tr:hover {
        background-color: #f9fafb;
    }

    .badge-date {
        font-size: 0.85rem;
        background-color: #e2e8f0;
        color: #2d3748;
    }
</style>

<div class="container">
    <div class="card shadow rounded-4 p-4">
        <h3 class="mb-4">📬 Daftar Pesan Masuk</h3>

        @if(session('success'))
            <div class="alert alert-success rounded-3">{{ session('success') }}</div>
        @endif

        @if($contacts->isEmpty())
            <div class="alert alert-warning text-center rounded-3">Belum ada pesan yang masuk.</div>
        @else
            <div class="table-responsive">
                <table class="table table-hover align-middle table-bordered text-start">
                    <thead class="table-info text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Subjek</th>
                            <th>Pesan</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contacts as $index => $contact)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->gmail }}</td>
                                <td>{{ $contact->subject }}</td>
                                <td class="text-start">{{ Str::limit($contact->message, 100) }}</td>
                                <td>
                                    <span class="badge badge-date">
                                        {{ $contact->created_at->format('d M Y, H:i') }}
                                    </span>
                                </td>
                                <td>
                                    <form action="{{ route('contact.destroy', $contact->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm rounded-pill">
                                            <i class="fas fa-trash-alt"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>

@endsection
