<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias_tk';

    protected $fillable = [
        'nombre_cat', 'estado_cat',
    ];

    public function ticket(){
        return $this->hasMany('App\Modelos\Ticket');
    }
}
