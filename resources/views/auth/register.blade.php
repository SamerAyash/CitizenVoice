{{--@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection--}}

@extends('frontEnd.layout.app')

@section('content')
<section id="loginform" class="p-4 h-100">
    <div class="container mt-5">
        <div class="row mt-4">
            <div class="col dnone  d-flex align-items-center wow rollIn" style="visibility: visible; animation-delay: 0.5s; animation-name: rollIn;">
                <div>
                    <img src="{{asset('/assets/img/pic1.svg')}}" alt="" class="w-100 h-100">
                </div>
            </div>
            <div class="col wow bounceInRight center" style="visibility: visible; animation-name: bounceInRight;">
                <div class="form bg-light p-3 shadow rounded">
                    <h2 class="text-center">{{__('front.Sign up')}}</h2>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input id="first_name" placeholder="{{__('front.First name')}}" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}"  autocomplete="first_name" autofocus>
                                @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <input id="last_name" placeholder="{{__('front.Last name')}}" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}"  autocomplete="last_name" autofocus>
                                @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input id="id_number" placeholder="{{__('front.ID Number')}}" type="number" class="form-control @error('id_number') is-invalid @enderror" name="id_number" value="{{ old('id_number') }}"  autocomplete="id_number" autofocus>
                                @error('id_number')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <input id="mobile" placeholder="{{__('front.Mobile')}}" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}"  autocomplete="mobile" autofocus>
                                @error('mobile')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group {{app()->getLocale() == 'ar'? 'text-right': ''}}">
                                <label class="" for="dob" >{{__('front.DOB')}}</label>
                                <input id="dob" placeholder="{{__('front.DOB')}}" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}"  autocomplete="dob" autofocus>
                                @error('dob')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label></label>
                                <select name="city" class="form-control">
                                    <option selected disabled>@lang('front.select area')</option>
                                    @foreach(\App\City::all() as $city)
                                        <option value="{{$city->id}}" {{old('city') == $city->id? 'selected' :''}}>
                                            {{app()->getLocale() == 'ar'? $city->name_ar: $city->name_en}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('city')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="{{__('front.Email')}}"  autocomplete="false" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control @error('email') is-invalid @enderror" autocomplete=false placeholder="{{__('front.Password')}}">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">{{__('front.Sign up')}}</button>
                            <div class="mt-3">
                                <a href="{{route('login')}}">{{__('front.I already have an account')}}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
