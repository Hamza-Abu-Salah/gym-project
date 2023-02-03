@extends('admin.master')
@section('title','Categories | '.env('APP_NAME'))

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-4 text-gray-800">Categories</h1>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-success px-4">Add Categories</a>
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
                 <th>name</th>
                 <th>Image</th>
                 <th>parent_id</th>
                 <th>courses Count</th>
                 <th>Action</th>
             </tr>
            </thead>
            <tbody>
             @foreach ( $categories as $category)
             <tr>
                 <td>{{ $category->id }}</td>
                 <td>{{ $category->name }}</td>
                 <td><img width="80" src="{{ asset('uploads/categories/'.$category->image) }}" alt=""></td>
                 <td>{{ $category->parent->name }}</td>
                 <td>{{ $category->courses->count() }}</td>
                 <td>
                     <a href="{{ route('admin.categories.edit',$category->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                     <form class="d-inline" action="{{ route('admin.categories.destroy',$category->id) }}" method="post">
                         @csrf
                         @method('delete')
                         <button class="btn btn-danger btn-sm" onclick="return confirm('Are Your Sure!')"><i class="fa fa-trash"></i></button>
                     </form>
                 </td>
             </tr>
             @endforeach

             {{ $categories->links() }}
            </tbody>
         </table>
    </div>

</div>
<!-- /.container-fluid -->

@stop
