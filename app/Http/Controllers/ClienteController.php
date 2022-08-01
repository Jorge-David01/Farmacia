<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use App\Http\Requests\StoreclienteRequest;
use App\Http\Requests\UpdateclienteRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ClienteController extends Controller
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
    public function create()
    {
        $clientes = Cliente::all();
        return view('createcliente')->with('clientes', $clientes);
    }

    public function list(){
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
        $rules=[
            'nombre_cliente' => 'required|max:110|min:5',
            'numero_id'=> 'required|unique:clientes,numero_id|numeric|regex:([0-1]{1}[0-9]{1}[0-2]{1}[0-8]{1}[0-9]{9})',
            'telefono'=> 'required|unique:clientes,Telefono|min:8|max:8|regex:([9,8,3]{1}[0-9]{7})',
            'direccion'=> 'required|max:200'
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
        'telefono.unique'=>'El teléfono de cliente  que ingreso ya ha sido usado' ,
        'telefono.min'=>'El teléfono del cliente  debe de tener un minimo de 8 digitos' ,
        'telefono.max'=>'El teléfono del cliente  debe de tener un máximo de 8 digitos' ,
        'direccion.required' => 'La dirección del cliente no puede estar vacía',
        'direccion.max' => 'La dirección que ingresó es muy extensa'
    ];

    $this->validate($request,$rules,$mensaje);

    $carnets = Cliente::select('num_carnet')->get();    
    $carnet_comp =  $this->comprobar_unicocarnet($carnets);

     


    $cliente = new Cliente();
    $cliente->nombre_cliente = $request->input('nombre_cliente');
    $cliente->numero_id = $request->input('numero_id');
    $cliente->telefono = $request->input('telefono');
    $cliente->direccion = $request->input('direccion');
    $cliente->num_carnet = $carnet_comp;
    

    $creado =  $cliente->save();


    if ($creado) {
        return redirect()->route('lista.clientes')
            ->with('mensaje', 'El Cliente fue creado con exito');
    }
}

function comprobar_unicocarnet($carnets){

    $codautogenerate = random_int(100000000, 999999999);

    $exist = 0;
    foreach ($carnets as $key) {
        if($key->num_carnet == $codautogenerate){
            $exist ++;
        }
    }

    if($exist > 0){
        $this->comprobar_unicocarnet($carnets);
    }else{
        return $codautogenerate;
    }

}


public function Ver($id){
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
    public function edit(cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateclienteRequest  $request
     * @param  \App\Models\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateclienteRequest $request, cliente $cliente)
    {
        //
    }

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
}
