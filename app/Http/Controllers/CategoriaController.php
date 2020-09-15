<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoriaRequest;
use App\Modelos\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index', ['categorias' => $categorias]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoriaRequest $request, Categoria $categoria)
    {
        $status = 'success' ;
        $content = 'La categoria ha sido creada';
        $categoria = new Categoria();
        $categoria->fill($request->all());
        $categoria -> created_by = Auth::user()->id;
        $categoria -> updated_by = Auth::user()->id;
        $categoria -> save();

        return redirect()->route('categoria.index')->with('process_result', [
            'status' => $status,
            'content' =>$content,
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modelos\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        return view('categorias.show', ['categoria' => $categoria]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Modelos\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modelos\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria $categoria)
    {
        $categoria->fill($request->all());
        $categoria -> created_by = Auth::user()->id;
        $categoria -> updated_by = Auth::user()->id;
        $categoria -> save();

        return redirect()->route('categoria.show', $categoria->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modelos\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria)
    {
        //
    }
}
