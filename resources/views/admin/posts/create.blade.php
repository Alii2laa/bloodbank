@extends('layouts.master')
@section('title')
    Add a new post
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/select2/css/_select2.scss')}}">
@endsection
@section('current-page-title')
    Add Post
@endsection
@section('main-page')
    Posts
@endsection
@section('sub-page')
    Add post
@endsection

@section('content')

    {!! Form::open(['route' => ['posts.store'], 'files' => true]) !!}
        @include('admin.posts.form')
    {!! Form::close() !!}


@endsection
@section('scripts')
<script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script>
    $(function () {
        bsCustomFileInput.init();
        //Initialize Select2 Elements
        $('.select2').select2();

    });
</script>

@endsection
