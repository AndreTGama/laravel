<?php

use App\tipo_noticia;
use Illuminate\Database\Seeder;

class tipo_noticiasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $dados = [
            'tipo_noticia' => 'Esporte',
            'tipo_noticia' => 'Cultura',
            'tipo_noticia' => 'Politica',
            'tipo_noticia' => 'Novela'
        ];
        for($i = 0; $i < count($dados); $i++){
            DB::table('tipo_noticia')->insert($dados[$i]);
        }
    }
}
