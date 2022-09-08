@extends('layouts.master')
@section('css')
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

@endsection
@section('current-page-title')
    Roles
@endsection
@section('main-page')
    Home
@endsection
@section('sub-page')
    roles
@endsection

@section('content')
    <section class="content">
        @include('layouts.alerts')
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped text-center">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Operations</th>
                                </tr>
                                </thead>
                                <tbody>
                                @isset($roles)
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach($roles as $role)
                                        @php
                                            $i++;
                                        @endphp
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>{{$role->name}}</td>

                                            <td>
                                                <div class="btn-group">
{{--                                                    @can('تعديل صلاحية')--}}
                                                    <a href="{{route('roles.edit',$role->id)}}" class="m-1">
                                                        <button type="submit" class="btn btn-success">Edit</button>
                                                    </a>
{{--                                                    @endcan--}}

                                                    <form action="{{route('roles.destroy',$role->id)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>


                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endisset

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Operations</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
@endsection
