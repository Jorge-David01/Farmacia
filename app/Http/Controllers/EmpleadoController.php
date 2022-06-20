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

    public function list(){
        $employee = Empleado::paginate(10);
        return view('listaempleados')->with('employee', $employee);    
    }


    public function store(Request $request)
    {
        $fecha_actual = date("d-m-Y");
        $max = date('d-m-Y',strtotime($fecha_actual."- 18 year"));
        $minima = date('d-m-Y',strtotime($fecha_actual."- 65 year"));
        $maxima = date("d-m-Y",strtotime($max."+ 1 days"));

        $rules=[
            'nombres' => 'required|max:100',
            'apellidos' => 'required|max:100',
            'birthday'=>'required|date|before:'.$maxima.'|after:'.$minima,
            'dni'=> 'required|unique:empleados,DNI|numeric|regex:([0-1]{1}[0-9]{1}[0-2]{1}[0-8]{1}[0-9]{9})',
            'personal'=> 'required|unique:empleados,telefono_personal|numeric|regex:([9,8,3,2]{1}[0-9]{7})',
            'email' => 'required|max:100|email|unique:empleados,correo_electronico',
            'direccion'=>'required|max:200',
            'genero'=>'required',
            'password'=>'required|max:8',
        ];

        $mensaje=[
            'nombres.required' => 'El nombre no puede estar vacío',
            'nombres.max' => 'El nombre es muy extenso',
            'apellidos.required' => 'El apellido no puede estar vacío',
            'apellidos.max' => 'El apellido es muy extenso',
            'birthday.required' => 'La fecha de nacimiento no puede estar vacía',
            'birthday.date' => 'La fecha de nacimiento debe de ser una fecha valida',
            'birthday.before' => 'La fecha de nacimiento debe de ser anterior a '.$maxima,
            'birthday.after' => 'La fecha de nacimiento debe de ser posterior a '.$minima,
            'dni.required' => 'La identidad no puede estar vacía',
            'dni.regex' => 'El formato de la identidad no es valida',
            'dni.numeric' => 'La identidad debe de ser números',
            'dni.unique' => 'La identidad ya esta en uso',
            'personal.required' => 'El teléfono personal no puede estar vacío',
            'personal.regex' => 'El teléfono personal debe contener 8 dígitos e iniciar con 2,3,8 o 9',
            'personal.numeric' => 'En teléfono personal no debe de incluir letras ni signos',
            'personal.unique' => 'El teléfono personal ingresado ya esta en uso',
            'email.required' => 'El correo electrónico no puede estar vacío',
            'email.regex' => 'El correo electrónico tiene un formato invalido',
            'email.max' => 'El correo electrónico es muy extenso',
            'email.email' => 'En el campo correo electrónico debe de ingresar un correo valido',
            'email.unique' => 'El correo electrónico ingresado ya esta en uso',
            'direccion.required' => 'La dirección no puede ser vacía',
            'direccion.max' => 'La dirección es muy extenso',
            'password.required' => 'El campo contraseña es obligatorio.',
            'password.string' => 'El campo contraseña es invalido .',
            'password.min' => 'El campo contraseña debe tener al menos 8 caracteres.',
            'password.confirmed' => 'Las contraseñas ingresadas no coinciden.',
            'genero.required' => 'El campo genero es obligatorio.',
        ];

        $this->validate($request,$rules,$mensaje);

        $empleado = new Empleado();

        $empleado->nombres = $request->input('nombres');
        $empleado->apellidos= $request->input('apellidos');
        $empleado->fecha_de_nacimiento= $request->input('birthday');
        $empleado->DNI= $request->input('dni');
        $empleado->telefono_personal= $request->input('personal');
        $empleado->correo_electronico = $request->input('email');
        $empleado->direccion = $request->input('direccion');
        $empleado->genero = $request->input('genero');
        $empleado->contraseña = $request->input('password');


        $creado = $empleado->save();

        if ($creado) {
            return redirect()->route('empleados.index')
                ->with('mensaje', 'El empleado fue creado exitosamente');
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
        $empleado = empleado::findOrFail($id);
        return view('showEmpleado')->with('empleado', $empleado);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmpleadoRequest  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update()
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {

    }
}
