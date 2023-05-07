<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViewAlivioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS `caja_alivio`');
        DB::unprepared('CREATE TRIGGER caja_alivio
        before insert on caja_respuestas for each row
        begin

            if new.respuesta = "si" or new.respuesta= "Si" then
                insert into cajas(Descripcion, Saldo, fecha)
                        values ("La caja se ha vaciado", "3000", now() );
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
        DB::unprepared('DROP TRIGGER IF EXISTS `caja_alivio`');
    }
}
