@extends('layouts.admin.admin')

@section('title', 'Admin Q - Gallery Travel Package')


@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Gallery Travel Package</h1>
        <a href=" {{ route('gallery.create') }} " class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Add More Gallery Travel Package</a>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-12">

          <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Image</th>
                        <th scope="col">Travel Package</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($items as $item)
                    <tr>
                      <td> {{ $loop->iteration }} </td>
                        <td>
                            <img src=" {{ Storage::url($item->image) }} " class="img-thumbnail" style="width: 150px;">
                        </td>

                        <td> {{ $item->travelPackage->title }} </td>
                        <td>
                            <a href=" {{route('gallery.edit', $item->id)}} " class="btn btn-info"> <i
                                    class="fa fa-pencil-alt"></i> </a>
                            <form class="d-inline" action=" {{route('gallery.destroy', $item->id)}} " method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" onclick="return confirm('Are You Sure Want To Delete This Image for Travel Package?')">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center font-weight-bold">DEAD</td>
                    </tr>
                    @endforelse


                </tbody>

                {{ $items->links()  }}
            </table>
          </div>

        </div>
    </div>


</div>
@endsection
