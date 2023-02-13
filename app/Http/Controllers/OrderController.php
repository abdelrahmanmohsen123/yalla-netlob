<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Orderdetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $orders = Order::all();
        return view('orders.all',['orders'=>$orders]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('orders.create');
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
        // dd($request->all());
        $request->validate([

            'order_for' => 'required',
            'restaurant_name' => 'required',
            'menu_image'=>'required|image|mimes:png,jpg'
        ]);
        $order = new Order();
        if($request->hasFile('menu_image')){
             $imagename=uploadImage($request->file('menu_image'),'orders');
             $order->menu_image = $imagename;
        }
        $order->order_for =$request->order_for;
        $order->restaurant_name = $request->restaurant_name;
        $order->save();
        return redirect()->route('orders.index')->with('success', 'Your Post has been added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
        $orderDetals = Orderdetail::where('order_id',$order->id )->get();
        return view('orders.show',['order'=>$order,'orderDetals'=>$orderDetals]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}