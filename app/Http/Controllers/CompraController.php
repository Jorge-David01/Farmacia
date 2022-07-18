<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Temporal;
use App\Models\DetalleCompra;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCompraRequest;
use App\Http\Requests\UpdateCompraRequest;
use Illuminate\Support\Facades\DB;


class CompraController extends Controller
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
        $proveedor = Proveedor::all();
        $temporal = Temporal::all();
        $numero =  $request->get('factura');
        $pago =  $request->get('pago');
        $idproveedor = $request->get('proveedor');

        if (isset($idproveedor)) {
            $pro = Proveedor::select('Nombre_del_proveedor')
            ->where('id',$idproveedor)->first();
            $proveedornomb = $pro->Nombre_del_proveedor;
        }else{
            $proveedornomb = "";
        }

        return view('compra/create')
        ->with('productos',$productos)
        ->with('temporal',$temporal)
        ->with('proveedor',$proveedor)
        ->with('numero',$numero)
        ->with('pago',$pago)
        ->with('idproveedor',$idproveedor)
        ->with('proveedornomb',$proveedornomb);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCompraRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $compra = $request->input('compra')+0.01;

        $fecha_actual = date("d-m-Y");
        $maxima = date("d-m-Y",strtotime($fecha_actual."+ 30 days"));
        $this->validate($request, [
            'factura' => 'required|unique:compras,numero_factura',
            'productos' => 'required|exists:productos,id',
            'proveedor' => 'required|exists:proveedors,id',
            "cantidad" => "required|min:1|numeric|max:999999999",
            "lote" => "required|min:1|numeric|max:999999999",
            "vencimiento" => "required|date|after:'.$maxima.",
            "pago" => "required|date|after:'.$fecha_actual.",
            "compra" => 'required|numeric|min:1',
            "venta" => 'required|numeric|max:999999.99|min:'.$compra,

        ], [
            'factura.required' => 'Debe de ingresar el numero de factura',
            'factura.unique' => 'El numero de factura es invalido',
            'productos.required' => 'Debe de seleccionar un producto',
            'productos.exists' => 'El producto seleccionado es invalido',
            'proveedor.required' => 'Debe de seleccionar un proveedor',
            'proveedor.exists' => 'El proveedor seleccionado es invalido',
            'cantidad.required' => 'La cantidad es obligatorio',
            'cantidad.max' => 'La cantidad ingresada es demasiado grande',
            'cantidad.min' => 'La cantidad no puede ser negativa',
            'cantidad.numeric' => 'La cantidad debe de ser un valor numérico',
            'lote.required' => 'El lote es obligatorio',
            'lote.max' => 'El lote ingresada es demasiado grande',
            'lote.min' => 'El lote no puede ser negativa',
            'lote.numeric' => 'El lote debe de ser un valor numérico',
            'vencimiento.required' => 'La fecha de vencimiento es obligatorio',
            'vencimiento.date' => 'La fecha de vencimiento debe de ser una fecha',
            'vencimiento.after' => 'La fecha de vencimiento debe de ser '.$maxima.' o mayor ',
            'pago.required' => 'La fecha de pago es obligatorio',
            'pago.date' => 'La fecha de pago debe de ser una fecha',
            'pago.after' => 'La fecha de pago debe de ser '.$fecha_actual.' o mayor ',
            'venta.required' => 'El precio de venta es obligatorio',
            'venta.numeric' => 'El precio de venta es invalido',
            'venta.max' => 'El precio de venta ingresado es demasiado grande',
            'venta.min' => 'El precio de venta debe de ser mayor al precio de compra',
            'compra.required' => 'El precio de compra es obligatorio',
            'compra.min' => 'El precio de compra debe de ser mayor a 0',
            'compra.numeric' => 'El precio de compra es invalido',
        ]);

        $temporals = new Temporal();

        $temporals->id_producto = $request->input('productos');
        $temporals->fecha_vencimiento = $request->input('vencimiento');
        $temporals->cantidad = $request->input('cantidad');
        $temporals->lote = $request->input('lote');
        $temporals->precio_farmacia = $request->input('compra');
        $temporals->precio_publico = $request->input('venta');

        $temporals->save();

        $numero =  $request->input('factura');
        $pago =  $request->input('pago');
        $idproveedor = $request->input('proveedor');
        $pro = Proveedor::select('Nombre_del_proveedor')
        ->where('id',$idproveedor)->first();
        $proveedornomb = $pro->Nombre_del_proveedor;


        $productos = Producto::all();
        $proveedor = Proveedor::all();
        $temporal = Temporal::all();

        return view('compra/create')
        ->with('productos',$productos)
        ->with('temporal',$temporal)
        ->with('proveedor',$proveedor)
        ->with('numero',$numero)
        ->with('pago',$pago)
        ->with('idproveedor',$idproveedor)
        ->with('proveedornomb',$proveedornomb);
    }

    public function eliminar(Request $request,$id){
        Temporal::destroy($id);

        $numero =  $request->get('factura');
        $pago =  $request->get('pago');
        $idproveedor = $request->get('proveedor');

        return redirect()->route('compra.create',['factura'=>$numero,'pago'=>$pago,'proveedor'=>$idproveedor]);
    }

    public function destruir(){
        $temporal = Temporal::all();

        foreach ($temporal as $temp) {
            Temporal::destroy($temp->id);
        }

        return redirect()->route('compra.create');
    }

    public function almacenar(Request $request){

        $compra = new Compra();

        $compra->numero_factura = $request->get('factura');
        $compra->fecha_pago = $request->get('pago');
        $compra->id_proveedor = $request->get('proveedor');

        $compra->save();

        $temporal = Temporal::all();

        foreach ($temporal as $temp) {

            $detalle = new DetalleCompra();

            $detalle->id_compra = $compra->id;
            $detalle->id_producto = $temp->id_producto;
            $detalle->cantidad = $temp->cantidad;
            $detalle->lote = $temp->lote;
            $detalle->fecha_vencimiento = $temp->fecha_vencimiento;
            $detalle->precio_farmacia =  $temp->precio_farmacia;
            $detalle->precio_publico = $temp->precio_publico;

            $detalle->save();

            Temporal::destroy($temp->id);
        }

        return redirect()->route('compra.create');
    }

    public function listacompras(){
        $lista = Compra::paginate(10) ;
        
        
        $proved = DB::table('compras')
        ->join('proveedors', 'compras.id_proveedor', '=', 'proveedors.id')
        ->where('compras.id_proveedor', '=', 'proveedors.id')
        ->select('proveedors.Nombre_del_proveedor')
        ->get();

  
        


        return view('compra/listacompra')->with('lista' , $lista)->with("proved", $proved);
    }

    public function detailscompra($id){
        $details = DetalleCompra::findOrFail($id);
        $comp = Compra::findOrFail($id);
        

      

        return view('compra/detallescompra')->with('details', $details)->with('comp', $comp);  
    }

    public function delete($id){
        DetalleCompra::destroy($id);

        return redirect()->route('lista.compras')->with('Mensajes', 'La compra fue eliminada exitosamente');
    }



    public function busqueda(Request $request){
        $lista = Compra::where('numero_factura','like', '%'.$request->missing.'%' )
        ->orWhere('id_proveedor', 'like', '%'.$request->missing.'%')->paginate(10);
        return view('compra/listacompra')->with('lista', $lista);
    }



  


}
