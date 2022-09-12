<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/adminlte.min.css')}}">
    <link rel="icon" href="{{asset('front/imgs/Icon.png')}}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
    @yield('header-style')

</head>
<body @yield('class')>
    @yield('content')
<!-- ./wrapper -->

</body>
</html>
