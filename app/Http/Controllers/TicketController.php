<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTicketRequest;
use App\Modelos\Categoria;
use App\Modelos\Prioridad;
use App\Modelos\Ticket;
use App\User;
use App\Modelos\Comentario;
use App\Modelos\Tipo_tk;
use App\Notifications\ComentarioNotify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\Mensaje;
use Illuminate\Support\Facades\Notification;


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
        $usuarios = User::all();
        if(Auth::check()){
            return view('tickets.create', ["tipos" => $tipos, "categorias" => $categorias, "prioridades" => $prioridades, "usuarios" => $usuarios]);
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
        $ticket = new Ticket();
        $ticket->fill($request->all());
        $ticket -> estado_tk = "Nuevo";
        $ticket -> prioridad_id = 1;
        $ticket -> categoria_id = 1;
        $ticket -> tipo_id = 1;
        $ticket -> requester_user_id = $request->input('requester_user_id');
        $ticket -> created_by = $request->input('requester_user_id');
        $ticket -> updated_by = $request->input('requester_user_id');
        $ticket -> save();

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
        $comentarios = Comentario::where('ticket_id','=',$ticket->id)->orderBy('id', 'desc')->get();

        $userauth = Auth::user();
        // dd($userauth->area_id);

        if(Auth::check()){
            return view('tickets.show', ['ticket' => $ticket, 'comentarios' => $comentarios, 'categorias' => $categorias, 'prioridades' => $prioridades, 'usuarios' => $usuarios]);
        }else{

            return view('tickets.showwait', ['ticket' => $ticket, 'comentarios' => $comentarios, 'categorias' => $categorias, 'prioridades' => $prioridades, 'usuarios' => $usuarios]);
        }

    }

    public function comentarioGuardar(Request $request){
        $comentario = new Comentario();
        $comentario->fill($request->all());
        $comentario->user_id=Auth::user()->id;
        $comentario -> created_by = Auth::user()->id;
        $comentario -> updated_by = Auth::user()->id;
        $comentario->save();

        $from = Auth::user();

        Notification::send($from, new ComentarioNotify($comentario));

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
    public function update(Request $request, Ticket $ticket)
    {
        $ticket->fill($request->all());
        $ticket -> created_by = Auth::user()->id;
        $ticket -> updated_by = Auth::user()->id;
        $ticket -> save();

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
