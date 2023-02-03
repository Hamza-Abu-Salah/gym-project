@extends('admin.master')
@section('title','Edit Service | '.env('APP_NAME'))

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Edit Services</h1>

    <form action="{{ route('admin.services.update',$service->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
        @include('admin.error')

    <div class="mb-3">
        <label>Title</label>
        <input type="text" class="form-control" name="title" placeholder="Title" value="{{ $service->title }}">
    </div>

    <div class="mb-3">
        <label>Image</label>
        <input type="file" class="form-control" name="image">
        <img width="80" src="{{ asset('uploads/services/'.$service->image) }}" alt="">
    </div>

    <div class="mb-3">
        <label>Content</label>
        <input type="text" placeholder="Content" class="form-control" name="content" value="{{ $service->content }}">
    </div>

    <div class="mb-3">
        <label>Icon</label>
        <select name="type" class="form-control" >
            <option value="">select</option>
            @foreach ($service_all as $item )
                <option  value="{{ $item->type }}">{{ $service->type }}</option>
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
