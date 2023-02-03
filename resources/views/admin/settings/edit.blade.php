@extends('admin.master')
@section('title', 'Edit Setting | ' . env('APP_NAME'))

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Edit Settings</h1>

        <form action="{{ route('admin.settings.update', $setting->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('admin.error')

            <div class="mb-3">
                <label>Logo</label>
                <input type="file" class="form-control" name="logo" placeholder="Logo">
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email" {{ $setting->email}}>
            </div>

            <div class="mb-3">
                <label>Location</label>
                <input type="text" class="form-control" name="location" placeholder="Location" {{ $setting->location}}>
            </div>

            <div class="mb-3">
                <label>Seo_text</label>
                <input type="text" class="form-control" name="seo_text" placeholder="Seo_text" {{ $setting->seo_text}}>
            </div>

            <div class="mb-3">
                <label>Phone</label>
                <input type="text" class="form-control" name="phone" placeholder="Phone" {{ $setting->phone}}>
            </div>

            <div class="mb-3">
                <label>Footer_text</label>
                <input type="text" class="form-control" name="footer_text" placeholder="Footer_text" {{ $setting->footer_text}}>
            </div>

            <div class="mb-3">
                <label>Hero_img</label>
                <input type="file" class="form-control" name="hero_image" placeholder="Hero_img">
            </div>

            <div class="mb-3">
                <label>Hero_text</label>
                <input type="text" class="form-control" name="hero_text" placeholder="Hero_text" {{ $setting->hero_text}}>
            </div>

            <div class="mb-3">
                <label>Hero_btn_text</label>
                <input type="text" class="form-control" name="hero_btn_text" placeholder="Hero_btn_text" {{ $setting->hero_btn_text}}>
            </div>

            <div class="mb-3">
                <label>Hero_btn_link</label>
                <input type="text" class="form-control" name="hero_btn_link" placeholder="Hero_btn_link" {{ $setting->hero_btn_text}}>
            </div>

            <div class="mb-3">
                <label>Copyright</label>
                <input type="text" class="form-control" name="copyright" placeholder="Copyright" {{ $setting->copyright}}>
            </div>

            <div class="mb-3">
                <label>Facebook</label>
                <input type="text" class="form-control" name="facebook" placeholder="Facebook" {{ $setting->facebook}}>
            </div>

            <div class="mb-3">
                <label>Twitter</label>
                <input type="text" class="form-control" name="twitter" placeholder="Twitter" {{ $setting->twitter}}>
            </div>

            <div class="mb-3">
                <label>Instagram</label>
                <input type="text" class="form-control" name="instagram" placeholder="Instagram" {{ $setting->instagram}}>
            </div>

            <div class="mb-3">
                <label>Tiktok</label>
                <input type="text" class="form-control" name="tiktok" placeholder="Tiktok" {{ $setting->tiktok}}>
            </div>

            <button class="btn btn-primary px-5">Update</button>
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
