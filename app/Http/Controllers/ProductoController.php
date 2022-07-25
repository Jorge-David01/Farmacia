<?php

namespace App\Http\Controllers;
use App\Models\Proveedor;
use App\Models\Producto;
use App\Models\PrincipioActivo;
use App\Models\ActivoProducto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreProductoRequest;
use Illuminate\Support\Facades\Validator;

class ProductoController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

//----------------------------------------------------------
//------------------- CREAR PRODUCTO -----------------------
    public function create()
    {
        $proveedors = Proveedor::all();
        $activo = PrincipioActivo::all();
        return view('productos/create')->with('proveedors', $proveedors)->with('activo', $activo);
    }


//----------------------------------------------------------
//----------------- LISTA PRODUCTO -------------------------
    public function lista(){
        $produc = Producto::paginate(10);
        return view('listaproductos')->with('produc' , $produc);
    }


//-----------------------------------------------------------
//----------------- DETALLES PRODUCTO -----------------------
    public function detalles($id){
 
        $details = DB::table('productos')
                    ->join('proveedors', 'productos.id_proveedor', '=', 'proveedors.id')
                    ->select('productos.*', 'proveedors.Nombre_del_proveedor')
                    ->where('productos.id','=',$id)
                    ->get();
        $principio= PrincipioActivo::findOrfail($id);
        return view('productodetalles')->with('details', $details[0])->with('principio', $principio);  
    }


//----------------------------------------------------------
//----------------- BORRAR PRODUCTO -----------------------
    public function delete($id){
        Producto::destroy($id);
        return redirect()->route('lista.producto')->with('Mensaje', 'El producto fue eliminado exitosamente');
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
            $rules=[
                'nombrepro' => 'required|exists:proveedors,id',
                'nombre_producto' => 'required|max:100|unique:productos,nombre_producto',
                'principio_activo'=> 'required|exists:principio_activos,id',
                'descripcion'=> 'required|max:200',

                
        ];
        $mensaje=[
            'nombrepro.required' => 'Debe de seleccionar un proveedor',
            'nombrepro.exists' => 'El proveedor seleccionado es invalido',
            'nombre_producto.required' => 'El nombre no puede estar vacío',
            'nombre_producto.unique' => 'El nombre ya esta en uso',
            'nombre_producto.max' => 'El nombre es muy extenso',
            'principio_activo.required' => 'El principio activo no puede estar vacío',
            'principio_activo.exists' => 'El principio activo no existe',
            'descripcion.required' => 'El descripción no puede estar vacío',
            'descripcion.max' => 'El descripción es muy extensa',
        ];

        $this->validate($request,$rules,$mensaje);

        $producto = new Producto();

        $producto->nombre_producto = $request->input('nombre_producto');
        $producto->id_proveedor = $request->input('nombrepro');
        $producto->descripcion = $request->input('descripcion');
        $creado =  $producto->save();

        foreach($request->principio_activo as $a){
            $activo = new ActivoProducto();
            $activo->id_producto = $producto->id;
            $activo->id_principio_activos = $a;
            $creado2 =  $activo->save();
        }

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
        $producto = Producto::find($id);
        return view('productoeditar') ->with('producto', $producto);

        //
    }


    public function update(Request $request, $id){

        $validator = Validator::make($request->all(), [
            'nombre_producto'=>'required|max:110',
            'nombrepro'=>'required|max:110',
            'principio_activo'=>'required',
            'descripcion'=>'required|max:110',
        ]);

        if($validator->fails()){
        
            $rules=[

                'nombre_producto' => 'required|max:110|min:5',
                'nombrepro'=> 'required|max:110|min:5',
                'principio_activo'=> 'required',
                'descripcion'=> 'required|max:110',
                
            ];

            $mensaje=[
                'nombrepro.required' => 'Debe de seleccionar un proveedor',
                'nombrepro.exists' => 'El proveedor seleccionado es invalido',
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
        $upda -> id_proveedor  = $request->input('id_proveedor  ');
        $upda -> nombre_producto  = $request->input('nombre_producto ');
        $upda -> principio_activo  = $request->input('principio_activo');
        $upda -> descripcion  = $request->input('descripcion ');
        $creado= $upda ->save();

            return redirect()->route('lista.producto')->with('msj', 'El empleado se actualizo exitosamente');
       
}

//-----------------------------------------------------------
//------------- BUSCADOR  -----------------


public function buscando(Request $REQUEST){
    $prod = Producto::where('nombrepro','like', '%'.$REQUEST->busca.'%' )
    ->orWhere('nombre_producto', 'like', '%'.$REQUEST->busca.'%')
    ->orWhere('principio_activos.descripcion', 'like', '%'.$REQUEST->busca.'%')
    ->join("activo_productos","activo_productos.id_producto","=","productos.id")
    ->join("principio_activos","principio_activos.id","=","activo_productos.id_principio_activos")
    ->join("proveedors ","productos.id_proveedor","=","proveedors.id")
    ->paginate(10);
   
    return view('listaproductos')->with('prod', $prod);
    
}
    

}
