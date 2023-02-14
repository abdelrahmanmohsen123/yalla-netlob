<?php

namespace App\Http\Controllers;

use App\Models\Groub;
use App\Models\Friend;
use App\Models\GroubFriend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groubs = Groub::all();
        return view('groups.all',['groubs'=>$groubs]);
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
                'name' => 'required|unique:groubs|max:100',
            ]);

        // dd($request->all());

        Groub::create($request->all());
        return redirect()->route('groubs.index')->with('success', 'Your Group has been added successfully!');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Groub  $groub
     * @return \Illuminate\Http\Response
     */
    public function show(Groub $groub)
    {
        $friendsInGroub = DB::table('groub_friends')
            ->join('groubs', 'groub_friends.groub_id', '=', 'groubs.id')
            ->join('friends', 'groub_friends.friend_id', '=', 'friends.id')
            ->where('groub_friends.groub_id',$groub->id)
            ->select('friends.*')
            ->get();



        // $friends = DB::table('groub_friends')
        //     ->join('groubs', 'groub_friends.groub_id', '=', 'groubs.id')
        //     ->join('friends', 'groub_friends.friend_id', '=', 'friends.id')
        //     ->where('groub_friends.groub_id','!=',$groub->id)

        //     ->select('friends.*')
        //     ->get();

        //     if(empty($friends) ){
        //           $friends = Friend::where('groub_id','!=',$groub->id )->get();
        //     }
            // dd($friendsInGroub2);
        $groubs = Groub::all();
        $friends = Friend::where('groub_id','!=',$groub->id )->distinct()->get();

        // dd($friends);
        // $friendsInGroub = GroubFriend::where('groub_id','=',$groub->id )->get();
        // $friendsInGroub2 =[];
        // for ($i=0; $i < count($friendsInGroub); $i++) {
        //     foreach($friendsInGroub as $x){
        //         $friendsInGroub2[$i] = Friend::where('id','=',$x->friend_id )->get();
        //     }
        //     # code...
        //     // $data = Friend::where('id','=',$x->friend_id )->get();
        // }




        return view('groups.all',['groubs'=>$groubs,'groub'=>$groub,'friendsInGroub'=>$friendsInGroub,'friends'=>$friends]);
    }
    public function addFrientoGroub(Request $request){
        // dd($request->all());
        $request->validate([
            'groub_id' => 'required',
            'friend_id' => 'required',
        ]);
         GroubFriend::create($request->all());

        return redirect()->back()->with('success_add_user', 'Your Friend has been added successfully!');
    }

    public function deleteFrientoGroub(Request $request){
        //

        $friend = GroubFriend::where('groub_id','=',$request->groub_id )
                                ->where('friend_id','=',$request->friend_id )
                                ->first();
        $friend->delete();


        return redirect()->back()->with('success_delete_user_from groub', ' Friend has been Delete from Groub successfully!');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Groub  $groub
     * @return \Illuminate\Http\Response
     */
    public function edit(Groub $groub)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Groub  $groub
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Groub $groub)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Groub  $groub
     * @return \Illuminate\Http\Response
     */
    public function destroy(Groub $groub)
    {
        //
        $groub->delete();
        return redirect()->route('groubs.index')->with('success_delete_user', 'the groub has been deleted successfully!');
    }
}