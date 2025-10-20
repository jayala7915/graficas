<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatosEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_empresas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('direccion');
            $table->string('correo');
            $table->string('direccion_pagina')->nullable();
            $table->string('telefono_fijo');
            $table->string('telefono_movil');
            $table->json('redes_sociales')->nullable(); // Almacenará icono, url y estado
            $table->string('logo_empresa')->nullable();
            $table->string('eslogan_empresa')->nullable();
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
        Schema::dropIfExists('datos_empresas');
    }
}
