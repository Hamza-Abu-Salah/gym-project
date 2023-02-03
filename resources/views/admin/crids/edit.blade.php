@extends('admin.master')
@section('title','Edit Crid | '.env('APP_NAME'))

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Edit Crids</h1>

    <form action="{{ route('admin.crid.update',$crid->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
        @include('admin.error')

    <div class="mb-3">
        <label>Title</label>
        <input type="title" class="form-control" name="title" placeholder="title" value="{{ $crid->title }}">
    </div>

    <div class="mb-3">

    <div class="mb-3">
        <label>Content</label>
        <input type="text" placeholder="Content" class="myedit" name="content" value="{{ $crid->content }}">
    </div>

    <div class="mb-3">
        <label>Image</label>
        <input type="file" class="form-control" name="image" >
        <img width="80" src="{{ asset('uploads/crids/'.$crid->image) }}" alt="">

    </div>

    <div class="mb-3">
        <label>Day</label>
        <input type="date" class="form-control" name="day" placeholder="day" value="{{ $crid->day }}">
    </div>

    <div class="mb-3">
        <label>trainer_id</label>
        <select class="form-control" name="trainer_id">
            <option value="">Select</option>
            @foreach ($trainers as $item )
                <option {{ $crid->trainer_id == $item->id ? 'selected':'' }} value="{{ $item->id }}">{{ $item->name  }}</option>
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




