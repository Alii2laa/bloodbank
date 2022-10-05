@extends('front.layouts.master')

@section('title')
    نسيت كلمة المرور
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
                        <li class="breadcrumb-item active" aria-current="page">نسيت كلمة المرور</li>
                    </ol>
                </nav>
            </div>
            <div class="signin-form">
                <form method="POST" action="{{url('reset-password')}}">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="exampleInputEmail1" value="{{old('phone')}}" placeholder="الجوال">
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="row buttons">
                        <div class="col-md-6 right">
                            <button type="submit" class="btn btn-success">إرسال الكود</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
