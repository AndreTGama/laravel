<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class noticia extends Model
{
    protected $fillable = 
    [
        'titulo_noticia','','noticia'
    ]; 
    
    public function arquivo(){
        return $this->hasMany('App\arquivo', 'noticia_id', 'id');
    }
}
