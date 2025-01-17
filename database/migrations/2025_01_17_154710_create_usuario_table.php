<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombreUs');
            $table->string('apellidosUs');
            $table->unsignedBigInteger('tipo_documento_id');
            $table->string('numDocu')->unique();
            $table->unsignedBigInteger('departamento_id');
            $table->unsignedBigInteger('ciudad_id');
            $table->string('direccion');
            $table->unsignedBigInteger('rol_id');
            $table->string('telefono');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps(); // Fecha de creación y modificación

            // Foreign keys
            $table->foreign('tipo_documento_id')->references('id')->on('tipo_documento')->onDelete('cascade');
            $table->foreign('departamento_id')->references('id')->on('departamentos')->onDelete('cascade');
            $table->foreign('ciudad_id')->references('id')->on('ciudades')->onDelete('cascade');
            $table->foreign('rol_id')->references('id')->on('roles')->onDelete('cascade');
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('usuarios');
    }
};
