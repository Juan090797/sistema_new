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
use App\Notifications\CloseNotify;
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
        $tickets = Ticket::where('estado_id',1)->orderBy('id','desc')->paginate(5);
        $tickets2 = Ticket::where('requester_user_id',auth()->user()->id)->orderBy('id','desc')->paginate(5);

        if(auth()->user()->id ==1){
            return view('tickets.index', ['tickets' => $tickets]);
        }else{
            return view('tickets.index2', ['tickets2' => $tickets2]);
        }
        
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

        return view('tickets.create', ["tipos" => $tipos, "categorias" => $categorias, 
                                    "prioridades" => $prioridades, "usuarios" => $usuarios, "estados" => $estados]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $status = 'success' ;
        $content = 'El ticket ha sido creado';
        $ticket = new Ticket();
        $ticket -> titulo_tk = strtolower($request->titulo_tk);
        $ticket -> descripcion_tk = strtolower($request->descripcion_tk);
        $ticket -> prioridad_id = $request->prioridad_id;
        $ticket -> categoria_id = $request->categoria_id;
        $ticket -> tipo_id = $request->tipo_id;
        $ticket -> estado_id = 1;
        $ticket -> tecnico_user_id  = 1;
        $ticket -> requester_user_id = auth()->user()->id;

        if ($request->hasFile('archivo_tk'))
            {
                $ubicacion = 'public\archivos';
                $archivo_name = $request->archivo_tk->getClientOriginalName();
                $path = $request->file('archivo_tk')->storeAs($ubicacion, $archivo_name);
                $ticket -> archivo_tk = $archivo_name;
            }

        $ticket -> created_by = 1;
        $ticket -> updated_by = 1;
        $ticket -> save();

        return redirect()->route('ticket.index')->with('process_result', [
                'status' => $status,
                'content' =>$content,
                ]);
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

        return view('tickets.show',['ticket' => $ticket, 'comentarios' => $comentarios, 'categorias' => $categorias,
                                    'prioridades' => $prioridades, 'usuarios' => $usuarios, 'estados' => $estados]);

    }

    public function getDownload($archivo){

        return response()->download('storage/archivos/'.$archivo);

    }

    public function comentarioGuardar(Request $request){

        $user =$request->input('user_id');
        $comentario = new Comentario();
        $comentario->fill($request->all());
        $comentario->user_id=Auth::user()->id;
        $comentario -> created_by = Auth::user()->id;
        $comentario -> updated_by = Auth::user()->id;
        $comentario->save();

        // $from = User::findOrFail($user);
        // Notification::send($from, new ComentarioNotify($comentario));

        // Notification::send($from, new ComentarioNotify($comentario));

        // Notification::route('mail', 'soporte@repuestosfreddy.com')
        //     ->notify(new ComentarioNotify($comentario));

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

        // if($ticket->estado->nombre_est == "Cerrado"){

        //     Notification::route('mail', 'soporte@repuestosfreddy.com')
        //     ->notify(new CloseNotify($ticket));
        // }

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
