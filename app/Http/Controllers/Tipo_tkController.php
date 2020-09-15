<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTipo_ticketRequest;
use App\Modelos\Tipo_tk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Tipo_tkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos_tk = Tipo_tk::all();
        return view('tipos.index', ['tipos_tk' => $tipos_tk]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTipo_ticketRequest $request, Tipo_tk $tipo_tk)
    {
        $status = 'success' ;
        $content = 'El Tipo de ticket ha sido creada';
        $tipo = new Tipo_tk();
        $tipo->fill($request->all());

        $tipo -> created_by = Auth::user()->id;
        $tipo -> updated_by = Auth::user()->id;
        $tipo -> save();

        return redirect()->route('tipo_tk.index')->with('process_result', [
            'status' => $status,
            'content' =>$content,
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modelos\Tipo_tk  $tipo_tk
     * @return \Illuminate\Http\Response
     */
    public function show(Tipo_tk $tipo_tk)
    {
        return view('tipos.show', ['tipo_tk' => $tipo_tk]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Modelos\Tipo_tk  $tipo_tk
     * @return \Illuminate\Http\Response
     */
    public function edit(Tipo_tk $tipo_tk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modelos\Tipo_tk  $tipo_tk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tipo_tk $tipo_tk)
    {
        $tipo_tk->fill($request->all());
        $tipo_tk -> created_by = Auth::user()->id;
        $tipo_tk -> updated_by = Auth::user()->id;
        $tipo_tk -> save();

        return redirect()->route('tipo_tk.show', $tipo_tk->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modelos\Tipo_tk  $tipo_tk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipo_tk $tipo_tk)
    {
        //
    }
}
