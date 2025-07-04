@extends('admin.sidebar')

@section('title', 'List User')

@section('content')

<style>
    .card-rounded {
        background: white;
        border-radius: 20px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        padding: 30px;
    }

    .table thead th,
    .table tbody td {
        vertical-align: middle;
        text-align: start;
    }

    .badge-role {
        font-size: 0.85rem;
        padding: 6px 12px;
        border-radius: 999px;
        color: white;
        display: inline-block;
    }

    .badge-role.admin {
        background-color: #38a169;
    }

    .badge-role.user {
        background-color: #718096;
    }

    .truncate-password {
        max-width: 200px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
</style>

<div class="container py-4">
    <div class="card-rounded">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="mb-0"><i class="fas fa-users text-primary me-2"></i>Daftar User</h4>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle text-start">
                <thead class="table-dark text-center">
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
                        <td class="text-center">{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td class="truncate-password">
                            <span class="text-muted small">{{ $user->password }}</span>
                        </td>
                        <td class="text-center">
                            <span class="badge-role {{ $user->role === 'admin' ? 'admin' : 'user' }}">
                                {{ ucfirst($user->role) }}
                            </span>
                        </td>
                        <td class="text-center">{{ $user->created_at->format('d-m-Y H:i') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
