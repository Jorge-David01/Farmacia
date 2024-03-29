<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventarios', function (Blueprint $table) {
            $table->id();

         
            $table->integer("id_producto");
            $table->integer("cantidad");
           

          //   $table->string("nombre_producto");
          //   $table->integer("cantidad");
          //  $table->unsignedBigInteger('id_producto');
          //  $table->foreign("id_producto")->references("id")->on("productos");

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
        Schema::dropIfExists('inventarios');
    }
}
