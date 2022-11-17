<<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViewInventarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS `actualizar_inventario`');

            DB::unprepared('CREATE TRIGGER actualizar_inventario
            before insert on detalle_compras for each row
            begin

            Declare var int default 0;
            Declare suma int default 0;


                if new.cantidad < 0 then
                    set new.cantidad= 0;
                end if;
                
                if exists(select id_producto from inventarios where id_producto = new.id_producto) then
                select id into var from inventarios where id_producto = new.id_producto;
                update inventarios set cantidad =  cantidad + new.cantidad  where id = var;
                else
                    insert into inventarios(id_producto, cantidad)
                    values (new.id_producto, new.cantidad);
                end if;
                
            end
            ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS `actualizar_inventario`');
    }
}
