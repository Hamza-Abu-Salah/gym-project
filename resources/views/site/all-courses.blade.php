@extends('site.master')

@section('title', 'Courses | ' . env('APP_NAME'))

@section('content')


    <div class="main-wrapper ">
        <section class="page-title bg-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item"><a href="index.html"
                                    class="text-sm letter-spacing text-white text-uppercase font-weight-bold">Home</a>
                            </li>
                            <li class="list-inline-item"><span class="text-white">|</span></li>
                            <li class="list-inline-item"><a href="#"
                                    class="text-color text-uppercase text-sm letter-spacing">Course</a></li>
                        </ul>
                        <h1 class="text-lg text-white mt-2">Best Courses</h1>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section Course Start -->
        <section class="section course">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <div class="section-title">
                            <div class="divider mb-3"></div>
                            <h2>Popular Courses</h2>
                        </div>
                    </div>
                </div>

                <div class="row">
                    @foreach ($lasts_course as $course )
                    <div class="col-lg-4 col-md-6">
                        <div class="card rounded-0 p-0 mb-5">
                            <img src="{{ asset('uploads/courses/'.$course->image) }}" alt="" class="img-fluid">

                            <div class="card-body">
                                <a href="{{ route('site.course', $course->id) }}">
                                    <h4 class="mt-3 mb-0">Build Body</h4>
                                </a>
                                <p class=" mb-2">Mentor: {{ $course->name }}</p>
                                @foreach ($course->schedules as $schedule )
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <i class="ti-time mr-2 text-color"></i>Monday-Tuesday :
                                    </li>
                                    <li class="list-inline-item text-black">
                                        <strong>{{$schedule->start_hour  }}am-{{ $schedule->end_hour  }}pm</strong>
                                    </li>
                                </ul>
                                @endforeach

                            </div>
                        </div>
                    </div>

                    @endforeach
                </div>
            </div>
        </section>
        <!-- Section Course ENd -->

@stop
