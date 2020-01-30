@extends('layouts.auth.auth')

@section('title', 'Login - Travel Q')
    

@section('content')
<main class="login">
  <div class="half-bg" style="background-image: url( {{ url('frontend/assets/image/dest/mountain2.jpg') }} );"></div>
  <section class="login-container">
      <div class="container">
          <div class="row">
              <div class="col-lg-8 login-gallery-col">
                  <div class=" login-gallery d-flex flex-wrap">
                      <div class="img-thumb img-thumb-x">
                          <img src="{{ url('frontend/assets/image/dest/thai6.jpg') }}" alt="">
                      </div>

                      <div class="img-thumb img-thumb-y ml-4">
                          <img src="{{ url('frontend/assets/image/dest/wf2.jpg') }}" alt="">
                      </div>

                      <div class="img-thumb img-thumb-x" style="margin-top: -360px;height: 350px;">
                          <img src="{{ url('frontend/assets/image/dest/compas.jpg') }}" alt="">
                      </div>

                  </div>
              </div>


              <div class="col-lg-4">
                  <div class="login-card" style="margin-top: 80px;">
                      <div class="card animated wobble">
                          <div class="card-body">

                              <div class="logo text-center">
                                  <img src="{{ url('frontend/assets/image/icons/TravelQ.png') }}" width="200">
                              </div>
                              <hr>

                              <h5 class="card-title text-center"> Login To Your Account </h5>

                              <form method="POST" action="{{ route('login') }}">
                                  @csrf
                                  <div class="form-group">
                                      <label for="email">{{ __('E-Mail Address') }}</label>
                                      <input id="email" type="email"
                                          class="form-control @error('email') is-invalid @enderror" name="email"
                                          value="{{ old('email') }}" required autocomplete="email" autofocus>

                                      @error('email')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                      @enderror

                                  </div>
                                  <div class="form-group">
                                      <label for="password">{{ __('Password') }}</label>
                                      <input id="password" type="password"
                                          class="form-control @error('password') is-invalid @enderror"
                                          name="password" required autocomplete="current-password">

                                      @error('password')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                      @enderror
                                  </div>
                                  <div class="form-group form-check">
                                      <input class="form-check-input" type="checkbox" name="remember"
                                          id="remember" {{ old('remember') ? 'checked' : '' }}>

                                      <label class="form-check-label" for="remember">
                                          {{ __('Remember Me') }}
                                      </label>
                                  </div>
                                  <button type="submit" class="btn btn-login">Log In</button>
                              </form>
                              <hr>
                              <small class="text-muted">Doesn't have an account?. <a href="{{ route('register') }}"> Click
                                      here to create one
                                  </a></small>


                          </div>
                      </div>
                  </div>
              </div>
          </div>


      </div>
      </div>


  </section>
</main>
@endsection