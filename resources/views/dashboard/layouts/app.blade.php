<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
    <!--plugins-->
    <link href="{{env('APP_URL')}}/dashboard/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <link href="{{env('APP_URL')}}/dashboard/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="{{env('APP_URL')}}/dashboard/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="{{env('APP_URL')}}/dashboard/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <!-- loader-->
    <link href="{{env('APP_URL')}}/dashboard/assets/css/pace.min.css" rel="stylesheet" />
    <script src="{{env('APP_URL')}}/dashboard/assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="{{env('APP_URL')}}/dashboard/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{env('APP_URL')}}/dashboard/assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap"
        rel="stylesheet">
    <link href="{{env('APP_URL')}}/dashboard/assets/css/app.css" rel="stylesheet">
    <link href="{{env('APP_URL')}}/dashboard/assets/css/icons.css" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="{{env('APP_URL')}}/dashboard/assets/css/dark-theme.css" />
    <link rel="stylesheet" href="{{env('APP_URL')}}/dashboard/assets/css/semi-dark.css" />
    <link rel="stylesheet" href="{{env('APP_URL')}}/dashboard/assets/css/header-colors.css" />
    <title>Rocker - Bootstrap 5 Admin Dashboard Template</title>
</head>

<body>

    <div class="wrapper">
        @include('dashboard.layouts.navigtion.sidebar')
        @include('dashboard.layouts.navigtion.header')
        <div class="page-wrapper">
            @yield('contents')
        </div>
        <!--start overlay-->
        <div class="overlay toggle-icon"></div>
        <!--end overlay-->
        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
        <footer class="page-footer">
            <p class="mb-0">Copyright © 2022. All right reserved.</p>
        </footer>
    </div>


    <!-- Bootstrap JS -->
    <script src="{{env('APP_URL')}}/dashboard/assets/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="{{env('APP_URL')}}/dashboard/assets/js/jquery.min.js"></script>
    <script src="{{env('APP_URL')}}/dashboard/assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="{{env('APP_URL')}}/dashboard/assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="{{env('APP_URL')}}/dashboard/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="{{env('APP_URL')}}/dashboard/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="{{env('APP_URL')}}/dashboard/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="{{env('APP_URL')}}/dashboard/assets/plugins/chartjs/js/chart.js"></script>
    <script src="{{env('APP_URL')}}/dashboard/assets/js/index.js"></script>
    <!--app JS-->
    <script src="{{env('APP_URL')}}/dashboard/assets/js/app.js"></script>
    <script>
        new PerfectScrollbar(".app-container")
    </script>
</body>

</html>
