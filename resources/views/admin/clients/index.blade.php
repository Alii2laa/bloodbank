@extends('layouts.master')
@section('css')
    <link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection
@section('current-page-title')
    Clients
@endsection
@section('main-page')
    Home
@endsection
@section('sub-page')
    clients
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
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Date of birth</th>
                                    <th>Phone</th>
                                    <th>Last donation date</th>
                                    <th>Blood type</th>
                                    <th>City</th>
                                    <th>Status</th>
                                    <th>Operations</th>
                                </tr>
                                </thead>
                                <tbody>
                                @isset($clients)
                                    @foreach($clients as $client)
                                        <tr>
                                            <td>{{$client->id}}</td>
                                            <td>{{$client->name}}</td>
                                            <td>{{$client->email}}</td>
                                            <td>{{$client->date_of_birth}}</td>
                                            <td>{{$client->phone}}</td>
                                            <td>{{$client->last_donation_date}}</td>
                                            <td>{{$client->bloodType->name}}</td>
                                            <td>{{$client->city->name}}</td>
                                            @if($client->status == 1)
                                                <td class="text-green">{{'مفعل'}}</td>
                                            @else
                                                <td class="text-danger">{{'غير مفعل'}}</td>
                                            @endif


                                            <td>
                                                <div class="btn-group">
                                                    <form action="{{url('admin/clients/'.$client->id.'/activate')}}" method="POST">
                                                        @csrf
                                                        @method('POST')
                                                        <button type="submit" class="btn btn-success">Activate</button>
                                                    </form>

                                                    <form action="{{url('admin/clients/'.$client->id.'/deactivate')}}" method="POST">
                                                        @csrf
                                                        @method('POST')
                                                        <button type="submit" class="btn btn-primary">Deactivate</button>
                                                    </form>

                                                    <form action="{{route('clients.destroy',$client->id)}}" method="POST">
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
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Date of birth</th>
                                    <th>Phone</th>
                                    <th>Last donation date</th>
                                    <th>Blood type</th>
                                    <th>City</th>
                                    <th>Status</th>
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
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js' )}}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script>
        $(function () {
            var printCounter = 0;
            $('#example1').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'print',
                        customize: function ( win ) {
                            $(win.document.body).find('h1').css('text-align', 'center');
                        },
                        exportOptions: {
                            columns: [ 1,2 ]
                        },
                        title : 'كل المقالات',
                    },
                ],

            } );
        });

    </script>
@endsection
