<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preguntas', function (Blueprint $table) {
            $table->char('id', 6)->unique()->comment('Campo compuesto por Id de Categoria + Id de Nivel + No. de Pregunta');
            $table->integer('id_nivel')->unsigned();
            $table->string('pregunta', 255);

            // Index´s
            $table->primary('id');

            // Relationships
            $table->foreign('id_nivel')
                  ->references('id')->on('niveles')
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
        Schema::drop('preguntas');
    }
}
