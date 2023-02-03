@extends('admin.master')
@section('title','Edit User | '.env('APP_NAME'))

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Edit Users</h1>

    <form action="{{ route('admin.users.update',$user->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
        @include('admin.error')

    <div class="mb-3">
        <label>First Name</label>
        <input type="text" class="form-control" name="first_name" placeholder="First Name" value="{{ $user->first_name }}">
    </div>

    <div class="mb-3">
        <label>Last Name</label>
        <input type="text" class="form-control" name="last_name" placeholder="last Name" value="{{ $user->last_name }}">
    </div>


    <div class="mb-3">
        <label>Email</label>
        <input type="email" class="form-control" name="email" placeholder="Email" value="{{ $user->email }}">
    </div>

    <div class="mb-3">
        <label>Phone</label>
        <input type="text" placeholder="Phone" class="form-control" name="phone" value="{{ $user->phone }}">
    </div>

    <div class="mb-3">
        <label>Image</label>
        <input type="file"  class="form-control" name="image">
    </div>

    <div class="mb-3">
        <label>Type</label>
        <select name="type" class="form-control" >
            <option value="">select</option>
            @foreach ($users as $item )
                <option {{ $user->type == $item->id ? 'selected':'' }} value="{{ $item->id }}">{{ $user->type }}</option>
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
