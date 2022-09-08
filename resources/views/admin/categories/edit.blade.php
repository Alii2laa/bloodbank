@extends('layouts.master')
@section('css')

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
        <form action="{{route('categories.update',$category->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Information</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Category Name</label>
                                <input type="text" id="inputName" name="name" class="form-control" value="{{$category->name}}">
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
                    <input type="submit" value="Update" class="btn btn-success">
                </div>
            </div>
        </form>

    </section>
@endsection
