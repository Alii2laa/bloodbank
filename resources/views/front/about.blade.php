@extends('front.layouts.master')

@section('title')
    عنا
@endsection

@section('class')
    class = "who-are-us"
@endsection
@section('content')
    <!--inside-article-->
    <div class="about-us">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('front.home')}}">الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page">من نحن</li>
                    </ol>
                </nav>
            </div>
            <div class="details">
                <div class="logo">
                    <img src="{{asset('front/imgs/logo.png')}}">
                </div>
                <div class="text">
                    <p>
                        {{$settings->about_us}}
                    </p>
                    <p>
                        {{$settings->about_us}}
                    </p>
                    <p>
                        {{$settings->about_us}}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
