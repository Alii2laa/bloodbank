@extends('layouts.master')
@section('title')
    Update governorate
@endsection
@section('current-page-title')
    Update governorate
@endsection
@section('main-page')
    Governorates
@endsection
@section('sub-page')
    update governorate
@endsection

@section('content')
    <section class="content">
        @include('layouts.alerts')
            {!! Form::model($governorate , ['route' => ['governorates.update',$governorate->id] , 'method' => 'PUT']) !!}
                @include('admin.governorates.form')
            {!! Form::close() !!}

    </section>
@endsection
