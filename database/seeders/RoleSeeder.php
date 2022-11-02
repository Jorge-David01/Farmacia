<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();

        Role::create([
            'name' => 'Administrador',
            'descripcion' => 'Este rol sera el rol maestro con todos los permisos,
            se encargara de la organización, de la dirección y control de la farmacia',
        ]);
        Role::create([
            'name' => 'Vendedor',
            'descripcion' => 'Este rol sera el rol para los vendedores, no se limita simplemente a vender
            y brindar el servicio al cliente, sino que tambien lograr determinados objetivos',
        ]);
        $user1 = User::create(
            [
                'name' => 'Usuario 1',
                'email_verified_at'=> null,
                'email' => 'admin@gmail.com',
                'role' => 'Administrador',
                'password' => '$2y$10$AluNc8YndjBpdof62Q4wAesLlvzCLwgkUh.QzutYZjfi8Y8YZN4KC',
            ]
        );
        $user2 = User::create(
            [
                'name' => 'Usuario 2',
                'email_verified_at'=> null,
                'email' => 'vendedor@gmail.com',
                'role' => 'Vendedor',
                'password' => '$2y$10$AluNc8YndjBpdof62Q4wAesLlvzCLwgkUh.QzutYZjfi8Y8YZN4KC',
            ]
        );

        $user1->assignRole('Administrador');
        $user2->assignRole('Vendedor');
    }
}
