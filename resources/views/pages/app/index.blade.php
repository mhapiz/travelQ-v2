@extends('layouts.app.app')

@section('title', 'Home - Travel Q')

@section('header')
  <header class="onIndex" style="background-image: url({{ url('frontend/assets/image/dest/chill2.jpg') }});">
    <div class="intro">
      <h3 class="animated fadeInUpBig">Start Your Journey With Us</h3>
      <a class="btnKuning animated fadeInUpBig" href="{{  route('travelPackages') }}">Get Started</a>
    </div>
  </header>
@endsection

@section('content')
  <main class="home">
    
    <section class="travel-package">
      <div class="container">
        <div class="row">
          <div class="col text-center">
            <h2 class="font-weight-bold">Best Destination</h2>
          </div>
        </div>
        <div class="destination mt-3">
          <div class="left">
            <a href="#">
              <div
                class="left1 dest"
                data-aos="fade-right"
                style="background: url( {{ url('frontend/assets/image/dest/beach.jpg') }} ) ;"
              >
                <div class="text px-2 py-1">
                  <h4 class="font-weight-bold">Go to the Beach</h4>
                  <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  </p>
                </div>
              </div>
            </a>
          </div>

          <div class="right">
            <a href="#">
              <div
                class="right1 dest"
                data-aos="fade-left"
                style="background: url( {{ url('frontend/assets/image/dest/gun.jpg') }} ) ;"
              >
                <div class="text px-2">
                  <h4 class="font-weight-bold">Go to the Mountain</h4>
                  <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  </p>
                </div>
              </div>
            </a>

            <a href="{{ route('travelPackages') }}">
              <div
                class="right1 dest"
                data-aos="fade-left"
                style="background: url( {{ url('frontend/assets/image/dest/thai5.jpg') }} ) ;"
              >
                <div class="text px-2">
                  <h4 class="font-weight-bold">Go Anywhere</h4>
                  <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  </p>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </section>

    <section class="partner">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <h2 class="font-weight-bold" data-aos="zoom-in-right">Our Partners</h2>
          </div>
          <div class="col-lg-9 our-partners">
            <div data-aos="zoom-in-left">
              <img src="{{ url('frontend/assets/image/icons/airasia.png') }}">
              <img src="{{ url('frontend/assets/image/icons/garuda.png') }}">
              <img src="{{ url('frontend/assets/image/icons/wonderfulindo.png') }}">
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="testi">
      <div class="container">
        <div class="row">
          <div class="col text-center">
            <h1 class="font-weight-bold">What They Say</h1>
          </div>
        </div>

        <div class="row mt-5">
          <div class="col-lg-4">
            <div class="testi-card" data-aos="zoom-in-up" data-aos-offset="300">
              <div class="testi-card-inner text-center">
                <div class="testi-img">
                  <img src="{{ url('frontend/assets/image/people/girl1.png') }}" class="rounded-circle" width="100" height="100">
                </div>
                <div class="testi-name mt-3">
                  <h1>Clara</h1>
                  <p class="text-muted">Designer</p>
                </div>
                <div class="testi-desc">
                  <p>"Lorem ipsum, dolor sit amet consectetur adipisicing elit. Perferendis, fugiat nihil? Delectus,
                    debitis!"</p>
                </div>
                <hr />
                <p class="">Trip to Bali</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="testi-card" data-aos="zoom-in-up" data-aos-offset="300">
              <div class="testi-card-inner text-center">
                <div class="testi-img">
                  <img src="{{ url('frontend/assets/image/people/girl2.png') }}" class="rounded-circle" width="100" height="100">
                </div>
                <div class="testi-name mt-3">
                  <h1>Citra</h1>
                  <p class="text-muted">Student</p>
                </div>
                <div class="testi-desc">
                  <p>"Lorem ipsum, dolor sit amet consectetur adipisicing elit. Perferendis, fugiat nihil? Delectus,
                    debitis!"</p>
                </div>
                <hr />
                <p class="">Trip to Bali</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="testi-card" data-aos="zoom-in-up" data-aos-offset="300">
              <div class="testi-card-inner text-center">
                <div class="testi-img">
                  <img src="{{ url('frontend/assets/image/people/girl3.png') }}" class="rounded-circle" width="100" height="100">
                </div>
                <div class="testi-name mt-3">
                  <h1>Dewi</h1>
                  <p class="text-muted">Chef</p>
                </div>
                <div class="testi-desc">
                  <p>"Lorem ipsum, dolor sit amet consectetur adipisicing elit. Perferendis, fugiat nihil? Delectus,
                    debitis!"</p>
                </div>
                <hr />
                <p class="">Trip to Bali</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection




@push('append-script')
  <script>
    AOS.init();
    $(window).on('scroll', function () {
      if ($(window).scrollTop()) {
        $('nav').addClass('navbar-sc');
      } else {
        $('nav').removeClass('navbar-sc');
      }
    });
  </script>
@endpush