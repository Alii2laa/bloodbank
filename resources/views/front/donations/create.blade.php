@extends('front.layouts.master')

@section('css')
    <link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/select2/css/_select2.scss')}}">
@endsection

@section('title')
    إنشاء طلب تبرع
@endsection
@section('class')
    class="create"
@endsection

@section('content')
    <!--ask-donation-->
    <div class="form">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('front.home')}}">الرئيسية</a></li>
                        <li class="breadcrumb-item"><a href="{{route('donations')}}">طلبات التبرع</a></li>
                        <li class="breadcrumb-item"><a href="#">إنشاء طلب تبرع</a></li>
                    </ol>
                </nav>
            </div>
            <div class="account-form">

                    {!! Form::open(['route' => 'donation.create']) !!}
                        @include('front.donations.form')
                    {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2();

        });
    </script>@endsection
