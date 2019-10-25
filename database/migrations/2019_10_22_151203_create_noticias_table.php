<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('noticias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('titulo_noticia');
            $table->longText('noticia');
            $table->timestamps();
        });
        Schema::table('noticias', function($table) {
            $table->bigInteger('tipo_noticias_id')->unsigned()->index();
            $table->foreign('tipo_noticias_id')
                    ->references('id')->on('tipo_noticias')
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
        Schema::dropIfExists('noticias');
    }
}
