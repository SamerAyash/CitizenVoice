@extends('frontEnd.layout.app')
@section('content')
    <section id="header">
        <div class="overlay">
            <div class="container">
                <div class="row py-5">
                    <div class="col-lg-6 col-md-6 wow rollIn dnone" style="visibility: visible; animation-delay: 0.5s; animation-name: rollIn;">
                        <div>
                            <img src="{{asset('/assets/img/pic1.svg')}}" alt="" class="w-100 h-100">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 d-flex align-items-center flex-column text-center">
                        <div style="line-height: 1.6;" class="wow bounceInDown" style="visibility: visible; animation-delay: 0.2s; animation-name: bounceInDown;">
                            <p class="h1 font-weight-bold main-font"> مجموعة من الأحرف بشكل عشوائي أخذتها</p>
                        </div>
                        <div class="my-5">
                            <p style="line-height: 1.8;" class="h5 main-font wow bounceInDown" style="visibility: visible; animation-delay: 0.4s; animation-name: bounceInDown;">
                                لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق "ليتراسيت" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني
                            </p>
                        </div>
                        <div class="w-100 btnlandingpage wow bounceInDown" style="visibility: visible; animation-delay: 0.6s; animation-name: bounceInDown;">
                            <a class="btn  bg-white btn-lg rounded-pill py-2 px-4 border-0 main-font" href="#"  style="color: #768ede;">انشاء حساب</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- header -->
    <!-- about us -->
    <section id="about-us" class="my-5 p-3 primary-font">
        <div class="wow bounceInDown col-xs-12 col-md-10 col-md-offset-1 mx-auto" style="visibility: visible; animation-delay: 0.2s; animation-name: bounceInDown;">
            <div class="titleabout w-25 mx-auto my-3">
                <h4 class="name-line mx-auto">
                    <span class="pr-2 text-uppercase font-weight-bold">من نحن</span>
                </h4>
            </div>
            <div class="space-30"></div>
            <h3 class="mx-5 text-center about-text">
                مكتبة جرير، تتمثل أغراض الشركة في تجارة الجملة والتجزئة في الأدوات المكتبية والمدرسية وألعاب الأطفال غير النارية والوسائل التعليمية وأثاث المكاتب والأجهزة والأدوات الهندسية وأجهزة وبرامج الحاسب الألي، وكذلك شراء المباني السكنية والتجارية والأراضي لإقامة مباني عليها واستثمارها بالبيع والتأجير لصالح الشركة.

            </h3>
        </div>
    </section>
    <!-- about us -->
    <div class="space-30"></div>
    <!-- section last news -->
    <section>
        <div class="container">
            <div class="titlelastnews  mx-auto my-3 wow bounceInDown" style="visibility: visible; animation-delay: 0.2s; animation-name: bounceInDown;">
                <h4 class="name-line mx-auto primary-font">
                    <span class="pr-2 text-uppercase font-weight-bold">@lang('front.Last Posts')</span>
                </h4>
            </div>
            @foreach($posts as $post)
            <div class="space-30"></div>
            <div class="firstcity noto-font wow bounceInDown main-font" style="visibility: visible; animation-delay: 0.2s; animation-name: bounceInDown;">
                <div class="nameofcity mb-2">
                    <h4 class="name-line {{app()->getLocale() == 'ar'?'text-right':''}}">
                        <span class="pl-2 pr-3">
                            @if(app()->getLocale() == 'ar')
                                {{$post->first()->city->name_ar}}
                            @else
                                {{$post->first()->city->name_en}}
                            @endif
                        </span>
                    </h4>
                </div>
                <div class="row">
                    @foreach($post as $p)
                        <div class="col-lg-3 px-3">
                            <div class="img">
                                <img src="{{asset('/storage/images/'.$p->image)}}" class="w-100 h-100">
                            </div>
                            <div class="card-body px-0 pt-1 {{app()->getLocale() == 'ar'?'text-right':''}}">
                                <h5 class="card-title font-weight-bold title-new"><a href="#">{{$p->title}}</a></h5>
                                <p class="small">{{$p->description}}</p>
                                <div class="d-flex align-items-baseline">
                                    <div class="icon d-flex align-items-baseline">
                                        <div class="icon-img" style="width: 18px;height: 18px;"><img src="{{asset('/assets/img/clock.svg')}}" class="w-100 h-100" alt=""> </div>
                                        <span class="mx-1 small text-muted">{{$p->created_at->diffForHumans()}}</span>
                                    </div>
                                    <div class="address">
                                        <p class="mx-1 small border-right px-1">
                                            @if(app()->getLocale() == 'ar')
                                                {{$p->city->name_ar}}
                                            @else
                                                {{$p->city->name_en}}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @if(!$loop->last)
            <div class="space-30"></div>
            @endif
            @endforeach
        </div>
    </section>
    <!-- section last news -->
@endsection
