@extends('admin.master')
@section('title','Add Gallery | '.env('APP_NAME'))

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-4 text-gray-800">Add gallerys</h1>
        <a href="{{ route('admin.gallerys.index') }}" class="btn btn-success px-4">All Gallery</a>
    </div>

    <form action="{{ route('admin.gallerys.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @include('admin.error')

        <div class="mb-3">
            <label>Path</label>
            <input type="file" class="form-control" name="path" >
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
