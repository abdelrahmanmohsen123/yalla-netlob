<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use App\Models\FriendOrder;
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
        $orders = Order::where('user_id',auth()->id())->get();
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
        $friends_user =  Friend::where('user_id',auth()->id())->get();
        return view('orders.create',['friends_user'=>$friends_user]);
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
        $order->user_id =auth()->id();
        $order->invites_count = count($request->invite_friends);
        $order->order_for =$request->order_for;
        $order->restaurant_name = $request->restaurant_name;
        $order->save();
        $friends_invites = [];


            foreach( $request->invite_friends as $k => $v ) {
                $data = collect([
                    'friend_id' => $request['invite_friends'][$k],
                    'order_id' => $order->id,

                ]);
                $friends_invites[] = $data->toArray();

            }

            FriendOrder::insert( $friends_invites );


        return redirect()->route('orders.index')->with('success', 'Your Order has been added successfully!');
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

        // count($request->invite_friends);
        $count_invite = FriendOrder::where('order_id',$order->id)->count();
        $friends_invites_orders = FriendOrder::where('order_id',$order->id)->get();
        // dd($count_invite);

        $orderDetals = Orderdetail::where('order_id',$order->id )->get();
        return view('orders.show',['order'=>$order,'orderDetals'=>$orderDetals,'count_invite'=>$count_invite]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $order->status = 'finished';
        $order->save();
        $orders = Order::where('user_id',auth()->id())->get();
        return redirect()->back()->with('success', 'Your Order has been updated successfully!');

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
    {   $order->status = 'cancel';
        $order->save();
        $order->delete();
        return redirect()->back()->with('success', 'Your Order has been Cancelled successfully!');
    }
}