<?php

namespace App\Http\Controllers;
use App\Models\Proveedor;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreProductoRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Gate;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use PDF;

class ProductoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function createPDF(){
        $produc = Producto::all();

        $data = [
            'title' => 'Listado de Productos',
            'date' => date('m/d/Y'),
            'produc' =>$produc,
        ];
        return PDF::loadView('productos/pdf', $data)
        ->setPaper('a4', 'landscape')
        ->download('Listado_de_Producto_'.date('m_d_Y').'.pdf');

    }
    
//----------------------------------------------------------
//------------------- CREAR PRODUCTO -----------------------
    public function create()
    {
        abort_if(Gate::denies('producto_nuevo'), redirect()->route('principal')->with('denegar','No tiene acceso a esta seccion'));
        $proveedors = Proveedor::all();
        return view('productos/create')->with('proveedors', $proveedors);
    }


//----------------------------------------------------------
//----------------- LISTA PRODUCTO -------------------------
    public function lista(){
        abort_if(Gate::denies('producto_listado'), redirect()->route('principal')->with('denegar','No tiene acceso a esta seccion'));
        $produc = Producto::paginate(10);

        return view('listaproductos')->with('produc' , $produc);
    }


//-----------------------------------------------------------
//----------------- DETALLES PRODUCTO -----------------------
    public function detalles($id){    
        abort_if(Gate::denies('producto_detalle'), redirect()->route('principal')->with('denegar','No tiene acceso a esta seccion'));

        $details = DB::table('productos')
                    ->join('proveedors', 'productos.id_proveedor', '=', 'proveedors.id')
                    ->select('productos.*', 'proveedors.Nombre_del_proveedor')
                    ->where('productos.id','=',$id)
                    ->get();
        // $principio= PrincipioActivo::findOrfail($id);
        // return   $principio;
        return view('productodetalles')->with('details', $details[0]);  
    }


//-------------------------------------------------------------
//----------------- VALIDACIÓN PRODUCTO -----------------------
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort_if(Gate::denies('producto_nuevo'), redirect()->route('principal')->with('denegar','No tiene acceso a esta seccion'));
            $rules=[
                'nombrepro' => 'required|exists:proveedors,id',
                'nombre_producto' => 'required|max:110|unique:productos,nombre_producto|regex:/^[a-zA-Z]*\d{2}$/',
                'principio_activo'=> 'required',
                'descripcion'=> 'required|max:200',


        ];
        $mensaje=[
            'nombrepro.required' => 'Debe de seleccionar un proveedor',
            'nombrepro.exists' => 'El proveedor seleccionado es invalido',
            'nombre_producto.required' => 'El nombre no puede estar vacío',
            'nombre_producto.unique' => 'El nombre ya esta en uso',
            'nombre_producto.regex' => 'El nombre debe de contener caracteres y numeros',
            'descripcion.max' => 'El descripción es muy extensa',
            'principio_activo.required' => 'El principio activo no puede estar vacío',
            'descripcion.required' => 'El descripción no puede estar vacío',
            'descripcion.max' => 'El descripción es muy extensa',
        ];

        $this->validate($request,$rules,$mensaje);

        $producto = new Producto();

        $producto->nombre_producto = $request->input('nombre_producto');
        $producto->id_proveedor = $request->input('nombrepro');
        $producto->principio_activo = $request->input('principio_activo');
        $producto->descripcion = $request->input('descripcion');
        $creado =  $producto->save();


        if ($creado) {
            return redirect()->route('lista.producto')
                ->with('msj', 'El producto se ingresó con exito');
        } else {

        }
    }


//-------------------------------------------------------------
//----------------- ACTUALIZAR PRODUCTO -----------------------
    public function edit(Request $request, $id)//Actualizar
    {
        abort_if(Gate::denies('producto_actualizar'), redirect()->route('principal')->with('denegar','No tiene acceso a esta seccion'));
        $proveedors = Proveedor::all();

        $producto = DB::table('productos')
                    ->join('proveedors', 'productos.id_proveedor', '=', 'proveedors.id')
                    ->select('productos.*', 'proveedors.Nombre_del_proveedor','proveedors.id as id_prov')
                    ->where('productos.id','=',$id)
                    ->get();

        return view('productoeditar')->with('producto', $producto[0])->with('proveedors', $proveedors);  
        //
    }


    public function update(Request $request, $id){

        
         $rules=[

                'nombre_producto' => 'required|max:110|min:5',
                'nombre_proveedor'=> 'required',
                'principio_activo'=> 'required|regex:/^[a-zA-Z]/',
                'descripcion'=> 'required|max:200',
                
            ];

        $mensaje=[
                'nombre_proveedor.required' => 'Debe de seleccionar un proveedor',
                'nombre_producto.required' => 'El nombre no puede estar vacío',
                'nombre_producto.unique' => 'El nombre ingresado ya está en uso',
                'nombre_producto.max' => 'El nombre ingresado es muy extenso',
                'nombre_producto.min' => 'El nombre del producto debe de tener al menos seis caracteres',
                'principio_activo.required' => 'El principio activo no puede estar vacío',
                'principio_activo.exists' => 'El principio activo no existe',
                'principio_activo.regex' => 'El principio activo debe contener solo palabras',
                'descripcion.required' => 'La descripción no puede estar vacío',
                'descripcion.max' => 'La descripción ingresada es muy extensa',
            ];

        $this->validate($request,$rules,$mensaje);

    
        $upda = Producto::find($id);
        $upda->id_proveedor  = $request->input('nombre_proveedor');
        $upda->nombre_producto  = $request->input('nombre_producto');
        $upda->principio_activo  = $request->input('principio_activo');
        $upda->descripcion  = $request->input('descripcion');
        $creado= $upda ->save();


        

            return redirect()->route('lista.producto')->with('msj', 'El producto se actualizó exitosamente');
       
}

//-----------------------------------------------------------
//------------- BUSCADOR  -----------------


public function buscando(Request $request){
    $sear=trim($request->get('busca'));
    $variablesurl=$request->all();
    $produc = Producto::select('*')
    ->join("proveedors","productos.id_proveedor","=","proveedors.id")
    ->where(
    'nombre_producto','like', '%'.$sear.'%'
 )
 ->orWhere(
    'principio_activo','like', '%'.$sear.'%'
 )->orWhere(
    'Nombre_del_proveedor','like', '%'.$sear.'%'
 )
    ->paginate(10)->appends($variablesurl);
// return $prod;
   
    return view('listaproductos')->with('produc', $produc);
    
}
    

}
