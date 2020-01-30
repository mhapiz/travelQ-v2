@extends('layouts.admin.admin')

@section('title', 'Admin Q -  Gallery Travel Package')


@section('content')
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Adding Gallery for Travel Package</h1>
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
      <form action=" {{ route('gallery.store') }} " method="POST" enctype="multipart/form-data" >
       @csrf

      <div class="row">

        <div class="col">
          <div class="form-group">
            <label for="travelPackagesId"> Travel Package </label>
            <select name="travel_packages_id" required class="form-control">
              <option value="">Choose Travel Package</option>
              @foreach ($travelPackages as $travelPackage)
                  <option value="{{ $travelPackage->id }}"> 
                    {{ $travelPackage->title }} 
                  </option>
              @endforeach
            </select>
          </div>
        </div>


        <div class="col">
          <div class="form-group">
            <label for="image">Input Image</label>
            <input type="file" name="image" class="form-control" placeholder="image">
          </div>
        </div>

        {{-- <div class="col">
          <div class="form-group">
            <label for="image">Input other Image</label>
            <input type="file" name="image2" class="form-control" placeholder="image">
          </div>
        </div>
        
        <div class="form-group">
          <label for="image">Input other Image</label>
          <input type="file" name="image3" class="form-control" placeholder="image">
        </div> --}}

      </div>

       
      

       

        <button type="submit" class="btn btn-primary btn-block"> Save</button>

      </form>
    </div>
  </div>



</div>
@endsection
