@extends('admin.master')
@section('title','Services | '.env('APP_NAME'))

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-4 text-gray-800">Services</h1>
        <a href="{{ route('admin.services.create') }}" class="btn btn-success px-4">Add Services</a>
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
                 <th>Title</th>
                 <th>Image</th>
                 <th>Content</th>
                 <th>Type</th>
                 <th>Action</th>
             </tr>
            </thead>
            <tbody>
             @foreach ( $services as $service)
             <tr>
                 <td>{{ $service->id }}</td>
                 <td>{{ $service->title }}</td>
                 <td><img width="80" src="{{ asset('uploads/services/'.$service->image) }}" alt=""></td>
                 <td>{{ $service->content }}</td>
                 <td>{{ $service->type }}</td>
                 <td>
                     <a href="{{ route('admin.services.edit',$service->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                     <form class="d-inline" action="{{ route('admin.services.destroy',$service->id) }}" method="post">
                         @csrf
                         @method('delete')
                         <button class="btn btn-danger btn-sm" onclick="return confirm('Are Your Sure!')"><i class="fa fa-trash"></i></button>
                     </form>
                 </td>
             </tr>
             @endforeach

             {{ $services->links() }}
            </tbody>
         </table>
    </div>

</div>
<!-- /.container-fluid -->

@stop
