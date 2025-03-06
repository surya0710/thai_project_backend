
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

    <title>Reset Password</title>
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
        <h5>Change Password</h5>  
    </div> 


    <div class="app-content style-3 pb-32 signUp-area">
        <div class="tf-container-login">
            <form class="mt-24" action="" method="post">
              
                <fieldset class="mt-32 input-icon">
                    <div class="box-view-hide">
                        <span class="icon icon-lock"></span>
                        <input type="password" placeholder="Login password" class="form-control password-field">
                        <!-- <div class="show-pass">
                            <span class="icon-pass icon-view"></span>
                            <span class="icon-pass icon-hide"></span>
                        </div> -->
                    </div>
                </fieldset>
                <fieldset class="mt-32 input-icon">
                    <div class="box-view-hide">
                        <span class="icon icon-lock"></span>
                        <input type="password" placeholder="Enter New password" class="form-control password-field">
                        <div class="show-pass">
                            <span class="icon-pass icon-view"></span>
                            <span class="icon-pass icon-hide"></span>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="mt-16 input-icon">
                    <div class="box-view-hide">
                        <span class="icon icon-lock"></span>
                        <input type="password" placeholder="Confirm New password" class="form-control password-field2">
                        <div class="show-pass2">
                            <span class="icon-pass icon-view"></span>
                            <span class="icon-pass icon-hide"></span>
                        </div>
                    </div>
                </fieldset>
                <p class="body-6 text-black-5 mt-3">Please remember the password, if you forget the password, Please contact service</p>
                <div class="footer-fixed button">
                    <button class="mt-24 tf-btn primary">Confirm Modification</button>

                </div>
            </form>
            
            
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>