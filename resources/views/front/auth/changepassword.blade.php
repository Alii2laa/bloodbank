@extends('front.layouts.master')

@section('title')
    تغيير كلمة المرور
@endsection

@section('class')
    class="create"
@endsection

@section('content')
    <div class="form">
        @include('layouts.alerts')
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('front.home')}}}">الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page">تغيير كلمة المرور</li>
                    </ol>
                </nav>
            </div>
            <div class="account-form">
                <form id="quickForm" action="{{route('front.password-update')}}" method="POST">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <input type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" placeholder="كلمة المرور الحالية">
                            @error('current_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror" placeholder="كلمة المرور الجديدة">
                            @error('new_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" name="new_password_confirmation" class="form-control @error('new_password_confirmation') is-invalid @enderror" placeholder="تأكيد كلمة المرور الجديدة">
                            @error('new_password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <!-- /.card-body -->

                        <button type="submit" class="btn btn-success">تغيير</button>
                </form>
            </div>
        </div>
    </div>
@endsection
