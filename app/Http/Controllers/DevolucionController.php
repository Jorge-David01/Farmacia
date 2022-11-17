<?php

namespace App\Http\Controllers;

use App\Models\Devolucion;
use App\Models\DetalleVenta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DevolucionController extends Controller
{


public function index(){
$devoluciones = Devolucion::
select('devolucions.*','productos.nombre_producto')
->join('productos', 'devolucions.id_producto', '=', 'Productos.id')
->paginate(10);
return $devoluciones;
}

    
public function productodevolver($id){

$detalle = DetalleVenta::findOrfail($id);
$detalle->devuelto = 1;
$detalle->save();

$devuelto = new Devolucion();
$devuelto->id_venta = $detalle->id_venta;
$devuelto->id_producto = $detalle->id_producto;
$devuelto->cantidad = $detalle->cantidad;
$devuelto->descuento = $detalle->descuento;
$devuelto->precio = $detalle->precio;
$devuelto->save();

return redirect()->route('detalles.venta',["id"=>$detalle->id_venta]);

}




}