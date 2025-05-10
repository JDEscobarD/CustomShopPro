<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductManagementTables extends Migration
{
    public function up()
    {
        // Tablas principales
        Schema::create('composition_types', function (Blueprint $table) {
            $table->id();
            $table->string('opcion');
            $table->timestamps();
        });

        Schema::create('formats', function (Blueprint $table) {
            $table->id();
            $table->string('formato');
            $table->timestamps();
        });

        // Tabla principal de productos
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->decimal('precio_regular', 10, 2);
            $table->decimal('precio_oferta', 10, 2)->nullable();
            $table->foreignId('composition_option_id')->constrained('composition_types');
            $table->foreignId('format_id')->constrained();
            $table->foreignId('category_id')->constrained();
            $table->integer('unidades_disponibles')->default(0);
            $table->string('imagen_portada')->nullable();
            $table->string('url')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        // Tablas relacionadas
        Schema::create('product_attributes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained();
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->timestamps();
        });

        Schema::create('product_compositions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained();
            $table->string('nombre_campo');
            $table->foreignId('category_id')->nullable()->constrained();
            $table->foreignId('articulo_id')->nullable()->constrained('articulos');
            $table->decimal('precio_adicional', 10, 2)->default(0);
            $table->timestamps();
        });

        Schema::create('product_shippings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained();
            $table->boolean('envio_gratis')->default(false);
            $table->decimal('costo_envio', 10, 2)->nullable();
            $table->timestamps();
        });

        Schema::create('product_galleries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained();
            $table->string('imagen_url');
            $table->integer('orden');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_galleries');
        Schema::dropIfExists('product_shippings');
        Schema::dropIfExists('product_compositions');
        Schema::dropIfExists('product_attributes');
        Schema::dropIfExists('products');
        Schema::dropIfExists('formats');
        Schema::dropIfExists('composition_types');
    }
}