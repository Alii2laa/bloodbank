
    <div class="form-group">
        {!! Form::label('name', 'الإسم') !!}
        {!! Form::text('name', null, ['class' =>'form-control','placeholder' => 'الإسم']) !!}
        @error('name')
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>

    <div class="form-group">
        {!! Form::label('email', 'البريد الإلكتروني') !!}
        {!! Form::email('email', null, ['class' =>'form-control','placeholder' => 'البريد الإلكتروني']) !!}
        @error('email')
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>



    <div class="form-group">
        {!! Form::label('date_of_birth', 'تاريخ الميلاد') !!}
        {!! Form::text('date_of_birth', null, ['class' =>'form-control','placeholder' => 'تاريخ الميلاد','id' => 'date' , 'onfocus' => "(this.type='date')"]) !!}
        @error('date_of_birth')
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>

    <div class="form-group">
        {!! Form::label('blood_type_id', 'فصيلة الدم') !!}
        {!! Form::select('blood_type_id', $blood_types ,null, ['class' =>'form-control','placeholder' => 'فصيلة الدم']) !!}
        @error('blood_type_id')
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>

    <div class="form-group">
        {!! Form::label('city_id', 'المدينه') !!}
        {!! Form::select('city_id', $cities ,null, ['class' =>'form-control','placeholder' => 'المدينه']) !!}
        @error('city_id')
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>



    <div class="form-group">
        {!! Form::label('phone', 'الهاتف') !!}
        {!! Form::text('phone', null, ['class' =>'form-control','placeholder' => 'الهاتف']) !!}
        @error('phone')
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>

    <div class="form-group">
        {!! Form::label('last_donation_date', 'آخر تاريخ تبرع') !!}
        {!! Form::text('last_donation_date', null, ['class' =>'form-control','placeholder' => 'آخر تاريخ تبرع','id' => 'date' , 'onfocus' => "(this.type='date')"]) !!}
        @error('last_donation_date')
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>


    <div class="create-btn">
        {!! Form::submit('تحديث', ['class' => 'btn btn-success']) !!}
    </div>
