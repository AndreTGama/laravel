<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'email', 'senha','tipo_user_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'senha', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     * Neste caso não foi feito essa coluna, pelo fato que o sistema não tera uma validação pelo e-mail.
     *  protected $casts = [
     *      'email_verified_at' => 'datetime',
     *  ];
    */
    public function tipoUser(){
        return $this->belongsTo('App\TipoUser','tipo_user_id', 'id');
    }

}
