@extends('frontEnd.layout.app')
@section('content')
    <section id="lastnews" class="mt-5 opensans-font">
        <div class="container">
            <div class="{{app()->getLocale() == 'ar'?'text-right':''}}">
                <h3>@lang('front.Last Posts')</h3>
            </div>
            <div class="row">
                <div class="mt-4 col-md-3">
                    <select onchange="select_area(this)" class="custom-select">
                        <option selected disabled>@lang('front.select area')</option>
                        <option value="#">@lang('front.all area')</option>
                        @foreach($cities as $city)
                        <option value="{{$city->name_en}}" {{$city->name_en == request('city')?'selected':''}} >
                            {{app()->getLocale() == 'ar'? $city->name_ar: $city->name_en}}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="news mt-5">
                <div class="row">
                    @foreach($posts as $post)
                    <div class="col-md-3 px-3 my-3 wow bounceInDown" style="visibility: visible; animation-delay: 0.2s; animation-name: bounceInDown;">
                        <div class="img">
                            <img src="{{$post->image_url}}" class="w-100 h-100">
                        </div>
                        <div class="card-body px-0 pt-1 {{app()->getLocale() == 'ar'?'text-right':''}}">
                            <h5 class="card-title font-weight-bold title-new mb-1">
                                <a href="{{route('single_news',['id'=>$post->id,'slug'=> \Str::slug($post->title)])}}">
                                    {{$post->title}}
                                </a>
                            </h5>
                            <p class="small">{!! \Str::limit($post->description,85) !!}</p>
                            <div class="d-flex align-items-baseline">
                                <div class="icon d-flex align-items-baseline">
                                    <div class="icon-img" style="width: 18px;height: 18px;"><img src="{{asset('/assets/img/clock.svg')}}" class="w-100 h-100" alt=""> </div>
                                    <span class="mx-1 small text-muted">{{$post->created_at->diffForHumans()}}</span>
                                </div>
                                <div class="address">
                                    <p class="mx-1 small border-left px-1">
                                        {{app()->getLocale()== 'ar'?$post->city->name_ar:$post->city->name_en}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                {{$posts->links()}}
            </div>
        </div>
    </section>
@endsection
@push('script')
    <script>
        function select_area(el){
            var city= $(el).val();
            window.location.href= '/last/article/'+city;
        }
    </script>
@endpush
