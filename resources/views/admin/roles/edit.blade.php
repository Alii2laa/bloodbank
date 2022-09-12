@extends('layouts.master')
@section('title')
    Update role
@endsection
@section('css')

@endsection

@section('current-page-title')
    Update role
@endsection
@section('main-page')
    Roles
@endsection
@section('sub-page')
    update role
@endsection

@section('content')
    <section class="content">
        @include('layouts.alerts')
        {!! Form::model($role, ['method' => 'PUT','route' => ['roles.update', $role->id]]) !!}
            @include('admin.roles.form')
        {!! Form::close() !!}


    </section>
@endsection
