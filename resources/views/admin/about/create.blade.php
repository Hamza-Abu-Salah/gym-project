@extends('admin.master')
@section('title','Add About | '.env('APP_NAME'))

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-4 text-gray-800">Add Abouts</h1>
        <a href="{{ route('admin.abouts.index') }}" class="btn btn-success px-4">All About</a>
    </div>

    <form action="{{ route('admin.abouts.store') }}" method="post" enctype="multipart/form-data">
    @csrf
        @include('admin.error')

    <div class="mb-3">
        <label>Title</label>
        <input type="text" class="form-control" name="title" placeholder="title">
    </div>

    <div class="mb-3">
        <label>Content</label>
        <input type="text" class="form-control" name="content" placeholder="Content">
    </div>

    <div class="mb-3">
        <label>Image 1</label>
        <input type="file" class="form-control" name="image" >
    </div>

    <div class="mb-3">
        <label>Image 2</label>
        <input type="file" class="form-control" name="icon" >
    </div>

    <div class="mb-3">
        <label>Experience</label>
        <input type="number" class="form-control" name="experience" placeholder="Experience">
    </div>

    <div class="mb-3">
        <label>start_playing</label>
        <input type="number" class="form-control" name="start_playing" placeholder="start_playing">
    </div>


    <button class="btn btn-success px-5">Add</button>
    </form>

</div>
<!-- /.container-fluid -->

@stop


