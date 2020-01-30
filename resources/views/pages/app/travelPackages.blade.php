@extends('layouts.app.app')

@section('title', 'Travel Packages - Travel Q')

@push('prepend-style')
  <link rel="stylesheet" href="{{ url('frontend/assets/libraries/owlcarousel/css/owl.carousel.min.css') }}" />
@endpush

@section('header')
  <header class="hero-packages">
    <div class="owl-carousel">
      <div class="item">
        <img src="{{ url('frontend/assets/image/dest/bali2.jpg') }}" alt="" />
      </div>
      {{-- <div class="item">
        <img src="{{ url('frontend/assets/image/dest/bali4.jpg') }}" alt="" />
      </div>
      <div class="item">
        <img src="{{ url('frontend/assets/image/dest/thai3.jpg') }}" alt="" />
      </div>
      <div class="item">
        <img src="{{ url('frontend/assets/image/dest/mountain.jpg') }}" alt="" />
      </div>
      <div class="item">
        <img src="{{ url('frontend/assets/image/dest/wf4.jpg') }}" alt="" />
      </div> --}}
    </div>

    <div class="bg-x"></div>

    <div class="quote">
      <div class="row justify-content-center">
        <div class="col-lg-6 col-8 text-center">
          <h1>“Live with no excuses and travel with no regrets”</h1>
        </div>
      </div>
    </div>
  </header>
@endsection

@section('content')
  <main class="packages-content mt-5">
    <section class="search-bar">
      <div class="container">
        <h1 class="text-center">Our Travel Collection</h1>
      </div>
      
      <div class="row justify-content-center">
        <div class="col-9">
          <form class="search-form" action=" {{ route('travelSearch') }} " method="GET">
            @csrf
            <input
              class="form-control form-control-sm"
              type="text"
              name="q"
              placeholder="Search Destination"
            />
            <button type="submit" class="btn btnSearch btn-sm">Search</button>
          </form>
        </div>
      </div>
    </section>

    <section class="travel-collection container mt-5">

      @forelse ($items as $item)
          <div
          class="travel-card animate fadeIn"
          style="background-image: url( {{ $item->galleries->count() ? Storage::url($item->galleries->first()->image) : '' }} );"
          data-aos="fade-up"
          data-aos-anchor-placement="top-center"
          data-aos-duration="600"
          data-aos-offset="-250"
        >
            <div class="travel-card-content d-flex flex-column align-items-center">
              <div class="travel-location text-center">
                <h3>{{ $item->title }}</h3>
                <h5>{{ $item->location }}</h5>
              </div>
              <div class="travel-cta">
                <a href="{{ route('detail', $item->slug) }}" class="btn btnKuning">Explore More..</a>
              </div>
            </div>
          </div>
      @empty
          <h1>DATA TIDAK ADA :'(((</h1>
      @endforelse
      

      

      
    </section>
  </main>
@endsection




@push('append-script')
<script src="{{ url('frontend/assets/libraries/owlcarousel/js/owl.carousel.min.js') }}"></script>
  <script>
    AOS.init();


    $(".owl-carousel").owlCarousel({
            loop: true,
            nav: false,
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


    $(window).on('scroll', function () {
      if ($(window).scrollTop()) {
        $('nav').addClass('navbar-sc');
      } else {
        $('nav').removeClass('navbar-sc');
      }
    });
  </script>
@endpush