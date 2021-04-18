@extends('admin.layout.app')
@push('style')
    <link rel="stylesheet" href="{{asset('/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
@endpush
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark"></h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
                            <li class="breadcrumb-item active">لوحة التحكم</li>
                        </ol>
                    </div><!-- /.col -->

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            @if(session()->has('success'))
                <p class="alert alert-success w-50">{{session('success')}}</p>
            @endif
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <a href="{{route('supervisors.create')}}" class="btn btn-primary">إضافة مشرف جديد</a>
                        <h3 class="card-title">جدول المشرفين</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-responsive table-striped">
                            <thead>
                            <tr>
                                <th>الاسم</th>
                                <th>الايميل</th>
                                <th>رقم الهوية</th>
                                <th>الجوال</th>
                                <th>المحافظة</th>
                                <th>تاريخ التسجيل</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($supervisors as $supervisor)
                            <tr>
                                <td>
                                    {{$supervisor->name}}
                                </td>
                                <td>{{$supervisor->email}}</td>
                                <td>{{$supervisor->id_number}}</td>
                                <td>{{$supervisor->phone}}</td>
                                <td>{{$supervisor->city->name_ar}}</td>
                                <td>{{$supervisor->created_at->format('d-m-Y')}}</td>
                                <td class="d-flex">
                                    <a href="{{route('supervisors.edit',[$supervisor->id])}}" class="btn btn-primary">تعديل</a>
                                @if($blocked_page)
                                    <form class="block{{$supervisor->id}} mx-1" method="post" action="{{route('supervisors.unblock',[$supervisor->id])}}">
                                        @csrf
                                        @method('put')
                                        <button type="button" onclick="block({{$supervisor->id}})" class="btn btn-warning">فك الحظر</button>
                                    </form>
                                    @else
                                        <form class="block{{$supervisor->id}} mx-1" method="post" action="{{route('supervisors.block',[$supervisor->id])}}">
                                            @csrf
                                            @method('put')
                                            <button type="button" onclick="block({{$supervisor->id}})" class="btn btn-warning">حظر</button>
                                        </form>
                                    @endif
                                    <form class="deleteForm{{$supervisor->id}}" method="post" action="{{route('supervisors.destroy',[$supervisor->id])}}">
                                        @csrf
                                        @method('delete')
                                        <button type="button" onclick="confirmDeleted({{$supervisor->id}})" class="btn btn-danger">حذف</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>الاسم</th>
                                <th>الايميل</th>
                                <th>رقم الهوية</th>
                                <th>الجوال</th>
                                <th>المحافظة</th>
                                <th>تاريخ التسجيل</th>
                                <th>#</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
@push('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        function confirmDeleted(id){
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })
            swalWithBootstrapButtons.fire({
                title: 'هل أنت متأكد!',
                text: "لن تتمكن من الرجوع عن هذه الخطوة",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: '  نعم, احذف الآن  ',
                cancelButtonText: '  لا, إلغاء!  ',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $('.deleteForm'+id).submit();
                }
            })
        }
        function block(id){
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })
            swalWithBootstrapButtons.fire({
                title: 'هل أنت متأكد',
                text: "من تجميد حساب المشرف!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: '  نعم, حظر الآن  ',
                cancelButtonText: '  لا, إلغاء!  ',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $('.block'+id).submit();
                }
            })
        }
    </script>
    <script src="{{asset('/plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
    <script>
        $(function () {
            $("#example1").DataTable();
        });
    </script>
@endpush
