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
            'name' => 'Admin',
        ]);

        Role::create([
            'name' => 'Doctor',
        ]);

        Role::create([
            'name' => 'Vendedor',
        ]);

        $user1 = User::create(
            [
                'name' => 'Usuario 1',
                'email_verified_at'=> null,
                'email' => 'admin01@gmail.com',
                'password' => '$2y$10$AluNc8YndjBpdof62Q4wAesLlvzCLwgkUh.QzutYZjfi8Y8YZN4KC',
            ]
        );

        $user2 = User::create(
            [
                'name' => 'Usuario 2',
                'email_verified_at'=> null,
                'email' => 'admin02@gmail.com',
                'password' => '$2y$10$AluNc8YndjBpdof62Q4wAesLlvzCLwgkUh.QzutYZjfi8Y8YZN4KC',
            ]
        );

        $user3 = User::create(
            [
                'name' => 'Usuario 3',
                'email_verified_at'=> null,
                'email' => 'admin03@gmail.com',
                'password' => '$2y$10$AluNc8YndjBpdof62Q4wAesLlvzCLwgkUh.QzutYZjfi8Y8YZN4KC',
            ]
        );

        $user1->assignRole('Admin');
        $user2->assignRole('Doctor');
        $user3->assignRole('Vendedor');
    }
}
