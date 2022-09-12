@extends('layouts.master')

@section('title')
    Add a new governorate
@endsection

@section('current-page-title')
    Add governorate
@endsection
@section('main-page')
    Governorates
@endsection
@section('sub-page')
    Add governorate
@endsection

@section('content')
    <section class="content">
        @include('layouts.alerts')
            {!! Form::open(['route' => 'governorates.store']) !!}

                @include('admin.governorates.form')

            {!! Form::close() !!}
    </section>
@endsection
