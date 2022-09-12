@extends('front.layouts.master')

@section('title')
    إعدادات الإشعارات
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
                        <li class="breadcrumb-item active" aria-current="page">إعدادات الإشعارات</li>
                    </ol>
                </nav>
            </div>
            <div class="">
                {!! Form::open(['route' => ['peripherals.update'],'method' => 'POST']) !!}

                    @include('front.profile.peripherals-form')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
