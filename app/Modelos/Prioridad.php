<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Prioridad extends Model
{
    protected $table = 'prioridades_tk';

    protected $fillable = [
        'nombre_pri', 'estado_pri',
    ];

    public function ticket(){
        return $this->hasMany('App\Modelos\Ticket');
    }
}
