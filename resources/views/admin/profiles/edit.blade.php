@extends('admin.master')
@section('title','Edit profile | '.env('APP_NAME'))

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Edit profiles</h1>

    <form action="{{ route('admin.profiles.update') }}" method="post" enctype="multipart/form-data">
    @csrf
        @include('admin.error')

    <div class="mb-3">
        <label>First Name</label>
        <input type="text" class="form-control" name="first_name" placeholder="first_name" value="{{ $user->first_name }}">
    </div>

    <div class="mb-3">
        <label> last Name</label>
        <input type="text" class="form-control" name="last_name" placeholder="last_name" value="{{ $user->last_name }}">
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" placeholder="Email" class="form-control" name="email" value="{{ $user->email }}">
    </div>
    <div class="mb-3">
        <label>phone</label>
        <input type="text" class="form-control" name="phone"  value="{{ $user->phone }}">
    </div>

    <div class="mb-3">
        <label>Image</label>
        <input type="file" class="form-control" name="image">
    </div>



    <button class="btn btn-primary px-5" type="submit">Update</button>
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
