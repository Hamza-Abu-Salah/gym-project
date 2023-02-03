@extends('admin.master')
@section('title','Edit Trainer | '.env('APP_NAME'))

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Edit Trainers</h1>

    <form action="{{ route('admin.trainers.update',$trainer->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
        @include('admin.error')

    <div class="mb-3">
        <label>Name</label>
        <input type="text" class="form-control" name="name" placeholder="Name" value="{{ $trainer->name }}">
    </div>

    <div class="mb-3">
        <label>Image</label>
        <input type="file" class="form-control" name="image" >
        <img width="80" src="{{ asset('uploads/trainers/'.$trainer->image) }}" alt="">
    </div>

    <div class="mb-3">
        <label>specialization</label>
        <input type="text" placeholder="specialization" class="form-control" name="specialization" value="{{ $trainer->specialization }}">
    </div>

    <div class="mb-3">
        <label>content</label>
        <textarea class="myedit" placeholder=" Content" name="content" value="{{ $trainer->content }}"></textarea>
    </div>

    <div class="mb-3">
        <label>Facebook</label>
        <input type="text" class="form-control" placeholder="Facebook " name="facebook" value="{{ $trainer->facebook }}">
    </div>

    <div class="mb-3">
        <label>Twitter</label>
        <input type="text" class="form-control" placeholder="Twitter  " name="twitter" value="{{ $trainer->twitter }}">
    </div>

    <div class="mb-3">
        <label>Instagram</label>
        <input type="text" class="form-control" placeholder="Instagram" name="instagram" value="{{ $trainer->instagram }}">
    </div>

    <div class="mb-3">
        <label>Linkedin</label>
        <input type="text" class="form-control" placeholder="Linkedin " name="linkedin" value="{{ $trainer->linkedin }}">
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
