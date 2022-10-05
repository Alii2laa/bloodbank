@extends('front.layouts.master')

@section('title')
    المقالات المفضلة
@endsection
@section('class')
    class="donation-requests"
@endsection

@section('content')
    <div class="all-requests">
        @include('layouts.alerts')
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('front.home')}}">الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page">المقالات المفضلة</li>
                    </ol>
                </nav>
            </div>

            <!--requests-->
            <div class="requests">
                <div class="head-text">
                    <h2>المقالات المفضلة</h2>
                </div>
                <div class="content">
                    <div class="row">
                        @if(count($posts) === 0)
                            <div>
                                عفواً لا يوجد مقالات مفضلة.
                            </div>
                        @else
                            @foreach($posts as $post)
                            <div class="col-4">
                                <div class="card" style="width: 18rem;">
                                    <img class="card-img-top" src="{{asset('images/posts/'.$post->image)}}" alt="Card image cap">
                                    <div class="card-body">
                                        <a href="{{url('favourite-post')}}" class="favourite" onclick="event.preventDefault();document.getElementById('fav-form-{{$post->id}}').submit();">
                                            <i class="fa fa-heart" id="favIcon" style="position: absolute;
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
                                        <h5 class="card-title"><a href="{{route('post.show',$post->id)}}">{{$post->title}}</a></h5>
                                        <p class="card-text">{{substr($post->content,0,100).'....'}}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @endif
                    </div>
                    <div class="pages mt-5">
                        {{ $posts->links('front.layouts.paginator') }}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
