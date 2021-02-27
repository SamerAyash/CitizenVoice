<?php

namespace App\Http\Controllers;

use App\City;
use App\News;
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
            array_push($posts,News::where('city_id',$city->id)->take(4)->get());
        }
        $posts= collect($posts);
        return view('frontEnd.home',compact('posts'));
    }

}
