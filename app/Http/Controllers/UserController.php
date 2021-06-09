<?php

namespace App\Http\Controllers;

use App\Category;
use App\City;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user= auth('web')->user();
        return view('frontEnd.profile',compact('user'));
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
        $filename= null;
        if ($request->hasFile('file')){

            $uploadedFile = $request->file('file');
            $filename = time().$uploadedFile->getClientOriginalName();
            if(!File::exists(public_path() . '/storage/files')){
                File::makeDirectory(public_path() . '/storage/files',0755,true);
            }
            Storage::disk('public')->putFileAs(
                'files/',
                $uploadedFile,
                $filename
            );
        }

        Order::create([
            'title'=> $request->title,
            'description'=> $request->subject,
            'city_id'=> $request->city,
            'category_id'=> $request->category,
            'file'=>'/storage/files/'.$filename,
            'status_id'=> 1,
            'user_id'=> auth('web')->id(),
        ]);

        return redirect()->route('profile')->with(['success'=>trans('front.The request has been submitted successfully')]);
    }

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

    public function delete_order($id){

        $order= Order::whereId($id)->first();
        if ($order->user_id == auth('web')->id()){
            $order->delete();
            return redirect()->route('profile')
                ->with(['success'=>trans('front.The request has been delete successfully')]);
        }
    }

    public function show_order($id){

        $order= Order::whereId($id)->where('user_id',auth('web')->id())->first();
        if ($order){
            $file=$order->file? '<a href="'.url($order->file).'" target="_blank">'.__('front.Attached file').'</a>':'#';
            $city=$order->city && app()->getLocale() == 'ar'? $order->city->name_ar : $order->city->name_en;
            $status= $order->status && app()->getLocale() == 'ar'? $order->status->name_ar : $order->status->name_en;
            $textRight= app()->getLocale() == 'ar'? 'text-right':'';
            $data='
        <div class="'.$textRight.'">
                        <div>
                            <h5>'.__('front.Title').'</h5>
                            <p>'.$order->title.'</p>
                        </div>
                        <div>
                            <h5>'.__('front.Subject').'</h5>
                            <p>'.$order->description.'</p>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h5>'.__('front.Date').'</h5>
                                <p>'.$order->created_at->format('d M Y').'</p>
                            </div>
                            <div class="col">
                                <h5>'.__('front.City').'</h5>
                                <p>'.$city.'</p>
                            </div>
                            <div class="col">
                                <h5>'.__('front.Status').'</h5>
                                <p>'.$status.'</p>
                            </div>
                        </div>
                        <div>
                            <h5>'.__('front.Feedback').'</h5>
                            <p>'.$order->feedback.'</p>
                        </div>
                        <div>
                            <p>'.$file.'</p>
                        </div>
                        </div>';

            return response()->json($data,200);
        }

        return response()->json('Error, Not found the order',500);

    }

    public function edit_user(){

        $user= auth('web')->user();
        return view('frontEnd.editUserForm',compact('user'));
    }

    public function update_user(Request $request){

        $city_ids= City::all()->pluck('id');
         $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'dob' => ['required', 'date'],
            //'phone'=>'required|numeric|digits:10|regex:/(05[96])[0-9]/|unique:users,phone',
            'phone'=>'required|numeric|digits:10|regex:/(05[96])[0-9]/',
            'city'=>['required', Rule::in($city_ids),],
            'id_number' => ['required', 'numeric', 'digits:10', 'unique:users,id_number,'.auth('web')->id()],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.auth('web')->id()],
        ]);

        $filename= null;
        if ($request->hasFile('file')){

            if (Storage::disk('public')->exists(auth('web')->user()->image)){
                Storage::disk('public')->delete(auth('web')->user()->image);
            }
            $uploadedFile = $request->file('file');
            $filename = time().$uploadedFile->getClientOriginalName();
            if(!File::exists(public_path() . '/storage/profiles')){
                File::makeDirectory(public_path() . '/storage/profiles',0755,true);
            }
            Storage::disk('public')->putFileAs(
                'profiles/',
                $uploadedFile,
                $filename
            );
        }

        auth('web')->user()->update([
            'name'=> $request->name,
            'birthdate'=> $request->dob,
            'phone'=> $request->phone,
            'city_id'=> $request->city,
            'image'=> $request->hasFile('file')?'/profiles/'.$filename : auth('web')->user()->image,
            'id_number'=> $request->id_number,
            'email'=> $request->email,
        ]);

        return redirect()->route('profile')
            ->with(['success'=>trans('front.Your profile has been updated successfully')]);


    }
}
