<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\Subscribe;
use App\Models\Notification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;


class FriendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $id_user = auth()->user()->id;
        $friends = Friend::where('user_id',$id_user)->get();
        return view('friends.all', ['friends' => $friends]);
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
        
        // $request->validate([
        //     'name' => 'required|max:100',
        //     'email' => 'required|email|unique:friends',
        // ]);

        // dd($request->all());
        $email = $request->all()['email'];

        $friend = Friend::where('email',$email)->where('user_id',auth()->id())->first();
        // dd($friend);
        if($friend){
            // dd($friend);
            return to_route('friends.index')->with('error', 'This is an existing friend already');
        }
        // echo 'not a friend';
        // return dd($friend);
        

        if(!User::where('email',$email)->first()){
            Mail::to($email)->send(new Subscribe($email));
            return to_route('friends.index')->with('success', 'this email is not found in system, we have sent an invitation to him !');
        }

        $new_friend = new Friend();
        $new_friend->name = $request->name;
        $new_friend->email = $request->email;
        $new_friend->user_id = auth()->id();
        
        if($new_friend->save())
        {
            Notification::create([
                'sender_id' => auth()->id(),
                'receiver_id' => User::where('email',$request->email)->first()->id,
                'status' => false,

            ]);
            return to_route('friends.index')->with('success', 'friend is added successfully');
        }else{
            return to_route('friends.index')->with('error', 'error in saving friend');
        }

        

        // new friend 
        // $subscriber =  Friend::create($request->all());
        // array_push($request->all(),['user_id'=>auth()->id]);
        // $subscriber =  Friend::create($request->all());

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Friend  $friend
     * @return \Illuminate\Http\Response
     */
    public function show(Friend $friend)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Friend  $friend
     * @return \Illuminate\Http\Response
     */
    public function edit(Friend $friend)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Friend  $friend
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Friend $friend)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Friend  $friend
     * @return \Illuminate\Http\Response
     */
    public function destroy(Friend $friend)
    {
        $friend->delete();
        return redirect()->route('friends.index')->with('success_delete_friend', 'the Friend has been deleted successfully!');
    }
}