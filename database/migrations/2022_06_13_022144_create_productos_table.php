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
            $table->id();
            $table->integer("cod_marca");
            $table->integer("cod_categ");
            $table->integer("cod_prov");
            $table->string("cod_orig_prod")->unique();
            $table->string("nombre",100);
            $table->integer("stock");
            $table->float("precio");
            $table->timestamps();
            $table->foreign('cod_marca')->references('id')->on('marcas');
            $table->foreign('cod_categ')->references('id')->on('categorias');
            $table->foreign('cod_prov')->references('id')->on('proveedores');
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
