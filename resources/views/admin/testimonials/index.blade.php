@extends('admin.master')
@section('title','Testimonials | '.env('APP_NAME'))

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-4 text-gray-800">Testimonials</h1>
        <a href="{{ route('admin.testimonials.create') }}" class="btn btn-success px-4">Add Testimonials</a>
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
             <th>Name</th>
             <th>Title</th>
             <th>Position</th>
             <th>image</th>
             <th>Content</th>
             <th>Action</th>
         </tr>
        </thead>
        <tbody>
         @foreach ( $testimonials as $testimonial)
         <tr>
             <td>{{ $testimonial->id }}</td>
             <td>{{ $testimonial->name }}</td>
             <td>{{ $testimonial->title }}</td>
             <td>{{ $testimonial->position }}</td>
             <td><img width="80" src="{{ asset('uploads/testimonials/'.$testimonial->image) }}" alt=""></td>
             <td>{{ $testimonial->content }}</td>
             <td>
                 <a href="{{ route('admin.testimonials.edit',$testimonial->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                 <form class="d-inline" action="{{ route('admin.testimonials.destroy',$testimonial->id) }}" method="post">
                     @csrf
                     @method('delete')
                     <button class="btn btn-danger btn-sm" onclick="return confirm('Are Your Sure!')"><i class="fa fa-trash"></i></button>
                 </form>
             </td>
         </tr>
         @endforeach

         {{ $testimonials->links() }}
        </tbody>
     </table>
   </div>

</div>
<!-- /.container-fluid -->

@stop
