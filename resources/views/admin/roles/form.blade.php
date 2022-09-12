<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Information</h3>
            </div>
            <div class="card-body">
                <div class="main-content-label mg-b-5">
                    <div class="col-xs-7 col-sm-7 col-md-7">
                        <div class="form-group">
                            {!! Form::label('name','Permission name') !!}
                            {!! Form::text('name', null, array('class' => 'form-control')) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- col -->
                    <div class="col-lg-4">
                        {!! Form::label('permission','Permissions') !!}
                        <ol id="treeview1">
                            @foreach($permission as $value)
                                <li>
                                    <label style="font-size: 16px;">{{ Form::checkbox('permission[]', $value->id, isset($rolePermissions) ? (in_array($value->id, $rolePermissions) ? true : false) : false , array('class' => 'name')) }}
                                        {{ $value->name }}
                                    </label>
                                </li>
                            @endforeach
                        </ol>
                    </div>
                    <!-- /col -->

                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
<div class="row">
    <div class="col-12">
        {!! Form::submit(isset($role) ? 'Update' : 'Create' , ['class' => 'btn btn-success']) !!}
    </div>
</div>
