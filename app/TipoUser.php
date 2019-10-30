<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoUser extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tipo_user',
    ];
    public function User(){
        return $this->hasOne('App\User', 'tipo_user_id', 'id');
    }

}
