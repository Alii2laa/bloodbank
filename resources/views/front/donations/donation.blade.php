@extends('front.layouts.master')

@section('title')
    الرئيسية
@endsection
@section('class')
    class="donation-requests"
@endsection

@section('content')
    <div class="all-requests">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('front.home')}}">الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page">طلبات التبرع</li>
                    </ol>
                </nav>
            </div>

            <!--requests-->
            <div class="requests">
                <div class="head-text">
                    <h2>طلبات التبرع</h2>
                </div>
                <div class="content">
                    <form class="row filter" method="GET" action="{{route('donations')}}">

                        <div class="col-md-5 blood">
                            <div class="form-group">
                                <div class="inside-select">
                                    <select class="form-control" id="exampleFormControlSelect1" name="blood_search">
                                        <option selected disabled>اختر فصيلة الدم</option>
                                        @foreach($bloodTypes as $bloodType)

                                            @if($bloodType->id == app('request')->input('blood_search'))
                                                <option value="{{$bloodType->id}}" selected>{{$bloodType->name}}</option>
                                            @else
                                                <option value="{{$bloodType->id}}">{{$bloodType->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 city">
                            <div class="form-group">
                                <div class="inside-select">
                                    <select class="form-control" id="exampleFormControlSelect1" name="city_search">
                                        <option selected disabled>اختر المدينه</option>
                                        @foreach($cities as $city)
                                            @if($city->id == app('request')->input('city_search'))
                                                <option value="{{$city->id}}" selected>{{$city->name}}</option>
                                            @else
                                                <option value="{{$city->id}}">{{$city->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1 search">
                            <button type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                    <div class="patients">
                        @if(count($results) === 0)
                            <div>
                                عفواً لا يوجد طلبات.
                            </div>
                        @else
                            @foreach($results as $result)
                                <div class="details">
                                    <div class="blood-type">
                                        <h2 dir="ltr">{{$result->bloodType->name}}</h2>
                                    </div>
                                    <ul>
                                        <li><span>اسم الحالة:</span> {{$result->patient_name}}</li>
                                        <li><span>مستشفى:</span> {{$result->hospital}}</li>
                                        <li><span>المدينة:</span> {{$result->city->name}}</li>
                                    </ul>
                                    <a href="{{route('donation.show',$result->id)}}">التفاصيل</a>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="pages">
                        {{ $results->links('front.layouts.paginator') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
