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

Route::get('/Lista', function () {
    return view('listaempleados');
});



//Rutas para Detalles 

Route::get('/empleados/detalle',[EmpleadoController::class, 'show'])
->name('empleados.show');


Route::get('/Empleados', function () {
    return view('VentanaEmpleados');
});





