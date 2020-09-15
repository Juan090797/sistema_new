<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAreaRequest;
use App\Http\Requests\UpdateAreaRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Modelos\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = Area::all();
        return view('areas.index', ['areas' => $areas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('areas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAreaRequest $request, Area $area)
    {
        $status = 'success' ;
        $content = 'El area ha sido creada';
        $area = new Area();
        $area->fill($request->all());

        $area -> created_by = Auth::user()->id;
        $area -> updated_by = Auth::user()->id;
        $area -> save();

        return redirect()->route('area.index')->with('process_result', [
            'status' => $status,
            'content' =>$content,
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modelos\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function show(Area $area)
    {
        return view('areas.show', ['area' => $area]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Modelos\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function edit(Area $area)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modelos\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAreaRequest $request, Area $area)
    {
        $status = 'success' ;
        $content = 'EL area ha sido actualizada';
        $area->fill($request->all());
        $area -> created_by = Auth::user()->id;
        $area -> updated_by = Auth::user()->id;
        $area -> save();

        return redirect()->route('area.show', $area->id)->with('process_result', [
            'status' => $status,
            'content' =>$content,
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modelos\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy(Area $area)
    {
        //
    }
}
