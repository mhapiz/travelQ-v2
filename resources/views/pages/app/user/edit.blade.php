@extends('layouts.scd.scd')

@section('title')
    My Profil
@endsection

@section('content')
<main>
  <div class="container">


    <div class="card">
      <div class="card-body">

        <div class="row">
          <div class="col">
            <h2 class="font-weight-bold">Edit Profile</h2>
          </div>
        </div>

        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
                <li> {{$error}} </li>
            @endforeach
          </ul>
        </div>
        @endif

        <hr>

        <form action="{{ route('updateProfile', $user->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          
          <div class="row">
            <div class="col-lg-3">
              <img src="{{ Storage::url($user->avatar) }}" alt="..." class="img-thumbnail" width="100%" >
              <div class="form-group">
                <input type="file" name="avatar" class="form-control" placeholder="avatar">
              </div>
            </div>

            <div class="col-lg-4">

              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{ $user->name }}" id="name" placeholder="{{ $user->name }}">
              </div>

              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}"  placeholder="{{ $user->email }}" disabled>
              </div>

              <div class="form-group">
                <label for="nationality">Nationality</label>
                <input type="text" name="nationality" class="form-control" id="nationality" value="{{ $user->nationality }}">
              </div>

            </div>

            <div class="col-lg-3">

              <div class="form-group">
                <label for="doe_passport">Passport Available Until</label>
                <input type="date" name="doe_passport" class="form-control"  id="doe_passport" value="{{ $user->doe_passport }}">
              </div>

              <div class="form-group mt-4">
                <label for="is_visa">Visa</label>

                <div class="form-inline">

                  <div class="custom-control custom-radio">
                    <input type="radio" id="visa1" name="is_visa" value="1" class="custom-control-input">
                    <label class="custom-control-label" for="visa1">Active</label>
                  </div>

                  <div class="custom-control custom-radio ml-5">
                    <input type="radio" id="visa2" name="is_visa" value="0" class="custom-control-input">
                    <label class="custom-control-label" for="visa2">Unactive</label>
                  </div>

                </div>

              </div>

            </div>

            <div class="col-lg-2 d-flex justify-content-end align-items-end">
              <button type="submit" class="btn btn-primary">Update Profil</button>
            </div>
          </div>

        </form>


      </div>
    </div>


  </div>    
</main>


@endsection

@push('append-style')
  <style>

    main{
      margin-top: 90px;
      min-height: 100vh;
    }

    main .card{
      box-shadow: 0px 0px 8px 1px black;
    }

    

    footer{
      display: none !important;
    }
    nav .navbar-nav span {
        color: #1D1919 !important;
    }
  </style>


@endpush
