<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>TixGo Admin Dashboard - Made 4 U</title>
    <!-- Favicon -->
    <link rel="icon" href="{{asset('backend/img/favicon.png')}}" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{asset('backend/css/nucleo.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('backend/css/all.min.css')}}" type="text/css">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{asset('backend/css/argon.css?v=1.1.0')}}" type="text/css">
</head>

<body class="bg-default">
<!-- Main content -->
@yield('login')

@yield('register')

<!-- Argon Scripts -->
<!-- Core -->
<script src="{{asset('backend/js/jquery.min.js')}}"></script>
<script src="{{asset('backend/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('backend/js/js.cookie.js')}}"></script>
<script src="{{asset('backend/js/jquery.scrollbar.min.js')}}"></script>
<script src="{{asset('backend/js/jquery-scrollLock.min.js')}}"></script>
<!-- Argon JS -->
<script src="{{asset('backend/js/argon.js?v=1.1.0')}}"></script>
</body>

</html>
