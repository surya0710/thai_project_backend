<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Zono admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
  <meta name="keywords" content="admin template, Zono admin template, dashboard template, flat admin template, responsive admin template, web app">
  <meta name="author" content="pixelstrap">
  <link rel="icon" href="{{  asset('assets/images/logo/paytm-favicon.png')}}" type="image/x-icon">
  <link rel="shortcut icon" href="{{  asset('assets/images/logo/paytm-favicon.png')}}" type="image/x-icon">
  <title>Zono </title>
  <!-- Google font -->
  <link rel="preconnect" href="https://fonts.googleapis.com/">
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200;300;400;600;700;800;900&amp;display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/font-awesome.css') }}">
  <!-- ico-font-->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/vendors/icofont.css') }}">
  <!-- Themify icon-->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/vendors/themify.css') }}">
  <!-- Flag icon-->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/vendors/flag-icon.css') }}">
  <!-- Feather icon-->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/vendors/feather-icon.css') }}">
  <!-- Plugins css start-->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/vendors/slick.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/vendors/slick-theme.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/vendors/scrollbar.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/vendors/animate.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/vendors/select2.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/vendors/dropzone.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/vendors/datatables.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/vendors/owlcarousel.css') }}">
  <!-- Plugins css Ends-->
  <!-- Bootstrap css-->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/vendors/bootstrap.css') }}">
  <!-- App css-->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/style.css') }}">
  <link id="color" rel="stylesheet" href="{{ asset('assets/admin/css/color-1.css') }}" media="screen">
  <!-- Responsive css-->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/responsive.css') }}">
</head>

<body>
  <!-- tap on top starts-->
  <div class="tap-top">
    <i data-feather="chevrons-up"></i>
  </div>
  <!-- tap on tap ends-->
  <!-- page-wrapper Start   -->
  <div class="page-wrapper compact-wrapper" id="pageWrapper">
    <!-- Page Header Start-->
    <div class="page-header">
      <div class="header-wrapper row m-0">
        <div class="header-logo-wrapper col-auto p-0">
          <div class="logo-wrapper">
            <a href="{{ route('dashboard') }}">
              <img class="img-fluid for-light" src="{{ asset('assets/admin/images/logo/logo.png') }}" alt="">
              <img class="img-fluid for-dark" src="{{ asset('assets/admin/images/logo/logo_dark.png') }}" alt="">
            </a>
          </div>
        </div>
        <form class="col-sm-4 form-inline search-full d-none d-xl-block" action="#" method="get"></form>
        <div class="nav-right col-xl-8 col-lg-12 col-auto pull-right right-header p-0">
          <ul class="nav-menus">
            <li>
              <a class="badge badge-success mb-1" onclick="$('#invitationCodeModal').modal('show');">
                <span class="label">Create Invitation Code</span>
              </a>
            </li>
            <li>
              <a class="badge @if($pendingRechargeRequest === 0)badge-success @else badge-danger @endif mb-1" href="{{ route('recharge.list') }}">
                <span class="lable">Recharge {{ $pendingRechargeRequest }}</span>
              </a>
            </li>
            <li>
              <a class="badge @if($pendingWithrawRequest === 0)badge-success @else badge-danger @endif mb-1" href="{{ route('withdrawal.list') }}">
                <span class="lable">Withdraw {{ $pendingWithrawRequest }}</span>
              </a>
            </li>

            <li>
              <button class="badge badge-danger mb-1" id="voice-button">
                <span class="label" id="voice-button-text">Turn on voice</span>
                <i class="fa-solid fa-volume-high"></i>
              </button>

              <audio id="myAudio" src="https://api.kxsgtr.com/msg.mp3" loop></audio>

              <script>
                document.addEventListener("DOMContentLoaded", function() {
                  const audio = document.getElementById("myAudio");
                  const button = document.getElementById("voice-button");
                  const buttonText = document.getElementById("voice-button-text");

                  // Ensure music starts off (it already does by default)
                  audio.pause();
                  buttonText.textContent = "Turn on voice";

                  button.addEventListener("click", () => {
                    if (audio.paused) {
                      audio.play();
                      buttonText.textContent = "Turn off voice";
                    } else {
                      audio.pause();
                      audio.currentTime = 0; // Reset audio to the beginning
                      buttonText.textContent = "Turn on voice";
                    }
                  });
                });
              </script>
            </li>



            <li class="profile-nav onhover-dropdown pe-0 py-0">
              <div class="d-flex align-items-center profile-media">
                <img class="b-r-25" src="{{ asset('assets/admin/images/dashboard/profile.png') }}" alt="">
                <div class="flex-grow-1 user">
                  <span>{{ Auth::user()->name }}</span>
                  <p class="mb-0 font-nunito">{{ Auth::user()->user_type }}</p>
                </div>
              </div>
              <ul class="profile-dropdown onhover-show-div">
                <li>
                  <a href="{{ route('profile') }}">
                    <i data-feather="user"></i>
                    <span>Account </span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('logout') }}">
                    <i data-feather="log-in"></i>
                    <span>Log Out</span>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        <script class="result-template" type="text/x-handlebars-template"> <div class="ProfileCard u-cf">
                    <div class="ProfileCard-avatar">
                        <svg
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0">
                            <path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path>
                            <polygon points="12 15 17 21 7 21 12 15"></polygon>
                        </svg>
                    </div>
                    <div class="ProfileCard-details">
                        <div class="ProfileCard-realName">{{auth()->user()->name}}</div>
                    </div>
                </div>
            </script>
      </div>
    </div>
    <!-- Page Header Ends  -->