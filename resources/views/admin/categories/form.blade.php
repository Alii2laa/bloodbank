
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Information</h3>
            </div>
            <div class="card-body">
                <div class="form-group">

                    {!! Form::label('name', 'Category Name') !!}

                    {!! Form::text('name' , null, ['class' => 'form-control']) !!}
                    @error('name')
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
    <div class="col-12">
        {!! Form::submit(isset($category) ? 'Update' : 'Create' , ['class' => 'btn btn-primary']) !!}
    </div>
</div>
