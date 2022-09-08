@extends('front.layouts.master')

@section('title')
    إعدادات الإشعارات
@endsection

@section('class')
    class="create"
@endsection

@section('content')
    <div class="form">
        <div class="container">
            @include('layouts.alerts')
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('front.home')}}}">الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page">إعدادات الإشعارات</li>
                    </ol>
                </nav>
            </div>
            <div class="">
                <form action="{{route('peripherals.update')}}" method="POST">
                    @csrf


                    <div class="head-text mt-3 mb-3">
                        <h5>أنواع الفصائل</h5>
                    </div>
                    <div class="row">
                        @foreach($allTypes as $type)
                            @if(in_array($type->id , $BloodTypesIds))
                                <div class="col-6">
                                    <div class="form-check">
                                        <input type="checkbox" checked name="blood_types[]" id="flexCheckDefault-{{$type->id}}" class="form-check-input" value="{{$type->id}}">
                                        <label class="form-check-label " for="flexCheckDefault-{{$type->id}}">
                                            {{$type->name}}
                                        </label>
                                    </div>
                                </div>
                            @else
                                <div class="col-6">
                                    <div class="form-check">
                                        <input type="checkbox" name="blood_types[]" id="flexCheckDefault-{{$type->id}}" class="form-check-input" value="{{$type->id}}">
                                        <label class="form-check-label" for="flexCheckDefault-{{$type->id}}">
                                            {{$type->name}}
                                        </label>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        @error('blood_types')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                    <hr/>
                    <div class="head-text mt-3 mb-3">
                        <h5>المحافظات</h5>
                    </div>

                    <div class="row">
                        @foreach($allGoves as $gov)
                            @if(in_array($gov->id , $GovernoratesIds))
                                <div class="col-6">
                                    <div class="form-check">
                                        <input type="checkbox" checked name="governorates_ids[]" id="flexCheckDefault2-{{$gov->id}}" class="form-check-input" value="{{$gov->id}}">
                                        <label class="form-check-label " for="flexCheckDefault2-{{$gov->id}}">
                                            {{$gov->name}}
                                        </label>
                                    </div>
                                </div>
                            @else
                                <div class="col-6">
                                    <div class="form-check">
                                        <input type="checkbox" name="governorates_ids[]" id="flexCheckDefault2-{{$gov->id}}" class="form-check-input" value="{{$gov->id}}">
                                        <label class="form-check-label" for="flexCheckDefault2-{{$gov->id}}">
                                            {{$gov->name}}
                                        </label>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        @error('blood_types')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>


                        <div class="col-12 text-center mt-5">
                            <button type="submit" class="btn btn-success">تحديث</button>
                        </div>

                </form>
            </div>
        </div>
    </div>
@endsection
