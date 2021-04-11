@extends('frontEnd.layout.app')
@section('content')
    <?php $local= app()->getLocale() == 'ar';?>
    <section id="editprofile" class="bg-light {{$local?'text-right':''}}">
        <div class="space-30"></div>
        <div class="space-30"></div>
        <div class="container">
            <h1 class="my-4 opensans-font">{{__('front.Edit Profile')}}</h1>
            <div class="space-30"></div>
            <form action="{{route('update_user')}}" method="POST" class="row" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-md-3 py-3 opensans-font profilepic">
                    <div class="img" style="width: 220px;height: 225px;">
                        <img src="{{asset(auth('web')->user()->image? 'storage/'.auth('web')->user()->image: '/assets/img/profile/default_image.jpg')}}" alt="" class="w-100 h-100 rounded-circle">
                    </div>
                    <p class="pt-3 text-sm-center">Upload Your photo</p>
                    <div class="form-group">
                        <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                </div>
                <div class="col-md-9 personal-info opensans-font">
                    <h3>{{__('front.Personal info')}}</h3>
                    <div class="form-horizontal opensans-font" role="form">
                        <div class="form-group row">
                            <label class="col-lg-2 control-label">{{__('front.Name')}}:</label>
                            <div class="col-lg-8">
                                <input class="form-control" name="name" type="text" value="{{old('name')??$user->name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 control-label">{{__('front.ID Number')}}:</label>
                            <div class="col-lg-8">
                                <input class="form-control" name="id_number" type="text" value="{{old('id_number')??$user->id_number}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 control-label">{{__('front.Email')}}:</label>
                            <div class="col-lg-8">
                                <input class="form-control" name="email" type="text" value="{{old('email')??$user->email}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 control-label">{{__('front.Mobile')}}:</label>
                            <div class="col-lg-8">
                                <input class="form-control" name="phone" type="text" value="{{old('phone')??$user->phone}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 control-label">{{__('front.DOB')}}:</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="date" name="dob"  value="{{old('dob')??$user->birthdate}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 control-label">{{__('front.City')}}:</label>
                            <div class="col-lg-8">
                                <select name="city" class="form-control">
                                    <option selected disabled>@lang('front.select area')</option>
                                    <?php $selectedCity= $user->city_id ?? old('city');?>
                                    @foreach(\App\City::all() as $city)
                                        <option value="{{$city->id}}" {{$selectedCity == $city->id? 'selected' :''}}>
                                            {{app()->getLocale() == 'ar'? $city->name_ar: $city->name_en}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-5">
                            <label class="col-md-2 control-label"></label>
                            <div class="col-md-8">
                                <input type="submit" class="btn btn-primary" value="{{__('front.Save Changes')}}">
                                <span></span>
                                <a  href="{{route('profile')}}"><input type="button" class="btn btn-default" value="{{__('front.Cancel')}}"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
@push('script')

@endpush
