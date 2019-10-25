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
                'tipo_noticia' => 'Política',

            ],[
                'tipo_noticia' => 'Cultura'
            ],[
                'tipo_noticia' => 'Esporte'
            ],[
                'tipo_noticia' => 'Música'
            ],[
                'tipo_noticia' => 'Desenvolvimento'
            ],[
                'tipo_noticia' => 'Saúde'
            ]
        ];

        DB::table('tipo_noticias')->insert($dados);
    }
}