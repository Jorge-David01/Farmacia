<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use App\Http\Requests\StoreclienteRequest;
use App\Http\Requests\UpdateclienteRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Gate;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use PDF;

class ClienteController extends Controller
{


    public function __construct(){
        $this->middleware('auth');
    }
    public function createPDF(){
        $pro = Cliente::all();

        $data = [
            'title' => 'Listado de clientes',
            'date' => date('m/d/Y'),
            'pro' =>$pro,
        ];
        return PDF::loadView('listaclientes/pdf', $data)
        ->setPaper('a4', 'landscape')
        ->download('Listado_de_Clientes_'.date('m_d_Y').'.pdf');

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('cliente_nuevo'), redirect()->route('principal')->with('denegar','No tiene acceso a esta seccion'));
        $clientes = Cliente::all();
        return view('createcliente')->with('clientes', $clientes);
    }

    public function list(){
        abort_if(Gate::denies('cliente_listado'), redirect()->route('principal')->with('denegar','No tiene acceso a esta seccion'));
        $liscliente = Cliente::paginate(10);
        return view('listaclientes')->with('liscliente' , $liscliente);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreclienteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort_if(Gate::denies('cliente_nuevo'), redirect()->route('principal')->with('denegar','No tiene acceso a esta seccion'));
        $rules=[
            'nombre_cliente' => 'required|max:110|min:5',
            'numero_id'=> 'required|unique:clientes,numero_id|numeric|regex:([0-1]{1}[0-9]{1}[0-2]{1}[0-8]{1}[0-9]{9})',
            'telefono'=> 'required|unique:clientes,Telefono|min:8|max:8|regex:([9,8,3]{1}[0-9]{7})',
            'direccion'=> 'required|max:200|min:20',
            'num_carnet'=> 'required|unique:clientes,num_carnet|min:8|max:8|'
           
        ];
    $mensaje=[
        'nombre_cliente.required' => 'El nombre no puede estar vacío',
        'nombre_cliente.max' => 'El nombre que ingresó es demasiado extenso',
        'nombre_cliente.min' => 'El nombre del cliente debe de tener al menos seis caracteres',
        'numero_id.required' => 'La identidad  del cliente no puede estar vacía',
        'numero_id.regex' => 'El formato de la identidad no es válida',
        'numero_id.numeric' => 'La identidad debe de ser solo números',
        'numero_id.unique' => 'La identidad ya la uso anteriormente',
        'telefono.required'=>'El teléfono del cliente es obligatorio' ,
        'telefono.unique'=>'El teléfono de cliente  que ingreso ya ha sido usado',
        'telefono.min'=>'El teléfono del cliente  debe de tener un minimo de 8 digitos',
        'telefono.max'=>'El teléfono del cliente  debe de tener un máximo de 8 digitos',
        'direccion.required' => 'La dirección del cliente no puede estar vacía',
        'direccion.max' => 'La dirección que ingresó es muy extensa',
        'direccion.min' => 'La dirección que ingresó es muy corta',
        'num_carnet.required'=>'El numero el carnet es obligatorio',
        'num_carnet.unique'=>'El numero el carnet que ingreso ya ha sido usado',
        'num_carnet.min'=>'El numero el carnet debe de tener un minimo de 8 caracteres',
        'num_carnet.max'=>'El num_carnet debe de tener un máximo de 8 caracteres',
    ];

    $this->validate($request,$rules,$mensaje);


    $cliente = new Cliente();
    $cliente->nombre_cliente = $request->input('nombre_cliente');
    $cliente->numero_id = $request->input('numero_id');
    $cliente->telefono = $request->input('telefono');
    $cliente->direccion = $request->input('direccion');
    $cliente->num_carnet = $request->input('num_carnet');
    

    $creado =  $cliente->save();


    if ($creado) {
        return redirect()->route('lista.clientes')
            ->with('msj', 'El cliente fue creado con exito');
    }
}



public function Ver($id){
    abort_if(Gate::denies('cliente_detalle'), redirect()->route('principal')->with('denegar','No tiene acceso a esta seccion'));
    $cliente = Cliente::findOrFail($id);
    return view('showclientes')->with('cliente', $cliente);  
}


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function actualizar(cliente $cliente)
    {
        //
    }



    public function formulario(Request $request, $id)//Actualizar
    {
        abort_if(Gate::denies('cliente_actualizar'), redirect()->route('principal')->with('denegar','No tiene acceso a esta seccion'));
        $client = cliente::find($id);
        return view('clienteupdate') ->with('client',$client);

        //
    }




    public function update(Request $request, $id){

        $rules= ([
            'nombre_cliente'=>'required  |min:6 | max:70 '  ,
            'numero_identidad'=>'required |min:13 | max:13 |regex:([[0-1]{1}[0-9]{1}[0-2]{1}[0-9]{10})',
            'numero_tel'=>'required||min:8| max:8 |regex:([2,9,8,3]{1}[0-9]{7})',
            'direccion'=>'required|min:20|max:200',
           
            

        ]);

        $messages =[
            'nombre_cliente.required'=>'El nombre del cliente es obligatorio' ,
            'nombre_cliente.min'=>'El nombre del cliente es demasiado corto' ,
            'nombre_cliente.max'=>'El nombre del cliente es demasiado largo' ,

            'numero_identidad.required'=>'El número de identidad es obligatorio' ,
            'numero_identidad.min'=>'El número de identidad debe de tener 13 digitos' ,
            'numero_identidad.max'=>'El número de identidad debe de tener 13 digitos' ,
            'numero_identidad.regex'=>'El número de identidad solo debe contener números' ,


            'numero_tel.required'=>'El número de identidad es obligatorio' ,
            'numero_tel.min'=>'El número de teléfono debe contener 8 digitos' ,
            'numero_tel.max'=>'El número de teléfono debe contener 8 digitos' ,
            'numero_tel.regex'=>'El número de teléfono debe iniciar con 2, 9, 8 o 3 y debe de contener 8 digitos' ,



            'direccion.required'=>'El dirección del cliente es obligatoria' ,
            'direccion.min'=>'El dirección que ingresó es muy corta' ,
            'direccion.max'=>'El dirección que ingresó es muy extensa' ,  
            
        ];


        $this->validate($request, $rules, $messages);

        $clienteup =cliente::findorFail($id);
        $clienteup->nombre_cliente = $request->input('nombre_cliente');
        $clienteup->numero_id = $request->input('numero_identidad');
      
        $clienteup->telefono= $request->input('numero_tel');
        $clienteup->direccion = $request->input('direccion');
    
        $actualizado = $clienteup->save();

        if ($actualizado){
            return redirect()->route('lista.clientes')->with('msj', 'El cliente fue actualizó exitosamente');
         } else {
          
         }

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateclienteRequest  $request
     * @param  \App\Models\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(cliente $cliente)
    {
        //
    }

    public function buscando(Request $REQUEST){
        $liscliente = Cliente::select('*')->orWhere('nombre_cliente','like', '%'.$REQUEST->busca.'%')
        ->orWhere('telefono','like', '%'.$REQUEST->busca.'%')
        ->orWhere('numero_id','like', '%'.$REQUEST->busca.'%')  ->paginate(10);
       
        return view('listaclientes')->with('liscliente', $liscliente);
        
    }
        
    
    }

