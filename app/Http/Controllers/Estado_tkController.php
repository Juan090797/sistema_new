<?php

namespace App\Http\Controllers;

use App\Modelos\Estado_tk;
use Illuminate\Http\Request;

class Estado_tkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estados = Estado_tk::all();
        return view('estados.index', ['estados' => $estados]);
        
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modelos\Estado_tk  $estado_tk
     * @return \Illuminate\Http\Response
     */
    public function show(Estado_tk $estado_tk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Modelos\Estado_tk  $estado_tk
     * @return \Illuminate\Http\Response
     */
    public function edit(Estado_tk $estado_tk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modelos\Estado_tk  $estado_tk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estado_tk $estado_tk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modelos\Estado_tk  $estado_tk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estado_tk $estado_tk)
    {
        //
    }
}
