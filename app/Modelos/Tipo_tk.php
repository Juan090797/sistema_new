<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Tipo_tk extends Model
{
    protected $table = 'tipos_tk';

    protected $fillable = [
        'nombre_tip', 'estado_tip',
    ];
}
