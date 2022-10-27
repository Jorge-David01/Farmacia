<?php

use Illuminate\Support\Facades\Route;
use App\Models\Usuario;
use App\Http\Controllers\EmpleadoController;
use App\Models\Empleado;
use App\Models\Proveedor;
use App\Models\Producto;
use App\Models\Compra;
use App\Models\Cliente;
use App\Models\Caja;
use App\Models\caja_respuesta;

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\CotizacionController;
use App\Http\Controllers\KardexController;
use App\Http\Controllers\RoleController;

use App\Http\Controllers\CajaAlivioController;



use App\Http\Controllers\ContraseniaController;

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
//----------------- RUTAS DE CONTRASENIA -----------------------

Route::get('/contrasenia/{id}/{from}',[ContraseniaController::class, 'show'])->name('contrasenia.cambio');
Route::post('/contrasenia/cambio',[ContraseniaController::class, 'cambio'])->name('contrasenia.cambiopost');



//-----------------------------------------------------------
//----------------- RUTAS DE EMPLEADO -----------------------
Route::get('/empleados/nuevo',[EmpleadoController::class, 'create'])->name('empleados.create');

Route::post('/empleados/nuevo',[EmpleadoController::class, 'store'])->name('empleados.store');

Route::get('/empleados', [EmpleadoController::class, 'index'])->name('empleados.index');

Route::get('/Emple/{id}', [EmpleadoController::class, 'show']) -> name('empleado.detalles')-> where('id', '[0-9]+');

Route::get('/Empleado/{id}/editar', [EmpleadoController::class, 'edit']) -> name('Editar.empleado')-> where('id', '[0-9]+');

Route::put('/Empleado/{id}/editar', [EmpleadoController::class, 'update']) -> name('actualizar.empleado') -> where('id', '[0-9]+');
//-------------------------------------------------------------
//----------------- RUTAS DE USUARIOS -----------------------

Route::get('/usuarios/nuevo',[UsuarioController::class, 'create'])->name('usuarios.create');

Route::post('/usuarios/nuevo',[UsuarioController::class, 'store'])->name('usuarios.store');

Route::get('/User/{id}', [UsuarioController::class, 'show']) -> name('usuario.detalles')-> where('id', '[0-9]+');


Route::delete('/usuarios/{id}/eliminar',[UsuarioController::class, 'destroy'])->name('usuarios.delete')-> where('id', '[0-9]+');

Route::get('/Usuario/{id}/editar', [UsuarioController::class, 'edit']) -> name('Editar.usuario')-> where('id', '[0-9]+');

Route::put('/Usuario/{id}/editar', [UsuarioController::class, 'update']) -> name('actualizar.usuario') -> where('id', '[0-9]+');

Route::get('/ListaUsuarios',[UsuarioController::class, 'list']) -> name ('lista');





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

Route::post('/Cliente/busca',[ClienteController::class, 'buscando'])->name('cliente.busqueda');

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

//----------------------------------------------------------
//----------------- RUTAS DE COTIZACION -----------------------
Route::get('/cotizacion/nuevo',[CotizacionController::class, 'create'])->name('cotizacion.create');
Route::post('/cotizacion/nuevo',[CotizacionController::class, 'store'])->name('cotizacion.store');

Route::post('/cotizacion/editar/{id}',[CotizacionController::class, 'edit'])->name('cotizacion.editar');
Route::get('/cotizacion/editar/{id}',[CotizacionController::class, 'edit'])->name('cotizacion.editar');


Route::delete('/cotizacion/eliminar/{id}',[CotizacionController::class, 'eliminar'])->name('cotizacion.eliminar');

Route::get('/cotizacion/eliminar/todo',[CotizacionController::class, 'destruir'])->name('cotizacion.destruir');

Route::get('/cotizacion/cancelar',[CotizacionController::class, 'cancelar'])->name('cotizacion.cancelar');

Route::put('/cotizacion/almacenar',[CotizacionController::class, 'almacenar'])->name('cotizacion.almacenar');

Route::get('/cotizacion/imprimir/{id}',[CotizacionController::class, 'imprimir'])->name('cotizacion.imprimir');

Route::get('/kardex',[KardexController::class, 'index'])->name('kardex.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//----------------------------------------------------------
//----------------- RUTAS DE ROLES ---------------------

//Ruta para lista roles
Route::get('/roles',[RoleController::class,'index'])-> name('roles.index');

//Ruta para crear nuevo Rol
Route::get('rolesnuevo',[RoleController::class,'create'])-> name('roles.create');

//Ruta guardar el nuevo rol
Route::post('rolesnuevo',[RoleController::class,'store']) ->name('roles.store');

Route::get('roles/{id}/editar',[RoleController::class,'edit']) ->name('roles.edit');

//Ruta para actualizar
Route::put('roles/{id}/editar',[RoleController::class, 'update'])->name('roles.update');

Route::get('roles/{id}',[RoleController::class,'show'])->name('roles.show')->where('id','[0-9]+');

Route::delete('roles/{id}',[RoleController::class,'destroy'])->name('roles.destroy')->where('id','[0-9]+');

Route::get('/registro', function () {
    return view('auth/register');
});




//----------------- Caja De Alivio ---------------------

Route::get('/CajaAlivio',[CajaAlivioController::class, 'caja'])->name('caja.alivio');

Route::get('/CajaPregunta/respuesta',[CajaAlivioController::class, 'pregunta'])->name('caja.pregunta');

Route::post('/CajaPregunta/respuesta',[CajaAlivioController::class, 'respuesta'])->name('caja.respuestas');

//----------------------------------------------------------
//----------------- RUTAS DE DEVOLUCION ---------------------

//falta hacer


Route::get('/proveedores/pdf', [ProveedorController::class, 'createPDF'])->name('proveedores.pdf');

Route::get('/productos/pdf', [ProductoController::class, 'createPDF'])->name('productos.pdf');

Route::get('/compras/pdf', [CompraController::class, 'createPDF'])->name('compras.pdf');