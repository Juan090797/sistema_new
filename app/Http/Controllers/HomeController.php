<?php

namespace App\Http\Controllers;

use App\Modelos\Ticket;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __invoke()
    {
        $ticket_nuevo = Ticket::where('estado_id', 1)->get();
        $ticket_total = Ticket::all();
        $ticket_alto = Ticket::where('prioridad_id', 1)->where('estado_id', 1)->get();
        $ticket_resuelto = Ticket::where('estado_id', 3)->get();
        $ticket_ultimos = Ticket::orderBy("id","desc")->take(4)->get();
        // dd($ticket_ultimos);
        return view('home', ['ticket_nuevo' => $ticket_nuevo,
                            'ticket_total' => $ticket_total,
                            'ticket_alto' => $ticket_alto,
                            'ticket_resuelto' => $ticket_resuelto,
                            'ticket_ultimos' => $ticket_ultimos
                            ]);
    }
}
