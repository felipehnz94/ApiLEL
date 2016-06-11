<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRespuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuestas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_estudiante',20);
            $table->char('id_opcion', 10);

            // Relationships
            $table->foreign('id_estudiante')
                  ->references('id')->on('estudiantes')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->foreign('id_opcion')
                  ->references('id')->on('opciones')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('respuestas');
    }
}
