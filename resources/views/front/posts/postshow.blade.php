@extends('front.layouts.master')

@section('title')
    {{$post->title}}
@endsection
@section('class')
    class="article-details"
@endsection

@section('content')
    <div class="inside-article">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('front.home')}}">الرئيسية</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="{{url('client/posts')}}">المقالات</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$post->title}}</li>
                    </ol>
                </nav>
            </div>
            <div class="article-image">
                <img src="{{asset('images/posts/'.$post->image)}}">
            </div>
            <div class="article-title col-12">
                <div class="h-text col-6">
                    <h4>{{$post->title}}</h4>
                </div>
                <div class="icon col-6">
                    <button type="button"><i class="far fa-heart"></i></button>
                </div>
            </div>

            <!--text-->
            <div class="text">
                <p>
                    {{$post->content}}
                </p>
            </div>

            <!--articles-->
            <div class="articles">
                <div class="title">
                    <div class="head-text">
                        <h2>مقالات ذات صلة</h2>
                    </div>
                </div>
                <div class="view">
                    <div class="row">
                        <!-- Set up your HTML -->
                        <div class="owl-carousel articles-carousel">
                            @if(count($related) === 0)
                                <div>
                                    عفواً لا يوجد مقالات مشابهه.
                                </div>
                            @else
                                @foreach($related as $post)
                                <div class="card">
                                    <div class="photo">
                                        <img src="{{asset('images/posts/'.$post->img)}}" class="card-img-top" alt="..." width="">
                                        <a href="#" class="click">المزيد</a>
                                    </div>
                                    <a href="#" class="favourite">
                                        <i class="far fa-heart"></i>
                                    </a>

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
    </div>
@endsection
