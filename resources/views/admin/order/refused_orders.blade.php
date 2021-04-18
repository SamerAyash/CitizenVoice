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
                        <h3 class="card-title">طلبات قيد الانتظار</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-responsive table-striped">
                            <thead>
                            <tr>
                                <th>رقم الطلب</th>
                                <th>العنوان</th>
                                <th>الوصف</th>
                                <th>التصنيف</th>
                                <th>المحافطة</th>
                                <th>الرد</th>
                                <th>الملف المرفق</th>
                                <th>تاريخ التقديم</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td>
                                    {{'O-'.str_pad($order->id,3,'0',STR_PAD_LEFT)}}
                                </td>
                                <td>
                                    {{\Illuminate\Support\Str::limit($order->title,20)}}
                                </td>
                                <td>
                                    {{\Illuminate\Support\Str::limit($order->description,20)}}
                                </td>
                                <td>
                                    {{$order->category->name_ar}}
                                </td>
                                <td>{{$order->city->name_ar}}</td>
                                <td>{{\Illuminate\Support\Str::limit($order->description,20)}}</td>
                                <td>
                                    @if($order->file)
                                        <a href="{{url($order->file)}}" target="_blank">{{__('front.Attached file')}}</a>
                                    @endif
                                </td>
                                <td>{{$order->created_at->format('d-m-Y')}}</td>
                                <td class="d-flex">
                                    <a href="{{route('orders.show',[$order->id])}}" class="btn btn-success">عرض</a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>رقم الطلب</th>
                                <th>العنوان</th>
                                <th>الوصف</th>
                                <th>التصنيف</th>
                                <th>المحافطة</th>
                                <th>الرد</th>
                                <th>الملف المرفق</th>
                                <th>تاريخ التقديم</th>
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
            $("#example1").DataTable({
                'ordering':false,
            });
        });
    </script>
@endpush
