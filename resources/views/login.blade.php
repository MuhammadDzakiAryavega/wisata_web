@extends('layout.template')

@section('title', 'Login')

@section('content')
<style>
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
    }

    .login-container {
        width: 100%;
        max-width: 500px;
        background-color: #ffffff;
        border-radius: 15px;
        box-shadow: 0 6px 25px rgba(0, 0, 0, 0.12);
        padding: 50px;
    }

    .login-title {
        text-align: center;
        margin-bottom: 30px;
        font-weight: bold;
        color: #188a5c;
    }

    .form-label, .form-check-label {
        color: #188a5c;
        font-weight: 500;
    }

    .btn-login {
        background-color: #188a5c;
        border: none;
        width: 100%;
    }

    .btn-login:hover {
        background-color: #146c4b;
    }

    .register-text {
        text-align: center;
        margin-top: 20px;
    }

    .register-text a {
        color: #188a5c;
        font-weight: 600;
        text-decoration: none;
    }

    .register-text a:hover {
        text-decoration: underline;
    }
</style>

<div class="d-flex justify-content-center align-items-center min-vh-100">
    <div class="login-container">
        <h3 class="login-title">Login Akun Anda</h3>

        {{-- Pesan dari session --}}
        @if (session('message'))
            <div class="alert alert-warning">
                {{ session('message') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}

                @if (session('error') === 'Email Anda belum diverifikasi. Silakan cek email Anda.')
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0">Kirim ulang email verifikasi</button>
                    </form>
                @endif
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email"
                       class="form-control @error('email') is-invalid @enderror"
                       id="email"
                       name="email"
                       value="{{ old('email') }}"
                       required>
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password"
                       class="form-control @error('password') is-invalid @enderror"
                       id="password"
                       name="password"
                       required>
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label" for="remember">Ingat saya</label>
            </div>

            <button type="submit" class="btn btn-login text-white">Masuk</button>

            <div class="register-text">
                <p class="mt-3 mb-0">Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang</a></p>
            </div>
        </form>
    </div>
</div>
@endsection
