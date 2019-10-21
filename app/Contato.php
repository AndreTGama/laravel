<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    public function Lista(){
        return (object) [
            'nome' => 'Andre Toledo Gama',
            'Telefone' => '1296582545'
        ];
    }
}
