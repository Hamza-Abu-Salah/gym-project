@extends('admin.master')
@section('title','Schedules | '.env('APP_NAME'))

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-4 text-gray-800">Schedules</h1>
        <a href="{{ route('admin.schedules.create') }}" class="btn btn-success px-4">Add Schedules</a>
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
                 <th>Day</th>
                 <th>Icon</th>
                 <th>Start_Hour</th>
                 <th>End_Hour</th>
                 <th>courses_id</th>
                 <th>Action</th>
             </tr>
            </thead>
            <tbody>
             @foreach ( $schedules as $schedule)
             <tr>
                 <td>{{ $schedule->id }}</td>
                 <td>{{ $schedule->day }}</td>
                 <td><img width="80" src="{{ asset('uploads/schedules/'.$schedule->icon) }}" alt=""></td>
                 <td>{{ $schedule->start_hour }}</td>
                 <td>{{ $schedule->end_hour }}</td>
                 <td>{{ $schedule->course->name }}</td>
                 <td>
                     <a href="{{ route('admin.schedules.edit',$schedule->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                     <form class="d-inline" action="{{ route('admin.schedules.destroy',$schedule->id) }}" method="post">
                         @csrf
                         @method('delete')
                         <button class="btn btn-danger btn-sm" onclick="return confirm('Are Your Sure!')"><i class="fa fa-trash"></i></button>
                     </form>
                 </td>
             </tr>
             @endforeach

             {{ $schedules->links() }}
            </tbody>
         </table>
    </div>

</div>
<!-- /.container-fluid -->

@stop
