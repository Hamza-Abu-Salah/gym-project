@extends('admin.master')
@section('title','Natifactions | '.env('APP_NAME'))

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-4 text-gray-800">Natifactions</h1>
    </div>


    @foreach (\App\Models\Natifact::where('user_id',auth()->id())->get() as $item )
    <a class="dropdown-item d-flex align-items-center" href="#">
        <div class="mr-3">
            <div class="icon-circle bg-primary">
                <img class="img-profile rounded-circle"
                src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}">
            </div>
        </div>
        <div>
            <h4>{{ $item->user->name }}</h4>
            <div class="small text-gray-500">{{ $item->created_at }}</div>
            <span class="font-weight-bold">{{ $item->content }}</span>
        </div>
    </a>
    @endforeach

</div>
<!-- /.container-fluid -->

@stop
