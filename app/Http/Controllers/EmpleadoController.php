<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreEmpleadoRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Gate;

class EmpleadoController extends Controller
{


    public function __construct(){
        $this->middleware('auth');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('empleado_nuevo'), redirect()->route('principal')->with('denegar','No tiene acceso a esta seccion'));
        return view('empleados/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmpleadoRequest  $request
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request){
        abort_if(Gate::denies('empleado_listado'), redirect()->route('principal')->with('denegar','No tiene acceso a esta seccion'));
        $texto=trim($request->get('texto'));
        $employee=DB::table('empleados')

        ->where('DNI','like','%'.$texto.'%')
        ->orwhere('nombre_completo','like','%'.$texto.'%')
        ->orWhere('numero_cel','like','%'.$texto.'%')
        ->orWhere('numero_tel','like','%'.$texto.'%')
        ->orderBy('DNI', 'asc')->paginate(10);
        return view('empleados/index' , compact ('employee', 'texto'));
    }


    public function store(Request $request)
    {
        abort_if(Gate::denies('empleado_nuevo'), redirect()->route('principal')->with('denegar','No tiene acceso a esta seccion'));
        $rules=[
            'nombre_completo' => 'required|max:110',
            'dni'=> 'required|unique:empleados,DNI|numeric|regex:([0-1]{1}[0-9]{1}[0-2]{1}[0-8]{1}[0-9]{9})',
            'numero_cel'=> 'required|unique:empleados,numero_cel|numeric|regex:([9,8,3]{1}[0-9]{7})',
            'numero_tel'=> 'required|unique:empleados,numero_tel|numeric|regex:([2]{1}[0-9]{7})',
            'direccion'=>'required|max:100',
            'email' => 'required|max:100|email|unique:empleados,correo_electronico',

        ];

        $mensaje=[
            'nombre_completo.required' => 'El nombre no puede estar vacío',
            'nombre_completo.max' => 'El nombre es demasiado extenso',
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
            'direccion.min' => 'La dirección es muy corta',
            'email.required' => 'El correo electrónico no puede estar vacío',
            'email.regex' => 'El correo electrónico tiene un formato invalido',
            'email.max' => 'El correo electrónico es muy extenso',
            'email.email' => 'En el campo correo electrónico debe de ingresar un correo valido',
            'email.unique' => 'El correo electrónico ingresado ya esta en uso',
        ];

        $this->validate($request,$rules,$mensaje);

        $empleado = new Empleado();

        $empleado->nombre_completo = $request->input('nombre_completo');
        $empleado->DNI= $request->input('dni');
        $empleado->numero_cel= $request->input('numero_cel');
        $empleado->numero_tel= $request->input('numero_tel');
        $empleado->direccion = $request->input('direccion');
        $empleado->correo_electronico = $request->input('email');


        $creado = $empleado->save();

        if ($creado) {
            return redirect()->route('empleados.index')
                ->with('mensaje', 'El empleado fue creado con exito');
        } else {

        }
    }


    public function Principal() {return view('PaginaPrincipal');}
    public function VPEmpleado() {return view('VentanaEmpleados');}
    public function VPProveedor() {return view('VentanaProveedores');}

    }

