<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectoriosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directorios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('titulo_id')->constrained('titulos');
            $table->string('imagen');
            $table->string('nombre');
            $table->string('cargo');
            $table->text('texto');
            $table->text('texto_descripcion_direc');
            $table->enum('rango_pagina', ['Cabecera', 'Medio', 'Carousel']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('directorios');
    }
}
