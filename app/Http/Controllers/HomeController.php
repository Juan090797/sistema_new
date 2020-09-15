<?php

namespace App\Http\Controllers;

use App\Modelos\Ticket;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __invoke()
    {
        $ticket_nuevo = Ticket::where('estado_tk', 'Nuevo')->get();
        $ticket_abierto = Ticket::where('estado_tk', 'Abierto')->get();
        $ticket_alto = Ticket::where('prioridad_id', 1)->get();
        $ticket_resuelto = Ticket::where('estado_tk', 'Resuelto')->get();
        $ticket_ultimos = Ticket::where('estado_tk', 'Nuevo')->orderBy("id","desc")->take(4)->get();
        return view('home', ['ticket_nuevo' => $ticket_nuevo,
                            'ticket_abierto' => $ticket_abierto,
                            'ticket_alto' => $ticket_alto,
                            'ticket_resuelto' => $ticket_resuelto,
                            'ticket_ultimos' => $ticket_ultimos
                            ]);
    }
}
