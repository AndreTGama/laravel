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
    {   $dados = [
            [
                'tipo_noticia' => 'Politica',
                
            ],[
                'tipo_noticia' => 'Cultura'
            ],[
                'tipo_noticia' => 'Esporte'
            ]
        ];

        foreach($dados as $dado){
            DB::table('tipo_noticias')->insert($dados)->save();
        }
    
    }
}