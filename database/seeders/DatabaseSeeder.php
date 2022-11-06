<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $this->call(PermissionSeeder::class);
       $this->call(RoleSeeder::class);
       $this->call(RoleHasPermissionSeeder::class);
       $this->call(ProveedorSeeder::class);
       $this->call(ProductoSeeder::class);
       $this->call(CompraSeeder::class);
       $this->call(DetalleCompraSeeder::class);
       $this->call(ClienteSeeder::class);
       $this->call(EmpleadoSeeder::class);
       $this->call(VentaSeeder::class);
       $this->call(DetalleVentaSeeder::class);
    }
}
