<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Models\Empleado;
use App\Models\Proveedor;
use App\Models\Producto;
use App\Models\Compra;

use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CompraController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//------------------------------------------------------------
//----------------- VENTANAS PRINCIPALES ---------------------
Route::get('/', function () {
    return view('login');
});

Route::get('/Principal', function () {
    return view('PaginaPrincipal');
});

Route::get('/Empleados', function () {
    return view('VentanaEmpleados');
});

Route::get('/Proveedores', function () {
    return view('VentanaProveedores');
});


//-----------------------------------------------------------
//----------------- RUTAS DE EMPLEADO -----------------------
Route::get('/empleados/nuevo',[EmpleadoController::class, 'create'])->name('empleados.create');

Route::post('/empleados/nuevo',[EmpleadoController::class, 'store'])->name('empleados.store');

Route::get('/Emple/{id}', [EmpleadoController::class, 'show']) -> name('empleado.detalles')-> where('id', '[0-9]+');

Route::get('/Empleados', function () { return view('VentanaEmpleados');});

Route::get('/Lista',[EmpleadoController::class, 'list']) -> name ('lista');

Route::delete('/empleados/{id}/eliminar',[EmpleadoController::class, 'destroy'])->name('empleados.delete')-> where('id', '[0-9]+');

Route::get('/Empleado/{id}/editar', [EmpleadoController::class, 'edit']) -> name('Editar.empleado')-> where('id', '[0-9]+');

Route::put('/Empleado/{id}/editar', [EmpleadoController::class, 'update']) -> name('actualizar.empleado') -> where('id', '[0-9]+');


//-------------------------------------------------------------
//----------------- RUTAS DE PROVEEDORES -----------------------
Route::get('/Listpro',[ProveedorController::class, 'proveed']) -> name('lista.proveedor');

Route::get('/proveedor/nuevo',[ProveedorController::class, 'nuevo'])->name('proveedor.nuevo');
Route::post('/proveedor/nuevo',[ProveedorController::class, 'crear'])->name('proveedor.crear');

Route::get('/Verprovee/{id}',[ProveedorController::class, 'Ver']) -> name('show.proveedor')-> where('id', '[1-9]+');

Route::get('/Editprovee/{id}/editar',[ProveedorController::class, 'Edit']) -> name('edit.proveedor');
Route::put('/Editprovee/{id}/editar',[ProveedorController::class, 'Update']) -> name('update.proveedor');

Route::delete('/Listpro/{id}/eliminar',[ProveedorController::class, 'Eliminar'])->name('proveedores.delete')-> where('id', '[0-9]+');

Route::post('/Prove/search', [ProveedorController::class, 'sear']) -> name ('funt');


//------------------------------------------------------------
//----------------- RUTAS DE PRODUCTOS -----------------------
Route::get('/productos/nuevo',[ProductoController::class, 'create'])->name('productos.create');
Route::post('/productos/nuevo',[ProductoController::class, 'store'])->name('productos.store');

Route::get('/Producto',[ProductoController::class, 'lista']) -> name('lista.producto');

Route::get('/Detallesproduct/{id}',[ProductoController::class, 'detalles']) -> name('detalles.producto')-> where('id', '[1-9]+');

Route::get('/productoeditar/{id}/editar',[ProductoController::class, 'Edit']) -> name('edit.producto');
Route::put('/productoeditar/{id}/editar',[ProductoController::class, 'Update']) -> name('update.producto');

Route::delete('/Producto/{id}/eliminar',[ProductoController::class, 'delete'])->name('delete.producto')-> where('id', '[0-9]+');


//----------------------------------------------------------
//----------------- RUTAS DE COMPRAS -----------------------
Route::get('/compra/nuevo',[CompraController::class, 'create'])->name('compra.create');
Route::post('/compra/nuevo',[CompraController::class, 'store'])->name('compra.store');

Route::delete('/compra/eliminar/{id}',[CompraController::class, 'eliminar'])->name('compra.eliminar');

Route::get('/compra/eliminar/todo',[CompraController::class, 'destruir'])->name('compra.destruir');

Route::get('/compra/cancelar',[CompraController::class, 'cancelar'])->name('compra.cancelar');

Route::put('/compra/almacenar',[CompraController::class, 'almacenar'])->name('compra.almacenar');

Route::get('/listacompra',[CompraController::class, 'listacompras']) -> name('lista.compras');

Route::get('/detallescompra/{id}',[CompraController::class, 'detailscompra']) -> name('details.compra')-> where('id', '[1-9]+');

Route::delete('/listacompra/{id}/delete',[CompraController::class, 'delete'])->name('compra.delete')-> where('id', '[0-9]+');

Route::post('/compra/buscar', [CompraController::class, 'busqueda']) -> name ('buscador');


//----------------------------------------------------------
//----------------- RUTAS INVENTARIO------------------------
Route::get('/inventarioVista',[CompraController::class, 'inven']) -> name('rio.Inventario');
Route::post('//inventarioVista/buscar', [CompraController::class, 'buscador']) -> name ('busqueda');
