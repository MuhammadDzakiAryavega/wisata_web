@extends('admin.sidebar')

@section('title', 'Dashboard')

@section('content')
<style>
    html, body {
        margin: 0;
        padding: 0;
        height: 100%;
    }

    .content {
        margin: 0 !important;
        padding: 0 !important;
        width: 100%;
    }

    .dashboard-wrapper {
        position: absolute;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        z-index: 0;
    }

    .dashboard-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        filter: brightness(0.6);
        display: block;
    }

    .dashboard-overlay {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
        text-align: center;
        z-index: 2;
        width: 100%;
        padding: 0 20px;
    }

    .dashboard-overlay h1,
    .dashboard-overlay p {
        opacity: 0;
        transform: translateY(20px);
        animation: fadeInUp 1s forwards;
    }

    .dashboard-overlay h1 {
        font-size: 3rem;
        font-weight: bold;
        animation-delay: 0.3s;
    }

    .dashboard-overlay p {
        font-size: 1.2rem;
        animation-delay: 0.6s;
    }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<div class="dashboard-wrapper">
    <img src="{{ asset('images/dashboard2.jpg') }}" alt="Dashboard Image" class="dashboard-image">
    <div class="dashboard-overlay">
        <h1>Selamat Datang</h1>
        <h1>di halaman Dashboard</h1>
        <p>Kelola data wisata Anda dengan mudah dan efisien.</p>
    </div>
</div>
@endsection
