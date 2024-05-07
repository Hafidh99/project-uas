@extends('layouts.user.app')

@section('content')
@component('components.user.navbar')
@endcomponent
  <!-- main -->
  <main>
    <div class="section-about text-uppercase">
      <div class="container-fluid">
        <div class="row justify-content-between">
          <div class="col-12 col-lg-6 text-start d-flex align-items-center position-relative">
            <h2>Unlock <br>the Secrets <br>of Grave <br>Disease</h2>
          </div>
          <div class="col-12 col-lg-6 text-start ">
            <img class="img-fluid"src="{{ asset('images/aboutt.jpg') }}" alt="">
          </div>

        </div>
      </div>
    </div>

    <div class="section-text">
      <div class="container-fluid px-5">
        <div class="row">
          <div class="col-2 text-start">
            <ul class="list-group list-group-flush">
              <li class="list-group-item fw-bold">Follow Us</li>
              <li class="list-group-item d-flex justify-content-between">
                <a class="text-decoration-none text-dark" href="https://www.instagram.com/ameliaagustinaa_/">Instagram</a>
                <i class="bi bi-arrow-up-right"></i>
              </li>
              <li class="list-group-item d-flex justify-content-between">
                <a class="text-decoration-none text-dark" href="https://www.tiktok.com/@mellagstn_">Tiktok</a>
                <i class="bi bi-arrow-up-right"></i>
              </li>
              <li class="list-group-item d-flex justify-content-between">
                <a class="text-decoration-none text-dark" href="">Twitter</a>
                <i class="bi bi-arrow-up-right"></i>
              </li>

            </ul>
          </div>
          <div class="col-7 section-text-descripton text-start px-5">
            <p>
            <b>Welcome to MediFlow!</b>
            <br><br>
            MediFlow merupakan platform inovatif Sistem Informasi Geografis (SIG) Klinik di Pekanbaru yang menggabungkan teknologi geospasial dengan informasi kesehatan, 
            memberikan solusi terintegrasi bagi masyarakat setempat. Dengan peta interaktif, pengguna dapat dengan mudah menemukan klinik, melihat informasi kesehatan lengkap, 
            dan menjadwalkan janji dengan dokter berdasarkan jadwal yang tertera. Selain itu, sistem ini memfasilitasi ulasan dan rating pengguna, memungkinkan pengalaman pasien sebelumnya menjadi panduan bagi calon pasien dalam memilih layanan kesehatan yang sesuai.
            Dengan fitur jadwal praktik dokter, Anda dapat merencanakan kunjungan Anda tanpa repot. 
            <br><br>
            Kelebihan lainnya adalah integrasi data geografis yang memungkinkan penggunaan informasi spesifik seperti pola penyebaran penyakit dan statistik kesehatan masyarakat. 
            Dengan demikian, SIG Klinik tidak hanya memberikan akses cepat terhadap layanan kesehatan, tetapi juga berperan sebagai alat informasional yang mendukung pengambilan keputusan yang lebih baik dalam merawat kesehatan masyarakat Pekanbaru. 
            Dengan privasi dan keamanan data sebagai prioritas utama, sistem ini membawa efisiensi dan kenyamanan dalam pengelolaan informasi kesehatan di tingkat lokal.
          </p>
          </div>
          <div class="col-3 section-text-quote text-start">
            <p>"Health is not just the absence of illness, but a state of balance and overall well-being. Taking care of the body, mind, and soul diligently is the best investment for a meaningful future."
            <p class="text-secondary text-end">WORDS BY</p>
            <p class="autor text-end">Amelia Agustina</p>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- footer -->
  <footer class="section-footer list-unstyled bg-dark mt-5 mb-4 p-5">
    <div class="container-fluid p-5">
      <div class="row justify-content-center">
        <div class="section-footer-logo col-9 mr-5">
          <img src="{{ asset('images/footer-logo.png') }}" alt="">
          <p>Explore a world of healthy with our online hub. 
            Stay connected with us through our social media channels to receive the latest updates, tips, and tricks from our passionate community. 
            Let your health journey continue with our curated collection of health information and helpful guides</p>
        </div>
        <div class="col-1">

        </div>
        <div class="section-footer-link col-1">
          <h5>More</h5>
            <ul class="list-unstyled ">
              <li><a href="{{ route('about') }}">About Us</a></li>
              <li><a href="{{ route('cookingrecipes') }}">Information</a></li>
              <li><a href="{{ route('contact') }}">Contact</a></li>
            </ul>
        </div>
        <div class="section-footer-link col-1">
          <h5>Follow Us</h5>
            <ul class="list-unstyled" >
              <li><a href="https://www.instagram.com/ameliaagustinaa_/">Instagram</a></li>
              <li><a href="https://www.tiktok.com/@mellagstn_">Tiktok</a></li>
              <li><a href="#">Twitter</a></li>
            </ul>
        </div>
      </div>
    </div>

    <div class="copyright container-fluid">
      <div class="row border-top justify-content-center align-items-center pt-5">
        <div class="col-auto text-white">
          <p>2024 Copyright . All rights reserved</p>
        </div>
      </div>
    </div>
  </footer>
@endsection
