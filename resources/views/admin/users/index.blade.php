@extends('layouts.master')

@section('title')
    Users
@endsection

@section('css')

<!-- Internal Data table css -->
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

@endsection

@section('current-page-title')
    Users
@endsection
@section('main-page')
    Users
@endsection
@section('sub-page')
    users
@endsection

@section('content')
<!-- row opened -->
<div class="row row-sm">
    @include('layouts.alerts')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive hoverable-table">
                    <table class="table table-hover" id="example1" data-page-length='50' style=" text-align: center;">
                        <thead>
                        <tr>
                            <th class="wd-10p border-bottom-0">#</th>
                            <th class="wd-15p border-bottom-0">اسم المستخدم</th>
                            <th class="wd-20p border-bottom-0">البريد الالكتروني</th>
                            <th class="wd-15p border-bottom-0">حالة المستخدم</th>
                            <th class="wd-15p border-bottom-0">نوع المستخدم</th>
                            <th class="wd-10p border-bottom-0">العمليات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $key => $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if ($user->status == 1)

                                                <label class="badge badge-success">مفعل</label>

                                @else
                                    <label class="badge badge-danger">غير مفعل</label>
                                @endif
                            </td>

                            <td>
                                @if (!empty($user->getRoleNames()))
                                @foreach ($user->getRoleNames() as $v)
                                <label class="badge badge-success">{{ $v }}</label>
                                @endforeach
                                @endif
                            </td>

                            <td>
                            @can('تعديل مستخدم')
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-info" title="تعديل"><i class="las la-pen"></i>تعديل</a>
                            @endcan
                            @can('حذف مستخدم')
                            <a class="btn btn-sm btn-danger" href="{{ route('users.destroy',$user->id) }}" onclick="event.preventDefault();document.getElementById('delete-form').submit();">حذف</a>
                            <form id="delete-form" action="{{ route('users.destroy',$user->id) }}" method="POST" style="display: none">
                                @csrf
                                @method('DELETE')
                            </form>
                            @endcan
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--/div-->
</div>

</div>
<!-- /row -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
@section('js')
<!-- Internal Data tables -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

@endsection
