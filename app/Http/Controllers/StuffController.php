<?php

namespace App\Http\Controllers;

use App\Models\Stuff;
use App\Http\Requests\StoreStuffRequest;
use App\Http\Requests\UpdateStuffRequest;

class StuffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        return view('home',[
            "title" => "Dashboard",
            "Stuffs" => Stuff::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('codestuff',[
            "title" => "Code Stuff"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStuffRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStuffRequest $request)
    {
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
        ]);
        Stuff::create($request->all());
        return redirect('/codestuff')->with('status','Data Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stuff  $stuff
     * @return \Illuminate\Http\Response
     */
    public function show(Stuff $stuff)
    {
        return view('codestuff',[
            "title" => "Code Stuff",
            "stuff" => $stuff
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stuff  $stuff
     * @return \Illuminate\Http\Response
     */
    public function edit(Stuff $stuff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStuffRequest  $request
     * @param  \App\Models\Stuff  $stuff
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStuffRequest $request, Stuff $stuff)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stuff  $stuff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stuff $stuff)
    {
        //
    }
}
