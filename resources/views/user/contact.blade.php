@extends('layouts.user.app')

@section('content')
@component('components.user.navbar')
@endcomponent

  <!-- main -->
  <main>
    <div class="section-contact">
      <div class="container-fluid">
        <div class="row text-start">
          <div class="section-contact-heading">
            <h2>Contact our friendly team</h2>
            <p>let us know how we can help.</p>
            <hr>

          </div>

          <div class="section-contact-sevice">
            <div class="container-fluid">
            <p class="text-start">Have something you’d like to let us know? Whether you have a comment on a disease or an idea to share, we would love to hear from you.
            MediFlow demonstrates its commitment to providing responsive and open communication with users. We invite visitors to share questions, feedback, or specific requests related to the content provided on our website.
            Therefore, this Contact section serves as an important communication bridge between visitors and the team behind the online information on website, offering a variety of location of clinic.
          </p>
            <br>
              <div class="row justify-content-center">
                <div class="col-sm-6 col-md-4 col-lg-3 mx-2">
                  <div class="card-services text-center d-flex flex-column ">
                    <div class="zoom-container text-start border border-secondary-subtle rounded p-3">
                      <i class="bi bi-chat-dots"></i>
                      <br><br><br>
                      <h3>Chat to support</h3>
                      <p>We're here to help</p>
                      <a href="">ameliagstn830@gmail.com</a>
                    </div>
                  </div>
                </div>

                <div class="col-sm-6 col-md-4 col-lg-3 mx-2">
                  <div class="card-services text-center d-flex flex-column ">
                    <div class="zoom-container text-start border border-secondary-subtle rounded p-3">
                      <i class="bi bi-geo-alt"></i>
                      <br><br><br>
                      <h3>Visit us</h3>
                      <p>Visit our office</p>
                      <a href="">View on Google Maps</a>
                    </div>
                  </div>
                </div>

                <div class="col-sm-6 col-md-4 col-lg-3 mx-2">
                  <div class="card-services text-center d-flex flex-column ">
                    <div class="zoom-container text-start border border-secondary-subtle rounded p-3">
                      <i class="bi bi-telephone"></i>
                      <br><br><br>
                      <h3>Call us</h3>
                      <p>Mon-Fri from 8am to 5pm</p>
                      <a href="">+628 9623 2566 80</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
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
          <p>
            Explore a world of healthy with our online hub. 
            Stay connected with us through our social media channels to receive the latest updates, tips, and tricks from our passionate community. 
            Let your health journey continue with our curated collection of health information and helpful guides
          </p>
        </div>
        <div class="col-1">

        </div>
        <div class="section-footer-link col-1">
          <h5>More</h5>
            <ul class="list-unstyled ">
              <li><a href="#">About Us</a></li>
              <li><a href="#">Information</a></li>
              <li><a href="#">Contact</a></li>
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
