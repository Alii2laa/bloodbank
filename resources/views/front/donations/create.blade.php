@extends('front.layouts.master')

@section('title')
    إنشاء طلب تبرع
@endsection
@section('class')
    class="create"
@endsection

@section('content')
    <!--ask-donation-->
    <div class="form">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('front.home')}}">الرئيسية</a></li>
                        <li class="breadcrumb-item"><a href="{{route('donations')}}">طلبات التبرع</a></li>
                        <li class="breadcrumb-item"><a href="#">إنشاء طلب تبرع</a></li>
                    </ol>
                </nav>
            </div>
            <div class="account-form">
                <form action="{{route('donation.create')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="patient_name" class="form-control @error('patient_name') is-invalid @enderror" value="{{old('patient_name')}}" placeholder="إسم المريض">
                        @error('patient_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="number" name="patient_age" class="form-control @error('patient_age') is-invalid @enderror" id="exampleInputEmail1" value="{{old('patient_age')}}" placeholder="عمر المريض">
                        @error('patient_age')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" name="patient_phone" class="form-control @error('patient_phone') is-invalid @enderror" id="exampleInputEmail1" value="{{old('patient_phone')}}" placeholder="الهاتف">
                        @error('patient_phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" name="hospital" class="form-control @error('hospital') is-invalid @enderror" id="exampleInputEmail1" value="{{old('hospital')}}" placeholder="إسم المستشفى">
                        @error('hospital')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="exampleInputEmail1" value="{{old('address')}}" placeholder="عنوان المستشفى">
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    {{--         location picker jq plugin           --}}
                    <div class="form-group">
                        <input type="text" name="latitude" class="form-control @error('latitude') is-invalid @enderror" id="exampleInputEmail1" value="{{old('latitude')}}" placeholder="خط العرض">
                        @error('latitude')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" name="longitude" class="form-control @error('longitude') is-invalid @enderror" id="exampleInputEmail1" value="{{old('longitude')}}" placeholder="خط الطول">
                        @error('longitude')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="number" name="bags_quantity" class="form-control @error('bags_quantity') is-invalid @enderror" id="exampleInputEmail1" value="{{old('bags_quantity')}}" placeholder="عدد أكياس الدم">
                        @error('bags_quantity')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
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
                    </div>

                    <div class="form-group">
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
                    </div>

                    <div class="form-group">
                        <textarea class="form-control @error('notes') is-invalid @enderror" name="notes" id="" cols="30" rows="10" placeholder="ملاحظات">{{old('notes')}}</textarea>
                        @error('notes')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">إنشاء طلب تبرع</button>
                    </div>





                </form>
            </div>
        </div>
    </div>
@endsection
