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
                        <h3 class="card-title">عرض تفاصيل الطلب</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row  mb-2">
                            <div class="col-3 d-flex justify-content-start">
                                <h6>رقم الطلب: </h6>
                                <p> {{'O-'.str_pad($order->id,3,'0',STR_PAD_LEFT)}}</p>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-3">
                                <h6>العنوان: </h6>
                            </div>
                            <di>
                                {{$order->title}}
                            </di>
                        </div>
                        <div class="mb-3">
                            <p>
                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                    التفاصيل:
                                </button>
                            </p>
                            <div class="collapse" id="collapseExample">
                                <div class="card card-body">
                                    {{$order->description}}
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4 d-flex justify-content-start">
                                <h6 class="mx-1">المستخدم: </h6>
                                <p> {{'U-'.str_pad($order->user_id,3,'0',STR_PAD_LEFT)}}</p>
                            </div>
                            <div class="col-4 d-flex justify-content-start">
                                <h6 class="mx-1">المحافظة: </h6>
                                <p> {{$order->city->name_ar}}</p>
                            </div>
                            <div class="col-4 d-flex justify-content-start">
                                <h6 class="mx-1">التصنيف: </h6>
                                <p> {{$order->category->name_ar}}</p>
                            </div>

                        </div>
                        <div class="row mb-2">
                            <div class="col-4 d-flex justify-content-start">
                                <h6 class="mx-1">الحالة: </h6>
                                <p> {{$order->status->name_ar}}</p>
                            </div>
                            <div class="col-4 d-flex justify-content-start">
                                @if($order->file)
                                    <a href="{{url($order->file)}}" target="_blank">{{__('front.Attached file')}}</a>
                                @endif
                            </div>
                            <div class="col-4 d-flex justify-content-start">
                                <h6 class="mx-1">تاريخ التقديم: </h6>
                                {{$order->created_at}}
                            </div>
                        </div>
                        @if($order->admin_id)
                        <div class="row mb-2">
                                <div class="col-3 d-flex justify-content-start">
                                    <h6 class="mx-1">المسؤول عن الرد: </h6>
                                    <p> {{$order->admin->name}}</p>
                                </div>
                        </div>
                        @endif
                        @if($order->feedback)
                        <div class="row">
                            <div class="col-12">
                                <h6>: الرد بالموافقة أو الرفض</h6>
                                <div>
                                    {{$order->feedback}}
                                </div>
                            </div>
                        </div>
                        @endif
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
    </script>
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
