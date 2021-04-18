<?php

namespace App\Http\Controllers;

use App\City;
use App\News;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class FrontController extends Controller
{
    public function setLocal(Request  $request) {

        if (in_array($request->lang,Config::get('app.locales'))){
            Session::put('locale', $request->lang);
            app()->setLocale(Session::get('locale'));
        }else{
            app()->setLocale(config('app.locale'));
        }
        Session::save();
        return redirect()->back();
    }

    public function home() {

        $cittes= City::all();
        $posts=[];
        foreach ($cittes as $city){
            array_push($posts,News::where('city_id',$city->id)->orderByDesc('created_at')->take(4)->get());
        }
        $posts= collect($posts);

        return view('frontEnd.home',compact('posts'));
    }

    public function single_news($id,$slug) {

        $post= News::whereId($id)->first();
        $more_post= News::whereDate('created_at','>',Carbon::today()->subWeek())
            ->inRandomOrder('created_at')->where('id','!=',$id)->take(3)->get();
        return view('frontEnd.single_news',compact('post','more_post'));
    }

    public function news(Request $request) {

        $cities= City::all();
        $posts= collect();
        if ($request->city){
            $posts= News::whereHas('city',function ($q) use ($request){
                $q->where('name_en',$request->city);
            })
                ->orderByDesc('created_at')
                ;
        }else{
            $posts= News::orderByDesc('created_at');
        }
        $posts= $posts->paginate(12);
        return view('frontEnd.last_news',compact('posts','cities'));
    }

    public function interesting_sites(){
        return view('frontEnd.interesting_sites');
    }

}
