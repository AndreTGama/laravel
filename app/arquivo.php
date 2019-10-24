<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class arquivo extends Model
{
    protected $fillable = 
    [
        'descricao_arquivo', 'arquivo', 'noticia_id'
    ];

    public function noticia(){
        return $this->belongsTo('App\noticia','noticia_id', 'id');
    }
}
