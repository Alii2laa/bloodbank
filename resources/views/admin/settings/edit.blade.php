@extends('layouts.master')
@section('title')
    Settings
@endsection
@section('current-page-title')
    Update settings
@endsection
@section('main-page')
    Settings
@endsection
@section('sub-page')
    update setting
@endsection

@section('content')
    <section class="content">
        @include('layouts.alerts')
        {!! Form::model($setting, ['route'=>['settingsUpdate',$setting->id],'method' => 'PUT']) !!}
            @include('admin.settings.form')
        {!! Form::close() !!}


    </section>
@endsection
