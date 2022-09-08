@extends('layouts.master')
@section('css')

@endsection

@section('current-page-title')
    Add role
@endsection
@section('main-page')
    Roles
@endsection
@section('sub-page')
    add role
@endsection

@section('content')
    <section class="content">
        @include('layouts.alerts')
        <form action="{{route('roles.store')}}" method="POST">
            @csrf
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
                                        <p>Permissions</p>
                                        {!! Form::text('name', null, array('class' => 'form-control')) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!-- col -->
                                <div class="col-lg-4">
                                    <ol id="treeview1">
                                        @foreach($permission as $value)
                                        <li>
                                                <label style="font-size: 16px;">{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
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
                    <input type="submit" value="Create" class="btn btn-success">
                </div>
            </div>
        </form>


    </section>
@endsection
