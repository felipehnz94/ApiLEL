<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerfilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perfiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_estudiante', 20);
            $table->integer('id_categoria')->unsigned();
            $table->timestamps();

            // Relationships
            $table->foreign('id_estudiante')
                  ->references('id')->on('estudiantes')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->foreign('id_categoria')
                  ->references('id')->on('categorias')
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
        Schema::drop('perfiles');
    }
}
