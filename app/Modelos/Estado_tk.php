<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Estado_tk extends Model
{
    protected $table = 'estados_tk';

    protected $fillable = [
        'nombre_est', 'estado_est',
    ];

    public function ticket(){
        return $this->hasMany('App\Modelos\Ticket');

    }
}
