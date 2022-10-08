@extends('front.layouts.master')

@section('title')
    تسجيل دخول
@endsection

@section('class')
    class="signin-account"
@endsection
@section('content')
    <div class="form">
        <div class="container">
            @include('layouts.alerts')
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('front.home')}}}">الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page">تسجيل الدخول</li>
                    </ol>
                </nav>
            </div>
            <div class="signin-form">
                <form method="POST" action="{{route('front.login')}}">
                    @csrf
                    <div class="logo">
                        <img src="{{asset('front/imgs/logo.png')}}">
                    </div>
                    <div class="form-group">
                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="exampleInputEmail1" value="{{old('phone')}}" placeholder="الجوال">
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="كلمة المرور">
                    </div>
                    <div class="row options">
                        <div class="col-md-6 forgot">
                            <img src="{{asset('front/imgs/complain.png')}}">
                            <a href="{{url('reset')}}">هل نسيت كلمة المرور</a>
                        </div>
                    </div>
                    <div class="row buttons">
                        <div class="col-md-6 right">
                            <button type="submit" class="btn btn-success">دخول</button>
                        </div>
                        <div class="col-md-6 left">
                            <a href="{{route('front.register.show')}}">انشاء حساب جديد</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
