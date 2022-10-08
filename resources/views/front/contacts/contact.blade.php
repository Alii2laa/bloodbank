@extends('front.layouts.master')

@section('title')
    تواصل معنا
@endsection
@section('class')
    class="contact-us"
@endsection

@section('content')
    <div class="contact-now">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('front.home')}}}">الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page">تواصل معنا</li>
                    </ol>
                </nav>
            </div>
            <div class="row methods">
                <div class="col-md-6">
                    <div class="call">
                        <div class="title">
                            <h4>اتصل بنا</h4>
                        </div>
                        <div class="content">
                            <div class="logo">
                                <img src="{{asset('front/imgs/logo.png')}}">
                            </div>
                            <div class="details">
                                <ul>
                                    <li><span>الجوال:</span> {{$settings->phone}}</li>
                                    <li><span>البريد الإلكترونى:</span> {{$settings->email}}</li>
                                </ul>
                            </div>
                            <div class="social">
                                <h4>تواصل معنا</h4>
                                <div class="icons" dir="ltr">
                                    <div class="out-icon">
                                        <a href="{{$settings->fb_link}}"><img src="{{asset('front/imgs/001-facebook.svg')}}"></a>
                                    </div>
                                    <div class="out-icon">
                                        <a href="{{$settings->tw_link}}"><img src="{{asset('front/imgs/002-twitter.svg')}}"></a>
                                    </div>
                                    <div class="out-icon">
                                        <a href="{{$settings->yt_link}}"><img src="{{asset('front/imgs/003-youtube.svg')}}"></a>
                                    </div>
                                    <div class="out-icon">
                                        <a href="{{$settings->in_link}}"><img src="{{asset('front/imgs/004-instagram.svg')}}"></a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contact-form">
                        <div class="title">
                            <h4>تواصل معنا</h4>
                        </div>
                        <div class="fields">
                            {!! Form::open(['route' => 'contact']) !!}

                                @include('front.contacts.form')

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
