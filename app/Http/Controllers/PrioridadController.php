<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePrioridadRequest;
use App\Modelos\Prioridad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrioridadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prioridades = Prioridad::all();
        return view('prioridades.index', ['prioridades' => $prioridades]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('prioridades.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePrioridadRequest $request, Prioridad $prioridades)
    {
        $status = 'success' ;
        $content = 'La prioridad ha sido creada';
        $prioridad = new Prioridad();
        $prioridad->fill($request->all());
        $prioridad -> created_by = Auth::user()->id;
        $prioridad -> updated_by = Auth::user()->id;
        $prioridad -> save();

        return redirect()->route('prioridad.index')->with('process_result', [
            'status' => $status,
            'content' =>$content,
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modelos\Prioridad  $prioridad
     * @return \Illuminate\Http\Response
     */
    public function show(Prioridad $prioridad)
    {
        return view('prioridades.show', ['prioridad' => $prioridad]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Modelos\Prioridad  $prioridad
     * @return \Illuminate\Http\Response
     */
    public function edit(Prioridad $prioridad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modelos\Prioridad  $prioridad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prioridad $prioridad)
    {
        $prioridad->fill($request->all());
        $prioridad -> created_by = Auth::user()->id;
        $prioridad -> updated_by = Auth::user()->id;
        $prioridad -> save();

        return redirect()->route('prioridad.show', $prioridad->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modelos\Prioridad  $prioridad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prioridad $prioridad)
    {
        //
    }
}
