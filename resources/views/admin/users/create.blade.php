@extends('layouts.master')
@section('title')
    Add a new user
@endsection
@section('current-page-title')
    Users
@endsection
@section('main-page')
    Users
@endsection
@section('sub-page')
    add user
@endsection
@section('content')
    <!-- row -->
    <div class="row">


        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    @include('layouts.alerts')
                    {!! Form::open(['route'=>['users.store'],'class' => 'parsley-style-1']) !!}
                    @include('admin.users.form')
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection
