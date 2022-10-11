<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // spatie documentation
        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();

        $permissions = [
            //doctor
            'compra_listado',
            'compra_detalle',
            'kardex',
            'producto_listado',
            'producto_detalle',
            'cliente_lista',
            'venta_nuevo',
            'venta_listado',
            'venta_detalle',
            'factura',
            'caja_nuevo',
            'caja_pregunta',
            'caja_respuesta',
            //vendedor
            'cliente_nuevo',
            'cliente_actualizar',
            'inventario',
            'cotizacion_nuevo',
            'cotizacion_imprimir',
            'cotizacion_editar',
            'producto_nuevo',
            'producto_actualizar',
            'proveedor_listado',
            'proveedor_detalle',
            'proveedor_nuevo',
            'proveedor_actualizar',

            //admin
            'role_listado',
            'role_nuevo',
            'role_actualizar',
            'role_eliminar',
            'usuario_lista',
            'empleado_nuevo',
            'empleado_detalles',
            'empleado_actualizar',
            'compra_nuevo',
            'compra_eliminar',
            'compra_destruir',
            'compra_cancelar',
            'compra_almacenar',
            'devolucion',
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission
            ]);
        }
    }
}
