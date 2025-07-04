@extends('admin.sidebar')

@section('title', 'List User')

@section('content')

<style>
    .table-container {
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    table.table-hover tbody tr:hover {
        background-color: #f8f9fa;
    }

    .table thead th,
    .table tbody td {
        vertical-align: middle;
        text-align: start;
    }
</style>

<div class="container">
    <h2 class="mb-4"><i class="fas fa-users me-2 text-primary"></i>Daftar User</h2>

    <div class="table-container">
        <div class="table-responsive">
            <table class="table table-hover table-bordered text-start align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Password (hash)</th>
                        <th>Role</th>
                        <th>Dibuat</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <span class="text-muted" style="font-size: 0.8rem;">
                                {{ Str::limit($user->password, 15, '...') }}
                            </span>
                        </td>
                        <td>
                            <span class="badge {{ $user->role === 'admin' ? 'bg-success' : 'bg-secondary' }}">
                                {{ ucfirst($user->role) }}
                            </span>
                        </td>
                        <td>{{ $user->created_at->format('d-m-Y H:i') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
