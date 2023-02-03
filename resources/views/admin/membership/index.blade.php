@extends('admin.master')
@section('title','Memberships | '.env('APP_NAME'))

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-4 text-gray-800">Memberships</h1>
        <a href="{{ route('admin.memberships.create') }}" class="btn btn-success px-4">Add Memberships</a>
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
                 <th>Price</th>
                 <th>Per</th>
                 <th>Content</th>
                 <th>Type</th>
                 <th>Action</th>
             </tr>
            </thead>
            <tbody>
             @foreach ( $memberships as $membership)
             <tr>
                 <td>{{ $membership->id }}</td>
                 <td>{{ $membership->name }}</td>
                 <td><img width="80" src="{{ asset('uploads/memberships/'.$membership->image) }}" alt=""></td>
                 <td>{{ $membership->price }}</td>
                 <td>{{ $membership->per }}</td>
                 <td>{!! $membership->content  !!}</td>
                 <td>
                    <ol>
                        <li>{{ $membership->fruits}}</li>
                    </ol>
                 </td>
                 <td>
                     <a href="{{ route('admin.memberships.edit',$membership->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                     <form class="d-inline" action="{{ route('admin.memberships.destroy',$membership->id) }}" method="post">
                         @csrf
                         @method('delete')
                         <button class="btn btn-danger btn-sm" onclick="return confirm('Are Your Sure!')"><i class="fa fa-trash"></i></button>
                     </form>
                 </td>
             </tr>
             @endforeach

             {{ $memberships->links() }}
            </tbody>
         </table>
    </div>

</div>
<!-- /.container-fluid -->

@stop
