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
        $Stuffs=Stuff::latest();

        if(request('search')){
            if(strtolower(request('search'))=='kosong'){
                $Stuffs->where('jumlah','=',0);
            }elseif(strtolower(request('search'))=='tersedia'){
                $Stuffs->where('jumlah','>',1);
            }else{
                $Stuffs->where('nama','like','%'.request('search').'%')
                   ->orwhere('kode','like','%'.request('search').'%')
                   ->orwhere('jumlah','like','%'.request('search').'%');
            }
        }
        return view('home',[
            "title" => "Dashboard",
            "Stuffs" => $Stuffs->paginate(8)->withQueryString()
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
            'kode' => 'required|unique:stuffs,kode',
            'nama' => 'required',
        ]);
        Stuff::create($request->all());
        return redirect('/')->with('status','Data Added!');
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
        return view('codestuffedit',[
            "title" => "Code Stuff",
            "stuff" => $stuff,
        ]);
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
        if ($stuff->kode==$request->kode) {
            $request->validate([
                'nama' => 'required',
            ]);
            Stuff::where('id',$stuff->id)
                  ->update([
                    'nama'=> $request->nama,
                  ]);
        } else {
            $request->validate([
                'kode' => 'required|unique:stuffs,kode',
                'nama' => 'required',
            ]);
            Stuff::where('id',$stuff->id)
                  ->update([
                    'kode'=> $request->kode,
                    'nama'=> $request->nama,
                  ]);
        }
        
        return redirect('/')->with('status','Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stuff  $stuff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stuff $stuff)
    {
        Stuff::destroy($stuff->id);
        return redirect('/')->with('status','Data Deleted');
    }
}
