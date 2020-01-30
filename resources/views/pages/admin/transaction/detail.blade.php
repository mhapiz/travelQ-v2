@extends('layouts.admin.admin')

@section('title', 'Admin Q - Travel Package')


@section('content')
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Detail of Transaction 
      <b></b> </h1>
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
      <table class="table table-hover table-bordered">
        <tr>
          <th width="15%"> ID </th>
          <td width="85%"> {{ $item->id }} </td>
        </tr>

        <tr>
          <th> Travel Package </th>
          <td> {{ $item->travelPackage->title }} </td>
        </tr>

        <tr>
          <th> User </th>
          <td> {{ $item->user->username }} </td>
        </tr>

        <tr>
          <th> Additional Visa </th>
          <td>Rp. {{ number_format($item->additional_visa, 2) }} </td>
        </tr>

        <tr>
          <th> Transaction Total </th>
          <td>Rp. {{ number_format($item->transaction_total, 2) }} </td>
        </tr>

        <tr>
          <th> Transaction Status </th>
          <td> {{ $item->transaction_status }} </td>
        </tr>

        <tr>
          <th> People who join </th>
          <td>
            <table class="table table-hover">
              <tr>
                <th>Username</th>
                <th>Nationality</th>
                <th>Visa</th>
                <th>Passport</th>
              </tr>

              @foreach ($item->details as $detail)
                  <tr>
                    <td> {{ $detail->username }} </td>
                    <td> {{ $detail->nationality }} </td>
                    <td> {{ $detail->is_visa ? '30 Days' : 'N/a' }} </td>
                    <td> {{ $detail->doe_passport }} </td>
                  </tr>
              @endforeach

            </table>
          </td>
        </tr>
      </table>
    </div>
  </div>



</div>
@endsection
