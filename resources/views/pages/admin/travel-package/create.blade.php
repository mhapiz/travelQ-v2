@extends('layouts.admin.admin')

@section('title', 'Admin Q - Travel Package')


@section('content')
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Adding Travel Package</h1>
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
      <form action=" {{ route('travel-package.store') }} " method="POST" >
       @csrf

       <div class="row">

         <div class="col">
          <div class="form-group">
            <label for="title"> Title</label>
            <input type="text" name="title" id="title" placeholder="title" value=" {{old('title')}} " class="form-control">
          </div>
         </div>


        <div class="col">
          <div class="form-group">
            <label for="location"> Location</label>
            <input type="text" name="location" id="location" placeholder="location" value=" {{old('location')}} " class="form-control">
          </div>
        </div>

       </div>


        <div class="form-group">
            <label for="about"> About</label>
            <textarea name="about" rows="10" class="d-block w-100 form-control"> {{old('about')}} </textarea>
        </div>



        <div class="row">

          <div class="col">
            <div class="form-group">
              <label for="hotel"> Hotel</label>
              <input type="text" name="hotel" id="hotel" placeholder="hotel" value=" {{old('hotel')}} " class="form-control">
            </div>
          </div>
 
 
         <div class="col">
            <div class="form-group">
              <label for="service"> Service</label>
              <input type="text" name="service" id="service" placeholder="service" value=" {{old('service')}} " class="form-control">
            </div>
         </div>


         <div class="col">
          <div class="form-group">
            <label for="event"> Event</label>
            <input type="text" name="event" id="event" placeholder="event" value=" {{old('event')}} " class="form-control">
          </div>
         </div>
 
        </div>



        <div class="row">

          <div class="col">
            <div class="form-group">
              <label for="departure"> Departure</label>
              <input type="date" name="departure" id="departure" placeholder="departure" value=" {{old('departure')}} " class="form-control">
            </div>
          </div>
 
 
         <div class="col">
          <div class="form-group">
            <label for="duration"> Duration</label>
            <input type="text" name="duration" id="duration" placeholder="duration" value=" {{old('duration')}} " class="form-control">
          </div>
         </div>


         <div class="col">
          <div class="form-group">
            <label for="typeOfTrip"> Type of Trip</label>
            <input type="text" name="typeOfTrip" id="typeOfTrip" placeholder="typeOfTrip" value=" {{old('typeOfTrip')}} " class="form-control">
          </div>
         </div>
 
        </div>

 
        <div class="form-group">
            <label for="price"> Price</label>
            <input type="number" name="price" id="price" placeholder="price" value=" {{old('price')}} " class="form-control">
        </div>

        <button type="submit" class="btn btn-primary btn-block"> Save</button>

      </form>
    </div>
  </div>



</div>
@endsection
