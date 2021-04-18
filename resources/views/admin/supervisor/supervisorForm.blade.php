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
                            <li class="breadcrumb-item"><a href="{{route('supervisors.index')}}">المشرفين</a></li>
                            @if($supervisor)
                                <li class="breadcrumb-item active">تعديل بيانات المشرف</li>
                            @else
                                <li class="breadcrumb-item active">إضافة مشرف جديد</li>
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
                @if($errors->any())
                <div class="alert alert-danger text-right">
                    @foreach($errors->all() as $err)
                        <p class="text-sm">{{$err}}</p>
                    @endforeach
                </div>
                @endif
                <div class="card card-primary ">
                    @if($supervisor)
                        <form action="{{route('supervisors.update',[$supervisor->id])}}" method="post" class="card-body">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-4">
                                    <label class="float-left" for="name">الاسم</label>
                                    <input type="text" id="name" value="{{$supervisor->name}}" name="name" class="form-control" placeholder="الاسم">
                                </div>
                                <div class="col-4">
                                    <label class="float-left" for="email">البريد الالكتروني</label>
                                    <input type="email" id="email" value="{{$supervisor->email}}" name="email" class="form-control" placeholder="البريد الالكتروني">
                                </div>
                                <div class="col-4">
                                    <label class="float-left" for="id_number">رقم الهوية</label>
                                    <input type="number" id="id_number" value="{{$supervisor->id_number}}" name="id_number" class="form-control" placeholder="رقم الهوية">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-4">
                                    <label class="float-left" for="phone">الجوال/الهاتف</label>
                                    <input type="text" id="phone" value="{{$supervisor->phone}}" name="phone" class="form-control" placeholder="الجوال/الهاتف">
                                </div>
                                <div class="col-4">
                                    <label class="float-left" for="password">كلمة السر</label>
                                    <p class="text-muted text-sm">(لن تتغير كلمة السر اذا تركت الحقل فارغ)</p>
                                    <input type="password" id="password" name="password" class="form-control" >
                                </div>
                                <div class="col-4">
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
                            <button type="submit" class="btn btn-success float-right mt-2">حفظ</button>
                        </form>
                    @else
                        <form action="{{route('supervisors.store')}}" method="post" class="card-body">
                            @csrf
                            <div class="row">
                                <div class="col-4">
                                    <label class="float-left" for="name">الاسم</label>
                                    <input type="text" id="name" value="{{old('name')}}" name="name" class="form-control" placeholder="الاسم">
                                </div>
                                <div class="col-4">
                                    <label class="float-left" for="email">البريد الالكتروني</label>
                                    <input type="email" id="email" value="{{old('email')}}" name="email" class="form-control" placeholder="البريد الالكتروني">
                                </div>
                                <div class="col-4">
                                    <label class="float-left" for="id_number">رقم الهوية</label>
                                    <input type="number" id="id_number" value="{{old('id_number')}}" name="id_number" class="form-control" placeholder="رقم الهوية">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-4">
                                    <label class="float-left" for="phone">الجوال/الهاتف</label>
                                    <input type="text" id="phone" value="{{old('phone')}}" name="phone" class="form-control" placeholder="الجوال/الهاتف">
                                </div>
                                <div class="col-4">
                                    <label class="float-left" for="password">كلمة السر</label>
                                    <input type="password" id="password" name="password" class="form-control" >
                                </div>
                                <div class="col-4">
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
                            <button type="submit" class="btn btn-success float-right mt-2">حفظ</button>
                        </form>
                    @endif
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
@push('js')
@endpush
