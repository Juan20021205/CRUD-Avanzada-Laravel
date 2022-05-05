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
            $table->engine="InnoDB";
            $table->Increments('Id');
            $table->string('Email','50');
            $table->String('Contraseña','50');
            $table->string('Nombre','50');
            $table->unsignedInteger('IdEstado');
            $table->string('Foto');
            $table->unsignedInteger('IdRol');
            $table->foreign('IdRol')->references('Id')->on('rols')->onDelete("cascade");
            $table->foreign('IdEstado')->references('Id')->on('estados')->onDelete("cascade");
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
        Schema::dropIfExists('usuarios');
    }
};
