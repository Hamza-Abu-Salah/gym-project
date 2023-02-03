@extends('admin.master')
@section('title','Gallerys | '.env('APP_NAME'))

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-4 text-gray-800">Gallerys</h1>
        <a href="{{ route('admin.gallerys.create') }}" class="btn btn-success px-4">Add Gallerys</a>
    </div>
    @if (session('msg'))
        <div class="alert alert-{{ session('type') }}">
            {{ session('msg') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover ">
            <thead class="table-dark">
             <tr >
                 <th>ID</th>
                 <th>Path</th>
                 <th>Action</th>
             </tr>
            </thead>
            <tbody>
             @foreach ( $gallerys as $gallery)
             <tr>
                 <td>{{ $gallery->id }}</td>
                 <td><img width="80" src="{{ asset('uploads/gallerys/'.$gallery->path) }}" alt=""></td>
                 <td>
                     <a href="{{ route('admin.gallerys.edit',$gallery->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                     <form class="d-inline" action="{{ route('admin.gallerys.destroy',$gallery->id) }}" method="post">
                         @csrf
                         @method('delete')
                         <button class="btn btn-danger btn-sm" onclick="return confirm('Are Your Sure!')"><i class="fa fa-trash"></i></button>
                     </form>
                 </td>
             </tr>
             @endforeach

             {{ $gallerys->links() }}
            </tbody>
         </table>
    </div>


</div>
<!-- /.container-fluid -->

@stop
