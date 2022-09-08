@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/select2/css/_select2.scss')}}">
@endsection

@section('current-page-title')
    Add city
@endsection
@section('main-page')
    Cities
@endsection
@section('sub-page')
    Add city
@endsection

@section('content')
    <section class="content">
        @include('layouts.alerts')
        <form action="{{route('cities.store')}}" method="POST">
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
                                <input type="text" id="inputName" name="name" class="form-control">
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName">Governorate Name</label>
                                <select class="form-control select2" style="width: 100%" name="governorate_id">
                                    @foreach($governorates as $governorate)
                                        <option value="{{$governorate->id}}">{{$governorate->name}}</option>
                                    @endforeach
                                </select>
                                @error('governorate_id')
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
@section('scripts')
    <script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2();
            bsCustomFileInput.init();

        });
    </script>

@endsection

