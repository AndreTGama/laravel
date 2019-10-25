<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class noticia extends Model
{
    protected $fillable = 
    [
        'titulo_noticia','noticia'
    ]; 
    
    /**
     * arquivo
     *
     * @return void
     */
    public function arquivo(){
        return $this->hasMany('App\arquivo', 'noticia_id', 'id');
    }

    /**
     * tipo_noticia
     *
     * @return void
     */
    public function tipo_noticia(){
        return $this->belongsTo('App\tipo_noticia', 'tipo_noticia_id', 'id');
    }
}
