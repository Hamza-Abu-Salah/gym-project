@extends('admin.master')
@section('title','Add Testimonial | '.env('APP_NAME'))

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-4 text-gray-800">Add testimonials</h1>
        <a href="{{ route('admin.testimonials.index') }}" class="btn btn-success px-4">All Testimonial</a>
    </div>

    <form action="{{ route('admin.testimonials.store') }}" method="post" enctype="multipart/form-data">
    @csrf
        @include('admin.error')

    <div class="mb-3">
        <label>Name</label>
        <input type="text" class="form-control" name="name" placeholder="Name">
    </div>

    <div class="mb-3">
        <label>Title</label>
        <input type="text" class="form-control" name="title" placeholder="Title" >
    </div>

    <div class="mb-3">
        <label>Position</label>
        <input type="text" class="form-control" name="position" placeholder="position">
    </div>
    <div class="mb-3">
        <label>image</label>
        <input type="file" class="form-control" name="image" >
    </div>

    <div class="mb-3">
        <label>Content</label>
        <input type="text" class="form-control" name="content" placeholder="Content">
    </div>


    <button class="btn btn-success px-5">Add</button>
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
