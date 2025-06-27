@extends('layout.template')

@section('title', 'Login')

@section('content')
<style>
    .login-container {
        max-width: 500px;
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        padding: 40px;
        margin-top: 60px;
    }

    .login-title {
        text-align: center;
        margin-bottom: 30px;
        font-weight: bold;
        color: #188a5c;
    }

    .form-label {
        color: #188a5c;
        font-weight: 500;
    }

    .btn-login {
        background-color: #188a5c;
        border: none;
        width: 100%;
    }

    .btn-login:hover {
        background-color: #188a5c;
    }

    .text-muted {
        font-size: 0.9rem;
    }

    .form-check-label {
        color: #188a5c;
    }
</style>

<div class="container d-flex justify-content-center">
    <div class="login-container">
        <h3 class="login-title">Login Akun Anda</h3>

        <form action="/login" method="POST">
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
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <div class="form-text text-muted">Kami tidak akan membagikan email Anda kepada siapa pun.</div>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" 
                       class="form-control @error('password') is-invalid @enderror" 
                       id="password" 
                       name="password" 
                       required>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember">
                <label class="form-check-label" for="remember">Ingat saya</label>
            </div>

            <button type="submit" class="btn btn-login btn-lg text-white">Masuk</button>
        </form>
    </div>
</div>
@endsection
