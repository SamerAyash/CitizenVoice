@extends('frontEnd.layout.app')
@section('content')
    <?php $local= app()->getLocale() == 'ar';?>
    <!-- content  -->
    <section id="account" class="p-4 bg-light {{$local? 'text-right':''}}">
        <div class="container">
            <div class="">
                <!-- state of orders  -->
                <div class="profilepic mx-5">
                    <div class="rounded-circle overflow-auto" style="width: 200px;height: 200px;">
                        <img src="{{asset('/assets/img/profile/img8.jpeg')}}" alt="" class="w-100 h-100">
                    </div>
                    <h3 class="my-4">{{auth('web')->user()->name}}</h3>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 px-3 p-sm-0-spec">
                            <div class="bg-white p-4 p-sm-3-spec rounded-lg shadow">
                            <div class="informationuser d-flex justify-content-between align-items-baseline">
                                <h3 class="py-3" style="border-bottom: 2px solid #dee2e6;">{{__('front.Information')}}</h3>
                                <p><a href="./editprofile.html">{{__('front.Edit')}}</a></p>
                            </div>
                            <div class="username mt-4 border-bottom">

                                <div style="line-height: .8;">
                                    <p class="text-muted">{{__('front.Name')}}</p>
                                    <p>{{auth('web')->user()->name}}</p>
                                </div>

                            </div>
                            <div class="email mt-4 border-bottom">

                                <div style="line-height: .8">
                                    <p class="text-muted">{{__('front.Email')}}</p>
                                    <p>{{auth('web')->user()->email}}</p>
                                </div>

                            </div>
                            <div class="id mt-4 border-bottom">

                                <div style="line-height: .8;">
                                    <p class="text-muted">{{__('front.ID Number')}}</p>
                                    <p>{{auth('web')->user()->id_number}}</p>
                                </div>

                            </div>
                            <div class="mobile mt-4 border-bottom">

                                <div style="line-height: .8;">
                                    <p class="text-muted">{{__('front.Mobile')}}</p>
                                    <p>{{auth('web')->user()->phone}}</p>
                                </div>

                            </div>
                            <div class="dob mt-4 border-bottom">

                                <div style="line-height: .8">
                                    <p class="text-muted">{{__('front.DOB')}}</p>
                                    <p>{{auth('web')->user()->birthdate}}</p>
                                </div>

                            </div>
                            <div class="address mt-4 border-bottom">

                                <div style="line-height: .8;">
                                    <p class="text-muted">Address</p>
                                    <p>{{$local ? auth('web')->user()->city->name_ar : auth('web')->user()->city->name_en}}</p>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 mt-sm-2-spec px-3  p-sm-0-spec">
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
                                        <th scope="col">{{__('front.Title')}}</th>
                                        <th scope="col">{{__('front.Subject')}}</th>
                                        <th scope="col">{{__('front.Date')}}</th>
                                        <th scope="col">{{__('front.City')}}</th>
                                        <th scope="col">{{__('front.Status')}}</th>
                                        <th scope="col">{{__('front.Feedback')}}</th>
                                        <th scope="col">{{__('front.Attached file')}}</th>
                                        <th scope="col">{{__('front.Action')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(auth('web')->user()->order as $order)
                                    <tr class="container">
                                        <th scope="row">1</th>
                                        <td>{{\Str::limit($order->title,50)}}</td>
                                        <td>{{\Str::limit($order->description,50)}}</td>
                                        <td>{{$order->created_at->format('d M Y')}}</td>
                                        <td>{{$order->city && app()->getLocale() == 'ar'? $order->city->name_ar : $order->city->name_en}}</td>
                                        <td>{{$order->status && app()->getLocale() == 'ar'? $order->status->name_ar : $order->status->name_en}}</td>
                                        <td>{{\Str::limit($order->feedback,50)}}</td>
                                        <td>
                                            @if($order->file)
                                                <a href="{{$order->file}}" target="_blank">{{__('front.Attached file')}}</a>
                                            @endif
                                        </td>
                                        <td class="row">
                                            <div class="col">
                                                <button class="btn btn-success">{{__('front.Show')}}</button>
                                            </div>
                                            <div class="col">
                                                <button class="btn btn-danger">{{__('front.Delete')}}</button>
                                            </div>
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
@endsection
@push('script')

@endpush
