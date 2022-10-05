@extends('front.layouts.master')

@section('title')
    تغيير كلمة المرور
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
                        <li class="breadcrumb-item active" aria-current="page">تغيير كلمة المرور</li>
                    </ol>
                </nav>
            </div>
            <div class="signin-form">
                <form method="POST" action="{{url('change-password-forget')}}">
                    @csrf
                    <div class="form-group">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  placeholder="كلمة المرور">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="تأكيد كلمة المرور">

                        @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <input type="hidden" class="form-control" name="code" value="{{$reqCode}}">
                    <input type="hidden" class="form-control" name="phone" value="{{$phone}}">

                    <div class="row buttons">
                        <div class="col-md-6 right">
                            <button type="submit" class="btn btn-success">تغيير كلمة المرور</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
