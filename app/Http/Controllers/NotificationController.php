<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\OffersNotification;
use Illuminate\Support\Facades\Auth;

// use Illuminate\Support\Facades\Notification;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addNotifaction($sender_id,$receiver_id){
        
        $sender = User::find($sender_id);
        $receiver = User::find($receiver_id);
        
        $notify = new Notification();
        $notify->message = "";
        $notify->status = false;
        $notify->sender_id = $sender_id;
        $notify->receiver_id = $receiver_id;
        $notify->save();

    }

    public function getAll()
    {
        $all = Notification::where('receiver_id',Auth::user()->id)->where('status',false)->with('sender')->get();
        // dd($all);
        return $all;
    }

    public function changeSeen($id){
        Notification::where('receiver_id',Auth::user()->id)->update(['status'=>true]);
        return true;
    }
}