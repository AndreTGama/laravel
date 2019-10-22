<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArquivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('arquivos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('descricao_arquivo');
            $table->longText('arquivo');
            $table->timestamps();
        });
        Schema::table('arquivos', function($table) {
            $table->bigInteger('noticia_id')->unsigned()->index();
            $table->foreign('noticia_id')
                    ->references('id')->on('noticias')
                    ->onDelete('cascade');
        });
        Schema::enableForeignKeyConstraints();
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('arquivos');
        Schema::enableForeignKeyConstraints();
    }
}
