@extends('frontEnd.layout.app')

@section('content')
    <!-- contant -->
    <section id="loginform" class="p-4 h-100 {{app()->getLocale() == 'ar'? 'text-right': ''}}">
        <div class="container mt-5">
            <div class="row mt-4 d-flex align-items-center">
                <div class="col wow rollIn dnone" style="visibility: visible; animation-delay: 0.5s; animation-name: rollIn;">
                    <div>
                        <img src="{{__('/assets/img/forgetpassword.svg')}}" class="w-100 h-100">
                    </div>
                </div>
                <div class="col wow bounceInRight center" style="visibility: visible; animation-name: bounceInRight;">
                    <div class="form bg-light p-3 shadow rounded">
                        <h2 class="text-center">{{ __('front.Reset Password') }}</h2>
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="form-group">
                                <label for="password">{{ __('front.Email') }}</label>
                                <input id="email" type="email" class="form-control rounded-pill @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">{{ __('front.Password') }}</label>
                                <input id="password" type="password" class="form-control rounded-pill @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password-confirm">{{ __('front.Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control rounded-pill" name="password_confirmation" required autocomplete="new-password">

                            </div>
                            <button type="submit" class="btn btn-primary mb-4">
                                {{ __('front.Reset Password') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contant -->
@endsection
