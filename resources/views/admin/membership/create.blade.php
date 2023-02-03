@extends('admin.master')
@section('title','Add Membership | '.env('APP_NAME'))

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-4 text-gray-800">Add memberships</h1>
        <a href="{{ route('admin.memberships.index') }}" class="btn btn-success px-4">All Membership</a>
    </div>

    <form action="{{ route('admin.memberships.store') }}" method="post" enctype="multipart/form-data">
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
        <label>Price</label>
        <input type="text" class="form-control" name="price" placeholder="Price">
    </div>

    <div class="mb-3">
        <label>Per</label>
        <input type="text" class="form-control" name="per" placeholder="Per">
    </div>

    <div class="mb-3">
        <label>Content</label>
        <input type="text" class="myedit" name="content" placeholder="Content">
    </div>

    <div class="mb-3">
        <input type="checkbox" name="fruits[]" value="Training overview"> Training overview<br/>
        <input type="checkbox" name="fruits[]" value="Foundation Training"> Foundation Training<br/>
        <input type="checkbox" name="fruits[]" value="Begineers Classes"> Begineers Classes <br/>
        <input type="checkbox" name="fruits[]" value="Olympic weighlifting"> Olympic weighlifting <br/>
        <input type="checkbox" name="fruits[]" value="Personal Training"> Personal Training <br/><br/>

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
