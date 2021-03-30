<!doctype html>
<html lang="en">
@include('frontEnd.layout.header')
<body>
<!-- Navbar -->
<section id='navbar' class="bg-light sticky-top">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light position-sticky">
            <a class="navbar-brand active" href="{{url('/')}}">@lang('front.Citizen Voice')</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item ">
                        <a class="nav-link text-cap" href="./makesug.html">@lang('front.Create order')</a>
                    </li>
                    @auth('web')
                        <li class="nav-item">
                            <a class="nav-link text-cap" href="./account.html">@lang('front.Profile')</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link text-cap" href="{{route('news')}}">@lang('front.Last posts')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-cap" href="./simwebsite.html">@lang('front.Interesting Sites')</a>
                    </li>
                    <li class="nav-item">
                        @if(auth('web')->check())
                        <form class="form-inline" action="/logout" method="post">
                            @csrf
                            <button type="submit" class="nav-link text-cap">@lang('front.Logout')</button>
                        </form>
                        @else
                            <div class="form-inline">
                                <a class="nav-link text-cap" href="{{route('register')}}">@lang('front.Register')</a>
                                <a class="nav-link text-cap" href="{{route('login')}}">@lang('front.Login')</a>
                            </div>
                        @endif
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <button class="btn  dropdown-toggle" type="button" id="dropdownMenu4" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                {{strtolower(app()->getLocale()) == 'ar'? trans('front.Arabic'): trans('front.English')}}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu4">
                                <a class="dropdown-item" href="{{route('setLocal',['lang'=>'ar'])}}">@lang('front.Arabic')</a>
                                <a class="dropdown-item" href="{{route('setLocal',['lang'=>'en'])}}">@lang('front.English')</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</section>
<!-- Navbar -->
@yield('content')
@include('frontEnd.layout.footer')
</body>
</html>
