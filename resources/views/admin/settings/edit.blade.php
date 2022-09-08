@extends('layouts.master')
@section('css')

@endsection

@section('current-page-title')
    Update settings
@endsection
@section('main-page')
    Settings
@endsection
@section('sub-page')
    update setting
@endsection

@section('content')
    <section class="content">
        @include('layouts.alerts')
        <form action="{{route('settingsUpdate',$setting->id)}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Information</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Phone</label>
                                <input type="text" id="inputName" name="phone" class="form-control" value="{{$setting->phone}}">
                                @error('phone')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName">Email</label>
                                <input type="text" id="inputName" name="email" class="form-control" value="{{$setting->email}}">
                                @error('email')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName">About Us</label>
                                <textarea name="about_us" id="inputName" cols="30" rows="10" class="form-control">{{$setting->about_us}}</textarea>
                                @error('about_us')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName">Facebook Link</label>
                                <input type="text" id="inputName" name="fb_link" class="form-control" value="{{$setting->fb_link}}">
                                @error('fb_link')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName">Twitter Link</label>
                                <input type="text" id="inputName" name="tw_link" class="form-control" value="{{$setting->tw_link}}">
                                @error('tw_link')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName">Instagram Link</label>
                                <input type="text" id="inputName" name="in_link" class="form-control" value="{{$setting->in_link}}">
                                @error('in_link')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName">Youtube Link</label>
                                <input type="text" id="inputName" name="yt_link" class="form-control" value="{{$setting->yt_link}}">
                                @error('yt_link')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName">Notification Message</label>
                                <textarea name="notification_setting_message" id="inputName" cols="30" rows="10" class="form-control">{{$setting->notification_setting_message}}</textarea>
                                @error('notification_setting_message')
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
                <div class="col-12 mb-5">
                    <input type="submit" value="Update" class="btn btn-success">
                </div>
            </div>
        </form>

    </section>
@endsection
