<?php

namespace App\Http\Controllers;

use App\Models\outstuff;
use App\Http\Requests\StoreoutstuffRequest;
use App\Http\Requests\UpdateoutstuffRequest;

class OutstuffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreoutstuffRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreoutstuffRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\outstuff  $outstuff
     * @return \Illuminate\Http\Response
     */
    public function show(outstuff $outstuff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\outstuff  $outstuff
     * @return \Illuminate\Http\Response
     */
    public function edit(outstuff $outstuff)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\outstuff  $outstuff
     * @return \Illuminate\Http\Response
     */
    public function destroy(outstuff $outstuff)
    {
        //
    }
}
