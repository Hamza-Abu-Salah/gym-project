@extends('site.master')

@section('title', 'About | ' . env('APP_NAME'))

@section('content')

    <div class="main-wrapper ">
        <section class="page-title bg-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item"><a href="index.html"
                                    class="text-sm letter-spacing text-white text-uppercase font-weight-bold">Home</a></li>
                            <li class="list-inline-item"><span class="text-white">|</span></li>
                            <li class="list-inline-item"><a href="#"
                                    class="text-color text-uppercase text-sm letter-spacing">About us</a></li>
                        </ul>
                        <h1 class="text-lg text-white mt-2">What we are</h1>
                    </div>
                </div>
            </div>
        </section>


        <!-- Section About start -->
       <section class="section about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-6">
                    <img src="{{ asset('uploads/abouts/'.$about->icon) }}" alt="" class="img-fluid">
                </div>
                <div class="col-lg-3 mt-lg-4 col-md-6">
                    <img src="{{ asset('uploads/abouts/'.$about->image) }}" alt="" class="img-fluid">
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="about-item position-relative mt-5 mt-lg-0">
                        <span class="h5 text-lg text-muted">Est:{{ $about->start_playing }}</span>
                        <h2 class="mt-1 mb-3">Having <span class="text-color">{{ $about->experience }} years</span> of experience in fitness
                        </h2>

                        <p class="mb-4">{{ $about->content }}</p>

                        <a href="service.html" class="btn btn-main">Services<i class="ti-angle-right ml-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
        <!-- Section About End -->
        <section class="section why">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <div class="section-title">
                            <div class="divider mb-3"></div>
                            <h2>Why CHoose us</h2>
                        </div>
                    </div>
                </div>

                <div class="row ">
                    @foreach (\App\Models\Service::get() as $service )
                    <div class="col-lg-4 col-md-6">
                        <div class="{{ $loop->odd ? 'card p-4 text-center mb-4 border-0 bg-black-50 rounded-0 ' : 'card p-4 text-center border-0 mb-4 rounded-0' }}">
                            <i class="{{ $service->type }}  text-lg text-color"></i>
                            <h3 class=" {{ $loop->odd ? 'mt-3 text-white ' : 'mt-3' }}">{{ $service->title }} </h3>
                            <p class=" {{ $loop->odd ? 'mt-3 mb-4 text-white' : 'mt-3 mb-4' }}">{{ $service->content }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>



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


        <!-- footer Start -->
    </div>

@stop
