<?php

namespace App\Http\Controllers;
use App\Models\Proveedor;
use App\Models\Producto;
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
        return view('productos/create')->with('proveedors', $proveedors);
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
                'proveedors' => 'required|exists:proveedors,id',
                'nombre_producto' => 'required|max:100|unique:productos,nombre_producto',
                'principio_activo'=> 'required|max:200',
                'descripcion'=> 'required|max:200',



        ];
        $mensaje=[
            'proveedors.required' => 'Debe de seleccionar un proveedor',
            'proveedors.exists' => 'El proveedor seleccionado es invalido',
            'nombre_producto.required' => 'El nombre no puede estar vacío',
            'nombre_producto.unique' => 'El nombre ya esta en uso',
            'nombre_producto.max' => 'El nombre es muy extenso',
            'principio_activo.required' => 'El principio activo no puede estar vacío',
            'principio_activo.max' => 'El principio activo es muy extenso',
            'descripcion.required' => 'El descripción no puede estar vacío',
            'descripcion.max' => 'El descripción es muy extensa',




        ];

        $this->validate($request,$rules,$mensaje);

        $producto = new Producto();

        $producto->nombre_producto = $request->input('nombre_producto');
        $producto->principio_activo = $request->input('principio_activo');
        $producto->descripcion = $request->input('descripcion');

        $creado =  $producto->save();

        if ($creado) {
            return redirect()->route('')
                ->with('mensaje', 'El producto fue creado con exito');
        } else {

        }
    }
}
