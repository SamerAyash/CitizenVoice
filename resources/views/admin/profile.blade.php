@extends('admin.layout.app')
@push('style')

@endpush
@section('content')
    <div class="content-wrapper">
        <!-- content  -->
        <section id="account" class="p-4 bg-light">
            @includeIf('frontEnd.layout.notification')
            <div class="container">
                <div class="">
                    <!-- state of orders  -->
                    <div class="profilepic mx-5">
                        <div class="rounded-circle overflow-auto" style="width: 200px;height: 200px;">
                            <img src="{{asset($user->image? 'storage/'.$user->image: '/assets/img/profile/default_image.jpg')}}" alt="" class="w-100 h-100">
                        </div>
                        <h3 class="my-4">{{$user->name}}</h3>
                    </div>
                    <div class="container">

                        <div class="row">
                            <div class="col-lg-12 px-3 p-sm-0-spec mb-4">
                                <div class="bg-white p-4 rounded-lg shadow row">
                                    <div class="informationuser d-flex justify-content-start align-items-baseline col-12">
                                        <h3 class="py-3 mx-2" style="border-bottom: 2px solid #dee2e6;">{{__('front.Information')}}</h3>
                                    </div>
                                    <div class="username mt-4 border-bottom col-2">

                                        <div style="line-height: .8;">
                                            <p class="text-muted">{{__('front.Name')}}</p>
                                            <p>{{$user->name}}</p>
                                        </div>

                                    </div>
                                    <div class="email mt-4 border-bottom col-2">

                                        <div style="line-height: .8">
                                            <p class="text-muted">{{__('front.Email')}}</p>
                                            <p>{{$user->email}}</p>
                                        </div>

                                    </div>
                                    <div class="id mt-4 border-bottom col-2">

                                        <div style="line-height: .8;">
                                            <p class="text-muted">{{__('front.ID Number')}}</p>
                                            <p>{{$user->id_number}}</p>
                                        </div>

                                    </div>
                                    <div class="mobile mt-4 border-bottom col-2">

                                        <div style="line-height: .8;">
                                            <p class="text-muted">{{__('front.Mobile')}}</p>
                                            <p>{{$user->phone}}</p>
                                        </div>

                                    </div>
                                    <div class="dob mt-4 border-bottom col-2">

                                        <div style="line-height: .8">
                                            <p class="text-muted">{{__('front.DOB')}}</p>
                                            <p>{{$user->birthdate}}</p>
                                        </div>

                                    </div>
                                    <div class="address mt-4 border-bottom col-2">

                                        <div style="line-height: .8;">
                                            <p class="text-muted">Address</p>
                                            <p>{{$user->city->name_ar}}</p>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 mt-sm-2-spec px-3  p-sm-0-spec">
                                <div class="bg-white rounded-lg shadow">
                                    <div class="status pt-5">
                                        <div>
                                            <p class="h2 m-3">{{__('front.My orders')}}</p>
                                        </div>
                                        <div class="table-responsive-sm">
                                            <table class="table ">
                                                <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">رقم الطلب</th>
                                                    <th scope="col">{{__('front.Title')}}</th>
                                                    <th scope="col">{{__('front.Subject')}}</th>
                                                    <th scope="col">{{__('front.Date')}}</th>
                                                    <th scope="col">{{__('front.City')}}</th>
                                                    <th scope="col">{{__('front.Category')}}</th>
                                                    <th scope="col">{{__('front.Status')}}</th>
                                                    <th scope="col">{{__('front.Feedback')}}</th>
                                                    <th scope="col">{{__('front.Attached file')}}</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($user->order as $order)
                                                    <tr class="container">
                                                        <th scope="row">{{$loop->iteration}}</th>
                                                        <th>O-{{$order->id}}</th>
                                                        <td>{{\Str::limit($order->title,20)}}</td>
                                                        <td>{{\Str::limit($order->description,10)}}</td>
                                                        <td>{{$order->created_at->format('d M Y')}}</td>
                                                        <td>{{$order->city && app()->getLocale() == 'ar'? $order->city->name_ar : $order->city->name_en}}</td>
                                                        <td>{{$order->category && app()->getLocale() == 'ar'? $order->category->name_ar : $order->category->name_en}}</td>
                                                        <td>{{$order->status && app()->getLocale() == 'ar'? $order->status->name_ar : $order->status->name_en}}</td>
                                                        <td>{{\Str::limit($order->feedback,10)}}</td>
                                                        <td>
                                                            @if($order->file)
                                                                <a href="{{url($order->file)}}" target="_blank">{{__('front.Attached file')}}</a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- content  -->
    </div>
@endsection
