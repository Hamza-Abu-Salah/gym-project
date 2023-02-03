@extends('admin.master')
@section('title','Edit Course | '.env('APP_NAME'))

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Edit Courses</h1>

    <form action="{{ route('admin.courses.update',$course->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
        @include('admin.error')

        <div class="mb-3">
            <label>Name</label>
            <input type="text" class="form-control" name="name" placeholder="Name" value="{{ $course->name }}">
        </div>

        <div class="mb-3">
            <label>Image</label>
            <input type="file" class="form-control" name="image" >
            <img width="80" src="{{ asset('uploads/courses/'.$course->image) }}" alt="">
        </div>

        <div class="mb-3">
            <label>Content</label>
            <input type="text" class="form-control" name="content" placeholder="Content" value="{{ $course->content }}">
        </div>

        <div class="mb-3">
            <label>Duration</label>
            <input type="number" class="form-control" name="duration" placeholder="Duration" value="{{ $course->duration }}">
        </div>

        <div class="mb-3">
            <label>Students</label>
            <input type="number" class="form-control" name="student" placeholder="Students" value="{{ $course->student }}">
        </div>

        <div class="mb-3">
            <label>Price</label>
            <input type="number" class="form-control" name="price" placeholder="Price" value="{{ $course->price }}">
        </div>

        <div class="mb-3">
            <label>Hours</label>
            <input type="number" class="form-control" name="hourse" placeholder="Hours" value="{{ $course->hourse }}">
        </div>

        <div class="mb-3">
            <label>Calories</label>
            <input type="number" class="form-control" name="calories" placeholder="Calories" value="{{ $course->calories }}">
        </div>

        <div class="mb-3">
            <label>Workout</label>
            <input type="number" class="form-control" name="workout" placeholder="Workout" value="{{ $course->workout }}">
        </div>

        <div class="mb-3">
            <label>trainer_id</label>
            <select class="form-control" name="trainer_id">
                <option value="">Select</option>
                @foreach ($trainers as $item )
                    <option {{ $course->trainer_id == $item->id ? 'selected':'' }} value="{{ $item->id }}">{{ $item->name  }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>category_id</label>
            <select class="form-control" name="category_id">
                <option value="">Select</option>

                @foreach ($categories as $item )
                    <option {{ $course->category_id == $item->id ?'selected':'' }} value="{{ $item->id }}">{{ $item->name }}</option>
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
