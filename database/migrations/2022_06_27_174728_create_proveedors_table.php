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
            $table->string("Telefono_del_proveedor")->unique();
            $table->string("Telefono_del_distribuidor")->unique();
            $table->string("Correo_electronico")->unique();
            $table->string("Archivo")->nullable();
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
