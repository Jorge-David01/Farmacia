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

Route::get('/Principal', function () {
    return view('PaginaPrincipal');
});

//CREACION DE EMPLEADO
Route::get('/empleados/nuevo',[EmpleadoController::class, 'create'])
    ->name('empleados.create');

Route::post('/empleados/nuevo',[EmpleadoController::class, 'store'])
    ->name('empleados.store');

Route::get('/Proveedores', function () {
    return view('VentanaProveedores');
});

Route::get('/', function () {
    return view('login');
});


//Ruta de la lista de empleados
Route::get('/Lista',[EmpleadoController::class, 'list']) -> name ('lista');


//Rutas para los detalles de cada empleado

Route::get('/Emple/{id}', [EmpleadoController::class, 'show']) -> name('empleado.detalles')-> where('id', '[0-9]+');


Route::get('/Empleados', function () {
    return view('VentanaEmpleados');
});







