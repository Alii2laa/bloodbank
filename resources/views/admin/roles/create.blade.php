@extends('layouts.master')
@section('title')
    Add a new role
@endsection
@section('css')

@endsection

@section('current-page-title')
    Add role
@endsection
@section('main-page')
    Roles
@endsection
@section('sub-page')
    add role
@endsection

@section('content')
    <section class="content">
        @include('layouts.alerts')
        {!! Form::open(['route'=>'roles.store']) !!}
            @include('admin.roles.form')
        {!! Form::close() !!}

    </section>
@endsection
