<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class noticia extends Model
{
    protected $fillable = [
        'titulo_noticia','','noticia'
    ];
    public function noticia(){
        return $this->belongsTo('App\arquivo', 'noticia_id', 'id');
    }
}
