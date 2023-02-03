@extends('admin.master')
@section('title','Courses | '.env('APP_NAME'))

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-4 text-gray-800">Courses</h1>
        <a href="{{ route('admin.courses.create') }}" class="btn btn-success px-4">Add Courses</a>
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
             <th>Content</th>
             <th>Duration</th>
             <th>Students</th>
             <th>Price</th>
             <th>Hours</th>
             <th>Calories</th>
             <th>Workout</th>
             <th>trainer_id</th>
             <th>category_id</th>
             <th>Action</th>
         </tr>
        </thead>
        <tbody>
         @foreach ( $courses as $course)
         <tr>
             <td>{{ $course->id }}</td>
             <td>{{ $course->name }}</td>
             <td><img width="80" src="{{ asset('uploads/courses/'.$course->image) }}" alt=""></td>
             <td>{{ $course->content }}</td>
             <td>{{ $course->duration }}</td>
             <td>{{ $course->student }}</td>
             <td>{{ $course->price }}</td>
             <td>{{ $course->hourse }}</td>
             <td>{{ $course->calories }}</td>
             <td>{{ $course->workout }}</td>
             <td>{{ $course->trainer->name }}</td>
             <td>{{ $course->category->name }}</td>
             <td>
                 <a href="{{ route('admin.courses.edit',$course->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                 <form class="d-inline" action="{{ route('admin.courses.destroy',$course->id) }}" method="post">
                     @csrf
                     @method('delete')
                     <button class="btn btn-danger btn-sm" onclick="return confirm('Are Your Sure!')"><i class="fa fa-trash"></i></button>
                 </form>
             </td>
         </tr>
         @endforeach

         {{ $courses->links() }}
        </tbody>
     </table>
   </div>

</div>
<!-- /.container-fluid -->

@stop
