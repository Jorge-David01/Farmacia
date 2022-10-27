<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DetalleCompra;
class DetalleCompraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DetalleCompra::Factory(100)->create();
    }
}