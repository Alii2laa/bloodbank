<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Information</h3>
            </div>
            <div class="card-body">
                <div class="form-group">

                    {!! Form::label('title', 'Title') !!}
                    {!! Form::text('title', null, ['class' =>'form-control']) !!}

                    @error('title')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('content', 'Content') !!}
                    {!! Form::text('content', null, ['class' =>'form-control']) !!}
                    @error('content')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('category_id', 'Category') !!}
                    {!! Form::select('category_id', $categories ,null, ['class' =>'form-control select2']) !!}

                    @error('category_id')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>




                <div class="form-group">
                    {!! Form::label('customFile','Choose File...') !!}
                    {!! Form::file('image' , ['class' => 'form-control']) !!}

                    @error('image')
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
        {!! Form::submit(isset($post) ? 'Update' : 'Create' , ['class' => 'btn btn-success']) !!}
    </div>
</div>

