@extends('admin.master')
@section('title','Edit Schedule | '.env('APP_NAME'))

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Edit Schedules</h1>

    <form action="{{ route('admin.schedules.update',$schedule->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
        @include('admin.error')

        <div class="mb-3">
            <label>Day</label>
            <input type="text" class="form-control" name="day" placeholder="Day" value="{{ $schedule->day }}">
        </div>

        <div class="mb-3">
            <label>Icon</label>
            <input type="file" class="form-control" name="icon" >
            <img width="80" src="{{ asset('uploads/schedules/'.$schedule->icon) }}" alt="">
        </div>

        <div class="mb-3">
            <label>Start Hour</label>
            <input type="text" class="form-control" name="start_hour" placeholder="Start Hour" value="{{ $schedule->start_hour }}">
        </div>

        <div class="mb-3">
            <label>End Hour</label>
            <input type="text" class="form-control" name="end_hour" placeholder="End Hour" value="{{ $schedule->end_hour }}">
        </div>

        <div class="mb-3">
            <label>Course</label>
            <select name="course_id" class="form-control">

                <option value="">Select</option>
                @foreach ($courses as $it)
                    <option {{ $schedule->course_id == $it->id ? 'selected' : '' }} value="{{ $it->id }}">{{ $it->name }}</option>
                @endforeach
            </select>
        </div>




    <button class="btn btn-primary px-5">Update</button>
    </form>

</div>
<!-- /.container-fluid -->

@stop

@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.2.0/tinymce.min.js" integrity="sha512-tofxIFo8lTkPN/ggZgV89daDZkgh1DunsMYBq41usfs3HbxMRVHWFAjSi/MXrT+Vw5XElng9vAfMmOWdLg0YbA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
tinymce.init({
    selector: '.myedit'
})
</script>

@stop
