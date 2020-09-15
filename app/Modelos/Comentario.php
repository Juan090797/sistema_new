<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $fillable = [
        'descripcion', 'user_id','ticket_id'
    ];
    protected $table = 'comentarios_tk';
    protected $primaryKey = 'id';

    public function entrada(){
        return $this->belongsTo('App\Modelos\Entrada');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
