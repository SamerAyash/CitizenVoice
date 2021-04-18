<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $path= 'admin.order';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders= Order::where('status_id',1)->get();
        return view($this->path.'.holded_orders',compact('orders'));
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
        $order= Order::findOrFail($id);
        return view($this->path.'.show_order',compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order= Order::findOrFail($id);
        return view($this->path.'.edit_order',compact('order'));
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
            'decision'=>'required|in:1,0',
            'feedback'=>'required|string',
        ]);
        $order= Order::findOrFail($id);
        $order->update([
            'status_id'=> $request->decision? 2 : 3,
            'feedback'=> $request->feedback,
        ]);
        return redirect()->route('orders.index')->with(['success'=>'تم تحديث حالة الطلب بنجاح']);
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

    public function acceptedOrder(){

        $orders= Order::where('status_id',2)->orderByDesc('updated_at')->get();
        return view($this->path.'.accepted_orders',compact('orders'));
    }
    public function refusedOrder(){

        $orders= Order::where('status_id',3)->orderByDesc('updated_at')->get();
        return view($this->path.'.refused_orders',compact('orders'));
    }
    public function solvedOrder(){

        $orders= Order::where('status_id',4)->orderByDesc('updated_at')->get();
        return view($this->path.'.refused_orders',compact('orders'));
    }
    public function solvedStatusOrder($id){

        $order= Order::findOrFail($id);
        $order->update([
            'status_id'=> 4,
        ]);
        return redirect()->back()->with(['success'=>'تم تحديث حالة الطلب بنجاح']);
    }

}
