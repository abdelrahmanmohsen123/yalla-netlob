<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $user = User::where('id',auth()->id())->get();

        // $friends = Friend::where('user_id',auth()->id())->get();

        // dd($friends);
        $latest_orders = Order::where('user_id',auth()->id())->get();
        return view('home',compact('latest_orders'));
    }
}