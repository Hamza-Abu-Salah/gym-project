@extends('admin.master')
@section('title','Message | '.env('APP_NAME'))

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-4 text-gray-800">All Message</h1>
    </div>

            <h6 class="dropdown-header">
                Message Center
            </h6>
                @foreach ($messages as $message )
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="dropdown-list-image mr-3">
                        <img class="rounded-circle" src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" alt="...">
                        <div class="status-indicator bg-success"></div>
                    </div>
                    <div class="font-weight-bold">
                        <div class="text-truncate">{{$message->message}}</div>
                        <div class="small text-gray-500">{{ $message->name }} · {{$message->created_at->diffForHumans()}}</div>
                    </div>
                </a>
                @endforeach
            <a class="dropdown-item text-center small text-gray-500" href="#">Read More
                Messages</a>



</div>
<!-- /.container-fluid -->

@stop
