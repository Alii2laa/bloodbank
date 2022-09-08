@extends('layouts.master')
@section('css')

@endsection

@section('current-page-title')
    Update governorate
@endsection
@section('main-page')
    Governorates
@endsection
@section('sub-page')
    update governorate
@endsection

@section('content')
    <section class="content">
        @include('layouts.alerts')
        <form action="{{route('governorates.update',$governorate->id)}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Information</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Governorate Name</label>
                                <input type="text" id="inputName" name="name" class="form-control" value="{{$governorate->name}}">
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
