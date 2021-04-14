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
                        <h3 class="card-title">جدول المستخدمين المحظورين</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-responsive table-striped">
                            <thead>
                            <tr>
                                <th>صورة الشخصية</th>
                                <th>الاسم</th>
                                <th>الايميل</th>
                                <th>الجوال</th>
                                <th>المحافظة</th>
                                <th>تاريخ التسجيل</th>
                                <th>عدد الطلبات</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>
                                    <div class="rounded-circle overflow-auto" style="width:60px;height: 60px;">
                                        <img src="{{asset($user->image? 'storage/'.$user->image: '/assets/img/profile/default_image.jpg')}}" alt="" class="w-100 h-100">
                                    </div>
                                </td>
                                <td>
                                    {{$user->name}}
                                </td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->city->name_ar}}</td>
                                <td>{{$user->created_at->format('d-m-Y')}}</td>
                                <td >{{$user->order()->count()}}</td>
                                <td class="d-flex">
                                    <a href="{{route('users.show',[$user->id])}}" class="btn btn-success">عرض</a>
                                    <form method="post" action="{{route('users.unblock',[$user->id])}}">
                                        @csrf
                                        @method('put')
                                        <button type="submit" class="btn btn-warning mx-1">فك الحجب</button>
                                    </form>
                                    <form method="post" action="{{route('users.destroy',[$user->id])}}">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">حذف</button>
                                    </form>
                                </td>

                            </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>صورة الشخصية</th>
                                <th>الاسم</th>
                                <th>الايميل</th>
                                <th>الجوال</th>
                                <th>المحافظة</th>
                                <th>تاريخ التسجيل</th>
                                <th>عدد الطلبات</th>
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
    <script src="{{asset('/plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
    <script>
        $(function () {
            $("#example1").DataTable();
        });
    </script>
@endpush
