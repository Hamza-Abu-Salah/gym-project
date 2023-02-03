@extends('site.master')

@section('title', 'Home | ' . env('APP_NAME'))

@section('content')

    <div class="main-wrapper ">
        <!-- Section Menu End -->

        <!-- Section Slider Start -->
        <!-- Slider Start -->
        <section class="slider">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        @foreach ($home_settings as $setting)
                            <span class="h6 d-inline-block mb-4 subhead text-uppercase">Gym fitness club</span>
                            <h1 class="text-uppercase text-white mb-5">{{ $setting->hero_text }}

                            </h1>

                            <a href="pricing.html" target="_blank" class="btn btn-main ">{{ $setting->hero_btn_text }} <i
                                    class="ti-angle-right ml-3"></i>
                            </a>
                        @endforeach

                    </div>
                </div>
            </div>
        </section>
        <!-- Section Slider End -->

        <!-- Section Intro Start -->
        <section class="mt-80px">
            <div class="container">
                <div class="row ">
                    @foreach ($last_feature as $item )
                    <div class="col-lg-4 col-md-6">
                            <div class="card p-5 border-0 rounded-top border-bottom position-relative hover-style-1">
                                <span class="number">{{ $item->id }}</span>
                                <h3 class="mt-3">{{ $item->title }}</h3>
                                <p class="mt-3 mb-4">{{ $item->content }}
                                    </p>
                                <a href="about.html"
                                    class="text-color text-uppercase font-size-13 letter-spacing font-weight-bold"><i
                                        class="ti-minus mr-2 "></i>more Details
                                </a>
                            </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- Section Intro End -->

        <!-- Section About start -->
        <section class="section about">
            <div class="container">
                @foreach ($lasts_about as $abouts )
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <img src="{{ asset('uploads/abouts/'.$abouts->icon) }}" alt="" class="img-fluid rounded shadow w-100">
                    </div>

                    <div class="col-lg-6">
                        <div class="pl-3 mt-5 mt-lg-0">
                            <h2 class="mt-1 mb-3">We’ve skill in <br>wide <span class="text-color">{{$abouts->title}}</span> and Other body health facility. </h2>

                            <p class="mb-4">{{ $abouts->content }}</p>

                            <a href="#" class="btn btn-main">Learn More<i class="fa fa-angle-right ml-2"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </section>
        <!-- Section About End -->

        <!-- section Call To action start -->
        <section class="section cta">
            <div class="container">
                @foreach ($lasts_section as $section )
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-12 col-sm-12">
                        <div class="text-center">
                            <span class="h6 letter-spacing text-white">{{ $section->title }}</span>
                            <h2 class="text-lg mt-4 mb-5 text-white">
                                {{ $section->content }}<span class="text-color"> summer {{ $section->discount }}% </span>dicsount
                            </h2>

                            <a href="{{ route('site.membership') }}" class="btn btn-main text-white">{{ $section->btn_text}}</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
        <!-- section Call To action start -->

        <!-- Section Services Start -->
        <section class="section services ">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <div class="section-title">
                            <div class="divider mb-3"></div>
                            <h2>Our Services</h2>
                            <p>We offer more than 35 group exercis, aerobic classes each week.</p>
                        </div>
                    </div>
                </div>

                <div class="row no-gutters">
                    @foreach ($lasts_service as $service )
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="text-center  px-4 py-5 hover-style-1">
                            <i class="{{ $service->type }} text-lg text-color"></i>
                            <h4 class="mt-3 mb-4 text-uppercase">{{ $service->title }}</h4>
                            <p>{{ $service->content }}</p>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </section>
        <!-- Section Services End -->

        <!-- Section Gallery Start -->
        <section class="gallery">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <div class="section-title">
                            <div class="divider mb-3"></div>
                            <h2>Our gallery</h2>
                            <p>We offer more than 35 group exercis, aerobic classes each week.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid p-0">
                <div class="row no-gutters portfolio-gallery">

                    @foreach ($last_Gallery as $gallery )
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <a href="{{ asset('uploads/gallerys/'.$gallery->path) }}" class="popup-gallery">
                                <img src="{{ asset('uploads/gallerys/'.$gallery->path) }}" alt="" class="img-fluid">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Section Gallery END -->

        <!-- Section Testimonial Start -->
        <section class="section textimonial position-relative bg-3">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="row justify-content-center">
                            <div class="col-lg-12 text-center">
                                <div class="section-title">
                                    <div class="divider mb-3"></div>
                                    <h2 class="text-white">What People say</h2>
                                </div>
                            </div>
                        </div>

                        <div class="testimonial-slider">
                            @foreach ($last_testimonials as $testimonial )
                            <div class="text-center mb-4 ">
                                <i class="ti-quote-left text-lg text-color"></i>
                                <h3 class="mt-4 text-white letter-spacing">{{ $testimonial->title }}</h3>
                                <p class="my-4 text-white-50">{{ $testimonial->content }}</p>

                                <div>
                                    <h4 class="mb-0 text-capitalize text-white font-weight-normal">{{ $testimonial->name }}</h4>
                                    <span class="text-white-50">{{ $testimonial->position }}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Section Testimonial END -->

        <!-- Section Course Start -->
        <section class="section course bg-gray">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <div class="section-title">
                            <div class="divider mb-3"></div>
                            <h2>Popular Courses</h2>
                            <p>We offer more than 35 group exercis, aerobic classes each week.</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                 @foreach ($latest_course as $course )
                    <div class="col-lg-3 col-md-6">
                        <div class="card border-0 rounded-0 p-0 mb-5 mb-lg-0 shadow-sm">
                            <img src="{{ asset('uploads/courses/'.$course->image) }}" alt="" class="img-fluid">

                            <div class="card-body">
                                <a href="{{ route('site.course', $course->id) }}">
                                    <h4 class="font-secondary mb-0">Build Body</h4>
                                </a>
                                <p class=" mb-2">Mentor: {{ $course->name }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="mt-5 text-center">
                            <a href="course.html" class="btn btn-main">See all our Courses</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Section Course ENd -->

    @stop
