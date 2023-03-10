@extends('site.master')

@section('title', 'blog-sidebar | ' . env('APP_NAME'))

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
                                    class="text-color text-uppercase text-sm letter-spacing">our blog</a></li>
                        </ul>
                        <h1 class="text-lg text-white mt-2">blog article</h1>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section Blog start -->
        <section class="section blog bg-gray">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="row">
                            @foreach ($crids as  $crid)
                            <div class="col-lg-6 col-md-6">
                                <article class="card border-0 rounded-0 mb-4">
                                    <img src="{{ asset('uploads/crids/'.$crid->image) }}" alt="" class="img-fluid">

                                    <div class="mt-3 px-4 py-3 ">
                                        <div class="blog-post-meta text-capitalize mb-2">
                                            <span class="post-meta date-meta mr-2">
                                                <i class="ti-calendar mr-2"></i>{{ $crid->day }}</span>

                                            <span class="post-meta author"><i class="ti-user mr-2 text-muted"></i>{{$crid->trainer->name}}</span>
                                        </div>
                                        <a href="blog-single.html">
                                            <h4 class="mb-3 font-secondary">{{ $crid->title }}</h4>
                                        </a>

                                        <p class="mb-4">{{$crid->content}}</p>

                                        <a href="blog-single.html" class="text-color mb-3 d-block"><i
                                                class="ti-minus mr-2"></i> Read More</a>
                                    </div>
                                </article>
                            </div>
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-lg-12 mt-5">
                                <nav aria-label="Page navigation ">
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                        <li class="page-item active" aria-current="page"><a class="page-link"
                                                href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card border-0 rounded-0 mb-5">
                            <form action="#" class="search position-relative">
                                <input type="text" placeholder="Search" class="form-control">
                                <i class="ti-search"></i>
                            </form>
                        </div>

                        <div class="mb-5 follow">
                            <h5 class="font-secondary mb-4"><i class="ti-minus mr-2 text-color"></i>Follow us</h5>

                            <a href="#" class="text-muted"><i class="ti-facebook"></i></a>
                            <a href="#" class="text-muted"><i class="ti-twitter"></i></a>
                            <a href="#" class="text-muted"><i class="ti-linkedin"></i></a>
                            <a href="#" class="text-muted"><i class="ti-pinterest"></i></a>
                            <a href="#" class="text-muted"><i class="ti-dribbble"></i></a>
                        </div>


                        <div class="mb-5">
                            <h5 class="font-secondary mb-4"><i class="ti-minus mr-2 text-color"></i>Popular posts</h5>

                            <div class="media mb-4">
                                <img src="images/blog/blog-post-5.jpg" alt=""
                                    class="img-fluid pr-4 w-50 align-self-center">
                                <div class="media-body">
                                    <a href="#" class="text-black d-block lh-25"> Track your daily body
                                        fitness</a>
                                </div>
                            </div>

                            <div class="media mb-4">
                                <img src="images/blog/blog-post-6.jpg" alt=""
                                    class="img-fluid pr-4 w-50 align-self-center">
                                <div class="media-body">
                                    <a href="#" class="text-black d-block lh-25">Keep your body fitness
                                        track</a>
                                </div>
                            </div>

                            <div class="media mb-4">
                                <img src="images/blog/post1.jpg" alt=""
                                    class="img-fluid pr-4 w-50 align-self-center">
                                <div class="media-body">
                                    <a href="#" class="text-black d-block lh-25">Keep your body fitness
                                        track</a>
                                </div>
                            </div>
                        </div>


                        <div class="mb-5 categories">
                            <h5 class="font-secondary mb-4"><i class="ti-minus mr-2 text-color"></i>Categories</h5>

                            <ul class="list-group">
                                @foreach ($categories as $category )
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center rounded-0 border-0">
                                        <a href="#" class="text-muted">{{ $category->name }}</a>
                                        <span class="badge bg-primary badge-pill text-white border-0">{{$category->count() }}</span>
                                    </li>
                                @endforeach

                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- Section Blog End -->
@stop
