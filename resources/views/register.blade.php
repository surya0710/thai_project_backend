
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from themesflat.co/html/taskose/taskose/sign-up.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 05 Feb 2025 11:08:17 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, viewport-fit=cover">
    <!-- font -->
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

    <title>Register Account</title>
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
        <div class="left">
            <a href="javascript:void(0);" class="icon back-btn"><i class="icon-back"></i></a>
        </div>
        <h5>Register Account</h5>  
    </div> 


    <div class="app-content style-3 pb-32 signUp-area">
        <div class="tf-container-login">
            <img class="login-css" src="{{ asset('assets/images/logo/paytm-mall-image-3.webp') }}" alt="" >
            <form class="mt-24" action="{{ route('userRegister') }}" method="post">
                <p class="body-6 text-black-5">Give creadential to sign in your account</p>
                <fieldset class="input-icon mt-20">
                    <span class="icon icon-user"></span>
                    <input type="text" placeholder="Enter one user name" class="form-control">
                </fieldset>
                <fieldset class="input-icon mt-16">
                    <span class="icon icon-mail"></span>
                    <input type="text" placeholder="Enter your name" class="form-control">
                </fieldset>
                <fieldset class="mt-16 input-icon">
                    <div class="box-view-hide">
                        <span class="icon icon-lock"></span>
                        <input type="password" placeholder="Enter login password" class="form-control password-field">
                        <div class="show-pass">
                            <span class="icon-pass icon-view"></span>
                            <span class="icon-pass icon-hide"></span>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="mt-16 input-icon">
                    <div class="box-view-hide">
                        <span class="icon icon-lock"></span>
                        <input type="password" placeholder="Please enter the password again" class="form-control password-field">
                        <div class="show-pass">
                            <span class="icon-pass icon-view"></span>
                            <span class="icon-pass icon-hide"></span>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="mt-16 input-icon">
                    <div class="box-view-hide">
                        <span class="icon icon-lock"></span>
                        <input type="password" placeholder="Please enter the transaction password" class="form-control password-field">
                        <div class="show-pass">
                            <span class="icon-pass icon-view"></span>
                            <span class="icon-pass icon-hide"></span>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="input-icon mt-16">
                    <span class="icon icon-mail"></span>
                    <input type="text" placeholder="Referral code" class="form-control">
                </fieldset>
                <button class="mt-24 tf-btn primary">Register Account</button>
            </form>
        
            <p class="mt-60 text-center body-2 fw-5 text-black-5">Already have an account, Go to 
                <a href="{{ route('index') }}" class="text-primary fw-7 body-2">Login</a>
            </p>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>