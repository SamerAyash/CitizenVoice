<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Http\Controllers\Controller;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('superAdmin');
    }
    protected $path= 'admin.articles';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles= News::orderByDesc('created_at')->get();
        return view($this->path.'.articles',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $article=null;
        return view($this->path.'.articleForm',compact('article'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title'=>'required|string',
            'desc'=>'required',
            'city'=>['required',Rule::in(City::all()->pluck('id'))],
        ]);

        $filename=null;

        if ($request->image){

            $file = $request->image;
            $extension = $file->getClientOriginalExtension();
            $directory = '/images/';
            $filename = sha1(time().rand()).".{$extension}";
            if(!File::exists(public_path() . '/storage/images')){
                File::makeDirectory(public_path() . '/storage/images',0755,true);
            }
            \Image::make($file)->save(Storage::disk('public')->path($directory).$filename);

        }

        News::create([
            'image'=> $filename,
            'title'=>$request->title,
            'city_id'=>$request->city,
            'admin_id'=> auth('admin')->id(),
            'description'=>$request->desc,
        ]);

        return redirect()->route('articles.index')->with(['success'=>'تمت إضافة المقال بنجاح']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article= News::findOrFail($id);
        return view($this->path.'.articleForm',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article= News::findOrFail($id);
        return view($this->path.'.articleForm',compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'image'=>'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title'=>'required|string',
            'desc'=>'required',
            'city'=>['required',Rule::in(City::all()->pluck('id'))],
        ]);

        $article= News::findOrFail($id);
        $filename=$article->image;
        if ($request->image){
            if (Storage::disk('public')->exists('/images/'.$article->image)){
                Storage::disk('public')->delete('/images/'.$article->image);
            }
            $file = $request->image;
            $extension = $file->getClientOriginalExtension();
            $directory = '/images/';
            $filename = sha1(time().rand()).".{$extension}";
            if(!File::exists(public_path() . '/storage/images')){
                File::makeDirectory(public_path() . '/storage/images',0755,true);
            }
            \Image::make($file)->save(Storage::disk('public')->path($directory).$filename);

        }
        $article->update([
            'image'=> $filename,
            'title'=>$request->title,
            'city_id'=>$request->city,
            //'admin_id'=> auth('admin')->id(),
            'description'=>$request->desc,
        ]);
        return redirect()->route('articles.index')->with(['success'=>'تمت تعديل المقال بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article= News::findOrFail($id);
        if (Storage::disk('public')->exists('/images/'.$article->image)){
            Storage::disk('public')->delete('/images/'.$article->image);
        }
        $article->delete();

        return redirect()->back()->with(['success'=>'تمت حذف المقال بنجاح']);
    }
}
