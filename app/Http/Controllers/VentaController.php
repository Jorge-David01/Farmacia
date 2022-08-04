<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\cliente;
use App\Models\Producto;
use App\Models\TemporalVenta;
use App\Models\DetalleVenta;
use App\Models\DetalleCompra;
use Illuminate\Http\Request;
use App\Http\Requests\StoreVentaRequest;
use App\Http\Requests\UpdateVentaRequest;

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
        $productos = Producto::all();
        $clientes = cliente::all();
        $temporal = TemporalVenta::all();
        $numero =  $request->get('factura');
        $idcliente = $request->get('cliente');

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
        ->with('clientenomb',$clientenomb);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVentaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $fecha_actual = date("d-m-Y");
        $maxima = date("d-m-Y",strtotime($fecha_actual."+ 30 days"));
        $this->validate($request, [
            'factura' => 'required|unique:compras,numero_factura',
            'productos' => 'required|exists:productos,id',
            'cliente' => 'required|exists:clientes,id',
            "cantidad" => "required|min:1|numeric|max:999999999",

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
        ]);

        $temporals = new TemporalVenta();

        $pre = DetalleCompra::where("id_producto",$request->input('productos'))->first();

        $temporals->id_producto = $request->input('productos');
        $temporals->cantidad = $request->input('cantidad');
        $temporals->precio = $pre->precio_publico;

        $temporals->save();

        $numero =  $request->get('factura');
        $idcliente = $request->get('cliente');
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
        ->with('clientenomb',$clientenomb);
    }

    public function eliminar(Request $request,$id){
        TemporalVenta::destroy($id);

        $numero =  $request->get('factura');
        $idproveedor = $request->get('proveedor');

        return redirect()->route('venta.create',['factura'=>$numero,'proveedor'=>$idproveedor]);
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function show(Venta $venta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function edit(Venta $venta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVentaRequest  $request
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVentaRequest $request, Venta $venta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venta $venta)
    {
        //
    }
}
