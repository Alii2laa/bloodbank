@extends('front.layouts.master')

@section('title')
    الرئيسية
@endsection

@section('content')
    <!--intro-->
    <div class="intro">
        @include('layouts.alerts')
        <div id="slider" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#slider" data-slide-to="0" class="active"></li>
                <li data-target="#slider" data-slide-to="1"></li>
                <li data-target="#slider" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item carousel-1 active">
                    <div class="container info">
                        <div class="col-lg-5">
                            <h3>بنك الدم نمضى قدما لصحة أفضل</h3>
                            <p>
                                هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص.
                            </p>
                            <a href="#">المزيد</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item carousel-2">
                    <div class="container info">
                        <div class="col-lg-5">
                            <h3>بنك الدم نمضى قدما لصحة أفضل</h3>
                            <p>
                                هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص.
                            </p>
                            <a href="#">المزيد</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item carousel-3">
                    <div class="container info">
                        <div class="col-lg-5">
                            <h3>بنك الدم نمضى قدما لصحة أفضل</h3>
                            <p>
                                هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي.
                            </p>
                            <a href="#">المزيد</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--about-->
    <div class="about">
        <div class="container">
            <div class="col-lg-6 text-center">
                <p>
                    <span>بنك الدم</span> {{$settings->about_us}}َ.
                </p>
            </div>
        </div>
    </div>

    <!--articles-->
    <div class="articles">
        <div class="container title">
            <div class="head-text">
                <h2>المقالات</h2>
            </div>
        </div>
        <div class="view">
            <div class="container">
                <div class="row">
                    <!-- Set up your HTML -->
                    <div class="owl-carousel articles-carousel">
                        @if(count($posts) === 0)
                            <div>
                                عفواً لا يوجد مقالات الآن.
                            </div>
                        @else
                            @foreach($posts as $post)
                                <div class="card">
                                    <div class="photo">
                                        <img src="{{asset('images/posts/'.$post->image)}}" class="card-img-top" alt="..." width="">
                                        <a href="{{route('post.show',$post->id)}}" class="click">المزيد</a>
                                    </div>
                                    <a href="{{url('favourite-post')}}" class="favourite" onclick="event.preventDefault();document.getElementById('fav-form-{{$post->id}}').submit();">
                                        <i class="{{$post->is_favourite == true ? 'fa fa-heart' : 'far fa-heart'}}" style="position: absolute;
                                        background-color: #2d3e50;
                                        border: none;
                                        color: #ffffff;
                                        border-radius: 100%;
                                        font-size: 20px;
                                        padding: 10px;
                                        top: 6px;
                                        left: 6px;
                                        z-index: 5;"></i>
                                    </a>
                                    <form id="fav-form-{{$post->id}}" action="{{url('favourite-post')}}" method="POST" style="display: none">
                                        @csrf
                                        <input type="hidden" name="post_id" value="{{$post->id}}">
                                    </form>

                                    <div class="card-body">
                                        <h5 class="card-title">{{$post->title}}</h5>
                                        <p class="card-text">
                                            {{substr($post->content,0,100).'....'}}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--requests-->
    <div class="requests">
        <div class="container">
            <div class="head-text">
                <h2>طلبات التبرع</h2>
            </div>
        </div>
        <div class="content">
            <div class="container">
                <form class="row filter" method="GET" action="{{route('donations')}}">

                    <div class="col-md-5 blood">
                        <div class="form-group">
                            <div class="inside-select">
                                <select class="form-control" id="exampleFormControlSelect1" name="blood_search">
                                    <option selected disabled>اختر فصيلة الدم</option>
                                    @foreach($bloodTypes as $bloodType)
                                        <option value="{{$bloodType->id}}">{{$bloodType->name}}</option>
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
                                        <option value="{{$city->id}}">{{$city->name}}</option>
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
                    @if(count($donations) === 0)
                        <div>
                            عفواً لا يوجد طلبات.
                        </div>
                    @else
                        @foreach($donations as $donation)
                            <div class="details">
                                <div class="blood-type">
                                    <h2 dir="ltr">{{$donation->bloodType->name}}</h2>
                                </div>
                                <ul>
                                    <li><span>اسم الحالة:</span> {{$donation->patient_name}}</li>
                                    <li><span>مستشفى:</span> {{$donation->hospital}}</li>
                                    <li><span>المدينة:</span> {{$donation->city->name}}</li>
                                </ul>
                                <a href="{{route('donation.show',$donation->id)}}">التفاصيل</a>
                            </div>
                        @endforeach
                    @endif

                </div>
                <div class="more">
                    <a href="{{route('donations')}}">المزيد</a>
                </div>
            </div>
        </div>
    </div>

    <!--contact-->
    <div class="contact">
        <div class="container">
            <div class="col-md-7">
                <div class="title">
                    <h3>اتصل بنا</h3>
                </div>
                <p class="text">يمكنك الإتصال بنا للإستفسار عن معلومة وسيتم الرد عليكم</p>
                <div class="row whatsapp">
                    <a href="#">
                        <img src="{{asset('front/imgs/whats.png')}}">
                        <p dir="ltr">+20{{$settings->phone}}</p>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!--app-->
    <div class="app">
        <div class="container">
            <div class="row">
                <div class="info col-md-6">
                    <h3>تطبيق بنك الدم</h3>
                    <p>
                        {{$settings->about_us}}                    </p>
                    <div class="download">
                        <h4>متوفر على</h4>
                        <div class="row stores">
                            <div class="col-sm-6">
                                <a href="#">
                                    <img src="{{asset('front/imgs/google.png')}}">
                                </a>
                            </div>
                            <div class="col-sm-6">
                                <a href="#">
                                    <img src="{{asset('front/imgs/ios.png')}}">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="screens col-md-6">
                    <img src="{{asset('front/imgs/App.png')}}">
                </div>
            </div>
        </div>
    </div>
@endsection
