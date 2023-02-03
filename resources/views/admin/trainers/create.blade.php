@extends('admin.master')
@section('title','Add Trainer | '.env('APP_NAME'))

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-4 text-gray-800">Add Trainers</h1>
        <a href="{{ route('admin.trainers.index') }}" class="btn btn-success px-4">All Trainer</a>
    </div>

    <form action="{{ route('admin.trainers.store') }}" method="post" enctype="multipart/form-data">
    @csrf
        @include('admin.error')

    <div class="mb-3">
        <label>Name</label>
        <input type="text" class="form-control" name="name" placeholder="Name">
    </div>

    <div class="mb-3">
        <label>Image</label>
        <input type="file" class="form-control" name="image" >
    </div>

    <div class="mb-3">
        <label>specialization</label>
        <input type="text" placeholder="specialization" class="form-control" name="specialization" >
    </div>

    <div class="mb-3">
        <label>content</label>
        <textarea class="myedit" placeholder="Arabic Content" name="content"></textarea>
    </div>

    <div class="mb-3">
        <label>Facebook</label>
        <input type="text" class="form-control" placeholder="Facebook " name="facebook">
    </div>

    <div class="mb-3">
        <label>Twitter</label>
        <input type="text" class="form-control" placeholder="Twitter  " name="twitter">
    </div>

    <div class="mb-3">
        <label>Instagram</label>
        <input type="text" class="form-control" placeholder="Instagram" name="instagram">
    </div>

    <div class="mb-3">
        <label>Linkedin</label>
        <input type="text" class="form-control" placeholder="Linkedin " name="linkedin">
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
