@extends('front.layouts.master')

@section('title')
    الرئيسية
@endsection
@section('class')
    class="inside-request"
@endsection

@section('content')
    <!--ask-donation-->
    <div class="ask-donation">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('front.home')}}">الرئيسية</a></li>
                        <li class="breadcrumb-item"><a href="{{route('donations')}}">طلبات التبرع</a></li>
                        <li class="breadcrumb-item active" aria-current="page">طلب التبرع: {{$results->patient_name}}</li>
                    </ol>
                </nav>
            </div>
            <div class="details">
                <div class="person">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="inside">
                                <div class="info">
                                    <div class="dark">
                                        <p>الإسم</p>
                                    </div>
                                    <div class="light">
                                        <p>{{$results->patient_name}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="inside">
                                <div class="info">
                                    <div class="dark">
                                        <p>فصيلة الدم</p>
                                    </div>
                                    <div class="light">
                                        <p dir="ltr">{{$results->bloodType->name}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="inside">
                                <div class="info">
                                    <div class="dark">
                                        <p>العمر</p>
                                    </div>
                                    <div class="light">
                                        <p>{{$results->patient_age}} عام</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="inside">
                                <div class="info">
                                    <div class="dark">
                                        <p>عدد الأكياس المطلوبة</p>
                                    </div>
                                    <div class="light">
                                        <p>{{$results->bags_quantity}} أكياس</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="inside">
                                <div class="info">
                                    <div class="dark">
                                        <p>المشفى</p>
                                    </div>
                                    <div class="light">
                                        <p>{{$results->hospital}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="inside">
                                <div class="info">
                                    <div class="dark">
                                        <p>رقم الجوال</p>
                                    </div>
                                    <div class="light">
                                        <p>{{$results->patient_phone}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="inside">
                                <div class="info">
                                    <div class="special-dark dark">
                                        <p>عنوان المشفى</p>
                                    </div>
                                    <div class="special-light light">
                                        <p>{{$results->hospital}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="details-button">
                        <a href="#">التفاصيل</a>
                    </div>
                </div>
                <div class="text">
                    <p>
                        {{$results->notes}}
                    </p>
                </div>
                <div class="location">
                    <div class="mapouter">
                        <div class="gmap_canvas">
                            <iframe height="500" id="gmap_canvas" src="https://maps.google.com/maps?q={{$results->latitude}},%20{{$results->longitude}}&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                    frameborder="0" scrolling="no"
                                    marginheight="0" marginwidth="0">

                            </iframe>
                            <a href="https://123movies-to.org"></a>
                            <br>
                            <style>.mapouter{position:relative;text-align:right;height:500px;}</style>
                            <a href="https://www.embedgooglemap.net">google map embed code</a>
                            <style>.gmap_canvas {overflow:hidden;background:none!important;height:500px;}</style>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
