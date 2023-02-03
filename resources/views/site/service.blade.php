@extends('site.master')

@section('title', 'About | ' . env('APP_NAME'))

@section('content')

<div class="main-wrapper ">
    <section class="page-title bg-2">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
              <ul class="list-inline mb-0">
                <li class="list-inline-item"><a href="index.html" class="text-sm letter-spacing text-white text-uppercase font-weight-bold">Home</a></li>
                <li class="list-inline-item"><span class="text-white">|</span></li>
                <li class="list-inline-item"><a href="#" class="text-color text-uppercase text-sm letter-spacing">Our services</a></li>
              </ul>
               <h1 class="text-lg text-white mt-2">What We do</h1>
          </div>
        </div>
      </div>
    </section>

    <!-- Section About start -->
    <section class="section services">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="section-title">
                        <div class="divider mb-3"></div>
                        <h2>Our Services</h2>
                        <p class="mt-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. In error reprehenderit quam enim obcaecati, repudiandae officia a cumque nemo provident!</p>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach ($services as $service )
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="media align-items-center mb-4">
                      <img src="{{ asset('uploads/services/'.$service->image) }}" class="mr-3 w-50" alt="...">

                      <div class="media-body">
                        <span class="letter-spacing text-sm">Fitness</span>
                        <h4 class="mb-3 text-uppercase">{{ $service->title }}</h4>
                       <p>{{ $service->content }}</p>
                      </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Section About End -->


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


    </div>

@stop
