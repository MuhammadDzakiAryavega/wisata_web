@extends('layout.template')

@section('title', 'Contact')

@section('content')

<style>
  :root {
    --primary-color: #188a5c;
    --primary-hover: #136c48;
    --primary-shadow: rgba(24, 138, 92, 0.25);
  }

  .contact {
    padding-top: 40px;
  }

  .section-title {
    text-align: left;
    margin-bottom: 40px;
  }

  .section-title h2 {
    font-size: 16px;
    letter-spacing: 2px;
    color: #999;
    font-weight: 600;
    text-transform: uppercase;
  }

  .section-title div {
    font-size: 32px;
    font-weight: bold;
    color: var(--primary-color);
  }

  .description-title {
    color: var(--primary-color);
    border-bottom: 3px solid var(--primary-color);
    padding-bottom: 2px;
  }

  .info-item {
    background: #f0f4f9;
    padding: 20px;
    border-radius: 10px;
    margin-bottom: 20px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.06);
    display: flex;
    align-items: center;
    gap: 15px;
    animation: fadeUp 0.6s ease both;
  }

  .info-item i {
    font-size: 28px;
    color: var(--primary-color);
    background: #d2f0e3;
    padding: 14px;
    border-radius: 50%;
    transition: background 0.3s, transform 0.3s;
  }

  .info-item:hover i {
    background: #b8e9d4;
    transform: scale(1.1);
  }

  .info-item h3 {
    font-size: 18px;
    font-weight: 600;
    color: var(--primary-color);
    margin-bottom: 5px;
  }

  .info-item p {
    margin: 0;
    font-size: 15px;
    color: #444;
  }

  .contact-form {
    animation: fadeInUp 0.6s ease-in-out both;
    background-color: #ffffff;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
  }

  .contact-form input,
  .contact-form textarea {
    border-radius: 8px;
    border: 1px solid #cbd5e0;
    box-shadow: none;
    font-size: 15px;
    width: 100%;
    padding: 10px 15px;
    transition: all 0.3s ease;
  }

  .contact-form input:focus,
  .contact-form textarea:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 4px rgba(24, 138, 92, 0.1);
    outline: none;
  }

  .contact-form label {
    font-weight: 500;
    color: var(--primary-color);
  }

  .btn-contact {
    background: var(--primary-color);
    color: white;
    padding: 12px 30px;
    font-size: 16px;
    font-weight: 500;
    border-radius: 30px;
    transition: 0.3s;
    box-shadow: 0 8px 20px var(--primary-shadow);
    border: none;
  }

  .btn-contact:hover {
    background: var(--primary-hover);
    box-shadow: 0 8px 20px rgba(24, 138, 92, 0.4);
  }

  @keyframes fadeUp {
    from {
      opacity: 0;
      transform: translateY(20px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  @keyframes fadeInUp {
    from {
      opacity: 0;
      transform: translateY(30px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  @media (max-width: 768px) {
    .section-title div {
      font-size: 26px;
    }

    .info-item {
      flex-direction: column;
      align-items: flex-start;
    }

    .info-item i {
      margin-bottom: 10px;
    }
  }
</style>

<section id="contact" class="contact">
  <div class="container section-title">
    <h2>Contact</h2>
    <div><span>Berikan Masukan Kepada</span> <span class="description-title">Kami</span></div>
  </div>

  <div class="container">
    <div class="row gy-4">

      {{-- Contact Info --}}
      <div class="col-lg-4">
        <div class="info-item">
          <i class="fas fa-map-marker-alt"></i>
          <div>
            <h3>Address</h3>
            <p>Jl. Jagabaya, Kubu Dalam Parak Karakah, Kec. Padang Tim., Kota Padang, Sumatera Barat 25147</p>
          </div>
        </div>

        <div class="info-item">
          <i class="fas fa-phone-alt"></i>
          <div>
            <h3>Call Us</h3>
            <p>(0834) 983492</p>
          </div>
        </div>

        <div class="info-item">
          <i class="fas fa-envelope"></i>
          <div>
            <h3>Email Us</h3>
            <p>aryasajaa@gmail.com</p>
          </div>
        </div>
      </div>

      {{-- Contact Form --}}
      <div class="col-lg-8">
        @if(session('success'))
          <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($errors->any())
          <div class="alert alert-danger">
            <ul class="mb-0">
              @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form action="{{ route('contact.store') }}" method="POST" class="contact-form" id="contact-form">
          @csrf
          <div class="row gy-4">
            <div class="col-md-6">
              <input type="text" name="name" class="form-control" placeholder="Your Name" required>
            </div>

            <div class="col-md-6">
              <input type="email" name="gmail" class="form-control" placeholder="Your Email" required>
            </div>

            <div class="col-md-12">
              <input type="text" name="subject" class="form-control" placeholder="Subject" required>
            </div>

            <div class="col-md-12 mb-3">
              <label for="message" class="form-label">Message</label>
              <textarea name="message" class="form-control" id="message" rows="6" placeholder="Your message..." required></textarea>
            </div>

            <div class="col-md-12 text-center">
              <button type="submit" class="btn btn-contact">Send Message</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

@endsection
