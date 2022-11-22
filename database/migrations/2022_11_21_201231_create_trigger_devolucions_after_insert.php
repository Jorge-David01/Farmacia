<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTriggerDevolucionsAfterInsert extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        DB::unprepared('
        CREATE TRIGGER trigger_devolucions_after_insert BEFORE INSERT ON `devolucions` FOR EACH ROW
        BEGIN

        DECLARE ci INTEGER;
        SET ci = ( IFNULL((SELECT pp.cantidad FROM inventarios AS pp WHERE pp.id_producto = new.id_producto),0));       
        
        update inventarios as a set cantidad =  (ci+new.cantidad) where a.id_producto = new.id_producto;
       
        END
        ');
 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `trigger_devolucions_after_insert`');
    }
}
