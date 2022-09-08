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
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('front.home')}}}">الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page">انشاء حساب جديد</li>
                    </ol>
                </nav>
            </div>
            <div class="account-form">
                <form action="{{route('front.register')}}" method="POST">
                    @csrf
                    <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" id="exampleInputEmail1" name="name"  placeholder="الإسم">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" id="exampleInputEmail1" name="email" placeholder="البريد الإلكترونى">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <input type="text" class="form-control @error('date_of_birth') is-invalid @enderror" value="{{old('date_of_birth')}}" name="date_of_birth" onfocus="(this.type='date')" id="date" placeholder="تاريخ الميلاد">
                    @error('date_of_birth')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <select class="form-control @error('blood_type_id') is-invalid @enderror" id="cities" name="blood_type_id">
                        <option  selected disabled hidden value="">فصيلة الدم</option>
                        @foreach($blood_types as $type)
                            <option value="{{$type->id}}" {{old('blood_type_id') == $type->id ? 'selected' : ''}}>{{$type->name}}</option>
                        @endforeach
                    </select>
                    @error('blood_type_id')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <select class="form-control @error('city_id') is-invalid @enderror" id="cities" name="city_id">
                        <option  selected disabled hidden value="">المدينة</option>
                        @foreach($cities as $city)
                            <option value="{{$city->id}}" {{old('city_id') == $city->id ? 'selected' : ''}}>{{$city->name}}</option>
                        @endforeach
                    </select>
                    @error('city_id')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <input type="text" class="form-control @error('phone') is-invalid @enderror" value="{{old('phone')}}" id="exampleInputEmail1" name="phone" placeholder="رقم الهاتف">
                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <input class="form-control @error('last_donation_date') is-invalid @enderror" value="{{old('last_donation_date')}}" type="text" name="last_donation_date" onfocus="(this.type='date')" id="date" placeholder="آخر تاريخ تبرع">
                    @error('last_donation_date')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="كلمة المرور">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" placeholder="تأكيد كلمة المرور">
                    @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="create-btn">
                        <button type="submit" class="btn btn-success">إنشاء</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
