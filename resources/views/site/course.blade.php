@extends('site.master')

@section('title', 'Coruses | ' . env('APP_NAME'))

@section('content')

    <!-- Header Close -->

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
                                    class="text-color text-uppercase text-sm letter-spacing">Course single</a></li>
                        </ul>
                        <h1 class="text-lg text-white mt-2">Body Fitness</h1>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section Course Start -->
        <section class="section course">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12">
                        <div class="single-course">
                            <img src="{{ asset('uploads/courses/'.$corse->image) }}" alt="" class="img-fluid">

                            <ul class="list-group list-group-horizontal-sm mt-5 mb-4">
                                <li class="list-group-item "><span class="text-lg text-color">{{ $corse->hourse }}</span> Hours</li>
                                <li class="list-group-item"><span class="text-lg text-color">{{ $corse->calories }}+</span> calories
                                    burnt</li>
                                <li class="list-group-item"><span class="text-lg text-color">{{ $corse->workout  }}%</span> workout
                                    intensity</li>
                            </ul>
                            <p>{{ $corse->content  }}</p>
                                <div class="row mt-5">
                                    <div class="col-lg-12">
                                        <h3 class="mb-4">Class Schedule</h3>
                                    </div>
                                        <div class="col-sm-4">
                                            <div class="card bg-gray rounded-0">
                                                <div class="card-body">
                                                    <h4 class="card-title mb-1"><i class="ti-timer mr-2"></i>{{ $schedule->day }}</h4>
                                                    <p class="card-text">{{ $schedule->start_hour }}am-{{ $schedule->end_hour }}pm</p>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="course-widget border py-4 px-2 mt-5 mt-lg-0">
                            <h3 class="text-center mb-3">Class Features</h3>
                            <ul class="list-group  list-group-flush">

                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center text-black">
                                    Category<span class="text-black-50">{{ $corse->category->name }}</span>
                                </li>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center text-black">
                                    Duration<span class="text-black-50">{{ $corse->duration }} days</span>
                                </li>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center text-black">
                                    Students<span class="text-black-50">{{ $corse->student }}</span>
                                </li>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center text-black">
                                    Shift<span class="text-black-50">{{ $corse->trainer->name }}</span>
                                </li>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center text-black">
                                    Price<span class="text-black-50">{{ $corse->price }}$</span>
                                </li>
                            </ul>
                            <div class="text-center mt-3">
                                <a href="#" class="btn btn-main">Join Now</a>
                            </div>
                        </div>
                        <div class="course-widget py-4 px-2 mt-3">
                            <h3 class="text-center mb-3">Class Catgories</h3>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><a href="#"><i
                                            class="ti-angle-right mr-2"></i>Boxing</a> </li>
                                <li class="list-group-item"><a href="#"> <i
                                            class="ti-angle-right mr-2"></i>Cycling</a></li>
                                <li class="list-group-item"><a href="#"> <i
                                            class="ti-angle-right mr-2"></i>Yoga</a></li>
                                <li class="list-group-item"><a href="#"> <i
                                            class="ti-angle-right mr-2"></i>Meditation</a></li>
                                <li class="list-group-item"><a href="#"> <i class="ti-angle-right mr-2"></i>Gym
                                        fitness</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Section Course ENd -->

        <!-- footer Start -->
@stop
