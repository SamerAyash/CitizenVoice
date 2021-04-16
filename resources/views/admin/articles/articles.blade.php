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
                            <li class="breadcrumb-item"><a href="{{aroute('home')}}">الرئيسية</a></li>
                            <li class="breadcrumb-item active">المقالات</li>
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
                        <a href="{{route('articles.create')}}" class="btn btn-primary">نشر مقال جديد</a>

                        <h3 class="card-title">جدول المقالات</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-responsive table-striped">
                            <thead>
                            <tr>
                                <th>العنوان</th>
                                <th>التفاصيل</th>
                                <th>الناشر</th>
                                <th>المحافظة</th>
                                <th>تاريخ النشر</th>
                                <th>تاريخ التعديل</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($articles as $article)
                                <tr>
                                    <td>
                                        {{\Illuminate\Support\Str::limit($article->title,50)}}
                                    </td>
                                    <td>{{\Illuminate\Support\Str::limit($article->description,50)}}</td>
                                    <td>{{$article->admin->name}}</td>
                                    <td>{{$article->city->name_ar}}</td>
                                    <td >{{$article->created_at->format('d-m-Y')}}</td>
                                    <td >{{$article->updated_at->format('d-m-Y')}}</td>
                                    <td class="d-flex">
                                        <a target="_blank" href="{{route('single_news',['id'=>$article->id,'slug'=>\Illuminate\Support\Str::slug($article->title)])}}" class="btn btn-success">عرض</a>
                                        <a href="{{route('articles.edit',[$article->id])}}" class="btn btn-primary mx-1">تعديل</a>
                                        <form class="deleteForm{{$article->id}}" method="post" action="{{route('articles.destroy',[$article->id])}}">
                                            @csrf
                                            @method('delete')
                                            <button type="button" onclick="confirmDeleted({{$article->id}})" class="btn btn-danger">حذف</button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>العنوان</th>
                                <th>التفاصيل</th>
                                <th>الناشر</th>
                                <th>المحافظة</th>
                                <th>تاريخ النشر</th>
                                <th>تاريخ التعديل</th>
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
    </script>
    <script src="{{asset('/plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
    <script>
        $(function () {
            $("#example1").DataTable({
                "ordering": false,
            });
        });
    </script>
@endpush
