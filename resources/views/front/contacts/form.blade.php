<div class="form-group">
    {!! Form::email('email', null, ['class' =>'form-control','placeholder' => 'البريد الإلكتروني']) !!}
    @error('email')
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::text('subject', null, ['class' =>'form-control','placeholder' => 'عنوان الرساله']) !!}
    @error('subject')
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::textarea('message', null, ['class' =>'form-control in-valid','placeholder' => 'نص الرسالة','row' => '3']) !!}
    @error('message')
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>

<div class="btn">
    {!! Form::submit('إرسال', ['class' => 'btn btn-success!important']) !!}
</div>
