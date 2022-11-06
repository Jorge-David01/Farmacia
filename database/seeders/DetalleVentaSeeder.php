<?php

namespace Database\Seeders;
use App\Models\DetalleVenta;
use Illuminate\Database\Seeder;

class DetalleVentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DetalleVenta::Factory(200)->create();
        //
    }
}
