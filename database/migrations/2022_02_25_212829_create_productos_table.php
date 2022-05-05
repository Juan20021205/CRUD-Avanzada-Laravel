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
        Schema::create('productos', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->Increments('Id');
            $table->string('NombreProduc','50');
            $table->integer('Costo');
            $table->integer('Precio');
            $table->integer('Cantidad');
            $table->unsignedInteger('IdMarca');
            $table->string('Foto');
            $table->foreign('IdMarca')->references('Id')->on('marcas')->onDelete("cascade");
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
        Schema::dropIfExists('productos');
    }
};
