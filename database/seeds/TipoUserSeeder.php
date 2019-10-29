<?php

use Illuminate\Database\Seeder;

class TipoUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dados = [
            [
                 'tipo_user' => 'Aluno'
             ],[
                 'tipo_user' => 'coordenador'
             ],[
                 'tipo_user' => 'Diretor'
             ],[
                 'tipo_user' => 'faxineiro'
             ],[
                 'tipo_user' => 'Pais '
             ],[
                 'tipo_user' => 'Prefeito'
             ],[
                 'tipo_user' => 'Professor'
             ],[
                 'tipo_user' => 'zelador '
             ]
         ];
 
         DB::table('tipo_users')->insert($dados);
    }
}
