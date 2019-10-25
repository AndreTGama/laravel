<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class arquivo extends Model
{
    protected $fillable = 
    [
        'descricao_arquivo', 'arquivo', 'noticia_id'
    ];

    /**
     * noticia
     *
     * @return void
     */
    public function noticia(){
        return $this->belongsTo('App\noticia','noticia_id', 'id');
    }
}
