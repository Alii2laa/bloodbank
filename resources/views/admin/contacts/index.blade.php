@extends('layouts.master')

@section('title')
    Contacts
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection
@section('current-page-title')
    Contacts
@endsection
@section('main-page')
    Home
@endsection
@section('sub-page')
    contacts
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
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th>Client</th>
                                    <th>Operations</th>
                                </tr>
                                </thead>
                                <tbody>
                                @isset($contacts)
                                    @foreach($contacts as $contact)
                                        <tr>
                                            <td>{{$contact->id}}</td>
                                            <td>{{$contact->subject}}</td>

                                            <td>{{$contact->message}}</td>
                                            <td>{{$contact->client->name}}</td>

                                            <td>
                                                <div class="btn-group">
                                                    @can('حذف الرساله')
                                                    <form action="{{route('contacts.destroy',$contact->id)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                    @endcan

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endisset

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th>Client</th>
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
