<div class="form-group">

    {!! Form::text('patient_name',null,['class' => 'form-control','placeholder' => 'إسم المريض']) !!}
    @error('patient_name')
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::number('patient_age',null,['class' => 'form-control','placeholder' => 'عمر المريض']) !!}
    @error('patient_age')
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::text('patient_phone',null,['class' => 'form-control','placeholder' => 'الهاتف']) !!}
    @error('patient_phone')
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::text('hospital',null,['class' => 'form-control','placeholder' => 'إسم المستشفى']) !!}
    @error('hospital')
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::text('address',null,['class' => 'form-control','placeholder' => 'عنوان المستشفى']) !!}
    @error('address')
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::text('latitude',null,['class' => 'form-control','placeholder' => 'خط العرض']) !!}
    @error('latitude')
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::text('longitude',null,['class' => 'form-control','placeholder' => 'خط الطول']) !!}
    @error('longitude')
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::number('bags_quantity',null,['class' => 'form-control','placeholder' => 'عدد أكياس الدم']) !!}
    @error('bags_quantity')
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('blood_type_id', 'فصائل الدم :') !!}
    {!! Form::select('blood_type_id',$blood_types,[null],['class' => 'form-control select2']) !!}

    @error('blood_type_id')
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('city_id', 'المدن :') !!}
    {!! Form::select('city_id',$cities,null,['class' => 'form-control select2']) !!}
    @error('city_id')
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::textarea('notes',null,['class' => 'form-control','cols'=>'30','rows' => '10','placeholder' => 'ملاحظات']) !!}
    @error('notes')
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::button('إنشاء طلب' , ['type' => 'submit','class' => 'btn btn-success']) !!}
</div>
