@extends('site.master')

@section('title', 'MemberShip | ' . env('APP_NAME'))

@section('content')

<!-- Header Close -->

<div class="main-wrapper ">
<section class="page-title bg-2">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
          <ul class="list-inline mb-0">
            <li class="list-inline-item"><a href="index.html" class="text-sm letter-spacing text-white text-uppercase font-weight-bold">Home</a></li>
            <li class="list-inline-item"><span class="text-white">|</span></li>
            <li class="list-inline-item"><a href="#" class="text-color text-uppercase text-sm letter-spacing">Team</a></li>
          </ul>
           <h1 class="text-lg text-white mt-2">Trainer</h1>
      </div>
    </div>
  </div>
</section>

<!-- Section Team Start -->
<section class="section bg-gray">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8 text-center">
				<div class="section-title">
					<div class="divider mb-3"></div>
					<h2>Our Trainer</h2>
				</div>
			</div>
		</div>

		<div class="row">
			@foreach ($trainers as $trainer )
            <div class="col-lg-6">
				<div class="card border-0 mb-1  bg-transparent rounded-0 mb-4">
				  <div class="row no-gutters align-items-center">
				    <div class="col-md-6">
				      <img src="{{ asset('uploads/trainers/'.$trainer->image) }}" alt="" class="img-fluid w-100">
				    </div>
				    <div class="col-md-6">
				      <div class="card-body team-wrap pl-4">
				        <h3 class="card-title text-color">{{ $trainer->name }}</h3>
				        <h6 class="card-subtitle pb-4 letter-spacing">{{ $trainer->specialization }}</h6>
				        <p class="">{!! $trainer->content !!}</p>
			        	<ul class="list-inline ">
							<li class="list-inline-item"><a href="{{ $trainer->facebook }}"><i class="ti-facebook"></i></a></li>
							<li class="list-inline-item"><a href="{{ $trainer->twitter }}"><i class="ti-twitter"></i></a></li>

							<li class="list-inline-item"><a href="{{ $trainer->linkedin }}"><i class="ti-linkedin"></i></a></li>
						</ul>
				      </div>
				    </div>
				  </div>
				</div>
			</div>
            @endforeach
		</div>
	</div>
</section>
<!-- Section Team End -->

@stop
