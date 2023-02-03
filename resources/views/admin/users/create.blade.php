@extends('admin.master')
@section('title','Add User | '.env('APP_NAME'))

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-4 text-gray-800">Add Users</h1>
        <a href="{{ route('admin.users.index') }}" class="btn btn-success px-4">All User</a>
    </div>

    <form action="{{ route('admin.users.store') }}" method="post" >
    @csrf
        @include('admin.error')

        <div class="mb-3">
            <label>First Name</label>
            <input type="text" class="form-control" name="first_name" placeholder="First Name">
        </div>

        <div class="mb-3">
            <label>Last Name</label>
            <input type="text" class="form-control" name="last_name" placeholder="last Name" >
        </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" class="form-control" name="email" placeholder="Email">
    </div>
    <div class="mb-3">
        <label>Password</label>
        <input type="password" class="form-control" name="password" placeholder="Password">
    </div>

    <div class="mb-3">
        <label>Phone</label>
        <input type="text" placeholder="phone" class="form-control" name="phone" >
    </div>

    <div class="mb-3">
        <label>Image</label>
        <input type="file"  class="form-control" name="image">
    </div>

    <div class="mb-3">
        <label>Type</label>
        <select name="type" class="form-control" >
            <option value="">Select</option>
            <option value="admin">Admin</option>
            <option value="trainer">Trainer</option>
            <option value="user">User</option>
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
