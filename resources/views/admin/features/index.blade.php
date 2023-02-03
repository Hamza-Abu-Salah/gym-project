@extends('admin.master')
@section('title','Features | '.env('APP_NAME'))

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-4 text-gray-800">Features</h1>
        <a href="{{ route('admin.features.create') }}" class="btn btn-success px-4">Add Features</a>
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
                 <th>Content</th>
                 <th>Icon</th>
                 <th>Action</th>
             </tr>
            </thead>
            <tbody>
             @foreach ( $features as $feature)
             <tr>
                 <td>{{ $feature->id }}</td>
                 <td>{{ $feature->title }}</td>
                 <td>{{ $feature->content }}</td>
                 <td><img width="80" src="{{ asset('uploads/features/'.$feature->icon) }}" alt=""></td>
                 <td>
                     <a href="{{ route('admin.features.edit',$feature->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                     <form class="d-inline" action="{{ route('admin.features.destroy',$feature->id) }}" method="post">
                         @csrf
                         @method('delete')
                         <button class="btn btn-danger btn-sm" onclick="return confirm('Are Your Sure!')"><i class="fa fa-trash"></i></button>
                     </form>
                 </td>
             </tr>
             @endforeach

             {{ $features->links() }}
            </tbody>
         </table>
    </div>


</div>
<!-- /.container-fluid -->

@stop
