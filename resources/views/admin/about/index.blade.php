@extends('admin.master')
@section('title','Abouts | '.env('APP_NAME'))

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-4 text-gray-800">Abouts</h1>
        <a href="{{ route('admin.abouts.create') }}" class="btn btn-success px-4">Add Abouts</a>
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
                 <th>Image</th>
                 <th>Experience</th>
                 <th>start playing</th>
                 <th>Action</th>
             </tr>
            </thead>
            <tbody>
             @foreach ( $abouts as $about)
             <tr>
                 <td>{{ $about->id }}</td>
                 <td>{{ $about->title }}</td>
                 <td>{{ $about->content }}</td>
                 <td><img width="80" src="{{ asset('uploads/abouts/'.$about->icon) }}" alt=""></td>
                 <td><img width="80" src="{{ asset('uploads/abouts/'.$about->image) }}" alt=""></td>
                 <td>{{ $about->experience }}</td>
                 <td>{{ $about->start_playing }}</td>

                 <td>
                     <a href="{{ route('admin.abouts.edit',$about->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                     <form class="d-inline" action="{{ route('admin.abouts.destroy',$about->id) }}" method="post">
                         @csrf
                         @method('delete')
                         <button class="btn btn-danger btn-sm" onclick="return confirm('Are Your Sure!')"><i class="fa fa-trash"></i></button>
                     </form>
                 </td>
             </tr>
             @endforeach

             {{ $abouts->links() }}
            </tbody>
         </table>
    </div>

</div>
<!-- /.container-fluid -->

@stop
