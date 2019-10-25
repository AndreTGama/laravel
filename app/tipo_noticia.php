<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipo_noticia extends Model
{
    protected $fillable = 
    [
        'tipo_noticia'
    ];
    
    /**
     * noticia
     *
     * @return void
     */
    public function noticia(){
        return $this->hasOne('App\noticia', 'tipo_noticia_id', 'id');
    }
}
