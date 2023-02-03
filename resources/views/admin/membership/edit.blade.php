@extends('admin.master')
@section('title','Edit Category | '.env('APP_NAME'))

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Edit Memberships</h1>

    <form action="{{ route('admin.memberships.update',$membership->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
        @include('admin.error')

    <div class="mb-3">
        <label>Name</label>
        <input type="text" class="form-control" name="name" placeholder="Name" value="{{ $membership->name }}">
    </div>

    <div class="mb-3">
        <label>Image</label>
        <input type="file" class="form-control" name="image" >
        <img width="80" src="{{ asset('uploads/memberships/'.$membership->image) }}" alt="" >
    </div>

    <div class="mb-3">
        <label>Price</label>
        <input type="text" class="form-control" name="price" placeholder="Price" value="{{ $membership->price }}">
    </div>

    <div class="mb-3">
        <label>Per</label>
        <input type="text" class="form-control" name="per" placeholder="Per" value="{{ $membership->per }}">
    </div>

    <div class="mb-3">
        <label>Content</label>
        <input type="text" placeholder="myedit" class="form-control" name="content" value="{{ $membership->content }}">
    </div>

    <div class="mb-3">
        <label>Type</label>
        <ul class="list-unstyled">
            <input type="checkbox" name="fruits[]" value="Training overview" {{ $membership->fruits=="Training overview"? 'checked':'' }}> Training overview <br/>
            <input type="checkbox" name="fruits[]" value="Foundation Training" {{ $membership->fruits=="Foundation Training"? 'checked':'' }}> Foundation Training <br/>
            <input type="checkbox" name="fruits[]" value="Begineers Classes" {{ $membership->fruits=="Begineers Classes"? 'checked':'' }}> Begineers Classes <br/>
            <input type="checkbox" name="fruits[]" value="Olympic weighlifting" {{ $membership->fruits=="Olympic weighlifting"? 'checked':'' }}> Olympic weighlifting <br/>
            <input type="checkbox" name="fruits[]" value="Personal Training" {{ $membership->fruits=="Personal Training"? 'checked':'' }}> Personal Training <br/><br/>
        </ul>
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
