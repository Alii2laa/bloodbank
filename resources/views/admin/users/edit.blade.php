@extends('layouts.master')
@section('title')
    Update user
@endsection
@section('current-page-title')
    Users
@endsection
@section('main-page')
    Users
@endsection
@section('sub-page')
    update user
@endsection
@section('content')
    <!-- row -->
    <div class="row">

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    @include('layouts.alerts')
                    {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
                        @include('admin.users.form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
