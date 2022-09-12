<!doctype html>
<html lang="en" dir="rtl">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        @include('front.layouts.header')
        @yield('css')
    </head>

    <body @yield('class')>
        <!--upper-bar-->

        @include('front.layouts.upperbar')


        <!--nav-->
        @include('front.layouts.navbar')

        @yield('content')

        <!--footer-->
        @include('front.layouts.footer')

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        @include('front.layouts.scripts')
        @yield('scripts')
    </body>
</html>
