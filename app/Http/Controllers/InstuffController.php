<?php

namespace App\Http\Controllers;

use App\Models\Instuff;
use App\Http\Requests\StoreInstuffRequest;
use App\Http\Requests\UpdateInstuffRequest;
use App\Models\Stuff;

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
            "Stuffins" => Instuff::all(),
            "stuffs" => Stuff::all()
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
            "title" => "Incoming Data",
            "stuffs" => Stuff::all()
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
            'keterangan' => 'required',
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Instuff  $instuff
     * @return \Illuminate\Http\Response
     */
    public function edit(Instuff $instuff)
    {
        return view('forminedit',[
            "title" => "Incoming Data",
            "instuff" => $instuff,
            "stuffs" => Stuff::all()
        ]);
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
        $request->validate([
            'kode' => 'required',
            'jumlah' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required',
        ]);
        Instuff::where('id',$instuff->id)
              ->update([
                'kode'=> $request->kode,
                'jumlah'=> $request->jumlah,
                'tanggal'=> $request->tanggal,
                'keterangan'=> $request->keterangan,
              ]);
        return redirect('/stuffin')->with('status','Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Instuff  $instuff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instuff $instuff)
    {
        Instuff::destroy($instuff->id);
        return redirect('/stuffin')->with('status','Data Deleted');
    }
}
