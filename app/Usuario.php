<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    /**
     * lista
     *
     * @return void
     */
    public function lista(){
        return(object)[
            'nome' => ''
        ];
    }
}
