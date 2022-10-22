<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\cliente;
use App\Models\Producto;
use App\Models\TemporalVenta;
use App\Models\DetalleVenta;
use App\Models\DetalleCompra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreVentaRequest;
use App\Http\Requests\UpdateVentaRequest;
use Illuminate\Support\Facades\Gate;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        abort_if(Gate::denies('venta_nuevo'), redirect()->route('principal')->with('denegar','No tiene acceso a esta seccion'));
        $productos = Producto::all();
        $clientes = cliente::all();
        $temporal = TemporalVenta::all();
        $numero =  $request->get('factura');
        $idcliente = $request->get('cliente');
        $idpago = $request->get('pago');

        $venta = Venta::select(DB::raw("max(numero_factura) as factura"))->first();

            $numero = $venta->factura+1;

            if ($numero == "") {
                $numero = 1;
            }




        if (isset($idcliente)) {
            $cli = cliente::select('nombre_cliente')
            ->where('id',$idcliente)->first();
            $clientenomb = $cli->nombre_cliente;
        }else{
            $clientenomb = "";
        }

        return view('venta/create')
        ->with('productos',$productos)
        ->with('temporal',$temporal)
        ->with('clientes',$clientes)
        ->with('numero',$numero)
        ->with('idcliente',$idcliente)
        ->with('idpago',$idpago)
        ->with('clientenomb',$clientenomb)
        ->with('numero',$numero);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVentaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort_if(Gate::denies('venta_nuevo'), redirect()->route('principal')->with('denegar','No tiene acceso a esta seccion'));

        $fecha_actual = date("d-m-Y");
        $maxima = date("d-m-Y",strtotime($fecha_actual."+ 30 days"));
        $this->validate($request, [
            'factura' => 'required|unique:ventas,numero_factura',
            'productos' => 'required|exists:productos,id',
            'cliente' => 'required|exists:clientes,id',
            "cantidad" => "required|min:1|numeric|max:999999999",
            "descuento" => "required|min:0|numeric|max:100",

        ], [
            'factura.required' => 'Debe de ingresar el numero de factura',
            'factura.unique' => 'El numero de factura es invalido',
            'productos.required' => 'Debe de seleccionar un producto',
            'productos.exists' => 'El producto seleccionado es invalido',
            'cliente.required' => 'Debe de seleccionar un cliente',
            'cliente.exists' => 'El cliente seleccionado es invalido',
            'cantidad.required' => 'La cantidad es obligatorio',
            'cantidad.max' => 'La cantidad ingresada es demasiado grande',
            'cantidad.min' => 'La cantidad no puede ser negativa',
            'cantidad.numeric' => 'La cantidad debe de ser un valor numérico',
            'descuento.required' => 'El descuento es obligatorio',
            'descuento.max' => 'El descuento ingresada es demasiado grande',
            'descuento.min' => 'El descuento no puede ser negativa',
            'descuento.numeric' => 'El descuento debe de ser un valor numérico',
        ]);

        $temporals = new TemporalVenta();

        $pre = DetalleCompra::where("id_producto",$request->input('productos'))->first();

        $temporals->id_producto = $request->input('productos');
        $temporals->cantidad = $request->input('cantidad');
        $temporals->descuento = $request->input('descuento');
        $temporals->precio = $pre->precio_publico;

        $temporals->save();

        $numero =  $request->get('factura');
        $idcliente = $request->get('cliente');
        $idpago = $request->get('pago');
        $cli = cliente::select('nombre_cliente')
            ->where('id',$idcliente)->first();
            $clientenomb = $cli->nombre_cliente;


            $productos = Producto::all();
            $clientes = cliente::all();
            $temporal = TemporalVenta::all();

        return view('venta/create')
        ->with('productos',$productos)
        ->with('temporal',$temporal)
        ->with('clientes',$clientes)
        ->with('numero',$numero)
        ->with('idcliente',$idcliente)
        ->with('idpago',$idpago)
        ->with('clientenomb',$clientenomb);
    }

    public function eliminar(Request $request,$id){
        TemporalVenta::destroy($id);

        $numero =  $request->get('factura');
        $idcliente = $request->get('cliente');
        $idpago = $request->get('pago');
        return redirect()->route('venta.create',['factura'=>$numero,'cliente'=>$idcliente,'pago'=>$idpago]);
    }

    public function destruir(){
        $temporal = TemporalVenta::all();

        foreach ($temporal as $temp) {
            TemporalVenta::destroy($temp->id);
        }

        return redirect()->route('venta.create');
    }

    public function cancelar(){
        $temporal = TemporalVenta::all();

        foreach ($temporal as $temp) {
            TemporalVenta::destroy($temp->id);
        }

        return redirect()->route('venta.create');
    }

    public function almacenar(Request $request){

        $venta = new Venta();

        $venta->numero_factura = $request->get('factura');
        $venta->id_cliente = $request->get('cliente');
        $venta->pago = $request->get('pago');

        $venta->save();

        $temporal = TemporalVenta::all();

        foreach ($temporal as $temp) {

            $detalle = new DetalleVenta();

            $detalle->id_venta = $venta->id;
            $detalle->id_producto = $temp->id_producto;
            $detalle->cantidad = $temp->cantidad;
            $detalle->descuento = $temp->descuento;
            $detalle->precio =  $temp->precio;

            $detalle->save();

            TemporalVenta::destroy($temp->id);
        }

        return redirect()->route('venta.factura',["id"=>$venta->id]);
    }

    public function factura($id)
    {
        abort_if(Gate::denies('factura'), redirect()->route('principal')->with('denegar','No tiene acceso a esta seccion'));
        $venta = Venta::findOrFail($id);
        return view('venta/factura')->with('venta', $venta);
    }

    public function edit(Request $request,$id){
        if ($request->input('cantidad'.$id) != "" && $request->input('cantidad'.$id) > 0 ) {
            $cambio = TemporalVenta::findOrFail($id);

        $cambio->cantidad = $request->input('cantidad'.$id);

        $cambio->save();

        }

        $numero =  $request->get('factura');
        $idcliente = $request->get('cliente');
        $idpago = $request->get('pago');

        return redirect()->route('venta.create',['factura'=>$numero,'cliente'=>$idcliente,'pago'=>$idpago]);
    }

    public function listaventa(){
        abort_if(Gate::denies('venta_listado'), redirect()->route('principal')->with('denegar','No tiene acceso a esta seccion'));
        $lista = Venta::paginate(10) ;
       
     
         return view('venta/listaventa')->with('lista' , $lista);

    }


    public function detallesventa($id){
        abort_if(Gate::denies('venta_detalle'), redirect()->route('principal')->with('denegar','No tiene acceso a esta seccion'));
       
        $factu = Venta::findOrfail($id);

       
        $name = DB::table('detalle_ventas')
        ->join('Productos', 'detalle_ventas.id_producto', '=', 'Productos.id')
        ->where('detalle_ventas.id_venta', '=', $id)
        ->select('nombre_producto')
        ->get();

        $detalles = DB::table('ventas')
        ->join('detalle_ventas', 'ventas.id', '=', 'detalle_ventas.id_venta')
        ->where('detalle_ventas.id_venta', '=', $id)
        ->select('id_venta' , 'id_producto', 'cantidad' , 'descuento', 'precio')
        ->get();

     


         return view('venta/detallesventa')->with('detalles' , $detalles)->with('factu' , $factu)->with('name', $name);

    }



}
