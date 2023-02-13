<?php

namespace App\Http\Controllers;

use App\Models\Orderdetail;
use Illuminate\Http\Request;

class OrderdetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $request->validate([
            'item' => 'required',
            'amount'=>'required',
            'price' => 'required',
            'comment' => 'required',
            'order_id' => 'required',
        ]);

        $orderdetail = new Orderdetail();
        $orderdetail->item = $request->item;
        $orderdetail->amount = $request->amount;
        $orderdetail->price = $request->price;
        $orderdetail->comment = $request->comment;
        $orderdetail->order_id = $request->order_id;
        $orderdetail->save();
        $orderDetals = Orderdetail::where('order_id', $request->order_id )->get();
        // dd($orderDetals);
        return redirect()->back()->with('success', 'Your item has been added successfully!',['orderDetals'=>$orderDetals]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Orderdetail  $orderdetail
     * @return \Illuminate\Http\Response
     */
    public function show(Orderdetail $orderdetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Orderdetail  $orderdetail
     * @return \Illuminate\Http\Response
     */
    public function edit(Orderdetail $orderdetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Orderdetail  $orderdetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orderdetail $orderdetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Orderdetail  $orderdetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orderdetail $orderdetail)
    {
        //
    }
}