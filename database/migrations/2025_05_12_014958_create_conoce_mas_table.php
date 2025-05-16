<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConoceMasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conoce_mas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('titulo_id')->constrained('titulos');
            $table->string('imagen');
            $table->string('texto_corto');
            $table->text('texto_largo'); // Aquí se almacenará el HTML
            $table->string('ruta');
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
        Schema::dropIfExists('conoce_mas');
    }
}
