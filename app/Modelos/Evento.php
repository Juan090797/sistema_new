<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'eventos_tk';

    protected $fillable = [
        'descripcion', 'ticket_id', 'user_id',
    ];
}
