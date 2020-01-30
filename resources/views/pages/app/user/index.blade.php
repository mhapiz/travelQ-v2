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
          <div class="col-lg-3">
            <img src="{{ Storage::url(Auth::user()->avatar) }}" alt="..." class="img-thumbnail" width="200px" height="200px">
            <a href="{{ route('editProfile', Auth::user()->id) }}" class="btn btn-secondary" style="width: 200px !important">Update Image</a>

          </div>

          <div class="col-lg-4">
            <p class="name h1"> {{ Auth::user()->name }}</p>
            <p class="email text-muted h5"> {{ Auth::user()->email }} </p>
            <p class="nation h4">{{ Auth::user()->nationality }}</p>
          </div>

          <div class="col-lg-3">
            <p class="h6"> Passport Available Until <br>
               {{ date('l, j F Y', strtotime(Auth::user()->doe_passport))  }}</p>
               <br>
            <p class="h6"> Visa is  {{ Auth::user()->is_visa ? 'Active' : 'N/a' }}</p>
          </div>

          <div class="col-lg-2 d-flex justify-content-end align-items-end">
            <a href="{{ route('editProfile', Auth::user()->id) }}" class="btn btn-secondary">Edit Profil</a>
          </div>

        </div>

        <hr>

        <div class="row">
          <div class="col">
            <h3>My Transaction</h3>
          </div>
        </div>
        
        <div class="row">
          <div class="col">
            <div class="table-responsive">
            
              <table class="table table-bordered table-hover">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Travel Package</th>
                    <th scope="col">Transaction Id</th>
                    <th scope="col">Total Pay</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($transactions as $item)
                
                    <tr>
                      <td>{{ $item->travelPackage->title }}</td>
                      <td>{{ $item->id }}</td>
                      <td>Rp. {{ number_format($item->transaction_total, 2) }}</td>
                      <td>{{ $item->transaction_status }}</td>
                      <td>
                        <a href=" {{ route('checkout', $item->id) }} " class="btn btn-info"> 
                          <i class="fas fa-eye"></i>
                        </a>
                      </td>
                    </tr>
                  @empty
                      <tr>
                        <td colspan="4" class="text-center font-weight-bold" > You Don't Have Any Transaction </td>
                      </tr>
                  @endforelse
                </tbody>
              </table>

            </div>
          </div>
        </div>


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
