@extends('layout.template')

@section('title', 'Contact')

@section('content')

<style>
  .contact {
  padding-top: 40px; /* Atur sesuai kebutuhan */
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
    color: #0b2e4e;
  }

  .description-title {
    color: #0b2e4e;
    border-bottom: 3px solid #0b2e4e;
    padding-bottom: 2px;
  }

  .info-item {
    background: #f7f9fc;
    padding: 20px;
    border-radius: 8px;
    margin-bottom: 20px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);
    align-items: center;
  }

  .info-item i {
    font-size: 32px;
    color: #0b63f5;
    margin-right: 20px;
    background: #e5efff;
    padding: 12px;
    border-radius: 50%;
  }

  .info-item h3 {
    font-size: 18px;
    margin-bottom: 5px;
    font-weight: 600;
    color: #0b2e4e;
  }

  .info-item p {
    margin: 0;
    font-size: 15px;
    color: #444;
  }

  .contact-form input,
  .contact-form textarea {
    border-radius: 8px;
    border: 1px solid #e0e0e0;
    box-shadow: none;
    font-size: 15px;
    width: 100%;
    padding: 10px 15px;
  }

  .contact-form textarea {
    resize: vertical;
  }

  .btn-contact {
    background: #0b63f5;
    color: white;
    padding: 12px 30px;
    font-size: 16px;
    font-weight: 500;
    border-radius: 30px;
    transition: 0.3s;
    box-shadow: 0 8px 20px rgba(11, 99, 245, 0.25);
    border: none;
  }

  .btn-contact:hover {
    background: #094ec1;
    box-shadow: 0 8px 20px rgba(11, 99, 245, 0.4);
  }

  @media (max-width: 768px) {
    .section-title div {
      font-size: 26px;
    }

    .info-item i {
      font-size: 28px;
    }
  }
</style>

<section id="contact" class="contact">
  <div class="container section-title" data-aos="fade-up">
    <h2>Contact</h2>
    <div><span>Check Our</span> <span class="description-title">Contact</span></div>
  </div>

  <div class="container" data-aos="fade" data-aos-delay="100">
    <div class="row gy-4">

      <div class="col-lg-4">
        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
          <i class="bi bi-geo-alt flex-shrink-0"></i>
          <div>
            <h3>Address</h3>
            <p>Jl. Kampus, Limau Manis, Kec. Pauh, Kota Padang, Sumatera Barat 25164</p>
          </div>
        </div>

        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
          <i class="bi bi-telephone flex-shrink-0"></i>
          <div>
            <h3>Call Us</h3>
            <p>(0834) 983492</p>
          </div>
        </div>

        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
          <i class="bi bi-envelope flex-shrink-0"></i>
          <div>
            <h3>Email Us</h3>
            <p>m.dzaky3105@gmail.com</p>
          </div>
        </div>
      </div>

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
