@extends('front.layouts.master')

@section('title')
    إنشاء حساب جديد
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
                        <li class="breadcrumb-item active" aria-current="page">معلوماتي</li>
                    </ol>
                </nav>
            </div>
            <div class="account-form">
                <form action="{{route('profile.update')}}" method="POST">
                    @csrf
                    <label for="">الإسم</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{$client->name}}" id="exampleInputEmail1" name="name"  placeholder="الإسم">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <label for="">البريد الإلكتروني</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{$client->email}}" id="exampleInputEmail1" name="email" placeholder="البريد الإلكترونى">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <label for="">تاريخ الميلاد</label>
                    <input type="text" class="form-control @error('date_of_birth') is-invalid @enderror" value="{{$client->date_of_birth}}" name="date_of_birth" onfocus="(this.type='date')" id="date" placeholder="تاريخ الميلاد">
                    @error('date_of_birth')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <label for="">فصيلة الدم</label>
                    <select class="form-control @error('blood_type_id') is-invalid @enderror" id="cities" name="blood_type_id">
                        <option  selected disabled hidden value="">فصيلة الدم</option>
                        @foreach($blood_types as $type)
                            @if($type->id == $client->blood_type_id)
                                <option value="{{$type->id}}" selected>{{$type->name}}</option>
                            @else
                                <option value="{{$type->id}}">{{$type->name}}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('blood_type_id')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <label for="">المدينه</label>
                    <select class="form-control @error('city_id') is-invalid @enderror" id="cities" name="city_id">
                        <option  selected disabled hidden value="">المدينة</option>
                        @foreach($cities as $city)
                            @if($city->id == $client->city_id)
                                <option value="{{$city->id}}" selected>{{$city->name}}</option>
                            @else
                                <option value="{{$city->id}}">{{$city->name}}</option>
                            @endif

                        @endforeach
                    </select>
                    @error('city_id')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <label for="">الهاتف</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" value="{{$client->phone}}" id="exampleInputEmail1" name="phone" placeholder="رقم الهاتف">
                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <label for="">آخر تاريخ تبرع</label>
                    <input class="form-control @error('last_donation_date') is-invalid @enderror" value="{{$client->last_donation_date}}" type="text" name="last_donation_date" onfocus="(this.type='date')" id="date" placeholder="آخر تاريخ تبرع">
                    @error('last_donation_date')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <div class="create-btn">
                        <button type="submit" class="btn btn-success">تحديث</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
