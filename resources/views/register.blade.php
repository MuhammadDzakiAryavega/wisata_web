@extends('layout.template')

@section('title', 'Register')

@section('content')
<style>
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
    }

    .register-container {
        width: 100%;
        max-width: 500px;
        background-color: #ffffff;
        border-radius: 15px;
        box-shadow: 0 6px 25px rgba(0, 0, 0, 0.12);
        padding: 50px;
    }

    .register-title {
        text-align: center;
        margin-bottom: 30px;
        font-weight: bold;
        color: #188a5c;
    }

    .form-label {
        color: #188a5c;
        font-weight: 500;
    }

    .btn-register {
        background-color: #188a5c;
        border: none;
        width: 100%;
    }

    .btn-register:hover {
        background-color: #146c4b;
    }

    .login-text {
        text-align: center;
        margin-top: 20px;
    }

    .login-text a {
        color: #188a5c;
        font-weight: 600;
        text-decoration: none;
    }

    .login-text a:hover {
        text-decoration: underline;
    }
</style>

<div class="d-flex justify-content-center align-items-center min-vh-100">
    <div class="register-container">
        <h3 class="register-title">Daftar Akun Baru</h3>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('register.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror"
                       name="name" value="{{ old('name') }}" required>
                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Alamat Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror"
                       name="email" value="{{ old('email') }}" required>
                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Kata Sandi</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror"
                       name="password" required>
                @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Ulangi Kata Sandi</label>
                <input type="password" class="form-control" name="password_confirmation" required>
            </div>

            <button type="submit" class="btn btn-register text-white">Daftar</button>

            <div class="login-text">
                <p class="mt-3 mb-0">Sudah punya akun? <a href="{{ route('login.form') }}">Login di sini</a></p>
            </div>
        </form>
    </div>
</div>
@endsection
