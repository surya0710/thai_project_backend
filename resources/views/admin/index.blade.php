<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="{{  asset('assets/admin/images/favicon.png') }}" type="image/x-icon">
  <link rel="shortcut icon" href="{{  asset('assets/admin/images/favicon.png') }}" type="image/x-icon">
  <title>Zono </title>
  <!-- Google font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200;300;400;600;700;800;900&amp;display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{  asset('assets/admin/css/font-awesome.css') }}">
  <!-- ico-font-->
  <link rel="stylesheet" type="text/css" href="{{  asset('assets/admin/css/vendors/icofont.css') }}">
  <!-- Themify icon-->
  <link rel="stylesheet" type="text/css" href="{{  asset('assets/admin/css/vendors/themify.css') }}">
  <!-- Flag icon-->
  <link rel="stylesheet" type="text/css" href="{{  asset('assets/admin/css/vendors/flag-icon.css') }}">
  <!-- Feather icon-->
  <link rel="stylesheet" type="text/css" href="{{  asset('assets/admin/css/vendors/feather-icon.css') }}">
  <!-- Bootstrap css-->
  <link rel="stylesheet" type="text/css" href="{{  asset('assets/admin/css/vendors/bootstrap.css') }}">
  <!-- App css-->
  <link rel="stylesheet" type="text/css" href="{{  asset('assets/admin/css/style.css') }}">
  <link id="color" rel="stylesheet" href="{{  asset('assets/admin/css/color-1.css') }}" media="screen">
  <!-- Responsive css-->
  <link rel="stylesheet" type="text/css" href="{{  asset('assets/admin/css/responsive.css') }}">
</head>

<body>
  <!-- login page start-->
  <div class="container-fluid p-0">
    <div class="row m-0">
      <div class="col-12 p-0">
        <div class="login-card login-dark">
          <div>
            <div><a class="logo" href="{{ url('/admin') }}">
                <img class="img-fluid for-light" src="{{ asset('assets/admin/images/logo/paytmicon-png.png') }}" alt="looginpage">
                <img class="img-fluid for-dark" src="{{ asset('assets/admin/images/logo/paytmicon-png.png') }}" alt="looginpage"></a>
            </div>
            <div class="login-main">
              <form class="theme-form" method="post" action="{{ route('login') }}">
                @csrf
                <p class="text-center">Enter your email & password to login</p>
                <div class="text-danger">
                    @if (session()->has('error'))
                        {{ session()->get('error') }}
                    @endif
                </div>
                <div class="form-group">
                  <label class="col-form-label">Email Address</label>
                  <input class="form-control" type="email" name="email" required placeholder="Email Address " value="{{ old('email') }}">
                  <span class="text-danger text-center">
                    @error('email')
                        {{ $message }}
                    @enderror
                  </span>
                </div>
                <div class="form-group">
                  <label class="col-form-label">Password</label>
                  <div class="form-input position-relative">
                    <input class="form-control" type="password" name="password" required="" placeholder="*********" value="{{ old('password') }}">
                    <div class="show-hide"><span class="show"></span></div>
                    <span class="text-danger text-center">
                    @error('password')
                        {{ $message }}
                    @enderror
                  </span>
                  </div>
                </div>
                <div class="form-group mb-0">
                  <div class="checkbox p-0">
                    <input id="checkbox1" type="checkbox">
                    <label class="text-muted" for="checkbox1">Remember password</label>
                  </div>
                  <!-- <a class="link" href="forget-password.html">Forgot password?</a> -->
                  <div class="text-end mt-3">
                    <button class="btn btn-primary btn-block w-100" type="submit">Sign in</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
    <script src="{{ asset('assets/admin/js/jquery.min.js') }}"></script>
    <!-- Bootstrap js-->
    <script src="{{ asset('assets/admin/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <!-- feather icon js-->
    <script src="{{ asset('assets/admin/js/icons/feather-icon/feather.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/icons/feather-icon/feather-icon.js') }}"></script>
    <!-- Sidebar jquery-->
    <script src="{{ asset('assets/admin/js/config.js') }}"></script>
    <!-- Theme js-->
    <script src="{{ asset('assets/admin/js/script.js') }}"></script>
      <!-- Plugin used-->
</html>