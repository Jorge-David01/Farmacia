<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Inventario;
use App\Models\Vencimiento;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Temporal;
use App\Models\DetalleCompra;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCompraRequest;
use App\Http\Requests\UpdateCompraRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Gate;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use PDF;

class CompraController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function createPDF(){
        $lista = Compra::all();
        $name = Proveedor::all();

        $data = [
            'title' => 'Listado de compras',
            'date' => date('m/d/Y'),
            'lista' =>$lista,
            'name' =>$name,
        ];
        return PDF::loadView('compra/pdf', $data)
        ->setPaper('a4', 'landscape')
        ->download('Listado_de_Compra_'.date('m_d_Y').'.pdf');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

//-------------------------------------------------
//----------------- COMPRAS -----------------------
    public function create(Request $request)
    {
        abort_if(Gate::denies('compra_nuevo'), redirect()->route('principal')->with('denegar','No tiene acceso a esta seccion'));
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

//------------------------------------------------------
//--------------------- V-COMPRA -------------------------

    public function store(Request $request)
    {
        abort_if(Gate::denies('compra_nuevo'), redirect()->route('principal')->with('denegar','No tiene acceso a esta seccion'));
        $compra = $request->input('compra')+0.01;

        $fecha_actual = date("d-m-Y");
        $maxima = date("d-m-Y",strtotime($fecha_actual."+ 30 days"));
        $this->validate($request, [
            'factura' => 'required|unique:compras,numero_factura|regex:/^[0-9]/',
            'productos' => 'required|exists:productos,id',
            'proveedor' => 'required|exists:proveedors,id',
            "cantidad" => "required|min:1|numeric|max:999999999",
            "lote" => "required|min:1|numeric|max:999999999",
            "vencimiento" => "required|date|after:'.$maxima.",
            "pago" => "required|date|after:'.$fecha_actual.",
            "compra" => 'required|numeric|min:1',
            "venta" => 'required|numeric|max:999999.99|min:'.$compra,
            "laboratorio" => 'required',

        ], [
            'factura.required' => 'Debe de ingresar el numero de factura',
            'factura.unique' => 'El numero de factura es invalido',
            'factura.regex' => 'El numero de factura debe contener solo numeros',
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
            'laboratorio.numeric' => 'El laboratorio es obligatorio',

        ]);

        $temporals = new Temporal();

        $temporals->id_producto = $request->input('productos');
        $temporals->fecha_vencimiento = $request->input('vencimiento');
        $temporals->cantidad = $request->input('cantidad');
        $temporals->lote = $request->input('lote');
        $temporals->laboratorio = $request->input('laboratorio');
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

//----------------------------------------------------------------
//--------------------- ELIMINAR COMPRA -------------------------

    public function eliminar(Request $request,$id){
        abort_if(Gate::denies('compra_eliminar'), redirect()->route('principal')->with('denegar','No tiene acceso a esta seccion'));

        Temporal::destroy($id);

        $numero =  $request->get('factura');
        $pago =  $request->get('pago');
        $idproveedor = $request->get('proveedor');

        return redirect()->route('compra.create',['factura'=>$numero,'pago'=>$pago,'proveedor'=>$idproveedor]);
    }

    public function destruir(){
        abort_if(Gate::denies('compra_destruir'), redirect()->route('principal')->with('denegar','No tiene acceso a esta seccion'));
        $temporal = Temporal::all();

        foreach ($temporal as $temp) {
            Temporal::destroy($temp->id);
        }

        return redirect()->route('compra.create');
    }

    public function cancelar(){
        abort_if(Gate::denies('compra_cancelar'), redirect()->route('principal')->with('denegar','No tiene acceso a esta seccion'));

        $temporal = Temporal::all();

        foreach ($temporal as $temp) {
            Temporal::destroy($temp->id);
        }

        return redirect()->route('lista.compras');
    }

//----------------------------------------------------------------
//--------------------- ALMACENAR COMPRA -------------------------

    public function almacenar(Request $request){
        abort_if(Gate::denies('compra_almacenar'), redirect()->route('principal')->with('denegar','No tiene acceso a esta seccion'));

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
            $detalle->laboratorio = $temp->laboratorio;
            $detalle->fecha_vencimiento = $temp->fecha_vencimiento;
            $detalle->precio_farmacia =  $temp->precio_farmacia;
            $detalle->precio_publico = $temp->precio_publico;

            $detalle->save();

            Temporal::destroy($temp->id);
        }

        return redirect()->route('lista.compras');
    }


//------------------------------------------------------------
//--------------------- LISTA COMPRA -------------------------

   
public function listacompras(){
    abort_if(Gate::denies('compra_listado'), redirect()->route('principal')->with('denegar','No tiene acceso a esta seccion'));
    $lista = Compra::paginate(10) ;

    

    return view('compra/listacompra')->with('lista' , $lista);

  

}


//-------------------------------------------------------------------------------
//------------------ DETALLES ELIMINAR Y BUSCADOR COMPRAS -----------------------

public function detailscompra($id){
    abort_if(Gate::denies('compra_detalle'), redirect()->route('principal')->with('denegar','No tiene acceso a esta seccion'));
    $details = DetalleCompra::findOrFail($id);
    $comp = Compra::findOrFail($id);
  


  

    $deta = DB::table('compras')
    ->join('detalle_compras', 'compras.id', '=', 'detalle_compras.id_compra')
    ->join('Productos', 'detalle_compras.id_producto', '=', 'Productos.id')
    ->where('detalle_compras.id_compra', '=', $id)
    ->select('id_producto' ,'nombre_producto','laboratorio', 'cantidad', 'lote' , 'fecha_vencimiento', 'precio_farmacia', 'precio_publico')
    ->get();

    
    return view('compra/detallescompra')->with('details', $details)->with('comp', $comp)->with('deta', $deta);


  
}



    public function delete($id){
        DetalleCompra::destroy($id);


        return redirect()->route('lista.compras')->with('Mensajes', 'La compra fue eliminada exitosamente');
    }


    public function busqueda(Request $request){
        $name = Proveedor::where('Nombre_del_proveedor','like', '%'.$request->missing.'%' )->paginate(10);
       

        
        $lista = Compra::where('numero_factura','like', '%'.$request->missing.'%' )
        ->orWhere('id_proveedor', 'like', '%'.$request->missing.'%')->paginate(10);

        
        return view('compra/listacompra')->with('lista', $lista)->with('name', $name)->with('texto',$request->missing);
    }


//---------------------------------------------------------------------
//--------------------- INVENTARIO Y BUSCADOR -------------------------

    public function inven(){
        abort_if(Gate::denies('inventario'), redirect()->route('principal')->with('denegar','No tiene acceso a esta seccion'));
        $Inventa =  Inventario::paginate(10) ;
        
    
        
        $nombre = DB::table('inventarios')
        ->join('Productos', 'inventarios.id_producto', '=', 'Productos.id')
        ->where('productos.id', '=', 'inventarios.id_producto')
        ->select('nombre_producto')
        ->get();


        return view('Inventario')->with('Inventa' , $Inventa)->with('nombre', $nombre);
    }


    public function buscador(Request $request){

        $Inventa = inventario::select('*')
                    ->join("productos","productos.id","=","inventarios.id_producto")
                    ->where('inventarios.cantidad','like', '%'.$request->good.'%')
                    ->orWhere('productos.nombre_producto','like', '%'.$request->good.'%')->paginate(10);

        return view('Inventario')->with('Inventa', $Inventa)->with('texto',$request->good);
    }


    public function Vencimiento($id){
        $abc = Producto::findOrFail($id);
    
        $detas = DB::table('productos')
        ->join('detalle_compras', 'productos.id', '=', 'detalle_compras.id_producto')
        ->where('detalle_compras.id_producto', '=', $id)
        ->select('id_producto' ,'lote' , 'fecha_vencimiento')
        ->get();

        return view('vencimiento')->with('detas', $detas)->with('abc', $abc);
    }

    public function Precio($id){
        $abc = Producto::findOrFail($id);
    
        $detasv = DB::table('productos')
        ->join('detalle_compras', 'productos.id', '=', 'detalle_compras.id_producto')
        ->where('detalle_compras.id_producto', '=', $id)
        ->select('id_producto' ,'lote' , 'precio_publico')
        ->get();

        return view('Precio')->with('detasv', $detasv)->with('abc', $abc);
    }


    //---------------------------------------------------------------------
    //--------------------- Agreguen titulos -------------------------

    public function edit(Request $request,$id){
        if ($request->input('cantidad'.$id) != "" && $request->input('cantidad'.$id) > 0 ) {
            $cambio = Temporal::findOrFail($id);

        $cambio->cantidad = $request->input('cantidad'.$id);

        $cambio->save();

        }

        $numero =  $request->get('factura');
        $pago =  $request->get('pago');
        $idproveedor = $request->get('proveedor');

        return redirect()->route('compra.create',['factura'=>$numero,'pago'=>$pago,'proveedor'=>$idproveedor]);
    }

}
