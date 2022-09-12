<div class="">

    <div class="row mg-b-20">
        <div class="parsley-input col-md-6" id="fnWrapper">

            {!! Form::label('name', 'Full name :') !!}
            {!! Form::text('name', null, ['class' =>'form-control form-control-sm mg-b-20']) !!}
            @error('name')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">

            {!! Form::label('email', 'E-mail : ') !!}
            {!! Form::email('email', null, ['class' =>'form-control form-control-sm mg-b-20']) !!}
            @error('email')
            <span class="text-danger">{{$message}}</span>
            @enderror

        </div>
    </div>

</div>

<div class="row mg-b-20">
    <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">

        {!! Form::label('password', 'Password : ') !!}
        {!! Form::password('password', ['class' =>'form-control form-control-sm mg-b-20']) !!}
        @error('password')
        <span class="text-danger">{{$message}}</span>
        @enderror

    </div>

    <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">

        {!! Form::label('confirm_password', 'Confirm password :') !!}
        {!! Form::password('confirm_password', ['class' =>'form-control form-control-sm mg-b-20']) !!}


    </div>
</div>

<div class="row row-sm mg-b-20">
    <div class="col-lg-6">
        {!! Form::label('status', 'Status :') !!}
        {!! Form::select('status', ['1' => 'مفعل' ,'0' => 'غير مفعل'],null ,['class' => 'form-control  nice-select  custom-select' , 'id' => 'select-beast']) !!}
        @error('status')
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
</div>

<div class="row mg-b-20">
    <div class="col-xs-12 col-md-12">
        <div class="form-group">
            {!! Form::label('roles_name', 'Roles     :') !!}
            {!! Form::select('roles_name[]', $roles,isset($user)  ? $userRole : [], array('class' => 'form-control','multiple'))!!}
            @error('roles_name')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 text-center">
    {!! Form::submit(isset($user) ? 'Update' : 'Create' , ['class' => 'btn btn-success']) !!}
</div>
