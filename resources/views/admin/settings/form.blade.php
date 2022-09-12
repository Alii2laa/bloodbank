<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Information</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    {!! Form::label('phone', 'Phone') !!}
                    {!! Form::text('phone', null, ['class' =>'form-control']) !!}
                    @error('phone')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::text('email', null, ['class' =>'form-control']) !!}

                    @error('email')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('about_us', 'About Us') !!}
                    {!! Form::textarea('about_us', null, ['class' =>'form-control','cols' => '30', 'rows' => '10']) !!}

                    @error('about_us')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('fb_link', 'Facebook Link') !!}
                    {!! Form::text('fb_link', null, ['class' =>'form-control']) !!}
                    @error('fb_link')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('tw_link', 'Twitter Link') !!}
                    {!! Form::text('tw_link', null, ['class' =>'form-control']) !!}
                    <label for="inputName">Twitter Link</label>
                    <input type="text" id="inputName" name="tw_link" class="form-control" value="{{$setting->tw_link}}">
                    @error('tw_link')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('in_link', 'Instagram Link') !!}
                    {!! Form::text('in_link', null, ['class' =>'form-control']) !!}
                    @error('in_link')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('yt_link', 'Youtube Link') !!}
                    {!! Form::text('yt_link', null, ['class' =>'form-control']) !!}
                    @error('yt_link')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('notification_setting_message', 'Notification Message') !!}
                    {!! Form::textarea('notification_setting_message', null, ['class' =>'form-control','cols' => '30', 'rows' => '10']) !!}

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
        {!! Form::submit('Update' , ['class' => 'btn btn-success']) !!}
    </div>
</div>
