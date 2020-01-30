@extends('layouts.auth.auth')

@section('title', 'Register - Travel Q')


@section('content')
<main class="register">
  <div class="bg-up">
      <img src=" {{ url('frontend/assets/image/dest/ra2.jpg') }}" alt="">
  </div>


  <div class="bg-down">
      <img src=" {{ url('frontend/assets/image/dest/thai3.jpg') }}" alt="">
  </div>


  <div class="container ">
      <div class="row justify-content-center">
          <div class="col-12 col-lg-8">
              <div class="card mt-4 animated flipInX">
                  <div class="card-body">

                      <div class="logo text-center">
                          <img src=" {{ url('frontend/assets/image/icons/TravelQ.png') }}" width="150">
                      </div>
                      <hr>

                      <h5 class="card-title text-center"> Register Your Account </h5>

                      <form method="POST" action="{{ route('register') }}">
                          @csrf

                          <div class="row">
                            <div class="col">
                              <div class="form-group">
                                <label for="name"
                                    class="">{{ __('Name') }}</label>
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus>
  
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                              </div>
                            </div>


                            <div class="col">
                              <div class="form-group">
                                <label for="username"
                                    class="">{{ __('Username') }}</label>
                                <input id="username" type="text"
                                    class="form-control @error('username') is-invalid @enderror" name="username"
                                    value="{{ old('username') }}" required autocomplete="username" autofocus>
  
                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                              </div>
                            </div>


                          </div>
                          

                          <div class="form-group">
                              <label for="email"
                                  class="">{{ __('E-Mail Address') }}</label>
                              <input id="email" type="email"
                                  class="form-control @error('email') is-invalid @enderror" name="email"
                                  value="{{ old('email') }}" required autocomplete="email">

                              @error('email')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                          </div>

                          <div class="form-group">
                              <label for="password"
                                  class="">{{ __('Password') }}</label>
                              <input id="password" type="password"
                                  class="form-control @error('password') is-invalid @enderror" name="password"
                                  required autocomplete="new-password">

                              @error('password')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                          </div>
                          <div class="form-group">
                              <label for="password-confirm"
                                  class="">{{ __('Confirm Password') }}</label>
                              <input id="password-confirm" type="password" class="form-control"
                                  name="password_confirmation" required autocomplete="new-password">
                          </div>

                          <button type="submit" class="btn btn-primary">
                              {{ __('Register') }}
                          </button>
                      </form>
                      <hr>
                      <small class="text-muted text-center">Already have an account?. <a href="login.html"> Click
                              here to login
                          </a></small>


                  </div>
              </div>
          </div>
      </div>
  </div>
</main>
@endsection