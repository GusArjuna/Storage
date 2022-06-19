<?php

namespace App\Http\Controllers;

use App\Models\Instuff;
use App\Http\Requests\StoreInstuffRequest;
use App\Http\Requests\UpdateInstuffRequest;
use App\Models\Stuff;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request as HttpRequest;

class InstuffController extends Controller
{
    public function pdf(HttpRequest $request){
        $Stuffs=Instuff::whereBetween('tanggal', [$request->tgldari, $request->tglsampai])->get()->toArray();
        $pdf = PDF::loadView('pdfin',['Stuffs'=> $Stuffs,'tanggal'=> $request]);
        return $pdf->download('InStuff.pdf');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Stuffs=Stuff::all();
        $instuff=Instuff::latest();
        if(request('search')){
            $check = true;
            foreach ($Stuffs as $stuff) {
                if (strtolower($stuff->nama)==strtolower(request('search'))) {
                    $instuff->where('kode','like','%'.$stuff->kode.'%');
                    $check = false;
                    break;
                }
            }
            if($check==true){
                $instuff->where('kode','like','%'.request('search').'%')
                          ->orwhere('tanggal','like','%'.request('search').'%')
                          ->orwhere('jumlah','like','%'.request('search').'%')
                          ->orwhere('keterangan','like','%'.request('search').'%');
            }
            
            
        }
        return view('stuffin',[
            "title" => "Stuff IN",
            "Stuffins" => $instuff->paginate(8)->withQueryString(),
            "stuffs" => $Stuffs
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
        $stuf=Stuff::where('kode',$request->kode)->get()->first()->jumlah;
        $instuf=$request->jumlah;
        $total=$stuf+$instuf;
        Stuff::where('kode',$request->kode)
                  ->update([
                    'jumlah'=> $total,
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
        if($request->jumlah>$instuff->jumlah){
            $instuf=$request->jumlah-$instuff->jumlah;
        }elseif($request->jumlah<$instuff->jumlah){
            $instuf=$request->jumlah-$instuff->jumlah;
        }else{
            $instuf=0;
        }
        $stuf=Stuff::where('kode',$request->kode)->get()->first()->jumlah;
        $total=$stuf+$instuf;
        Stuff::where('kode',$request->kode)
                  ->update([
                    'jumlah'=> $total,
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
        $stuf=Stuff::where('kode',$instuff->kode)->get()->first()->jumlah;
        $instuf=$instuff->jumlah;
        $total=$stuf-$instuf;
        Stuff::where('kode',$instuff->kode)
                  ->update([
                    'jumlah'=> $total,
                  ]);
        Instuff::destroy($instuff->id);
        return redirect('/stuffin')->with('status','Data Deleted');
    }
}
