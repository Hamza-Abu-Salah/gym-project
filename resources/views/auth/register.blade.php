@extends('layouts.app')
@section('style')
<link href="{{ asset('adminassets/css/sb-admin-2.min.css') }}" rel="stylesheet">
<style>
    .bg-register-image {
    background: url("{{ asset('siteassets/images/about/img-4.jpg') }}");
    background-position: center;
    background-size: cover;
}
</style>
@stop
 @section('content')

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <form class="user"  method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input id="name" name="first_name" type="text" class="form-control form-control-user" id="exampleFirstName"
                                        placeholder="First Name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" name="last_name" class="form-control form-control-user" id="exampleLastName"
                                        placeholder="Last Name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <input id="email" type="email" name="email" class="form-control form-control-user" id="exampleInputEmail"
                                    placeholder="Email Address" value="{{ old('email') }}" required autocomplete="email">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input id="password" name="password" type="password" class="form-control form-control-user"
                                        id="exampleInputPassword" placeholder="Password" required autocomplete="new-password">
                                </div>
                                <div class="col-sm-6">
                                    <input  id="password-confirm" type="password" class="form-control form-control-user"
                                        id="exampleRepeatPassword" placeholder="Repeat Password" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Register Account
                            </button>
                            <hr>
                            <a href="index.html" class="btn btn-google btn-user btn-block">
                                <i class="fab fa-google fa-fw"></i> Register with Google
                            </a>
                            <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                            </a>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="forgot-password.html">Forgot Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection


