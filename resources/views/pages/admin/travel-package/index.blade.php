@extends('layouts.admin.admin')

@section('title', 'Admin Q - Travel Package')
    

@section('content')
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Travel Package</h1>
    <a href=" {{ route('travel-package.create') }} " class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-download fa-sm text-white-50"></i> Add More Travel Package</a>
  </div>

  <!-- Content Row -->
  <div class="row">
   <div class="col-12">
     <div class="table-responsive">

      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">No. </th>
            <th scope="col">Title</th>
            <th scope="col">Location</th>
            <th scope="col">About</th>
            <th scope="col">Departure</th>
            <th scope="col">Duration</th>
            <th scope="col">Type Of Trip</th>
            <th scope="col">Price</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>

          @forelse ($items as $item)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->title }}</td>
            <td>{{ $item->location }}</td>
            <td>{{ Str::words($item->about, '5') }}</td>
            <td>{{  \Carbon\Carbon::create($item->departure)->format('l, j M Y') }}</td>
            <td>{{ $item->duration }}</td>
            <td>{{ $item->typeOfTrip }}</td>
            <td>Rp. {{ number_format($item->price) }}</td>
            <td>
              <a href=" {{route('travel-package.edit', $item->id)}} " class="btn btn-info" > <i class="fa fa-pencil-alt"></i> </a>
              <form class="d-inline" action=" {{route('travel-package.destroy', $item->id)}} " method="POST">
                @csrf
                @method('delete')
                <button class="btn btn-danger" onclick="return confirm('Are You Sure Want To Delete This Travel Package?')">
                  <i class="fa fa-trash"></i>
                </button>
              </form> 
            </td>
          </tr>
          @empty
              <tr>
                <td colspan="8" class="text-center font-weight-bold">DEADAADADADAD</td>
              </tr>
          @endforelse
          
        
        </tbody>
      </table>

     </div>
   </div>
  </div>
</div>





@endsection
