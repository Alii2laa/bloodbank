@extends('front.layouts.master')

@section('title')
    المقالات
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
                        <li class="breadcrumb-item active" aria-current="page">المقالات</li>
                    </ol>
                </nav>
            </div>

            <!--requests-->
            <div class="requests">
                <div class="head-text">
                    <h2>المقالات</h2>
                </div>
                <div class="content">
                    <div class="row">
                        @foreach($posts as $post)
                                <div class="col-4">
                                    <div class="card" style="width: 18rem;">
                                        <div class="photo">
                                            <img src="{{asset('images/posts/'.$post->img)}}" class="card-img-top" alt="..." width="">
                                        </div>
                                        <a href="{{url('client/favourite-post')}}" class="favourite" onclick="event.preventDefault();document.getElementById('fav-form-{{$post->id}}').submit();">
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
                                        <form id="fav-form-{{$post->id}}" action="{{url('client/favourite-post')}}" method="POST" style="display: none">
                                            @csrf
                                            <input type="hidden" name="post_id" value="{{$post->id}}">
                                        </form>
                                        <div class="card-body">
                                            <h5 class="card-title"><a href="{{route('post.show',$post->id)}}">{{$post->title}}</a></h5>
                                            <p class="card-text">{{substr($post->content,0,100).'....'}}</p>
                                        </div>
                                    </div>
                                </div>

                        @endforeach
                    </div>
{{--                    <div class="pages mt-5">--}}
{{--                        {{ $posts->links('front.layouts.paginator') }}--}}
{{--                    </div>--}}

                </div>
            </div>
        </div>
    </div>
@endsection
