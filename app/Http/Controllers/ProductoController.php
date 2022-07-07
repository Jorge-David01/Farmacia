<?php

namespace App\Http\Controllers;
use App\Models\Proveedor;
use App\Models\Producto;
use App\Models\PrincipioActivo;
use App\Models\ActivoProducto;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductoRequest;

class ProductoController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedors = Proveedor::all();
        $activo = PrincipioActivo::all();
        return view('productos/create')->with('proveedors', $proveedors)->with('activo', $activo);
    }


    public function lista(){
        $produc = Producto::paginate(10);
        return view('listaproductos')->with('produc' , $produc);
    }

    public function detalles($id){
        $details = Producto::findOrFail($id);
        return view('productodetalles')->with('details', $details);  
    }

    public function delete($id){
        Producto::destroy($id);
        return redirect()->route('lista.producto')->with('Mensaje', 'El producto fue eliminado exitosamente');
    }


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
}
