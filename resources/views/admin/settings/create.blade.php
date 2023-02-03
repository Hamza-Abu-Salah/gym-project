@extends('admin.master')
@section('title', 'Add Setting | ' . env('APP_NAME'))

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="h3 mb-4 text-gray-800">Add settings</h1>
            <a href="{{ route('admin.settings.index') }}" class="btn btn-success px-4">All Setting</a>
        </div>

        <form action="{{ route('admin.settings.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label>Logo</label>
                <input type="file" class="form-control" name="logo" placeholder="Logo">
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email">
            </div>

            <div class="mb-3">
                <label>Location</label>
                <input type="text" class="form-control" name="location" placeholder="Location">
            </div>

            <div class="mb-3">
                <label>Seo_text</label>
                <input type="text" class="form-control" name="seo_text" placeholder="Seo_text">
            </div>

            <div class="mb-3">
                <label>Phone</label>
                <input type="text" class="form-control" name="phone" placeholder="Phone">
            </div>

            <div class="mb-3">
                <label>Footer_text</label>
                <input type="text" class="form-control" name="footer_text" placeholder="Footer_text">
            </div>

            <div class="mb-3">
                <label>Hero_img</label>
                <input type="file" class="form-control" name="hero_image" placeholder="Hero_img">
            </div>

            <div class="mb-3">
                <label>Hero_text</label>
                <input type="text" class="form-control" name="hero_text" placeholder="Hero_text">
            </div>

            <div class="mb-3">
                <label>Hero_btn_text</label>
                <input type="text" class="form-control" name="hero_btn_text" placeholder="Hero_btn_text">
            </div>

            <div class="mb-3">
                <label>Hero_btn_link</label>
                <input type="text" class="form-control" name="hero_btn_link" placeholder="Hero_btn_link">
            </div>

            <div class="mb-3">
                <label>Copyright</label>
                <input type="text" class="form-control" name="copyright" placeholder="Copyright">
            </div>

            <div class="mb-3">
                <label>Facebook</label>
                <input type="text" class="form-control" name="facebook" placeholder="Facebook">
            </div>

            <div class="mb-3">
                <label>Twitter</label>
                <input type="text" class="form-control" name="twitter" placeholder="Twitter">
            </div>

            <div class="mb-3">
                <label>Instagram</label>
                <input type="text" class="form-control" name="instagram" placeholder="Instagram">
            </div>

            <div class="mb-3">
                <label>Tiktok</label>
                <input type="text" class="form-control" name="tiktok" placeholder="Tiktok">
            </div>


            <button class="btn btn-success px-5">Add</button>
        </form>

    </div>
    <!-- /.container-fluid -->

@stop

@section('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.2.0/tinymce.min.js"
        integrity="sha512-tofxIFo8lTkPN/ggZgV89daDZkgh1DunsMYBq41usfs3HbxMRVHWFAjSi/MXrT+Vw5XElng9vAfMmOWdLg0YbA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        tinymce.init({
            selector: '.myedit'
        })
    </script>

@stop
