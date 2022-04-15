<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('marca_id')->constrained('marcas');
            $table->foreignId('modelo_id')->constrained('modelos');
            $table->string('tipo');
            $table->string('cc');
            $table->string('modelo_motor');
            $table->string('kw');
            $table->string('cv');
            $table->string('ano_fabricacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehiculos');
    }
}
