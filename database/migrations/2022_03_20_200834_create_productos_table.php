<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('id_sistema_administrativo')->unique()->nullable();
            $table->string('sku')->unique()->nullable();
            $table->string('nombre')->unique();
            $table->text('descripcion');
            $table->text('caracteristicas')->nullable();
            $table->string('peso')->nullable();
            $table->string('dimensiones')->nullable();
            $table->double('precio', 15, 2)->default(0);
            $table->boolean('promocionado')->default(0);
            $table->integer('numero_ventas')->default(0);
  
            $table->foreignId('categoria_id')->constrained('categorias')->nullable();
            $table->foreignId('subcategoria_id')->constrained('subcategorias');
           // $table->foreignId('modelo_id')->constrained('modelos')->nullable();
           // $table->foreignId('marca_id')->constrained('marcas')->nullable();

            $table->index('id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
