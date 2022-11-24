<?php

namespace App\Http\Controllers;

use App\Models\Cotizacion;
use App\Models\cliente;
use App\Models\Producto;
use App\Models\DetalleCompra;
use App\Models\TemporalCotizacion;
use App\Models\DetalleCotizacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreCotizacionRequest;
use App\Http\Requests\UpdateCotizacionRequest;
use Illuminate\Support\Facades\Gate;

class CotizacionController extends Controller
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
    public function __construct(){
        $this->middleware('auth');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        abort_if(Gate::denies('cotizacion_nuevo'), redirect()->route('principal')->with('denegar','No tiene acceso a esta seccion'));
        $productos = Producto::select("productos.id","productos.nombre_producto",
        db::raw("max(detalle_compras.precio_publico) AS precio_publico"))
        ->rightjoin("detalle_compras","productos.id", "=", "detalle_compras.id_producto")
        ->groupby("productos.id")->get();

        $clientes = cliente::all();
        $temporal = TemporalCotizacion::all();
        $idcliente = $request->get('cliente');

        if (isset($idcliente)) {
            $cli = cliente::select('nombre_cliente')
            ->where('id',$idcliente)->first();
            $clientenomb = $cli->nombre_cliente;
        }else{
            $clientenomb = "";
        }

        return view('cotizacion/create')
        ->with('productos',$productos)
        ->with('temporal',$temporal)
        ->with('clientes',$clientes)
        ->with('idcliente',$idcliente)
        ->with('clientenomb',$clientenomb);
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCotizacionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        abort_if(Gate::denies('cotizacion_nuevo'), redirect()->route('principal')->with('denegar','No tiene acceso a esta seccion'));
        $fecha_actual = date("d-m-Y");
        $maxima = date("d-m-Y",strtotime($fecha_actual."+ 30 days"));
        $this->validate($request, [
            'productos' => 'required|exists:productos,id',
            'cliente' => 'required|exists:clientes,id',
            "cantidad" => "required|min:1|numeric|max:999999999",
            "descuento" => "required|min:0|numeric|max:100",

        ], [
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

        $temporals = new TemporalCotizacion();

        $pre = DetalleCompra::where("id_producto",$request->input('productos'))->first();

        $temporals->id_producto = $request->input('productos');
        $temporals->cantidad = $request->input('cantidad');
        $temporals->descuento = $request->input('descuento');
        $temporals->precio = $pre->precio_publico;

        $temporals->save();

        $idcliente = $request->get('cliente');

        $cli = cliente::select('nombre_cliente')
            ->where('id',$idcliente)->first();
            $clientenomb = $cli->nombre_cliente;


            $productos = Producto::select("productos.id","productos.nombre_producto",
            db::raw("max(detalle_compras.precio_publico) AS precio_publico"))
            ->rightjoin("detalle_compras","productos.id", "=", "detalle_compras.id_producto")
            ->groupby("productos.id")->get();
            $clientes = cliente::all();
            $temporal = TemporalCotizacion::all();

        return view('cotizacion/create')
        ->with('productos',$productos)
        ->with('temporal',$temporal)
        ->with('clientes',$clientes)

        ->with('idcliente',$idcliente)
        ->with('clientenomb',$clientenomb);
    }

    public function eliminar(Request $request,$id){
        TemporalCotizacion::destroy($id);

        $idcliente = $request->get('cliente');
        return redirect()->route('cotizacion.create',['cliente'=>$idcliente]);
    }

    public function destruir(){
        $temporal = TemporalCotizacion::all();

        foreach ($temporal as $temp) {
            TemporalCotizacion::destroy($temp->id);
        }

        return redirect()->route('cotizacion.create');
    }

    public function cancelar(){
        $temporal = TemporalCotizacion::all();

        foreach ($temporal as $temp) {
            TemporalCotizacion::destroy($temp->id);
        }

        return redirect()->route('cotizacion.create');
    }

    public function almacenar(Request $request){

        $cotizacion = new Cotizacion();
        $cotizacion->id_cliente = $request->get('cliente');

        $cotizacion->save();

        $temporal = TemporalCotizacion::all();

        foreach ($temporal as $temp) {

            $detalle = new DetalleCotizacion();
            $detalle->id_cotizacions = $cotizacion->id;
            $detalle->id_producto = $temp->id_producto;
            $detalle->cantidad = $temp->cantidad;
            $detalle->descuento = $temp->descuento;
            $detalle->precio =  $temp->precio;
            $detalle->save();

            TemporalCotizacion::destroy($temp->id);
        }

        return redirect()->route('cotizacion.imprimir',["id"=>$cotizacion->id]);
    }

    public function imprimir($id)
    {
        abort_if(Gate::denies('cotizacion_imprimir'), redirect()->route('principal')->with('denegar','No tiene acceso a esta seccion'));
        $cotizacion = Cotizacion::findOrFail($id);
        return view('cotizacion/imprimir')->with('cotizacion', $cotizacion);
    }

    public function edit(Request $request,$id){
        abort_if(Gate::denies('cotizacion_editar'), redirect()->route('principal')->with('denegar','No tiene acceso a esta seccion'));
        if ($request->input('cantidad'.$id) != "" && $request->input('cantidad'.$id) > 0 ) {
            $cambio = TemporalCotizacion::findOrFail($id);

        $cambio->cantidad = $request->input('cantidad'.$id);

        $cambio->save();

        }


        $idcliente = $request->get('cliente');


        return redirect()->route('cotizacion.create',['cliente'=>$idcliente]);
    }

}
