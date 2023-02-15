<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use Illuminate\Http\Request;
use App\Mail\Subscribe;
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
        
        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email|unique:friends',
        ]);

        // dd($request->all());
        $email = $request->all()['email'];
<<<<<<< HEAD

        $subscriber =  Friend::create($request->all());
=======
        // array_push($request->all(),['user_id'=>auth()->id]);
        // $subscriber =  Friend::create($request->all());
        $new_friend = new Friend();
        $new_friend->name = $request->name;
        $new_friend->email = $request->email;
        $new_friend->user_id = auth()->id();
        $new_friend->save();
>>>>>>> db8647249575ee095c456e77d4693352712ee52d

        if ($new_friend) {
            Mail::to($email)->send(new Subscribe($email));
            return to_route('friends.index')->with('success', 'Your Friend has been added successfully!');
        }

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