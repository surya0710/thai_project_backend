<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, viewport-fit=cover">
    <!-- font -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/fonts.css') }}" />
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/font-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/nouislider.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}" />

    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="{{  asset('assets/images/logo/paytm-favicon.png')}}" />
    <link rel="apple-touch-icon-precomposed" href="{{  asset('assets/images/logo/paytm-favicon.png')}}" />

    <title>Login</title>
    <style>
        body>.skiptranslate,
        .goog-logo-link,
        .gskiptranslate,
        .goog-te-gadget span,
        .goog-te-banner-frame,
        #goog-gt-tt,
        .goog-te-balloon-frame,
        div#goog-gt- {
            display: none !important;
        }

        .goog-te-gadget {
            color: transparent !important;
            font-size: 0px;
        }

        .goog-text-highlight {
            background: none !important;
            box-shadow: none !important;
        }

        #google_translate_element select {
            background: #0a3c55;
            color: #fff4e4;
            border: none;
            font-weight: bold;
            border-radius: 3px;
            padding: 8px 12px
        }

        .language-wrapper {
            position: relative;
            display: inline-block;
        }

        /* Style for select box */
        .language-select {
            appearance: none;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
            cursor: pointer;
            width: 110px;
            background: white;
        }

        /* Dropdown container with flag */
        .language-select-container {
            display: flex;
            align-items: center;
            gap: 10px;
            justify-content: center;
        }

        /* Flag icons */
        .flag-icon {
            width: 24px;
            height: 16px;
        }

        /* Hide Google Translate Banner */
        .goog-te-banner-frame {
            display: none !important;
        }

        .goog-te-combo {
            display: none;
        }
    </style>
</head>

<body>

    <!-- preloade -->
    <div class="preload preload-container">
        <div class="logo-img">
            <img src="{{ asset('assets/images/logo/paytmicon-png.png') }}" alt="logo">
        </div>
    </div>
    <!-- /preload -->
    <div class="header fixed-top1 line-bt">
        <h5>Login</h5>
    </div>
    <div class="header fixed-top1">
        <div class="left">
            <a href="https://tawk.to/chat/67d6d1cf4a42471910b3005f/1imfi74uc" target="_blank"><button class="tf-btn primary btn-sm inline m-1">Service</button></a>
        </div>
        <div class="right">
            <div id='google_translate_element' class="skiptranslate goog-te-gadget" dir="ltr" style="">
              <div class="language-wrapper">
                  <div class="language-select-container">
                      <img id="selected-flag" src="https://flagcdn.com/w40/us.png" class="flag-icon" alt="Flag">
                      <select id="language-selector" class="language-select" onchange="changeLanguage()">
                          <option value="en" data-flag="https://flagcdn.com/w40/us.png">English</option>
                          <option value="hi" data-flag="https://flagcdn.com/w40/in.png">Hindi</option>
                          <option value="ja" data-flag="https://flagcdn.com/w40/jp.png">Japanese</option>
                          <option value="ko" data-flag="https://flagcdn.com/w40/kr.png">Korean</option>
                          <option value="my" data-flag="https://flagcdn.com/w40/mm.png">Burmese</option>
                          <option value="th" data-flag="https://flagcdn.com/w40/th.png">Thai</option>
                          <option value="ru" data-flag="https://flagcdn.com/w40/ru.png">Russian</option>
                          <option value="ms" data-flag="https://flagcdn.com/w40/sg.png">Singapore</option>
                          <option value="ar" data-flag="https://flagcdn.com/w40/sa.png">Arabic</option>
                          <option value="ur" data-flag="https://flagcdn.com/w40/pk.png">Urdu</option>
                      </select>
                     
                  </div>
              </div>
          </div>
        </div> 
    </div>

    <div class="app-content1 style-3 pb-32 signIn-area">
        <div class="tf-container-login">
            <img class="login-css" src="{{ asset('assets/images/logo/paytm-mall-image-3.webp') }}" alt="">
            <form class="mt-24" action="{{ route('userLogin') }}" method="post">
                {{ csrf_field() }}
                <p class="body-6 text-black-5 text-center">Give creadential to sign in your account</p>
                <p class="text-danger text-center">
                    @if (session()->has('error'))
                    {{ session()->get('error') }}
                    @endif
                </p>
                <fieldset class="input-icon mt-20">
                    <span class="icon icon-user"></span>
                    <input type="text" placeholder="Enter Username" name="username" class="form-control">
                    <div class="text-danger">
                        @error('email')
                        {{ $message }}
                        @enderror
                    </div>
                </fieldset>
                <fieldset class="mt-16 input-icon">
                    <div class="box-view-hide">
                        <span class="icon icon-lock"></span>
                        <input type="password" placeholder="Enter Login Password" name="password" class="form-control password-field">
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
                    <a href="https://tawk.to/chat/67d6d1cf4a42471910b3005f/1imfi74uc" target="_blank" class="h8 text-primary fw-5">Forgot Password?</a>
                </div>
            </form>

        </div>
    </div>
    <p class="text-center">Copyright © 2017 - 2025</p>


    <script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/main.js') }}"></script>
    <script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <script>
        function changeLanguage() {
            var selectBox = document.getElementById("language-selector");
            var selectedOption = selectBox.options[selectBox.selectedIndex];
            var selectedFlag = selectedOption.getAttribute("data-flag");

            document.getElementById("selected-flag").src = selectedFlag;

            var googleTranslateFrame = document.querySelector(".goog-te-combo");
            if (googleTranslateFrame) {
                googleTranslateFrame.value = selectedOption.value;
                googleTranslateFrame.dispatchEvent(new Event("change"));
            } else {
                console.warn("Google Translate not loaded");
            }
        }
    </script>

    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                    pageLanguage: 'en',
                    autoDisplay: 'false',
                    includedLanguages: 'en,hi,ja,ko,my,th,ru,ms,ar,ur'
                },
                'google_translate_element'
            );
        }
    </script>
</body>

</html>