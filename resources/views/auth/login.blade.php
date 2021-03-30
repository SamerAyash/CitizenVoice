@extends('frontEnd.layout.app')

@section('content')

<section id="loginform" class="p-4 h-100">
    <div class="container mt-5">
        <div class="row mt-4">
            <div class="col wow rollIn dnone" style="visibility: visible; animation-delay: 0.5s; animation-name: rollIn;">
                <div>
                    <h4 class="my-3">login now to make suggestions...</h4>
                    <img src="{{asset('assets/img/auth.svg')}}" class="w-100 h-100">
                </div>
            </div>
            <div class="col wow bounceInRight center" style="visibility: visible; animation-name: bounceInRight;">
                <div class="form bg-light p-3 shadow rounded">
                    <h2 class="text-center">{{ __('front.Login') }}</h2>
                    <form method="POST" action="{{ route('login') }}" class="{{app()->getLocale() == 'ar'?'text-right':''}}">
                        @csrf
                        <div class="form-group">
                            <label for="email">{{__('front.Email')}}</label>
                            <input id="email" type="email" class="form-control rounded-pill @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">{{__('front.Password')}}</label>
                            <input id="password" type="password" class="form-control rounded-pill " name="password" value="" required autofocus>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input rounded-pill" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('front.Remember Me') }}
                            </label>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary mb-4">{{ __('front.Login') }}</button>
                            <div>
                                <a class="mt-3" href="{{route('register')}}">{{__('front.Dont have an account!')}}</a><br>
                                <a class="mt-3" href="{{route('password.request')}}">{{__('front.Forget password')}}</a><br>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
