
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
                @csrf
                <p class="body-6 text-black-5">Give creadential to sign in your account</p>
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif
                <fieldset class="input-icon mt-20">
                    <span class="icon icon-user"></span>
                    <input type="text" placeholder="Enter user name" required name="username" value="{{ old('username') }}" class="form-control">
                    <span class="error text-danger">
                        @if($errors->has('username'))
                            {{ $errors->first('username')}}
                        @endif
                    </span>
                </fieldset>
                <fieldset class="input-icon mt-16">
                    <span class="icon icon-mail"></span>
                    <input type="text" placeholder="Enter your full name" required name="name" value="{{ old('name') }}" oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '');" class="form-control">
                    <span class="error text-danger">
                        @if($errors->has('name'))
                            {{ $errors->first('name')}}
                        @endif
                    </span>
                </fieldset>
                <fieldset class="input-icon mt-16">
                    <span class="icon icon-mail"></span>
                    <input type="email" placeholder="Enter your email id" required name="email" value="{{ old('email') }}" class="form-control">
                    <span class="error text-danger">
                        @if($errors->has('email'))
                            {{ $errors->first('email')}}
                        @endif
                    </span>
                </fieldset>
                <fieldset class="input-icon mt-16">
                    <span class="icon icon-phone"></span>
                    <input type="text" placeholder="Enter your phone number" required name="phone" value="{{ old('phone') }}" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                    <span class="error text-danger">
                        @if($errors->has('phone'))
                            {{ $errors->first('phone')}}
                        @endif
                    </span>
                </fieldset>
                <fieldset class="mt-16 input-icon">
                    <div class="box-view-hide">
                        <span class="icon icon-lock"></span>
                        <input type="password" placeholder="Enter login password" required name="password" value="{{ old('password') }}" class="form-control password-field">
                        <div class="show-pass">
                            <span class="icon-pass icon-view"></span>
                            <span class="icon-pass icon-hide"></span>
                        </div>
                    </div>
                    <span class="error text-danger">
                        @if($errors->has('password'))
                            {{ $errors->first('password')}}
                        @endif
                    </span>
                </fieldset>
                <fieldset class="mt-16 input-icon">
                    <div class="box-view-hide">
                        <span class="icon icon-lock"></span>
                        <input type="password" required placeholder="Please enter 4 digit transaction password" value="{{ old('transaction_password') }}" maxlength="4" minlength="4" oninput="this.value = this.value.replace(/[^0-9]/g, '')" name="transaction_password" class="form-control password-field">
                        <div class="show-pass">
                            <span class="icon-pass icon-view"></span>
                            <span class="icon-pass icon-hide"></span>
                        </div>
                    </div>
                    <span class="error text-danger">
                        @if($errors->has('transaction_password'))
                            {{ $errors->first('transaction_password')}}
                        @endif
                    </span>
                </fieldset>
                <fieldset class="input-icon mt-16">
                    <span class="icon icon-mail"></span>
                    <input type="text" placeholder="Invitation code" class="form-control" value="{{ old('invitation') }}" name="invitation" required>
                    <span class="error text-danger invite_code_error"></span>
                    <span class="error text-danger">
                        @if($errors->has('invitation'))
                            {{ $errors->first('invitation')}}
                        @endif
                    </span>
                </fieldset>
                <button class="mt-24 tf-btn primary register">Register Account</button>
            </form>
        
            <p class="mt-60 text-center body-2 fw-5 text-black-5">Already have an account, Go to 
                <a href="{{ route('index') }}" class="text-primary fw-7 body-2">Login</a>
            </p>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/main.js') }}"></script>
    <script>
        jQuery(document).ready(function() {
            $(".register").click(function(e){
                e.preventDefault();
                let invite_code = $('input[name=invitation]').val();
                $.ajax({
                    url : "{{ route('checkInviteCode') }}",
                    type : "POST",
                    data : {
                        _token : "{{ csrf_token() }}",
                        code : invite_code
                    },
                    success : function(response){
                        if(response.status == 'success'){
                            $('form').submit();
                        }else{
                            $('.invite_code_error').text(response.message);
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>