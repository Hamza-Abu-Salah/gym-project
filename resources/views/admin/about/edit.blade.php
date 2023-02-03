@extends('admin.master')
@section('title','Edit About | '.env('APP_NAME'))

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Edit Abouts</h1>

    <form action="{{ route('admin.abouts.update',$about->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
        @include('admin.error')

    <div class="mb-3">
        <label>Title</label>
        <input type="title" class="form-control" name="title" placeholder="title" value="{{ $about->title }}">
    </div>

    <div class="mb-3">

    <div class="mb-3">
        <label>Content</label>
        <input type="text" placeholder="Content" class="form-control" name="content" value="{{ $about->content }}">
    </div>

    <div class="mb-3">
        <label>Image 1</label>
        <input type="file" class="form-control" name="image" >
        <img width="80" src="{{ asset('uploads/abouts/'.$about->image) }}" alt="">

    </div>

    <label>Image 2</label>
        <input type="file" class="form-control" name="icon" >
        <img width="80" src="{{ asset('uploads/abouts/'.$about->icon) }}" alt="">
    </div>

    <div class="mb-3">
        <label>Experience</label>
        <input type="number" class="form-control" name="experience" placeholder="Experience" value="{{ $about->experience }}">
    </div>

    <div class="mb-3">
        <label>start_playing</label>
        <input type="number" class="form-control" name="start_playing" placeholder="start_playing" value="{{ $about->start_playing }}">
    </div>



    <button class="btn btn-primary px-5">Update</button>
    </form>

</div>
<!-- /.container-fluid -->

@stop

