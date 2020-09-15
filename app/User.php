<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'password', 'username', 'empresa_id', 'area_id', 'email'
    ];



    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function area(){
        return $this->belongsTo('App\Modelos\Area');
    }

    public function empresa(){
        return $this->belongsTo('App\Modelos\Empresa');
    }

    public function ticket(){
        return $this->hasMany('App\Modelos\Ticket', 'requester_user_id');
    }

    public function comentarios(){
        return $this->hasMany('App\Modelos\Comentario');
    }

    /*
    * Return Full Name
    * @return string
    */


}
