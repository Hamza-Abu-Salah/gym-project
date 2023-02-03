@extends('admin.master')
@section('title','Users | '.env('APP_NAME'))

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-4 text-gray-800">Users</h1>
        <a href="{{ route('admin.users.create') }}" class="btn btn-success px-4">Add Users</a>
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
                 <th>First Name</th>
                 <th>Last Name</th>
                 <th>Email</th>
                 <th>Phone</th>
                 <th>Image</th>
                 <th>Type</th>
                 <th>Action</th>
             </tr>
            </thead>
            <tbody>
             @foreach ( $users as $user)
             <tr>
                 <td>{{ $user->id }}</td>
                 <td>{{ $user->first_name }}</td>
                 <td>{{ $user->last_name }}</td>
                 <td>{{ $user->email }}</td>
                 <td>{{ $user->phone }}</td>
                 <td><img width="80" src="{{ asset('uploads/users/'.$user->image) }}" alt=""></td>
                 <td>{{  $user->type  }}</td>
                 <td>
                     <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                     <form class="d-inline" action="{{ route('admin.users.destroy',$user->id) }}" method="post">
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
