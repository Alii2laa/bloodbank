@extends('layouts.master')
@section('css')

@endsection

@section('current-page-title')
    Update city
@endsection
@section('main-page')
    cities
@endsection
@section('sub-page')
    update city
@endsection

@section('content')
    <section class="content">
        @include('layouts.alerts')
        <form action="{{route('cities.update',$city->id)}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Information</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">City Name</label>
                                <input type="text" id="inputName" name="cityName" class="form-control" value="{{$city->name}}">
                                @error('cityName')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName">Governorate Name</label>
                                <select class="form-control select2" style="width: 100%" name="govName">
                                    @foreach($governorates as $governorate)
                                        @if($governorate->id == $city->governorate_id)
                                            <option value="{{$governorate->id}}" selected>{{$governorate->name}}</option>
                                        @else
                                            <option value="{{$governorate->id}}">{{$governorate->name}}</option>
                                        @endif

                                    @endforeach
                                </select>
                                @error('govName')
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
