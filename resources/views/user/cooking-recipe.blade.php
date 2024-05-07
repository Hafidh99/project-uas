@extends('layouts.user.app')

@section('content')
@component('components.user.navbar')
@endcomponent

  <!-- main -->
  <section class="section-recipes">
      <div class="container-fluid">
          <div class="section-recipes-heading">
              <h2>Health Information</h2>
          </div>

          <div class="section-recipes-item row justify-content-between">
            @foreach ($recipe as $item)
                <div class="col-md-3 ">
                    <div class="card-item text-start d-flex flex-column">
                    <div class="container">
                        <a href="{{ route('detail',$item->id) }}" class="text-decoration-none">
                        <img src="{{ Storage::url($item->picture) }}" class="rounded-5" alt="">
                        <h4 class="item-name">{{ $item->name }}</h4>
                        <p class="item-desc">{!! $item->description !!}</p>
                        </a>
                    </div>
                    </div>
                </div>
            @endforeach
          </div>
      </div>
  </section>


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
