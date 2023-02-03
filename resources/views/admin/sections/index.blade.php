@extends('admin.master')
@section('title','Sections | '.env('APP_NAME'))

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-4 text-gray-800">Sections</h1>
        <a href="{{ route('admin.sections.create') }}" class="btn btn-success px-4">Add Sections</a>
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
                 <th>Title</th>
                 <th>Content</th>
                 <th>image</th>
                 <th>Discount</th>
                 <th>Btn_Text</th>
                 <th>Btn_link</th>
                 <th>Action</th>
             </tr>
            </thead>
            <tbody>
             @foreach ( $sections as $section)
             <tr>
                 <td>{{ $section->id }}</td>
                 <td>{{ $section->title }}</td>
                 <td>{{ $section->content }}</td>
                 <td><img width="80" src="{{ asset('uploads/sections/'.$section->image) }}" alt=""></td>
                 <td>{{ $section->discount }}</td>
                 <td>{{ $section->btn_text }}</td>
                 <td>{{ $section->btn_link }}</td>

                 <td>
                     <a href="{{ route('admin.sections.edit',$section->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                     <form class="d-inline" action="{{ route('admin.sections.destroy',$section->id) }}" method="post">
                         @csrf
                         @method('delete')
                         <button class="btn btn-danger btn-sm" onclick="return confirm('Are Your Sure!')"><i class="fa fa-trash"></i></button>
                     </form>
                 </td>
             </tr>
             @endforeach

             {{ $sections->links() }}
            </tbody>
         </table>
    </div>

</div>
<!-- /.container-fluid -->

@stop
