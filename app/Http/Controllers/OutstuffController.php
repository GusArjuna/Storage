<?php

namespace App\Http\Controllers;

use App\Models\outstuff;
use App\Http\Requests\StoreoutstuffRequest;
use App\Http\Requests\UpdateoutstuffRequest;
use App\Models\Stuff;

class OutstuffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('stuffout',[
            "title" => "Stuff OUT",
            "Stuffouts" => outstuff::all(),
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
        return view('formout',[
            "title" => "Stuff Out",
            "stuffs" => Stuff::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreoutstuffRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreoutstuffRequest $request)
    {
        $request->validate([
            'kode' => 'required',
            'jumlah' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required',
        ]);
        outstuff::create($request->all());
        return redirect('/stuffout')->with('status','Data Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\outstuff  $outstuff
     * @return \Illuminate\Http\Response
     */
    public function show(outstuff $outstuff)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\outstuff  $outstuff
     * @return \Illuminate\Http\Response
     */
    public function edit(outstuff $outstuff)
    {
        
        return view('formoutedit',[
            "title" => "Stuff Out",
            "outstuff" => $outstuff,
            "stuffs" => Stuff::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateoutstuffRequest  $request
     * @param  \App\Models\outstuff  $outstuff
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateoutstuffRequest $request, outstuff $outstuff)
    {
        $request->validate([
            'kode' => 'required',
            'jumlah' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required',
        ]);
        outstuff::where('id',$outstuff->id)
              ->update([
                'kode'=> $request->kode,
                'jumlah'=> $request->jumlah,
                'tanggal'=> $request->tanggal,
                'keterangan'=> $request->keterangan,
              ]);
        return redirect('/stuffout')->with('status','Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\outstuff  $outstuff
     * @return \Illuminate\Http\Response
     */
    public function destroy(outstuff $outstuff)
    {
        outstuff::destroy($outstuff->id);
        return redirect('/stuffout')->with('status','Data Deleted');
    }
}
