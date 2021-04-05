@extends('frontEnd.layout.app')
@section('content')
    <!-- content  -->
    <section id="makesuggestion" class="m-4">
        <div class="caontainer {{app()->getLocale() == 'ar'? 'text-right':''}}">
            <h2 class="text-center mb-3 font-sm-1" style="font-family: cursive;color: #6C63FF;">{{__('front.Write your order here')}}</h2>
            <div class="row p-5 p-sm-0-spec">
                <div class="col-6 d-flex wow rollIn dnone " style="visibility: visible; animation-delay: 0.5s; animation-name: rollIn;">
                    <div>
                        <img src="{{asset('assets/img/publish.svg')}}" alt="" class="mw-100">
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 wow bounceInRight" style="visibility: visible; animation-name: bounceInRight;">
                    <div class="form bg-light p-5 p-sm-3-spec shadow rounded">
                        <form>
                            <div class="form-group">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="{{__('front.Title')}}"></textarea>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="{{__('front.Subject')}}"></textarea>
                            </div>
                            <div class="form-group">
                                <select name="city" class="form-control">
                                    <option selected disabled>@lang('front.select area')</option>
                                    @foreach(\App\City::all() as $city)
                                        <option value="{{$city->id}}" {{old('city') == $city->id? 'selected' :''}}>
                                            {{app()->getLocale() == 'ar'? $city->name_ar: $city->name_en}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="category" class="form-control">
                                    <option selected disabled>@lang('front.Category')</option>
                                    @foreach(\App\Category::all() as $cate)
                                        <option value="{{$cate->id}}" {{old('city') == $cate->id? 'selected' :''}}>
                                            {{app()->getLocale() == 'ar'? $cate->name_ar: $cate->name_en}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="h6">{{__('front.Attach an attachment (file or photo)')}}</label>
                                <input type="file" class="form-control-file" id="exampleFormControlFile1">
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-primary w-25">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- content  -->
@endsection
@push('script')

@endpush
