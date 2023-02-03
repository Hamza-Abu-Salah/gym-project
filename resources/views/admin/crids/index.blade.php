@extends('admin.master')
@section('title','Crids | '.env('APP_NAME'))

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-4 text-gray-800">Crids</h1>
        <a href="{{ route('admin.crid.create') }}" class="btn btn-success px-4">Add Crids</a>
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
                 <th>title</th>
                 <th>image</th>
                 <th>content</th>
                 <th>day</th>
                 <th>trainer_id</th>
                 <th>Action</th>
             </tr>
            </thead>
            <tbody>
             @foreach ( $crids as $crid)
             <tr>
                 <td>{{ $crid->id }}</td>
                 <td>{{ $crid->title }}</td>
                 <td>{!! $crid->content !!}</td>
                 <td><img width="80" src="{{ asset('uploads/crids/'.$crid->image) }}" alt=""></td>
                 <td>{{ $crid->day }}</td>
                 <td>{{ $crid->trainer->name }}</td>

                 <td>
                     <a href="{{ route('admin.crid.edit',$crid->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                     <form class="d-inline" action="{{ route('admin.crid.destroy',$crid->id) }}" method="post">
                         @csrf
                         @method('delete')
                         <button class="btn btn-danger btn-sm" onclick="return confirm('Are Your Sure!')"><i class="fa fa-trash"></i></button>
                     </form>
                 </td>
             </tr>
             @endforeach

             {{ $crids->links() }}
            </tbody>
         </table>
    </div>

</div>
<!-- /.container-fluid -->

@stop
