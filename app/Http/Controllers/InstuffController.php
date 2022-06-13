<?php

namespace App\Http\Controllers;

use App\Models\Instuff;
use App\Http\Requests\StoreInstuffRequest;
use App\Http\Requests\UpdateInstuffRequest;

class InstuffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('stuffin',[
            "title" => "Stuff IN",
            "stuffin" => Instuff::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('formin',[
            "title" => "Incoming Data"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInstuffRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInstuffRequest $request)
    {
        $request->validate([
            'kode' => 'required',
            'jumlah' => 'required',
            'tanggal' => 'required',
        ]);
        Instuff::create($request->all());
        return redirect('/stuffin')->with('status','Data Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Instuff  $instuff
     * @return \Illuminate\Http\Response
     */
    public function show(Instuff $instuff)
    {
        return view('formin',[
            "title" => "Incoming Data",
            "stuff" => $instuff
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Instuff  $instuff
     * @return \Illuminate\Http\Response
     */
    public function edit(Instuff $instuff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInstuffRequest  $request
     * @param  \App\Models\Instuff  $instuff
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInstuffRequest $request, Instuff $instuff)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Instuff  $instuff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instuff $instuff)
    {
        //
    }
}
