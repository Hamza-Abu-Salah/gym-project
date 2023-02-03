@extends('admin.master')
@section('title','Add Crid | '.env('APP_NAME'))

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-4 text-gray-800">Add Crids</h1>
        <a href="{{ route('admin.crid.index') }}" class="btn btn-success px-4">All Crid</a>
    </div>

    <form action="{{ route('admin.crid.store') }}" method="post" enctype="multipart/form-data">
    @csrf
        @include('admin.error')

    <div class="mb-3">
        <label>Title</label>
        <input type="text" class="form-control" name="title" placeholder="title">
    </div>

    <div class="mb-3">
        <label>Content</label>
        <input type="text" class="myedit" name="content" placeholder="Content">
    </div>

    <div class="mb-3">
        <label>Image</label>
        <input type="file" class="form-control" name="image" >
    </div>

    <div class="mb-3">
        <label>Day</label>
        <input type="date" class="form-control" name="day" placeholder="Day">
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


