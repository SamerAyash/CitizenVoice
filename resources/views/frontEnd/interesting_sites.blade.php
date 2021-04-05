@extends('frontEnd.layout.app')
@section('content')
    <section id="" class="p-4 h-100 {{app()->getLocale() == 'ar'?'text-right':''}}">
        <div class="container m-5">
            <div class="opensans-font  border-bottom py-2">
                <p class="h3">{{__('front.Interesting Sites')}} :</p>
            </div>
            <div class="mt-5">
                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    {{__('front.Government institutions')}}
                                </button>
                            </h2>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body friendwebsite">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <a href="http://molg.ps/ar/" target="_blank">{{__('front.Ministry of Local Government')}}</a>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="http://www.pwa.gov.ps/" target="_blank">{{__('front.Palestinian Water Authority')}}</a>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="http://www.diwan.ps/" target="_blank">{{__('front.General Personnel Council')}}</a>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="http://mol.ps/mol/" target="_blank">{{__('front.Ministry of Labor')}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    {{__('front.News sites')}}
                                </button>
                            </h2>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body friendwebsite">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <a href="https://www.aljazeera.net/" target="_blank">{{__("front.Al Jazeera Net")}}</a>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="https://www.maannews.net/" target="_blank">{{__("front.Ma'an News Agency")}}</a>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="https://aqsatv.ps/" target="_blank">{{__("front.Al-Aqsa satellite channel")}}</a>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="https://www.palinfo.com/" target="_blank">{{__("front.Palestinian Information Center")}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    {{__('front.Local authorities and bodies')}}
                                </button>
                            </h2>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                            <div class="card-body friendwebsite">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <a href="https://www.gaza-city.org/" target="_blank">{{__('front.Gaza municipality')}}</a>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="http://www.modb.ps/" target="_blank">{{__('front.Deir al-Balah municipality')}}</a>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="http://www.khanyounis.mun.ps/" target="_blank">{{__('front.Khan Yunis Municipality')}}</a>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="http://www.murafah.ps/mun/" target="_blank">{{__('front.Rafah Municipality')}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('script')

@endpush
