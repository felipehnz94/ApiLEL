<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->string('id', 20)->unique()->comment('Docuemnto de Identidad del estudiante');
            $table->integer('id_colegio')->unsigned();
            $table->string('nombre', 50);
            $table->string('apellidos', 50);
            $table->char('grado', 2);
            $table->string('correo', 50);
            $table->string('password');
            $table->string('api_token')->comment('Token para acceder a la API, se auto-genera al registrar.')->unique();
            $table->timestamp('fecha_registro')->comment('Fecha en la que se registro el Estudiante');
            $table->timestamps();

            // Index´s
            $table->primary('id');
            $table->index('api_token');

            // Relationships
            $table->foreign('id_colegio')
                  ->references('id')->on('colegios')
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
        Schema::drop('estudiantes');
    }
}
