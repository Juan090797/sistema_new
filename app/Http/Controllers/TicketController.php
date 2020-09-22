<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Modelos\Categoria;
use App\Modelos\Prioridad;
use App\Modelos\Ticket;
use App\Modelos\Evento;
use App\User;
use App\Modelos\Comentario;
use App\Modelos\Estado_tk;
use App\Modelos\Tipo_tk;
use App\Notifications\ComentarioNotify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\Mensaje;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $tickets = Auth::user()->ticket()->orderBy("id","desc")->get();
        $tickets = Ticket::orderBy("id","desc")->get();
        // dd($tickets);

        return view('tickets.index', ['tickets' => $tickets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos = Tipo_tk::all();
        $categorias = Categoria::all();
        $prioridades = Prioridad::all();
        $estados = Estado_tk::all();
        $usuarios = User::all();

        if(Auth::check()){
            return view('tickets.create', ["tipos" => $tipos, "categorias" => $categorias, "prioridades" => $prioridades, "usuarios" => $usuarios, "estados" => $estados]);
        }else{
            return view('tickets.createwait', ["tipos" => $tipos, "categorias" => $categorias, "prioridades" => $prioridades, "usuarios" => $usuarios]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTicketRequest $request,Ticket $ticket)
    {
        if(Auth::check()){



        }else{


            $ticket = new Ticket();
            $ticket->fill($request->all());
            $ticket -> prioridad_id = 1;
            $ticket -> categoria_id = 1;
            $ticket -> tipo_id = 1;
            $ticket -> estado_id = 1;
            $ticket -> tecnico_user_id  = 2;
            $ticket -> requester_user_id = $request->input('requester_user_id');

            if ($request->hasFile('archivo_tk')){
                $ubicacion = 'public\archivos';
                $archivo_name = $request->archivo_tk->getClientOriginalName();
                $path = $request->file('archivo_tk')->storeAs($ubicacion, $archivo_name);
                $ticket -> archivo_tk = $archivo_name;
            }

            $ticket -> created_by = $request->input('requester_user_id');
            $ticket -> updated_by = $request->input('requester_user_id');
            $ticket -> save();
        }

        $from = User::findOrFail($request->input('requester_user_id'));

        Notification::send($from, new Mensaje($ticket));

        Notification::route('mail', 'juan.marquina@repuestosfreddy.com')
            ->notify(new Mensaje($ticket));

        // return redirect()->view('tickets.createwait')->with('success', 'Ticket Creado');
        return back()->with('success', 'Ticket Creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modelos\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        $prioridades = Prioridad::all();
        $usuarios = User::where('area_id', 1)->get();
        $categorias = Categoria::all();
        $estados = Estado_tk::all();
        $comentarios = Comentario::where('ticket_id','=',$ticket->id)->orderBy('id', 'desc')->get();

        $userauth = Auth::user();
        // dd($userauth->area_id);

        if(Auth::check()){
            return view('tickets.show',
            ['ticket' => $ticket, 'comentarios' => $comentarios, 'categorias' => $categorias,
            'prioridades' => $prioridades, 'usuarios' => $usuarios, 'estados' => $estados]);
        }else{

            return view('tickets.showwait',
            ['ticket' => $ticket, 'comentarios' => $comentarios, 'categorias' => $categorias,
            'prioridades' => $prioridades, 'usuarios' => $usuarios, 'estados' => $estados]);
        }

    }

    public function getDownload($archivo){

            // $pathtoFile = public_path().'/archivos/'.$archivo;

            return response()->download('storage/archivos/'.$archivo);
    }

    public function comentarioGuardar(Request $request){

        if(Auth::check()){
            $user =$request->input('user_id');
            $comentario = new Comentario();
            $comentario->fill($request->all());
            $comentario->user_id=Auth::user()->id;
            $comentario -> created_by = Auth::user()->id;
            $comentario -> updated_by = Auth::user()->id;
            $comentario->save();

            $from = User::findOrFail($user);
            Notification::send($from, new ComentarioNotify($comentario));

        }else{

            $user =$request->input('user_id');
            $comentario = new Comentario();
            $comentario->fill($request->all());
            $comentario->user_id = User::findOrFail($user)->id;
            $comentario -> created_by = User::findOrFail($user)->id;
            $comentario -> updated_by = User::findOrFail($user)->id;
            $comentario->save();

            $from = User::findOrFail($user);
            Notification::send($from, new ComentarioNotify($comentario));
        }

        // Notification::send($from, new ComentarioNotify($comentario));

        Notification::route('mail', 'juan.marquina@repuestosfreddy.com')
            ->notify(new ComentarioNotify($comentario));

        return redirect()->route('ticket.show',['ticket'=>$request->input('ticket_id')]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Modelos\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modelos\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        $ticket->fill($request->all());
        $ticket -> tecnico_user_id = $request->input('tecnico_user_id');
        $ticket -> estado_id = $request->input('estado_id');
        $ticket -> created_by = Auth::user()->id;
        $ticket -> updated_by = Auth::user()->id;
        $ticket -> save();

        $evento = new Evento();
        $evento -> descripcion = $ticket->estado->nombre_est;
        $evento -> user_id = Auth::user()->id;
        $evento -> ticket_id = $ticket->id;
        $evento -> save();

        return redirect()->route('ticket.show', $ticket->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modelos\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
