@extends('layouts.master')

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
        <form action="{{route('categories.store')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Information</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Category Name</label>
                                <input type="text" id="inputName" name="name" class="form-control">
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <input type="submit" value="Create" class="btn btn-success">
                </div>
            </div>
        </form>

    </section>
@endsection
