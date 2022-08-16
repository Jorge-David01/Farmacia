<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Models\Empleado;
use App\Models\Proveedor;
use App\Models\Producto;
use App\Models\Compra;
use App\Models\Cliente;

use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VentaController;
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

// to only migrate a migrations
// php artisan migrate --path=/database/migrations/2022_07_27_174905_create_clientes_table

//------------------------------------------------------------
//----------------- VENTANAS PRINCIPALES ---------------------
Route::get('/', function () {
    return view('auth.login');
});


Route::get('/Principal',[EmpleadoController::class, 'Principal']);

Route::get('/Principal',[EmpleadoController::class, 'Principal'])->name('principal');

Route::get('/Empleados',[EmpleadoController::class, 'VPEmpleado']);
Route::get('/Proveedores',[EmpleadoController::class, 'VPProveedor']);

Route::get('/Ayuda',[EmpleadoController::class, 'Ayuda']);

//-----------------------------------------------------------
//----------------- RUTAS DE EMPLEADO -----------------------
Route::get('/empleados/nuevo',[EmpleadoController::class, 'create'])->name('empleados.create');

Route::post('/empleados/nuevo',[EmpleadoController::class, 'store'])->name('empleados.store');

Route::get('/Emple/{id}', [EmpleadoController::class, 'show']) -> name('empleado.detalles')-> where('id', '[0-9]+');

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

Route::get('/Editprovee/{id}/editar',[ProveedorController::class, 'Edit']) -> name('edit.proveedor')-> where('id', '[1-9]+');
Route::put('/Editprovee/{id}/editar',[ProveedorController::class, 'Update']) -> name('update.proveedor')-> where('id', '[1-9]+');


Route::post('/Prove/search', [ProveedorController::class, 'sear']) -> name ('funt');


//------------------------------------------------------------
//----------------- RUTAS DE PRODUCTOS -----------------------
Route::get('/productos/nuevo',[ProductoController::class, 'create'])->name('productos.create');
Route::post('/productos/nuevo',[ProductoController::class, 'store'])->name('productos.store');

Route::get('/Producto',[ProductoController::class, 'lista']) -> name('lista.producto');

Route::get('/Detallesproduct/{id}',[ProductoController::class, 'detalles']) -> name('detalles.producto')-> where('id', '[1-9]+');

    Route::get('/productoeditar/{id}/editar',[ProductoController::class, 'edit']) -> name('edit.producto')-> where('id', '[0-9]+');;
    Route::put('/productoeditar/{id}/editar',[ProductoController::class, 'Update']) -> name('update.producto')-> where('id', '[0-9]+');;

// Route::get('/productoeditar/{id}/editar',[ProductoController::class, 'Edit']) -> name('edit.producto');
// Route::put('/productoeditar/{id}/editar',[ProductoController::class, 'Update']) -> name('update.producto');


Route::post('/Produ/busca', [ProductoController::class, 'buscando']) -> name ('producto.busqueda');


//----------------------------------------------------------
//----------------- RUTAS DE COMPRAS -----------------------
Route::get('/compra/nuevo',[CompraController::class, 'create'])->name('compra.create');
Route::post('/compra/nuevo',[CompraController::class, 'store'])->name('compra.store');

Route::post('/compra/editar/{id}',[CompraController::class, 'edit'])->name('compra.editar');
Route::get('/compra/editar/{id}',[CompraController::class, 'edit'])->name('compra.editar');


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



//Route::get('/vencimiento',[CompraController::class, 'Vencimientos']);
Route::get('/vencimiento/{id}',[CompraController::class, 'Vencimiento']) -> where('id', '[1-9]+');
Route::get('/Precio/{id}',[CompraController::class, 'Precio']) -> where('id', '[1-9]+');


Route::get('/vencimiento/{id}',[CompraController::class, 'Vencimiento']) -> where('id', '[1-9]+');
//----------------------------------------------------------
//--------- RUTAS REGISTROS Y AUTENTIFICACIÓN --------------


//----------------------------------------------------------
//----------------- RUTAS CLIENTES------------------------
Route::get('/clientes/nuevo',[ClienteController::class, 'create'])->name('clientes.create');
Route::post('/clientes/nuevo',[ClienteController::class, 'store'])->name('clientes.store');

Route::get('/Cliente',[ClienteController::class, 'list'])->name('lista.clientes');
Route::get('/Vercliente/{id}',[ClienteController::class, 'Ver']) -> name('show.cliente')-> where('id', '[1-9]+');

Route::get('/cliente/{id}/update', [ClienteController::class, 'formulario']) -> name('update.cliente')-> where('id', '[0-9]+');
Route::put('/cliente/{id}/update', [ClienteController::class, 'update']) -> name('cliente.actualizado') -> where('id', '[0-9]+');

//----------------------------------------------------------
//----------------- RUTAS DE VENTAS -----------------------
Route::get('/venta/nuevo',[VentaController::class, 'create'])->name('venta.create');
Route::post('/venta/nuevo',[VentaController::class, 'store'])->name('venta.store');

Route::post('/venta/editar/{id}',[VentaController::class, 'edit'])->name('venta.editar');
Route::get('/venta/editar/{id}',[VentaController::class, 'edit'])->name('venta.editar');


Route::delete('/venta/eliminar/{id}',[VentaController::class, 'eliminar'])->name('venta.eliminar');

Route::get('/venta/eliminar/todo',[VentaController::class, 'destruir'])->name('venta.destruir');

Route::get('/venta/cancelar',[VentaController::class, 'cancelar'])->name('venta.cancelar');

Route::put('/venta/almacenar',[VentaController::class, 'almacenar'])->name('venta.almacenar');

Route::get('/venta/factura/{id}',[VentaController::class, 'factura'])->name('venta.factura');

Route::get('/listaventa',[VentaController::class, 'listaventa']) -> name('lista.venta');

Route::get('/detallesventa/{id}',[VentaController::class, 'detallesventa']) -> name('detalles.venta')-> where('id', '[1-9]+');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/registro', function () {
    return view('auth/register');
});


