<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProveedorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedors', function (Blueprint $table) {
            $table->id();
            $table->string("Nombre_del_proveedor");
            $table->string("Nombre_del_distribuidor");
            $table->string("Tipo_de_proveedor");
            $table->string("Telefono_del_proveedor");
            $table->string("Telefono_del_distribuidor");
            $table->string("Correo_electronico");
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
        Schema::dropIfExists('proveedors');
    }
}
