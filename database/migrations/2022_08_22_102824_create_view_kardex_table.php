<<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateViewKardexTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        DB::statement(" CREATE VIEW kardex AS
        (SELECT nombre_producto, cantidad, precio, CONCAT('venta') AS tipo,date(detalle_ventas.created_at) AS created_at
        FROM detalle_ventas
        JOIN productos ON productos.id = detalle_ventas.id_producto)
        UNION ALL
        (SELECT nombre_producto, cantidad, precio_publico AS precio, CONCAT('compra') AS tipo, date(detalle_compras.created_at) AS created_at
        FROM detalle_compras
        JOIN productos ON productos.id = detalle_compras.id_producto)
        ORDER BY created_at desc ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS kardex;");
    }
}
