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
                'nombre_producto' => 'required|max:100|unique:productos,nombre_producto',
                'principio_activo'=> 'required',
                'descripcion'=> 'required|max:200',


        ];
        $mensaje=[
            'nombrepro.required' => 'Debe de seleccionar un proveedor',
            'nombrepro.exists' => 'El proveedor seleccionado es invalido',
            'nombre_producto.required' => 'El nombre no puede estar vacío',
            'nombre_producto.unique' => 'El nombre ya esta en uso',
            'nombre_producto.max' => 'El nombre es muy extenso',
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
                ->with('mensaje', 'El producto fue creado con exito');
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

        $validator = Validator::make($request->all(), [
            'nombre_producto'=>'required|max:110',
            'nombre_proveedor'=>'required',
            'principio_activo'=>'required',
            'descripcion'=>'required|max:110',
        ]);

        if($validator->fails()){
        
            $rules=[

                'nombre_producto' => 'required|max:110|min:5',
                'nombre_proveedor'=> 'required',
                'principio_activo'=> 'required',
                'descripcion'=> 'required|max:110',
                
            ];

            $mensaje=[
                'nombre_proveedor.required' => 'Debe de seleccionar un proveedor',
                'nombre_producto.required' => 'El nombre no puede estar vacío',
                'nombre_producto.unique' => 'El nombre ingresado ya está en uso',
                'nombre_producto.max' => 'El nombre ingresado es muy extenso',
                'nombre_producto.min' => 'El nombre del producto debe de tener al menos seis caracteres',
                'principio_activo.required' => 'El principio activo no puede estar vacío',
                'principio_activo.exists' => 'El principio activo no existe',
                'descripcion.required' => 'La descripción no puede estar vacío',
                'descripcion.max' => 'La descripción ingresada es muy extensa',
            ];

            $this->validate($request,$rules,$mensaje);

        }
        $upda = Producto::find($id);
        $upda->id_proveedor  = $request->input('nombre_proveedor');
        $upda->nombre_producto  = $request->input('nombre_producto');
        $upda->principio_activo  = $request->input('principio_activo');
        $upda->descripcion  = $request->input('descripcion');
        $creado= $upda ->save();


        

            return redirect()->route('lista.producto')->with('msj', 'El empleado se actualizo exitosamente');
       
}

//-----------------------------------------------------------
//------------- BUSCADOR  -----------------


public function buscando(Request $REQUEST){
    $produc = Producto::select('*')
    ->join("proveedors","productos.id_proveedor","=","proveedors.id")
    ->where(
    'nombre_producto','like', '%'.$REQUEST->busca.'%'
 )
 ->orWhere(
    'principio_activo','like', '%'.$REQUEST->busca.'%'
 )->orWhere(
    'Nombre_del_proveedor','like', '%'.$REQUEST->busca.'%'
 )
    ->paginate(10);
// return $prod;
   
    return view('listaproductos')->with('produc', $produc);
    
}
    

}
