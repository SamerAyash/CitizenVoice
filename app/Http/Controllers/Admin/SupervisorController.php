<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\City;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class SupervisorController extends Controller
{
    public function __construct()
    {
        $this->middleware('superAdmin');
    }

    protected $path= 'admin.supervisor';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supervisors= Admin::where('type',2)->get();
        $blocked_page= false;
        return view($this->path.'.supervisors',compact('supervisors','blocked_page'));
    }

    public function blockedSupervisor()
    {
        $supervisors= Admin::onlyTrashed()->get()->where('type','=',2);
        $blocked_page= true;
        return view($this->path.'.supervisors',compact('supervisors','blocked_page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $supervisor= null;
        return view($this->path.'.supervisorForm',compact('supervisor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $city_ids= City::all()->pluck('id');

        $this->validate($request,[
            'password'=>['required','min:8'],
            'name' => ['required', 'string', 'max:255'],
            'phone'=>'required|numeric|digits:10|regex:/(05[96])[0-9]/|unique:admins,phone',
            'city'=>['required', Rule::in($city_ids),],
            'id_number' => ['required', 'numeric', 'digits:10', 'unique:admins,id_number'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins,email'],
        ]);

        Admin::create([
            'password'=> Hash::make($request->password),
            'name'=> $request->name,
            'phone'=> $request->phone,
            'city_id'=> $request->city,
            'type'=>2,
            'id_number'=> $request->id_number,
            'email'=> $request->email,
        ]);

        return redirect()->route('supervisors.index')->with(['success'=>'تم إضافة المشرف جديد بنجاح']);
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
        $supervisor= Admin::withTrashed()->where('type',2)->whereId($id)->first();
        return view($this->path.'.supervisorForm',compact('supervisor'));
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
       $sup= Admin::findOrFail($id);
        $city_ids= City::all()->pluck('id');
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'phone'=>'required|numeric|digits:10|regex:/(05[96])[0-9]/|unique:admins,phone,'.$sup->id,
            'city'=>['required', Rule::in($city_ids),],
            'id_number' => ['required', 'numeric', 'digits:10', 'unique:admins,id_number,'.$sup->id],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins,email,'.$sup->id],
        ]);
        $sup->update([
            'name'=> $request->name,
            'phone'=> $request->phone,
            'city_id'=> $request->city,
            'id_number'=> $request->id_number,
            'email'=> $request->email,
        ]);

        return redirect()->route('supervisors.index')->with(['success'=>'تم تعديل المشرف جديد بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supervisor= Admin::withTrashed()->where('type',2)->whereId($id)->first();
        $supervisor->forceDelete();
        return redirect()->back()->with(['success'=>'تم حذف المشرف بشكل نهائي']);
    }

    public function block($id){
        $supervisor= Admin::withTrashed()->where('type',2)->whereId($id)->first();
        $supervisor->delete();
        return redirect()->back()->with(['success'=>'تم حظر المشرف بنجاح']);
    }

    public function unblock($id){
        $supervisor= Admin::withTrashed()->where('type',2)->whereId($id)->first();

        if ($supervisor){
            $supervisor->deleted_at= null;
            $supervisor->update();
            return redirect()->back()->with(['success'=>'تم فك حظر المشرف بنجاح']);
        }

    }
}
