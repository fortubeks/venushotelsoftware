<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Master Bills') }}</title>
        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="76x76" href="{{ env('APP_URL') }}/quickai/images/apple-icon.png">
        <link rel="icon" type="image/png" href="{{ env('APP_URL') }}/quickai/images/favicon.png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        
        <!-- Icons -->
        
        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="{{ env('APP_URL') }}/vendor/quickai/bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="{{ env('APP_URL') }}/vendor/quickai/font-awesome/css/all.min.css" />
        <link rel="stylesheet" type="text/css" href="{{ env('APP_URL') }}/vendor/quickai/owl.carousel/assets/owl.carousel.min.css" />
        <link rel="stylesheet" type="text/css" href="{{ env('APP_URL') }}/quickai/css/stylesheet.css" />
    </head>
    <body class="">
        <!-- Preloader -->
        <div id="preloader">
        <div data-loader="dual-ring"></div>
        </div>
        <!-- Preloader End --> 
        <div id="main-wrapper"> 
            @include('layouts.rocker.header')
            <!-- Header only comes if url has profile in it --> 
            @if(isset($view))
            @include('layouts.quickai.page-header')
            @endif
            @include('layouts.quickai.notification')
            @yield('content')
            @include('layouts.quickai.footer')
        </div>
        
        <!-- Script --> 
        <script src="{{ env('APP_URL') }}/vendor/quickai/jquery/jquery.min.js"></script> 
        <script src="{{ env('APP_URL') }}/vendor/quickai/bootstrap/js/bootstrap.bundle.min.js"></script> 
        <script src="{{ env('APP_URL') }}/vendor/quickai/owl.carousel/owl.carousel.min.js"></script> 
        <script src="{{ env('APP_URL') }}/quickai/js/theme.js"></script>
        <script src="{{ env('APP_URL') }}/vendor/quickai/daterangepicker/moment.min.js"></script> 
        <script src="{{ env('APP_URL') }}/vendor/quickai/daterangepicker/daterangepicker.js"></script> 
    </body>
</html>
