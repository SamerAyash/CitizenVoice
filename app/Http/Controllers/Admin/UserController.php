<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('superAdmin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users= User::all();
        return view('admin.users',compact('users'));
    }

    public function blockedUsers()
    {
        $users= User::onlyTrashed()->get();
        return view('admin.blockedUsers',compact('users'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $user= User::withTrashed()->whereId($id)->first();
        return view('admin.profile',compact('user'));
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
        $user= User::withTrashed()->whereId($id)->first();
        if (Storage::disk('public')->exists($user->image)){
            Storage::disk('public')->delete($user->image);
        }
        $user->forceDelete();
        return redirect()->back()->with(['success'=>'تم حذف المستخدم بشكل نهائي']);
    }

    public function block($id){
        $user= User::whereId($id)->first();
        $user->delete();
        return redirect()->back()->with(['success'=>'تم حظر المستخدم بنجاح']);
    }

    public function unblock($id){
        $user= User::withTrashed()->whereId($id)->first();

        if ($user){
            $user->deleted_at= null;
            $user->update();
            return redirect()->back()->with(['success'=>'تم فك حظر المستخدم بنجاح']);
        }

    }
}
