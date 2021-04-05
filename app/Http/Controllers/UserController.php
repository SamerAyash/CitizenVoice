<?php

namespace App\Http\Controllers;

use App\Category;
use App\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontEnd.profile');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_order()
    {
        return view('frontEnd.create_order');
    }

    public function store_order(Request $request){
        $this->validate($request,[
            'title'=>['required','string'],
            'subject'=>['required','string'],
            'city'=>['required','numeric',Rule::in(City::all()->pluck('id'))],
            'category'=>['required','numeric',Rule::in(Category::all()->pluck('id'))],
        ]);

        if ($request->hasFile('file')){

            $uploadedFile = $request->file('file');
            $filename = time().$uploadedFile->getClientOriginalName();
            Storage::disk('local')->putFileAs(
                'files/'.$filename,
                $uploadedFile,
                $filename
            );
        }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
