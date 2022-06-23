<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Models\Empleado;
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

Route::post('/empleados/nuevo',[EmpleadoController::class, 'store'])->name('empleados.store');



Route::get('/Emple/{id}', [EmpleadoController::class, 'show']) -> name('empleado.detalles')-> where('id', '[0-9]+');

Route::get('/Empleados', function () {
    return view('VentanaEmpleados');
});

Route::get('/Lista',[EmpleadoController::class, 'list']) -> name ('lista');


Route::delete('/empleados/{id}/eliminar',[EmpleadoController::class, 'destroy'])->name('empleados.delete')-> where('id', '[0-9]+');

Route::get('/Empleado/{id}/editar', [EmpleadoController::class, 'edit']) -> name('Editar.empleado')-> where('id', '[0-9]+');

Route::put('/Empleado/{id}/editar', [EmpleadoController::class, 'update']) -> name('actualizar.empleado') -> where('id', '[0-9]+');


//----------------- RUTAS DE PROVEEDORES -----------------------