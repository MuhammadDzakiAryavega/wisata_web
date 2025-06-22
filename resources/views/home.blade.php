@extends('layout.template')

@section('content')
<!-- Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">

<style>
.hero-section {
    position: relative;
    background: url('/images/mesjid_raya.jpg') no-repeat center center/cover;
    min-height: 100vh;
    width: 100%;
    color: white;
    overflow: hidden;
}

.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    background-color: rgba(0, 128, 128, 0.6);
    display: flex;
    justify-content: flex-start;
    align-items: flex-start;
    flex-direction: column;
    padding: 50px 40px;
    text-align: left;
    animation: fadeIn 1.2s ease-out;
}

.hero-title {
    font-size: 3rem;
    font-weight: 700;
    text-shadow: 2px 2px 8px rgba(0,0,0,0.6);
    animation: slideIn 1s ease-out;
}

.hero-subtitle {
    font-size: 1.4rem;
    margin-top: 1rem;
    max-width: 600px;
    text-shadow: 1px 1px 6px rgba(0,0,0,0.5);
    animation: slideIn 1.2s ease-out;
}

.hero-button {
    margin-top: 2rem;
    background-color: #ffffff;
    color: teal;
    padding: 12px 24px;
    border: none;
    border-radius: 30px;
    font-weight: bold;
    text-transform: uppercase;
    transition: all 0.3s ease-in-out;
    box-shadow: 2px 2px 8px rgba(0,0,0,0.3);
    animation: fadeIn 1.5s ease-out;
}

.hero-button:hover {
    background-color: teal;
    color: white;
    transform: scale(1.05);
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes slideIn {
    from { transform: translateX(-50px); opacity: 0; }
    to { transform: translateX(0); opacity: 1; }
}

@media (max-width: 768px) {
    .hero-title {
        font-size: 2rem;
    }
    .hero-subtitle {
        font-size: 1.1rem;
    }
}
</style>

<div class="hero-section">
    <div class="hero-overlay">
        <h1 class="hero-title">SISTEM INFORMASI</h1>
        <h1 class="hero-title">WISATA SUMATRA BARAT</h1>
        <p class="hero-subtitle">Temukan tempat wisata terbaik untuk liburan Anda dengan pengalaman terbaik dari kami.</p>
        <a href="/list" class="hero-button">Lihat Destinasi</a>
    </div>
</div>
@endsection
