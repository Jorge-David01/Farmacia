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

    
public function productodevolver(Request $request){

$detalle = DetalleVenta::findOrfail($request->modal_id_detalle);

if($request->modal_cantidad > $detalle->cantidad){    
    return redirect()->route('detalles.venta',["id"=>$detalle->id_venta])->with('Mensaje', 'La cantidad excede a la venta');
}

$detalle->cantidad = $detalle->cantidad - $request->modal_cantidad;
$detalle->save();



$devuelto = new Devolucion();
$devuelto->id_venta = $detalle->id_venta;
$devuelto->id_producto = $detalle->id_producto;
$devuelto->cantidad = $request->modal_cantidad;
$devuelto->descuento = $detalle->descuento;
$devuelto->precio = $detalle->precio;
$devuelto->save();

return redirect()->route('detalles.venta',["id"=>$detalle->id_venta]);

}

public function list(){
    //abort_if(Gate::denies('devolucion_listado'), redirect()->route('principal')->with('denegar','No tiene acceso a esta seccion'));
    $lisdevolucion = Devolucion::paginate(10);
    return view('devolucionProducto/listadevoluciones')->with('lisdevolucion' , $lisdevolucion);
}

    

}