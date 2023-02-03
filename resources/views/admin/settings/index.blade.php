@extends('admin.master')
@section('title','Settings | '.env('APP_NAME'))

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-4 text-gray-800">Settings</h1>
        <a href="{{ route('admin.settings.create') }}" class="btn btn-success px-4">Add Settings</a>
    </div>
    @if (session('msg'))
        <div class="alert alert-{{ session('type') }}">
            {{ session('msg') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover ">
            <thead class="table-dark">
             <tr >
                 <th>ID</th>
                 <th>Logo</th>
                 <th>Email</th>
                 <th>Location</th>
                 <th>Seo_text</th>
                 <th>Phone</th>
                 <th>Footer_text</th>
                 <th>Hero_text</th>
                 <th>Hero_btn_text</th>
                 <th>Hero_btn_link</th>
                 <th>Hero_img</th>
                 <th>Copyright</th>
                 <th>Facebook</th>
                 <th>Twitter</th>
                 <th>Instagram</th>
                 <th>Tiktok</th>
                 <th>Action</th>
             </tr>
            </thead>
            <tbody>
             @foreach ( $settings as $setting)
             <tr>
                 <td>{{ $setting->id }}</td>
                 <td><img width="80" src="{{ asset('uploads/settings/logo/'.$setting->logo) }}" alt=""></td>
                 <td>{{ $setting->email }}</td>
                 <td>{{ $setting->location }}</td>
                 <td>{{ $setting->seo_text }}</td>
                 <td>{{ $setting->phone }}</td>
                 <td>{{ $setting->footer_text }}</td>
                 <td>{{ $setting->hero_text }}</td>
                 <td>{{ $setting->hero_btn_text }}</td>
                 <td>{{ $setting->hero_btn_link }}</td>
                 <td><img width="80" src="{{ asset('uploads/settings/'.$setting->hero_image) }}" alt=""></td>
                 <td>{{ $setting->copyright }}</td>
                 <td>{{ $setting->facebook }}</td>
                 <td>{{ $setting->twitter }}</td>
                 <td>{{ $setting->instagram }}</td>
                 <td>{{ $setting->tiktok }}</td>
                 {{--  --}}
                 <td>
                     <a href="{{ route('admin.settings.edit',$setting->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                     <form class="d-inline" action="{{ route('admin.settings.destroy',$setting->id) }}" method="post">
                         @csrf
                         @method('delete')
                         <button class="btn btn-danger btn-sm" onclick="return confirm('Are Your Sure!')"><i class="fa fa-trash"></i></button>
                     </form>
                 </td>
             </tr>
             @endforeach

             {{ $settings->links() }}
            </tbody>
         </table>
    </div>


</div>
<!-- /.container-fluid -->

@stop
