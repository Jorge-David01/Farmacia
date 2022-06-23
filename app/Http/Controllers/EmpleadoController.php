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
        ->orwhere('nombres','like','%'.$texto.'%')
        ->orWhere('apellidos','like','%'.$texto.'%')
        ->orWhere('telefono_personal','like','%'.$texto.'%')
        ->orderBy('DNI', 'asc')->paginate(10);
        return view('listaempleados' , compact ('employee', 'texto'));
    }


    public function store(Request $request)
    {
        $fecha_actual = date("d-m-Y");
        $max = date('d-m-Y',strtotime($fecha_actual."- 18 year"));
        $minima = date('d-m-Y',strtotime($fecha_actual."- 65 year"));
        $maxima = date("d-m-Y",strtotime($max."+ 1 days"));

        $rules=[
            'nombres' => 'required|max:50',
            'apellidos' => 'required|max:50',
            'birthday'=>'required|date|before:'.$maxima.'|after:'.$minima,
            'dni'=> 'required|unique:empleados,DNI|numeric|regex:([0-1]{1}[0-9]{1}[0-2]{1}[0-8]{1}[0-9]{9})',
            'personal'=> 'required|unique:empleados,telefono_personal|numeric|regex:([9,8,3,2]{1}[0-9]{7})',
            'email' => 'required|max:100|email|unique:empleados,correo_electronico',
            'direccion'=>'required|max:100',
            'password'=>'required|min:8',
            'genero'=>'required',


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
            'personal.required' => 'El teléfono no puede estar vacío',
            'personal.regex' => 'El teléfono debe contener 8 dígitos e iniciar con 2,3,8 o 9',
            'personal.numeric' => 'En teléfono no debe de incluir letras ni signos',
            'personal.unique' => 'El teléfono ingresado ya esta en uso',
            'email.required' => 'El correo electrónico no puede estar vacío',
            'email.regex' => 'El correo electrónico tiene un formato invalido',
            'email.max' => 'El correo electrónico es muy extenso',
            'email.email' => 'En el campo correo electrónico debe de ingresar un correo valido',
            'email.unique' => 'El correo electrónico ingresado ya esta en uso',
            'direccion.required' => 'La dirección no puede ser vacía',
            'direccion.max' => 'La dirección es muy extenso',


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
            'nombres'=>'required',
            'apellidos'=>'required',
            'birthday'=>'required',
            'dni'=>'required',
            'personal'=>'required',
            'email'=> 'required' ,
             'direccion'=>'required',
              'genero'=>'required',
             'password'=>'required',
            

        ]);

        $upda = Empleado::find($id);
        
        $upda -> nombres  = $request->input('nombres');
        $upda -> apellidos  = $request->input('apellidos');
        $upda -> fecha_de_nacimiento  = $request->input('birthday');
        $upda -> DNI  = $request->input('dni');
        $upda -> telefono_personal  = $request->input('personal');
        $upda -> correo_electronico = $request->input('email');
        $upda -> direccion = $request->input('direccion');
        $upda -> genero = $request->input('genero');
        $upda -> contraseña = $request->input('password');
        

        $actualizado= $upda ->save();
  
        if ($actualizado){
            return redirect()->route('lista')->with('msj', 'El empleado se actulizo exitosamente');
        } else {
          //nada por ahorita
        }
  
    }

    }

