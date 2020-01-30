@extends('layouts.admin.admin')

@section('title', 'Admin Q - Transaction')


@section('content')
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Updating Transaction 
      <b>{{ $item->title }}</b> </h1>
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


  <div class="card shadow">
    <div class="card-body">
      <form action=" {{ route('transaction.update', $item->id) }} " method="POST" >
        @method('PUT')
       @csrf

       <div class="row">

         <div class="col">
          <div class="form-group">
            <label for="travel_package">Travel Package</label>
            <input type="text" id="travel_package" placeholder="travel_package" value=" {{$item->travelPackage->title}} " class="form-control" disabled>
          </div>
         </div>


        <div class="col">
          <div class="form-group">
            <label for="username"> Username</label>
            <input type="text" id="username" placeholder="username" value=" {{ $item->user->username }} " class="form-control" disabled>
          </div>
        </div>

       </div>


       <div class="row">

        <div class="col">
         <div class="form-group">
           <label for="visa">Additional Visa</label>
           <input type="text" id="visa" placeholder="visa" value=" {{$item->additional_visa}} " class="form-control" disabled>
         </div>
        </div>


       <div class="col">
         <div class="form-group">
           <label for="total"> Transaction Total</label>
           <input type="text" id="total" placeholder="total" value=" {{ number_format($item->transaction_total, 2) }} " class="form-control" disabled>
         </div>
       </div>

       <div class="col">
        <div class="form-group">
          <label for="status"> Transaction Status</label>
          <select name="transaction_status" class="form-control">
            <option value=" {{ $item->transaction_status }} " selected> Select To update Status </option>
            <option value="PENDING"> PENDING </option>
            <option value="IN_CART"> IN_CART </option>
            <option value="SUCCESS"> SUCCESS </option>
            <option value="CANCEL"> CANCEL </option>
            <option value="FAILED"> FAILED </option>
          </select>
        </div>
      </div>

      </div>

        

        <button type="submit" class="btn btn-primary btn-block"> Save</button>

      </form>
    </div>
  </div>



</div>
@endsection
