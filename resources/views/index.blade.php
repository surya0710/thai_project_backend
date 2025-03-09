<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, viewport-fit=cover">
    <!-- font -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/fonts.css') }}"/>
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/font-icons.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/nouislider.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}"/>

    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="{{  asset('assets/images/logo/paytm-favicon.png')}}" />
    <link rel="apple-touch-icon-precomposed" href="{{  asset('assets/images/logo/paytm-favicon.png')}}" />

    <title>Login</title>
</head>

<body>

    <!-- preloade -->
    <div class="preload preload-container">
        <div class="logo-img">
            <img src="{{ asset('assets/images/logo/paytmicon-png.png') }}" alt="logo">
        </div>
        <div class="spinner-circle lg success">
            <span class="spinner-circle1 spinner-child"></span>
            <span class="spinner-circle2 spinner-child"></span>
            <span class="spinner-circle3 spinner-child"></span>
            <span class="spinner-circle4 spinner-child"></span>
            <span class="spinner-circle5 spinner-child"></span>
            <span class="spinner-circle6 spinner-child"></span>
            <span class="spinner-circle7 spinner-child"></span>
            <span class="spinner-circle8 spinner-child"></span>
            <span class="spinner-circle9 spinner-child"></span>
        </div>
    </div>
    <!-- /preload -->
    <div class="header fixed-top line-bt">
        <h5>Login</h5>  
    </div> 


    <div class="app-content style-3 pb-32 signIn-area">
        <div class="tf-container-login">
            <img class="login-css" src="{{ asset('assets/images/logo/paytm-mall-image-3.webp') }}" alt="" >
            <form class="mt-24" action="{{ route('userLogin') }}" method="post">
                {{ csrf_field() }}
                <p class="body-6 text-black-5 text-center">Give creadential to sign in your account</p>
                <p class="text-danger text-center">
                    @if (session()->has('error'))
                        {{ session()->get('error') }}
                    @endif
                </p>
                <fieldset class="input-icon mt-20">
                    <span class="icon icon-mail"></span>
                    <input type="text" placeholder="Enter one user name" name="username" class="form-control">
                    <div class="text-danger">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </div>
                </fieldset>
                <fieldset class="mt-16 input-icon">
                    <div class="box-view-hide">
                        <span class="icon icon-lock"></span>
                        <input type="password" placeholder="Enter login password" name="password" class="form-control password-field">
                        <div class="show-pass">
                            <span class="icon-pass icon-view"></span>
                            <span class="icon-pass icon-hide"></span>
                        </div>
                        <div class="text-danger">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                </fieldset>
                <button class="mt-48 tf-btn primary">Login</button>
                <div class="mt-16 d-flex justify-content-between">
                    <a href="{{ route('register') }}" class="h8 text-primary fw-5">Register Account</a>
                    <a href="{{ route('forgetPassword') }}" class="h8 text-primary fw-5">Forgot Password?</a>
                </div>
            </form>
           
        </div>
    </div>


    <script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>