<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEmpresaRequest;
use App\Http\Requests\UpdateEmpresaRequest;
use App\Modelos\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::all();
        return view('empresas.index', ['empresas' => $empresas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empresas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEmpresaRequest $request, Empresa $empresa)
    {
        $status = 'success' ;
        $content = 'La empresa ha sido creada';
        $empresa = new Empresa();
        $empresa->fill($request->all());
        $empresa -> created_by = Auth::user()->id;
        $empresa -> updated_by = Auth::user()->id;
        $empresa -> save();

        return redirect()->route('empresa.index')->with('process_result', [
            'status' => $status,
            'content' =>$content,
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modelos\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        return view('empresas.show', ['empresa' => $empresa]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Modelos\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $empresa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modelos\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmpresaRequest $request, Empresa $empresa)
    {
        $status = 'success' ;
        $content = 'La empresa ha sido actualizada';
        $empresa->fill($request->all());
        $empresa -> created_by = Auth::user()->id;
        $empresa -> updated_by = Auth::user()->id;
        $empresa -> save();

        return redirect()->route('empresa.show', $empresa->id)->with('process_result', [
            'status' => $status,
            'content' =>$content,
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modelos\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $empresa)
    {
        //
    }
}
