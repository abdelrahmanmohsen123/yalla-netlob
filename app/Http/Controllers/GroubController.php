<?php

namespace App\Http\Controllers;

use App\Models\Groub;
use Illuminate\Http\Request;

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
        // dd($request->all());
        $request->validate([
            'name' => 'required|unique:groubs|max:100',
        ]);
        Groub::create($request->all());
        return redirect()->route('groubs.index')->with('success', 'Your Post has been added successfully!');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Groub  $groub
     * @return \Illuminate\Http\Response
     */
    public function show(Groub $groub)
    {
        //
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
    }
}