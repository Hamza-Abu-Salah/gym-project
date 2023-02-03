@extends('admin.master')
@section('title','Add Schedule | '.env('APP_NAME'))

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-4 text-gray-800">Add schedules</h1>
        <a href="{{ route('admin.schedules.index') }}" class="btn btn-success px-4">All Schedule</a>
    </div>

    <form action="{{ route('admin.schedules.store') }}" method="post" enctype="multipart/form-data">
    @csrf
        @include('admin.error')

    <div class="mb-3">
        <label>Day</label>
        <input type="text" class="form-control" name="day" placeholder="Day">
    </div>

    <div class="mb-3">
        <label>Icon</label>
        <input type="file" class="form-control" name="icon" >
    </div>

    <div class="mb-3">
        <label>Start Hour</label>
        <input type="number" class="form-control" name="start_hour" placeholder="start_hour">
    </div>

    <div class="mb-3">
        <label>End Hour</label>
        <input type="number" class="form-control" name="end_hour" placeholder="end_hour">
    </div>

    <div class="mb-3">
        <label>Course</label>
        <select name="course_id" class="form-control">

            <option value="">Select</option>
            @foreach ($courses as $item)
                <option {{ $schedule->course == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
    </div>



    <button class="btn btn-success px-5">Add</button>
    </form>

</div>
<!-- /.container-fluid -->

@stop

