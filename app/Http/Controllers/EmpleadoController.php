<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreEmpleadoRequest;
use Illuminate\Support\Facades\DB;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empleados/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmpleadoRequest  $request
     * @return \Illuminate\Http\Response
     */

    public function list(Request $request){
        $texto=trim($request->get('texto'));
        $employee=DB::table('empleados')

        ->where('DNI','like','%'.$texto.'%')
        ->orwhere('nombre_completo','like','%'.$texto.'%')
        ->orWhere('numero_cel','like','%'.$texto.'%')
        ->orWhere('numero_tel','like','%'.$texto.'%')
        ->orderBy('DNI', 'asc')->paginate(10);
        return view('listaempleados' , compact ('employee', 'texto'));
    }


    public function store(Request $request)
    {
        $rules=[
            'nombre_completo' => 'required|max:110',
            'dni'=> 'required|unique:empleados,DNI|numeric|regex:([0-1]{1}[0-9]{1}[0-2]{1}[0-8]{1}[0-9]{9})',
            'numero_cel'=> 'required|unique:empleados,numero_cel|numeric|regex:([9,8,3]{1}[0-9]{7})',
            'numero_tel'=> 'required|unique:empleados,numero_tel|numeric|regex:([2]{1}[0-9]{7})',
            'direccion'=>'required|max:100',
            'password' => 'required|confirmed|min:6',

        ];

        $mensaje=[
            'nombre_completo.required' => 'El nombre no puede estar vacío',
            'nombres_completo.max' => 'El nombre es demasiado extenso',
            'dni.required' => 'La identidad no puede estar vacía',
            'dni.regex' => 'El formato de la identidad no es valida',
            'dni.numeric' => 'La identidad debe de ser solo números',
            'dni.unique' => 'La identidad ya la uso',
            'numero_cel.required' => 'El numero de celular no puede estar vacío',
            'numero_cel.regex' => 'El numero de celular debe tener 8 dígitos iniciar con 3,8 o 9',
            'numero_cel.numeric' => 'En numero de celular solo debe tener numeros',
            'numero_cel.unique' => 'El numero de celular que ingreso ya lo uso',
            'numero_tel.required' => 'El numero de telefono fijo no puede estar vacío',
            'numero_tel.regex' => 'El numero de telefono fijo debe tener 8 dígitos iniciar con 2',
            'numero_tel.numeric' => 'En numero de telefono fijo solo debe tener numeros',
            'numero_tel.unique' => 'El numero de telefono fijo que ingreso ya lo uso',
            'direccion.required' => 'La dirección no puede ser vacía',
            'direccion.max' => 'La dirección es muy larga',
            'password.required' => 'La contraseña no puede estar vacía',
            'password.confirmed' => 'Las contraseñas que ingreso no coinciden.',
        ];

        $this->validate($request,$rules,$mensaje);

        $empleado = new Empleado();

        $empleado->nombre_completo = $request->input('nombre_completo');
        $empleado->DNI= $request->input('dni');
        $empleado->numero_cel= $request->input('numero_cel');
        $empleado->numero_tel= $request->input('numero_tel');
        $empleado->direccion = $request->input('direccion');
        $empleado->contraseña = $request->input('password');


        $creado = $empleado->save();

        if ($creado) {
            return redirect()->route('lista')
                ->with('mensaje', 'El empleado fue creado con exito');
        } else {

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show($id)//mostrar
    {
        $empleado = Empleado::findOrFail($id);
        return view('empleados/showempleado')->with('empleado', $empleado);
        //
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmpleadoRequest  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)//Actualizar
    {
        $empleado = Empleado::find($id);
        return view('empleados/editempleado') ->with('empleado',$empleado);

        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Empleado::destroy($id);

        return redirect()->route('lista')->with('Mensaje', 'El empleado fue eliminado exitosamente');
        //

    }

    public function update(Request $request, $id){

        $request->validate([
            'nombre_completo'=>'required',
            'numero_cel'=>'required',
            'numero_tel'=>'required',
            'DNI'=>'required',
             'direccion'=>'required',
             'contraseña'=>'required',


        ]);

        $upda = Empleado::find($id);

        $upda -> nombre_completo  = $request->input('nombre_completo');
        $upda -> numero_cel  = $request->input('numero_cel');
        $upda -> numero_tel  = $request->input('numero_tel');
        $upda -> DNI  = $request->input('DNI');
        $upda -> direccion = $request->input('direccion');
        $upda -> contraseña = $request->input('contraseña');


        $actualizado= $upda ->save();

        if ($actualizado){
            return redirect()->route('lista')->with('msj', 'El empleado se actulizo exitosamente');
        } else {
          //nada por ahorita
        }

    }

    }

