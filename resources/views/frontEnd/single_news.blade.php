@extends('frontEnd.layout.app')
@section('content')
    <!-- content  -->
    <section id="single" class="m-4 opensans-font">
        <div class="container p-4">
            <div class="row">
                <div class="col-md-8 {{app()->getLocale() == 'ar'?'text-right':''}}">
                    <div class="card mb-3 border-0">
                        <h5 class="card-title-single  font-weight-bold">{{$post->title}}</h5>
                        <div class="d-flex align-items-baseline">
                            <div class="icon d-flex align-items-baseline">
                                <div class="icon-img" style="width: 18px;height: 18px;"><img src="{{asset('/assets/img/clock.svg')}}" class="w-100 h-100" alt=""> </div>
                                <span class="mx-1 small text-muted">{{$post->created_at->diffForHumans()}}</span>
                            </div>
                            <div class="address">
                                <p class="mx-1 small border-left px-1">{{app()->getLocale()== 'ar'?$post->city->name_ar:$post->city->name_en}}</p>
                            </div>
                        </div>
                        <img src="{{$post->image_url}}" class="card-img-top" alt="...">
                        <div class="card-body px-0">
                            <p class="card-text contentsignlenew">{!! $post->description !!}</p>
<!--                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>-->
                        </div>
                    </div>
                </div>
                @if(!$more_post->isEmpty())
                <div class="col-md-4 px-4 {{app()->getLocale() == 'ar'?'text-right':''}}">
                    <div class="ml-4">
                        <div class="color-secondary"><h3 class="font-weight-bold">@lang('front.More news')</h3></div>
                        @foreach($more_post as $post)
                        <div class="color-secondary my-3 card-info">
                            <div class="">
                                <img src="{{asset('/storage/images/'.$post->image)}}" class="w-100 h-100" alt="">
                                <p class="h5 font-weight-bold"><a href="{{route('single_news',['id'=>$post->id,'slug'=> \Str::slug($post->title)])}}">{{$post->title}}</a></p>
                            </div>
                            <div><p>{!! \Str::limit($post->description,85) !!}</p></div>
                            <div class="d-flex align-items-baseline">
                                <div class="icon d-flex align-items-baseline">
                                    <div class="icon-img" style="width: 18px;height: 18px;"><img src="{{asset('/assets/img/clock.svg')}}" class="w-100 h-100" alt=""> </div>
                                    <span class="mx-1 small text-muted">{{$post->created_at->diffForHumans()}}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>
    <!-- content  -->
@endsection
