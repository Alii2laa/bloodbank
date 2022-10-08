@extends('front.layouts.master')

@section('title')
    إنشاء حساب جديد
@endsection

@section('class')
    class="create"
@endsection
@section('content')
    <div class="form">
        <div class="container">
            @include('layouts.alerts')
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('front.home')}}}">الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page">معلوماتي</li>
                    </ol>
                </nav>
            </div>
            <div class="account-form">
                    {!! Form::model($client,['route' => ['profile.update']]) !!}
                        @include('front.profile.profile-form')
                    {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
