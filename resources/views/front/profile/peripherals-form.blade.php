<div class="head-text mt-3 mb-3">
    <h5>أنواع الفصائل</h5>
</div>
<div class="row">
    @foreach($allTypes as $type)

            <div class="col-6">
                <div class="form-check">

                    {!! Form::checkbox('blood_types[]', $type->id, in_array($type->id , $BloodTypesIds) ? true : false , ['class' => 'form-check-input' , 'id' =>"flexCheckDefault-{$type->id}"]) !!}

                    {!! Form::label("flexCheckDefault-{$type->id}", "{$type->name}") !!}
                </div>
            </div>

    @endforeach
    @error('blood_types')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<hr/>
<div class="head-text mt-3 mb-3">
    <h5>المحافظات</h5>
</div>

<div class="row">
    @foreach($allGoves as $gov)
            <div class="col-6">
                <div class="form-check">

                    {!! Form::checkbox('governorates_ids[]', $gov->id, in_array($gov->id , $GovernoratesIds) ? true : false , ['class' => 'form-check-input' , 'id' =>"flexCheckDefaultt-{$gov->id}"]) !!}
                    {!! Form::label("flexCheckDefaultt-{$gov->id}", "{$gov->name}") !!}

                </div>
            </div>

    @endforeach
    @error('blood_types')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>


<div class="col-12 text-center mt-5">
    <button type="submit" class="btn btn-success">تحديث</button>
</div>
