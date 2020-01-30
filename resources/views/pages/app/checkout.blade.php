@extends('layouts.scd.scd')

@section('title')
    Checkout
@endsection

@section('content')

<main class="checkout">
  <div class="container mt-5">
    <div class="block"></div>


    <ol class="breadcrumb" style="background: none;">
      <li class="breadcrumb-item"><a href="#">Package</a></li>
      <li class="breadcrumb-item active" aria-current="page">Checkout</li>
    </ol>

    <div class="row">
      <div class="col-sm-12 col-md-8">
        <div class="card mb-5">
          <div class="container">
            <div class="card-body">

              

              <h2 class="card-title font-weight-bold">Who's Going?</h2>
              <h6 class="card-subtitle text-muted mb-3">Trip to {{ $item->travelPackage->location }}</h6>

              <table class="table table-hover table-responsive-sm text-center">
                <thead>
                  <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Avatar</th>
                    <th scope="col">Name</th>
                    <th scope="col">Nationality</th>
                    <th scope="col">Visa</th>
                    <th scope="col">Passport</th>
                    <th scope="col">X</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($item->details as $detail)
                  <tr>
                   
                    <th scope="row">{{  $loop->iteration }}</th>
                    <td> 
                      <img src="{{ Storage::url($detail->user->avatar) }}" class="rounded-circle" width="50" height="50">
                    </td>
                    <td> {{ $detail->username }} </td>
                    <td> {{ $detail->nationality }} </td>
                    <td> {{ $detail->is_visa ? '30 Days' : 'N/a' }} </td>
                    <td>{{\Carbon\Carbon::createFromDate($detail->doe_passport) > \Carbon\Carbon::now() ? 'Active' : 'Inactive' }}</td>
                    <td>
                      <a href="{{ route('checkoutRemove', $detail->id) }}">
                        X
                      </a>
                      
                    </td>
                  </tr>              
                @empty
                    <tr>
                      <td>nonononono</td>
                    </tr>
                @endforelse

                </tbody>
              </table>
              <!-- TABLE -->


              <!-- FORM -->

              <div class="add-member mt-5">

                @if ($errors->any())
                <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                        <li> {{$error}} </li>
                    @endforeach
                  </ul>
                </div>
              @endif

                <h5 class="font-weight-bold">Add Member</h5>

                <form method="POST" action=" {{ route('checkoutCreate', $item->id) }} ">
                  @csrf
                  <div class="form-row align-items-center">
                    <div class="col-sm-3 my-1">
                      <label class="sr-only" for="username">username</label>
                      <input type="text" class="form-control" name="username" id="inputUsername"
                        placeholder="Username">
                    </div>


                    {{-- <div class="col-sm-4 my-1">
                      <label class="sr-only" for="passport">DOE Passport</label>
                      <div class="input-group">
                        <input type="text"  id="doe_passport" placeholder="DOE Passport" name="doe_passport"
                          class="form-control datepicker"/>
                      </div>
                    </div> --}}


                    <div class="col-auto">
                      <button type="submit" class="btn btn-primary add-btn">Add </button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- FORM -->


              <h5 class="mt-4 text-muted">Note*</h5>
              <p class="text-muted mb-5" style="font-size: 14px;">You are only able to invite members that has already
                join travelQ</p>


            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-12 col-md-4 member-going">
        <div class="card">
          <div class="card-body">


            <h5 class="card-subtitle mb-3 font-weight-bold">Information</h5>

            <table class="trip-info" style="width:100% !important;">

              <tr>
                <th width="40%">Members</th>
                <td width="60%" class="text-right text-muted"> {{ $item->details->count() }} Members</td>
              </tr>

              <tr>
                <th width="40%">Additional VISA</th>
                <td width="60%" class="text-right text-muted">  Rp.{{ number_format($item->additional_visa, 2) }} /person</td>
              </tr>

              <tr>
                <th width="40%">Trip Price</th>
                <td width="60%" class="text-right text-muted">  Rp.{{ number_format($item->travelPackage->price, 2) }} /Person</td>
              </tr>

              <tr>
                <th width="40%">Total Price</th>
                <td width="60%" class="text-right text-muted">Rp.{{number_format($item->transaction_total, 2)}}</td>
              </tr>

              <tr>
                <th width="40%" class="">Total Pay (unix code)</th>
                <td width="60%" class="text-right text-muted">Rp. {{number_format($item->transaction_total)}}, {{mt_rand(0,99 )}}</td>
              </tr>
            </table>
            <hr>

            <h5 class="card-subtitle mb-1 font-weight-bold">Payment</h5>
            <p class="text-muted" style="font-size: 14px;">*Please complete the payment before you continue the trip
            </p>

            <div class="payment">
              <div class="bank">
                <div class="bank-logo">
                  <img src="{{ url('frontend/assets/image/icons/currency.png') }}" width="60">
                </div>
                <div class="bank-desc">
                  <p>PT TRAVELQ ID</p>
                  <p class="font-weight-bold">BANK CENTRAL ASIA</p>
                  <p>5698 5644 1247 8896</p>
                </div>
              </div>

              <div class="bank mt-4">
                <div class="bank-logo">
                  <img src="{{ url('frontend/assets/image/icons/money.png') }}" width="60">
                </div>
                <div class="bank-desc">
                  <p>PT TRAVELQ ID</p>
                  <p class="font-weight-bold">BANK CENTRAL ASIA</p>
                  <p>5698 5644 1247 8896</p>
                </div>
              </div>
            </div>

          </div>
        </div>
        <div class="book-now text-center">
          <a href="{{ route('checkoutSuccess', $item->id) }}" class="btn btn-book ">Confirm Order</a>
        </div>

        <div class=" text-center">
          <a href=""{{ url('travel-packages') }}" class="btn btn-cancel">CANCEL booking</a>
        </div>

      </div>
    </div>

    
</main>


@endsection

@push('append-style')
  <link rel="stylesheet" href=" {{url('frontend/assets/libraries/gijgo/css/gijgo.min.css')}} ">
    
@endpush


@push('append-script')
<script src=" {{url('frontend/assets/libraries/gijgo/js/gijgo.min.js')}}"></script>
<script>
  $('.datepicker').datepicker({
    format: 'yyyy-mm-dd',
    uiLibrary: 'bootstrap4',
    icon: {
      rightIcon: '<img src=" {{url('frontend/img/icons/calendar.png')}} ">'
    }
  })
</script>
@endpush