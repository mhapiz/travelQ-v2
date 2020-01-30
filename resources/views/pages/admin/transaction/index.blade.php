@extends('layouts.admin.admin')

@section('title', 'Admin Q - Transaction ')
    

@section('content')
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Transaction </h1>
  </div>

  <!-- Content Row -->
  <div class="row">
   <div class="col-12">
     
    <div class="table-responsive">
      <table class="table table-hover table-bordered">
        <thead class="thead-light">
          <tr>
            <th scope="col">No.</th>          
            <th scope="col">Travel Package</th>
            <th scope="col">Username</th>
            <th scope="col">Additional Visa </th>
            <th scope="col">Transaction Total</th>
            <th scope="col">Transaction Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
      <tbody>
          @forelse ($items as $item)
          
          <tr>
              <td> {{ $loop->iteration }} </td>
              <td> {{ $item->travelPackage->title }} </td>
              <td> {{ $item->user->name }} </td>
              <td>Rp. {{ number_format($item->additional_visa,2) }} </td>
              <td>Rp. {{ number_format($item->transaction_total, 2) }} </td>
              <td> 
                <a href="{{route('transaction.edit', $item->id)}}">
                  @if ($item->transaction_status == 'PENDING')
                      <h3><span class="badge badge-pill badge-info">Pending</span></h3>
                  @elseif ($item->transaction_status == 'SUCCESS')  
                      <h3><span class="badge badge-pill badge-success">Success</span></h3>
                  @elseif ($item->transaction_status == 'IN_CART')  
                      <h3><span class="badge badge-pill badge-secondary">In User Cart</span></h3>
                  @elseif ($item->transaction_status == 'CANCEL')  
                      <h3><span class="badge badge-pill badge-warning">Cancel</span></h3>
                  @elseif ($item->transaction_status == 'FAILED')  
                      <h3><span class="badge badge-pill badge-danger">Failed</span></h3>
                  @endif
                </a>
              </td>
              <td>
                <a href=" {{route('transaction.show', $item->id)}} " class="btn btn-warning"> 
                  <i class="fas fa-eye"></i> 
                </a>
                <a href=" {{route('transaction.edit', $item->id)}} " class="btn btn-info"> <i
                        class="fa fa-pencil-alt"></i> </a>
                <form class="d-inline" action=" {{route('transaction.destroy', $item->id)}} " method="POST">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger" onclick="return confirm('Are You Sure Want To Delete This Transaction?')">
                        <i class="fa fa-trash"></i>
                    </button>
                </form>
              </td>
          </tr>

          @empty
              
          @endforelse
      </tbody>
      </table>
    </div>

   </div>
  </div>
</div>





@endsection