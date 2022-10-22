<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleHasPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();

        $administrador_permissions = Permission::all();
        $vendedor_permissions = Permission::whereBetween('id', [1, 19]);

        // Admin
            Role::findOrFail(1)->permissions()->sync($administrador_permissions->pluck('id'));
        //vendedor
            Role::findOrFail(2)->permissions()->sync($vendedor_permissions->pluck('id'));


    }
}
