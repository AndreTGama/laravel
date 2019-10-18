<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    public function lista(){
        return(object)[
            'nome' => 'andretgama'
        ];
    }
}
