@extends('layouts.master')

@section('title')
    Update city
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/select2/css/_select2.scss')}}">
@endsection

@section('current-page-title')
    Update city
@endsection
@section('main-page')
    cities
@endsection
@section('sub-page')
    update city
@endsection

@section('content')
    <section class="content">
        @include('layouts.alerts')
            {!! Form::model($city, ['route' => ['cities.update',$city->id], 'method' => 'PUT']) !!}
                @include('admin.cities.form')
            {!! Form::close() !!}

    </section>
@endsection
@section('scripts')
    <script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2();
            bsCustomFileInput.init();

        });
    </script>

@endsection
