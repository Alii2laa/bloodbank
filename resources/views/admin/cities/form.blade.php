<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Information</h3>
            </div>
            <div class="card-body">
                <div class="form-group">

                    {!! Form::label('name' , 'City Name') !!}
                    {!! Form::text('name' , null , ['class' => 'form-control']) !!}

                    @error('name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('governorate_id' , 'Governorate Name') !!}
                    {!! Form::select('governorate_id', $governorates , null  , ['class' => 'form-control select2']) !!}

                    @error('governorate_id')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                {!! Form::hidden('id' , isset($city) ? $city->id : null, ['readonly']) !!}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
<div class="row">
    <div class="col-12">
        {!! Form::submit(isset($city) ? 'Update' : 'Create' , ['class' => 'btn btn-success']) !!}
    </div>
</div>

