@extends('admin.master')
@section('title','Dashboard | '.env('APP_NAME'))

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-4 text-gray-800">Trainers</h1>
        <a href="{{ route('admin.trainers.create') }}" class="btn btn-success px-4">Add Trainer</a>
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
                 <th>Image</th>
                 <th>Specialization</th>
                 <th>Content</th>
                 <th>Facebook</th>
                 <th>Twitter</th>
                 <th>Instagram</th>
                 <th>Linkedin</th>
                 <th>Action</th>
             </tr>
            </thead>
            <tbody>
             @foreach ( $trainers as $trainer)
             <tr>
                 <td>{{ $trainer->id }}</td>
                 <td>{{ $trainer->name }}</td>
                 <td><img width="80" src="{{ asset('uploads/trainers/'.$trainer->image) }}" alt=""></td>
                 <td>{{ $trainer->specialization }}</td>
                 <td>{!! $trainer->content !!}</td>
                 <td>{{ $trainer->facebook }}</td>
                 <td>{{ $trainer->twitter }}</td>
                 <td>{{ $trainer->instagram }}</td>
                 <td>{{ $trainer->linkedin }}</td>

                 <td>
                     <a href="{{ route('admin.trainers.edit', $trainer->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                     <form class="d-inline" action="{{ route('admin.trainers.destroy',$trainer->id) }}" method="post">
                         @csrf
                         @method('delete')
                         <button class="btn btn-danger btn-sm" onclick="return confirm('Are Your Sure!')"><i class="fa fa-trash"></i></button>
                     </form>
                 </td>
             </tr>
             @endforeach
            </tbody>
         </table>
    </div>

</div>
<!-- /.container-fluid -->

@stop
