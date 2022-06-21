<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;

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

//----------------- RUTAS DE EMPLEADO -----------------------
Route::get('/empleados/nuevo',[EmpleadoController::class, 'create'])->name('empleados.create');

Route::post('/empleados/nuevos',[EmpleadoController::class, 'store'])->name('empleados.store');

Route::get('/empleados/detalle',[EmpleadoController::class, 'show'])->name('empleados.show');

Route::get('/Lista', function () {
    return view('listaempleados');
});

Route::get('/ListaEmpleados', function () {
    return view('listaempleados');
});

//----------------- RUTAS DE PROVEEDORES -----------------------