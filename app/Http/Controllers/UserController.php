<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Modelos\Area;
use App\Modelos\Empresa;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('usuarios.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresas = Empresa::all();
        $areas = Area::all();
        return view('usuarios.create', ["empresas" => $empresas, "areas" => $areas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->fill($request->all());
        $user -> password  =  bcrypt($request->username);
        $user -> created_by = Auth::user()->id;
        $user -> updated_by = Auth::user()->id;
        $user -> save();

        return redirect()->route('user.show' , $user->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $empresas = Empresa::all();
        $areas = Area::all();

        return view('usuarios.show', ['user' => $user, 'areas' => $areas, 'empresas' => $empresas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {

        $user->fill($request->all())->save();

        return redirect()->route('user.show', $user->id);
    }

    public function image(Request $request, User $user){


        $image_name = $user->id.'.'.$request->image->getClientOriginalExtension();
        $status = 'success';
        $content = 'La imagen ha sido correctamente cargada';

        try {

            DB::beginTransaction();
            $user->image_path = $image_name;
            $request->image->storeAs('public\image_profiles', $image_name);
            $user->save();
            DB::commit();

        } catch (\Throwable $th) {

            DB::rollBack();
            $status = 'error';
            $content = 'Se produjo un error al momento de la carga de la imagen';
        }

        return redirect()
        ->route('user.show', $user->id)
        ->with('process_result', [
            'status' => $status,
            'content' =>$content,
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
