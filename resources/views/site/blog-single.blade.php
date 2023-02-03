@extends('site.master')

@section('title', 'blog-single | ' . env('APP_NAME'))

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
                                    class="text-color text-uppercase text-sm letter-spacing">blog single</a></li>
                        </ul>
                        <h1 class="text-lg text-white mt-2">Enhance beauty Health</h1>
                    </div>
                </div>
            </div>
        </section>


        <!-- Section Blog start -->
        <section class="section blog bg-gray">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-9 col-md-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <img src="{{ asset('uploads/crids/' . $crid->image) }}" alt="" class="img-fluid">
                                <p class="mt-4">{!! Str::words($crid->content, 20, '...') !!}</p>

                                <blockquote class="blockquote p-4 bg-white text-black font-italic my-5">
                                    <i class="ti-quote-left text-lg text-color mr-2"></i>Merupakan fakta bahwa seorang
                                    pembaca akan terpengaruh oleh isitue tulisan dari sebuah halaman saat ia melihat
                                    tata letaknya. Maksud penggunaan Lorem Ipsum adalah karena ia kurang lebih memiliki
                                    penyebaran huruf.
                                </blockquote>

                                <div class="media mb-4">
                                    <img src="{{ asset('uploads/crids/' . $crid->image) }}" alt=""
                                        class="img-fluid mr-4">
                                    <div class="media-body">
                                        <p>{!! Str::words($crid->content, 20, '...') !!}</p>
                                    </div>
                                </div>

                                <div class="post-tags my-5 text-uppercase font-size-12 letter-spacing text-center">
                                    <a href="#" class="mr-2 text-black"><i
                                            class="ti-bookmark mr-2 text-color"></i>Yoga </a>
                                    <a href="#" class="mr-2 text-black"><i
                                            class="ti-bookmark mr-2 text-color"></i>Meditation</a>
                                    <a href="#" class="mr-2 text-black"><i
                                            class="ti-bookmark mr-2 text-color"></i>Nutirtion</a>
                                    <a href="#" class="mr-2 text-black"><i
                                            class="ti-bookmark mr-2 text-color"></i>Healthy diet</a>
                                </div>


                                <div class="border-top border-bottom py-4 text-center social-share">
                                    <h4 class="mb-4 font-secondary text-uppercase font-weight-normal">Like the post?
                                    </h4>
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item"><a href="#"><i class="ti-facebook"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="ti-twitter"></i></a>
                                        </li>
                                        <li class="list-inline-item"><a href="#"><i class="ti-linkedin"></i></a></li>
                                    </ul>
                                </div>

                                <div class="mt-4 py-4 text-center social-share">
                                    <h4 class="mb-5 font-secondary text-uppercase font-weight-normal">More similar
                                        posts</h4>
                                    <div class="row">
                                        @foreach ($crids as $crid)
                                            <div class="col-lg-4 col-md-6">
                                                <article class="card border-0 rounded-0 mb-4">
                                                    <img src="{{ asset('uploads/crids/' . $crid->image) }}" alt=""
                                                        class="img-fluid">

                                                    <div class="mt-3 px-4 py-3">
                                                        <span class="post-meta author text-capitalize text-sm"><i
                                                                class="ti-user mr-2 text-muted"></i>{{ $crid->trainer->name }}</span>
                                                        <a href="{{ route('site.blog3', $crid->id) }}">
                                                            <h5 class="font-secondary mt-2">{!! Str::words($crid->content, 5, '...') !!}
                                                            </h5>
                                                        </a>
                                                    </div>
                                                </article>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="mt-4 border-bottom pb-5">
                                    <ul class="list-group list-group-horizontal justify-content-center">
                                        <li class="list-group-item rounded-0 "><a href="#" class="text-black"><i
                                                    class="ti-angle-left mr-3"></i>Previous</a></li>
                                        <li class="list-group-item rounded-0"><a href="#" class="text-black">Next <i
                                                    class="ti-angle-right ml-3"></i></a></li>
                                    </ul>
                                </div>

                                <div class="mt-5 border-bottom pb-5">
                                    <h4 class="mb-2 font-secondary text-uppercase font-weight-normal mb-4">comments
                                    </h4>


                                    @foreach ($crid->comments as $comment )
                                    <div class="media mt-5">
                                        <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" class="mr-4 img-fluid" alt="...">
                                        <div class="media-body">
                                            <h4 class="mt-0 mb-0">{{ $comment->user->name }}</h4>
                                            <span>{{ $comment->created_at->diffForHumans() }}</span>
                                            <p class="mt-2">{{ $comment->comment}}.</p>

                                            <span><a href="#" class="btn reply-btn">Reply</a></span>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>


                                <div class="mt-4 py-4 text-center comments">
                                    <h4 class="mb-2 font-secondary text-uppercase font-weight-normal">Leave a reaply
                                    </h4>
                                    <p class="mb-5">Your email address will not be published.</p>

                                    <form action="{{ route('site.comment_date') }}" method="POST" class="text-left" >
                                        @csrf
                                        <input type="hidden" name="crid_id" value="{{ $crid->id }}">
                                        <div class="form-row">
                                            <div class="col ">
                                                <div class="form-group">
                                                    <input type="text" name="user_id" class="form-control"
                                                        placeholder="Your name">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <input type="text" name="email" class="form-control"
                                                        placeholder="Your email">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group text-center">
                                            <textarea name="comment" id="msg" cols="30" rows="6" class="form-control"
                                                placeholder="Your Comment"></textarea>
                                            <button class="btn btn-main mt-4">Add Comment</button>
                                        </div>
                                    </form>
                                </div>
                            </div>




                        </div>
                    </div>
                    <div class="col-lg-3 col-md-8">
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
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center rounded-0 border-0">
                                    <a href="#" class="text-muted">Fitness</a>
                                    <span class="badge bg-primary badge-pill text-white border-0">14</span>
                                </li>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center rounded-0 border-0">
                                    <a href="#" class="text-muted">Body building</a>
                                    <span class="badge bg-primary badge-pill text-white">2</span>
                                </li>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center rounded-0 border-0">
                                    <a href="#" class="text-muted">Cycling</a>
                                    <span class="badge bg-primary badge-pill text-white">1</span>
                                </li>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center rounded-0 border-0">
                                    <a href="#" class="text-muted"> Paracyling</a>
                                    <span class="badge bg-primary badge-pill text-white">5</span>
                                </li>
                            </ul>
                        </div>

                        <div class="mb-5 tags">
                            <h5 class="font-secondary mb-4"><i class="ti-minus mr-2 text-color"></i>Tags</h5>

                            <a href="#">body</a>
                            <a href="#">fitness</a>
                            <a href="#">health</a>
                            <a href="#">diet</a>
                            <a href="#">plan</a>
                            <a href="#">gym</a>
                            <a href="#">trainer</a>
                            <a href="#">tutorials</a>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- Section Blog End -->

    @stop
