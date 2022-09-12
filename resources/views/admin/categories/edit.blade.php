@extends('layouts.master')
@section('title')
    Update category
@endsection
@section('current-page-title')
    Update category
@endsection
@section('main-page')
    categories
@endsection
@section('sub-page')
    update category
@endsection

@section('content')
    <section class="content">
        @include('layouts.alerts')
            {!! Form::model($category, ['route' => ['categories.update',$category->id] , 'method' => 'PUT']) !!}

            @include('admin.categories.form')

            {!! Form::close() !!}
    </section>
@endsection
