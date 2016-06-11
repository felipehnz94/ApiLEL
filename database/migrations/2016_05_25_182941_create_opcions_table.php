<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpcionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opciones', function (Blueprint $table) {
            $table->char('id', 10)->unique()->comment('Campo compuesto por Id pregunta + Opción. Ej: 111 + A');
            $table->char('id_pregunta', 6);
            $table->string('opcion', 140)->comment('Descripción de la opción de una pregunta, limite de caracteres 140.');
            $table->boolean('es_correcta')->default(0)->comment('1: Es la opción correcta, 2: Es la incorrecta.');

            // Index´s
            $table->primary('id');

            // Relationships
            $table->foreign('id_pregunta')
                  ->references('id')->on('preguntas')
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
        Schema::drop('opciones');
    }
}
