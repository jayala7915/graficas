<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfertaLaboralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('oferta_laborals', function (Blueprint $table) {
    $table->id();
    $table->foreignId('socio_id')->constrained('socios')->onDelete('cascade');
    $table->string('puesto_oferta', 255);
    $table->integer('numero_vacantes');
    $table->enum('tipo_vacante', ['presencial', 'semi-presencial', 'remoto']);
    $table->text('descripcion_vacante');
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
        Schema::dropIfExists('oferta_laborals');
    }
}
