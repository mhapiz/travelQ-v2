<nav class="navbar navbar-expand-lg ">
  <div class="container">
    <a class="navbar-brand" href="{{ route('index') }}">
      <img src="{{ url('frontend/assets/image/icons/TravelQ.png') }}" height="30" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
      aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <img src="{{ url('frontend/assets/image/icons/arrowdown.png') }}" width="20">
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav ml-auto">
        <a class="nav-item nav-link" href="{{ route('index') }}">Home <span class="sr-only">(current)</span></a>
        <a class="nav-item nav-link" href="{{ route('travelPackages') }}">Packages</a>
        <a class="nav-item nav-link mr-3" href="{{ route('myProfile') }}">My Profil</a>


        
     @guest
          <!-- MOBILE BTN FOR LOGIN -->
      <form class="form-inline my-2 my-lg-0 d-block d-md-none">
        <button class="btn btn-login" type="button" onclick="event.preventDefault(); location.href=' {{url('login')}}';">
          LOGIN
        </button>
      </form>

      <!-- DESKTOP BTN FOR LOGIN -->
      <form class="form-inline my-2 my-lg-0 d-none d-md-block">
        <button class="btn btn-login pl-3" type="button" onclick="event.preventDefault(); location.href=' {{url('login')}}';">
          LOGIN
        </button>
      </form>
      @endguest

      @auth
          <!-- MOBILE BTN FOR LOGIN -->
      <form class="form-inline my-2 my-lg-0 d-block d-md-none" action="{{url('logout')}}" method="POST" >
        <button href="#" class="btn btn-login " type="submit">
          @csrf
          LOGOUT
        </button>
      </form>

      <!-- DESKTOP BTN FOR LOGIN -->
      <form class="form-inline my-2 my-lg-0 d-none d-md-block" action="{{url('logout')}}" method="POST" >
        <button href="#" class="btn btn-login px-3" type="submit">
          @csrf
          LOGOUT
        </button>
      </form>
      @endauth

      </div>
    </div>
  </div>
</nav>