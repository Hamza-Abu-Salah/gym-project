@extends('admin.master')
@section('title','Add Service | '.env('APP_NAME'))

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-4 text-gray-800">Add services</h1>
        <a href="{{ route('admin.services.index') }}" class="btn btn-success px-4">All Service</a>
    </div>

    <form action="{{ route('admin.services.store') }}" method="post" enctype="multipart/form-data">
    @csrf
        @include('admin.error')

    <div class="mb-3">
        <label>Title</label>
        <input type="text" class="form-control" name="title" placeholder="Name">
    </div>

    <div class="mb-3">
        <label>Image</label>
        <input type="file" class="form-control" name="image">
    </div>

    <div class="mb-3">
        <label>Icon</label>
        <select name="type" class="form-control" >
            <option value="">Select</option>
            <option value="cofont-dumbbells ">cofont-dumbbells </option>
            <option value="icofont-muscle ">icofont-muscle </option>
            <option value="icofont-fruits ">icofont-fruits </option>
            <option value="icofont-thumbs-up ">icofont-thumbs-up </option>
            <option value="icofont-ui-fire-wall ">icofont-ui-fire-wall </option>
            <option value="icofont-bill-alt ">icofont-bill-alt </option>
            <option value="icofont-gym-alt-2 ">icofont-gym-alt-2 </option>
            <option value="icofont-cycling-alt ">icofont-cycling-alt </option>
            <option value="icofont-gym-alt-3 ">icofont-gym-alt-3 </option>
            <option value="icofont-muscle ">icofont-muscle </option>
            <option value="icofont-dumbbell ">icofont-dumbbell </option>
            <option value="icofont-gym ">icofont-gym </option>
        </select>
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
