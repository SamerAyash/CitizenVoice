@extends('frontEnd.layout.app')

@section('content')
    <section id="loginform" class="p-4 h-100 {{app()->getLocale() == 'ar'? 'text-right': ''}}" >
        <div class="container mt-5">
            <div class="row mt-4 d-flex align-items-center">
                <div class="col wow rollIn dnone" style="visibility: visible; animation-delay: 0.5s; animation-name: rollIn;">
                    <div>
                        <img src="{{asset('assets/img/forgetpassword.svg')}}" class="w-100 h-100">
                    </div>
                </div>
                <div class="col wow bounceInRight center" style="visibility: visible; animation-name: bounceInRight;">
                    <div class="form bg-light p-3 shadow rounded">
                        <h2 class="text-center my-4">{{ __('front.Reset Password') }}</h2>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="form-group">
                                <input type="email" name="email" value="{{old('email')}}" class="form-control rounded-pill @error('email') is-invalid @enderror" id="exampleInputEmail1"
                                       placeholder="{{__('front.Email')}}" aria-describedby="emailHelp" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('front.Send Password Reset Link') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


