@extends('admin.layout.app')
@push('style')
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('/plugins/summernote/summernote-bs4.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
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
                            <li class="breadcrumb-item"><a href="{{route('articles.index')}}">المقالات</a></li>
                            @if($article)
                                <li class="breadcrumb-item active">تعديل مقال</li>
                            @else
                                <li class="breadcrumb-item active">إنشاء مقال جديد</li>
                            @endif
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
                <div class="card card-primary text-right">
                    <!-- form start -->
                    @if($article)
                        <form role="form" method="POST" action="{{route('articles.update',[$article->id])}}" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="card-body">
                                <div class="form-group ">
                                    <input type="file"  accept="image/*" name="image" id="file"  onchange="loadFile(event)" style="display: none;">
                                    <img src="{{$article->image_url}}" id="output" width="300" class="rounded mx-auto d-block" >
                                    <label for="file" class="btn btn-primary" style="cursor: pointer;">
                                        اختر صورة
                                    </label>
                                </div>

                                <div class="form-group">
                                    <label for="title">العنوان</label>
                                    <input type="text" name="title" class="form-control" value="{{$article->title}}" id="title" placeholder="العنوان">
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="desc">الوصف</label>
                                    <textarea class="textarea" placeholder="Place some text here" id="desc" name="desc"
                                              style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                    {{$article->description}}
                                </textarea>
                                </div>
                                <div class="form-group col-3">
                                    <label>المحافظة</label>
                                    <select class="custom-select" name="city">
                                        @foreach(\App\City::all() as $city)
                                            <option value="{{$city->id}}" {{$article->city_id == $city->id? 'selected' :''}}>
                                                {{app()->getLocale() == 'ar'? $city->name_ar: $city->name_en}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">تعديل</button>
                            </div>
                        </form>
                    @else
                        <form role="form" method="POST" action="{{route('articles.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group ">
                                    <input type="file"  accept="image/*" name="image" id="file"  onchange="loadFile(event)" style="display: none;">
                                    <img id="output" width="300" class="rounded mx-auto d-block" >
                                    <label for="file" class="btn btn-primary" style="cursor: pointer;">
                                        اختر صورة
                                    </label>
                                </div>

                                <div class="form-group">
                                    <label for="title">العنوان</label>
                                    <input type="text" name="title" class="form-control" value="{{old('title')}}" id="title" placeholder="العنوان">
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="desc">الوصف</label>
                                    <textarea class="textarea" placeholder="Place some text here" id="desc" name="desc"
                                              style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                    {{old('desc')}}
                                </textarea>
                                </div>
                                <div class="form-group col-3">
                                    <label>المحافظة</label>
                                    <select class="custom-select" name="city">
                                        @foreach(\App\City::all() as $city)
                                            <option value="{{$city->id}}" {{old('city') == $city->id? 'selected' :''}}>
                                                {{app()->getLocale() == 'ar'? $city->name_ar: $city->name_en}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">حفظ</button>
                            </div>
                        </form>
                    @endif

                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
@push('js')
    <!-- Bootstrap 4 -->
    <script src="{{asset('/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('/dist/js/demo.js')}}"></script>
    <!-- Summernote -->
    <script src="{{asset('/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <script>
        $(function () {
            // Summernote
            $('.textarea').summernote()
        })
    </script>

    <script>
        var loadFile = function(event) {
            var image = document.getElementById('output');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
@endpush
