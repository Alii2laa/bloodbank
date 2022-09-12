@extends('layouts.master')

@section('title')
    Add a new category
@endsection

@section('current-page-title')
    Add category
@endsection
@section('main-page')
    Categories
@endsection
@section('sub-page')
    Add category
@endsection

@section('content')
    <section class="content">
        @include('layouts.alerts')
            {!! Form::open(['route' => 'categories.store']) !!}

                @include('admin.categories.form')

            {!! Form::close() !!}
    </section>
@endsection
