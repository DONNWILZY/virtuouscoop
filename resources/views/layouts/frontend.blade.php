<!doctype html>
<html lang="{{ app()->getLocale() }}">
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name')}} - @yield('title') </title>
    <!--Favicon-->
    <link rel="icon" type="image/png" href="{{asset('img/favicon.png')}}">
    <!--icofont icon css-->
    <link href="{{asset('frontasset/css/icofont.min.css')}}" rel="stylesheet" />
    <!--magnific popup css-->
    <link href="{{asset('frontasset/css/magnific-popup.css')}}" rel="stylesheet" />
    <!--google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <!--main css-->
    <link href="{{asset('frontasset/css/app.css')}}" rel="stylesheet" />
</head>
<body>
@yield('content')
<!--   Core JS Files   -->
<script src="{{asset('frontasset/js/app.js')}}" type="text/javascript"></script>
</html>
