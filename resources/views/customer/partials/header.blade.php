<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, viewport-fit=cover">
    <!-- font -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/fonts.css') }}">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/font-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet"type="text/css" href="{{ asset('assets/css/nouislider.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet"type="text/css" href="{{ asset('assets/css/styles.css') }}"/>

    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/paytm-favicon.png') }}" />
    <link rel="apple-touch-icon-precomposed" href="{{ asset('assets/images/logo/paytm-favicon.png') }}" />

    <title>Index</title>
</head>
<style>
    #modalBasic-task{
        transform: translateY(20%);
    }
    .st0 {
        fill: #51BBA0;
        fill-opacity: 0.4;
    }

    .st1 {
        fill: #51BBA0;
        fill-opacity: 0.1;
    }

    .st2 {
        fill: #51BBA0;
    }
    /* only complete task popup ki css hai ye  */
    #completion {
        width: 50%;
        height: 50%;
        margin: auto;
        display: block;
    }

    @keyframes hideshow {
        0% {
            opacity: 0.2;
        }

        10% {
            opacity: 0.2;
        }

        15% {
            opacity: 0.2;
        }

        100% {
            opacity: 1;
        }
    }

    #cirkel {
        animation: hideshow 0.4s ease;
    }

    #check {
        animation: hideshow 0.4s ease;
    }

    #stars {
        animation: hideshow 1.0s ease;
        opacity: 0.9;
    }


    @keyframes hideshow {
        0% {
            transform: scale(0.2);
            transform-origin: initial;

        }

        100% {
            transform: scale(1.0);
            transform-origin: initial;
        }
    }

    @keyframes draaien {
        0% {
            transform: rotate(40deg);
            transform-origin: initial;

        }

        100% {
            transform: scale(0deg);
            transform-origin: initial;
        }
    }

    #check {
        animation: draaien 0.8s ease;
    }


    @keyframes transparant {
        0% {
            opacity: 0;

        }

        100% {
            opacity: 1;
        }
    }

    #check {
        animation: transparant 2s;
    }

    /* Modal Animation */
    .modal-content {
        transform: scale(0.7);
        opacity: 0;
        animation: fadeInScale 0.5s ease-out 0.5s forwards;
    }

    @keyframes fadeInScale {
        from {
            transform: scale(0.7);
            opacity: 0;
        }
        to {
            transform: scale(1);
            opacity: 1;
        }
    }

    /* Modal Animation */
    .modal-content {
        transform: scale(0.7);
        opacity: 0;
        animation: fadeInScale 0.5s ease-out 0.5s forwards;
    }

    @keyframes fadeInScale {
        from {
            transform: scale(0.7);
            opacity: 0;
        }
        to {
            transform: scale(1);
            opacity: 1;
        }
    }

    /* Text Slide-in Animation */
    .modal-body {
        opacity: 0;
        transform: translateY(20px);
        animation: slideInText 0.5s ease-out 0.8s forwards;
    }

    @keyframes slideInText {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Button Bounce Effect */
    .tf-btn {
        animation: bounceIn 0.8s ease-in-out 1.2s forwards;
        opacity: 0;
    }

    @keyframes bounceIn {
        0% { transform: scale(0.8); opacity: 0; }
        50% { transform: scale(1.1); opacity: 0.7; }
        100% { transform: scale(1); opacity: 1; }
    }

    /* Confetti Animation */
    .confetti {
        position: absolute;
        width: 10px;
        height: 10px;
        background: red;
        opacity: 0.7;
        border-radius: 50%;
        animation: fall linear infinite;
    }

    @keyframes fall {
        from {
            transform: translateY(0) rotate(0deg);
        }
        to {
            transform: translateY(100vh) rotate(360deg);
        }
    }

    /* Confetti Container */
    .confetti-container {
        position: absolute;
        top: 0;
        width: 100%;
        height: 100vh;
        overflow: hidden;
        pointer-events: none;
    }

    .confetti-container span {
        position: absolute;
        top: -10px;
        width: 8px;
        height: 8px;
        background: hsl(calc(360 * var(--hue)), 100%, 50%);
        border-radius: 50%;
        animation: fall linear infinite;
    }

    /* Random Confetti Placement */
    .confetti-container span:nth-child(1) { left: 10%; animation-duration: 3s; z-index: 999990;}
    .confetti-container span:nth-child(2) { left: 30%; animation-duration: 4s; z-index: 999990;}
    .confetti-container span:nth-child(3) { left: 50%; animation-duration: 5s; z-index: 999990;}
    .confetti-container span:nth-child(4) { left: 70%; animation-duration: 3.5s; z-index: 999990;}
    .confetti-container span:nth-child(5) { left: 90%; animation-duration: 4.5s; z-index: 999990;}
</style>
<!-- preloade -->
<div class="preload preload-container">
         <div class="logo-img">
            <img src="{{ asset('assets/images/logo/paytmicon-png.png') }}" alt="logo">
         </div>
         <!-- <div class="spinner-circle lg success">
            <span class="spinner-circle1 spinner-child"></span>
            <span class="spinner-circle2 spinner-child"></span>
            <span class="spinner-circle3 spinner-child"></span>
            <span class="spinner-circle4 spinner-child"></span>
            <span class="spinner-circle5 spinner-child"></span>
            <span class="spinner-circle6 spinner-child"></span>
            <span class="spinner-circle7 spinner-child"></span>
            <span class="spinner-circle8 spinner-child"></span>
            <span class="spinner-circle9 spinner-child"></span>
         </div> -->
      </div>
      <!-- /preload -->