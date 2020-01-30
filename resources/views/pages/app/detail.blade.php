@extends('layouts.app.app')

@section('title')
{{ $item->title }} - Travel Q
@endsection

@push('prepend-style')
  <link rel="stylesheet" href="{{ url('frontend/assets/libraries/owlcarousel/css/owl.carousel.min.css') }}" />
@endpush
  
@section('header')
  <header class="hero-detail">
    <div class="owl-carousel">
        @foreach ($item->galleries as $gallery)
        <div class="item">
          <img src="{{ Storage::url($gallery->image) }}" alt="" />
        </div>
        @endforeach
            
    </div>

    <div class="bg-x"></div>

    <div class="header-content">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 about-trip">
            <i class="fas fa-plane-departure"></i>
            <div class="detail">
              <h3>Departure</h3>
              <p>{{ date('l, j F Y', strtotime($item->departure)) }}</p>
            </div>
          </div>

          <div class="col-lg-4 about-trip">
            <i class="fas fa-globe-asia"></i>
            <div class="detail">
              <h3>Location</h3>
              <p>{{ $item->location }}</p>
            </div>
          </div>

          <div class="col-lg-4 about-trip">
            <i class="fas fa-star"></i>
            <div class="detail">
              <h3>Type Of Trip</h3>
              <p>{{ $item->typeOfTrip }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
@endsection


@section('content')
  <main class="detailv2-content">

    <section class="service">
      <div class="container-fluid">
        <h1 class="text-center">Service Include</h1>
        <div class="card">
          <div class="card-body d-flex flex-wrap">



            <div class="service-list d-flex">
              <img src="{{ url('frontend/assets/image/icons/hotel.png') }}" class="service-icon">
              <div class="service-text">
                <p class="service-title">Hotel</p>
                <p class="service-desc">5 stars hotel for spending the night</p>
              </div>
            </div>


            <div class="service-list d-flex">
              <img src="{{ url('frontend/assets/image/icons/goggles.png') }}" class="service-icon">
              <div class="service-text">
                <p class="service-title">Snorkling</p>
                <p class="service-desc">See beautiful sea</p>
              </div>
            </div>


            <div class="service-list d-flex">
              <img src="{{ url('frontend/assets/image/icons/sailboat.png') }}" class="service-icon">
              <div class="service-text">
                <p class="service-title">Boat</p>
                <p class="service-desc">For exploring the sea</p>
              </div>
            </div>




          </div>
        </div>
      </div>
    </section>

    <section class="about">
      <div class="container mt-4">
        <div class="row">
          <div class="col-lg-8" style="min-height:40vh !important">
            <div class="card">
              <div class="card-body">
                <h2 class="text-center">{{ $item->title }}</h2>
                <p>{{ $item->about }}</p>

               
              </div>
            </div>

          </div>

          <div class="col-lg-4">
            <div class="card animated bounceInUp p-2">
              <div class="card-body">
                <h5 class="card-title font-weight-bold">Information</h5>
                
                <hr>


                <table class="trip-info" style="width: 100%;">

                  <tr>
                    <th width="50%">Date of Departure</th>
                    <td width="50%" class="text-right text-muted">{{date(' j F Y', strtotime($item->departure))}}</td>
                  </tr>

                  <tr>
                    <th width="50%">Duration</th>
                    <td width="50%" class="text-right text-muted">{{$item->duration}}</td>
                  </tr>

                  <tr>
                    <th width="50%">Type of Trip</th>
                    <td width="50%" class="text-right text-muted">{{$item->typeOfTrip}}</td>
                  </tr>

                  <tr>
                    <th width="50%">Price</th>
                    <td width="50%" class="text-right text-muted">Rp.{{ number_format($item->price,2) }}/person</td>
                  </tr>


                </table>
              </div>

              @guest
                <div class="book-now text-center">
                  <a href="{{ route('login') }}" class="btn btn-book ">Login or Register To Join</a>
                </div>
              @endguest

              @auth
                  <form action=" {{ route('checkoutProcess', $item->id) }} "
                    method="POST">
                    @csrf
                    <div class="book-now text-center">
                      <button class="btn btn-book pb-4" type="submit">BOOK ME IN</button>
                    </div>
                  </form>
              @endauth
              


            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection




@push('append-script')
  <script src="{{ url('frontend/assets/libraries/owlcarousel/js/owl.carousel.min.js') }}"></script>
  <script>
    $(".owl-carousel").owlCarousel({
      loop: true,
      margin: 10,
      nav: true,
      animateOut: "fadeOutLeft",
      animateIn: "fadeInRight",
      autoplay: true,
      autoplayTimeout: 5000,
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 1
        },
        1000: {
          items: 1
        }
      }
    });

    $(window).on("scroll", function () {
      if ($(window).scrollTop()) {
        $("nav").addClass("navbar-sc");
      } else {
        $("nav").removeClass("navbar-sc");
      }
    });
  </script>
@endpush