@extends('layouts.admin.admin')

@section('title', 'Admin Q -  Gallery Travel Package')


@section('content')
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Gallery for <b> {{ $gallery->travelPackage->title }} </b> </h1>
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
 

      <form action=" {{ route('gallery.update', $gallery->id) }} " method="POST" enctype="multipart/form-data" >
        @method('PUT')
       @csrf

       

      <div class="row mb-5">

        <div class="col-6 d-flex justify-content-center">
          <img src="{{ Storage::url($gallery->image) }}" class="img-fluid" alt="Responsive image" width="50%">
        </div>


        <div class="col-6">

          <div class="form-group">
            <label for="travelPackagesId"> Travel Package </label>
            <select name="travel_packages_id" required class="form-control">

              <option value=" {{ $gallery->travel_packages_id }} ">
                {{ $gallery->travelPackage->title }}
              </option>

              @foreach ($travelPackages as $travelPackage)
                  <option value="{{ $travelPackage->id }}"> 
                    {{ $travelPackage->title }}
                  </option>
              @endforeach

            </select>
          </div>

          <div class="form-group">
            <label for="image">Input Image</label>
            <input type="file" name="image" class="form-control" placeholder="image">
          </div>
        </div>
        

      </div>

       
      

       

        <button type="submit" class="btn btn-primary btn-block"> Save</button>

      </form>
    </div>
  </div>



</div>
@endsection
