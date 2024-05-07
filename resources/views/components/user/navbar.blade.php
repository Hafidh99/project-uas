<!-- navbar -->
  <div class="container-fluid">
    <nav class="navbar navbar-expand-lg mt-3 mx-5 px-5  ">
      <div class="container-fluid">
        <div class="navbar-logo ">
          <a class="navbar-brand " href="{{ route('home') }}">
            <img src="{{ asset('images/navbar-logo.png') }}" alt="">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav  mb-2 mb-lg-0 ms-auto">
            <li class="nav-item mx-md-3 ">
              <a class="nav-link" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item mx-md-3">
              <a class="nav-link" href="{{ route('cookingrecipes') }}">Health Information</a>
            </li>
            <li class="nav-item mx-md-3">
              <a class="nav-link" href="{{ route('about') }}">About</a>
            </li>
            <li class="nav-item mx-md-3">
              <a class="nav-link" href="{{ route('contact') }}">Contact</a>
            </li>
          </ul>

          <!-- Button trigger modal -->
          <!-- <div action="" class="form-inline my-2 my-lg-0 d-none d-md-block fs">
            <button type="button" class="btn btn-login btn-md btn-navbar-right rounded-pill my-2 my-sm-0 px-4" data-bs-toggle="modal" data-bs-target="#loginModal">
              Log in
            </button>
          </div> -->
          <!-- Modal -->
          <!-- <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="">
                    <div class="form-heading">
                      <h2>Welcome back</h2>
                      <p class="text-secondary">Welcome back! Please enter your details</p>
                    </div>
                    <div class="form-group">
                      <label for="username">Username</label>
                      <input type="text" class="form-control" id="username" placeholder="Enter your username">
                    </div>
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" class="form-control" id="password" placeholder="Enter your password">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-dark">Sign in</button>
                    <p class="text-center my-3">Don't have an account? <a href="">Sign up</a></p>
                  </form>
                </div>
              </div>
          </div>
        </div> -->
      </div>
    </nav>
  </div>
