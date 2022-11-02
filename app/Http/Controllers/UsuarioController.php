<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreUsuarioRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;

class UsuarioController extends Controller
{

    
    public function __construct(){
        $this->middleware('auth');
    }
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
        // abort_if(Gate::denies('usuario_nuevo'), redirect()->route('principal')->with('denegar','No tiene acceso a esta seccion'));
        return view('usuarios/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUsuarioRequest  $request
     * @return \Illuminate\Http\Response
     */

    public function list(Request $request){
        abort_if(Gate::denies('usuario_lista'), redirect()->route('principal')->with('denegar','No tiene acceso a esta seccion'));
        $texto=trim($request->get('texto'));
        $employee=DB::table('users')

        ->where('dni','like','%'.$texto.'%')
        ->orwhere('name','like','%'.$texto.'%')
        ->orWhere('email','like','%'.$texto.'%')
        ->orWhere('numero_cel','like','%'.$texto.'%')
        ->orderBy('id', 'desc')
        ->paginate(10);
        return view('listausuarios' , compact ('employee', 'texto'));
    }


    public function store(Request $request)
    {
        // abort_if(Gate::denies('usuario_nuevo'), redirect()->route('principal')->with('denegar','No tiene acceso a esta seccion'));
        $rules=[
            'nombre_completo' => 'required|max:110',
            'dni'=> 'required|unique:users,DNI|numeric|regex:([0-1]{1}[0-9]{1}[0-2]{1}[0-8]{1}[0-9]{9})',
            'numero_cel'=> 'required|unique:users,numero_cel|numeric|regex:([9,8,3]{1}[0-9]{7})',
            'direccion'=>'required|max:100',
            'password' => 'required|confirmed|min:6',
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
            'direccion.required' => 'La dirección no puede ser vacía',
            'direccion.min' => 'La dirección es muy corta',
            'password.required' => 'La contraseña no puede estar vacía',
            'password.confirmed' => 'Las contraseñas que ingreso no coinciden.',
        ];

        $this->validate($request,$rules,$mensaje);



      
        User::create([
            'name' => $request['nombre_completo'],
            'email' => $request['email'],
            'role' => $request['role'],
            'dni' => $request['dni'],
            'numero_cel' => $request['numero_cel'],
            'numero_tel' => $request['numero_tel'],
            'direccion' => $request['direccion'],
            'password' => Hash::make($request['password']),
        ]);          
    
       
        // $empleado = new Empleado();
        // $empleado->nombre_completo = $request->input('nombre_completo');
        // $empleado->DNI= $request->input('dni');
        // $empleado->numero_cel= $request->input('numero_cel');
        // $empleado->numero_tel= $request->input('numero_tel');
        // $empleado->direccion = $request->input('direccion');
        // $empleado->contraseña = $request->input('password');
        // $creado = $empleado->save();


            $texto='';
            $employee=DB::table('users')
            ->orderBy('id', 'desc')
            ->paginate(10);
            return view('listausuarios' , compact ('employee', 'texto'))
                ->with('mensaje', 'El usuario fue creado con exito');
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show($id)//mostrar
    {
        // abort_if(Gate::denies('usuario_detalle'), redirect()->route('principal')->with('denegar','No tiene acceso a esta seccion'));
        $user = User::findOrFail($id);
        return view('usuarios/showusuario')->with('usuario', $user);
        
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario $usuario
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUsuarioRequest  $request
     * @param  \App\Models\Usuario $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)//Actualizar
    {
        // abort_if(Gate::denies('usuario_actualizar'), redirect()->route('principal')->with('denegar','No tiene acceso a esta seccion'));
        $usuario = User::find($id);
        return view('usuarios/editusuario') ->with('usuario',$usuario);

        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);

        return redirect()->route('lista')->with('msj', 'El usuario fue eliminado exitosamente');
        //

    }

    public function update(Request $request, $id){


        $validator = Validator::make($request->all(), [
            'name' => 'required|max:110',
            'dni'=> 'required|numeric|regex:([0-1]{1}[0-9]{1}[0-2]{1}[0-8]{1}[0-9]{9})',
            'numero_cel'=> 'required|numeric|regex:([9,8,3]{1}[0-9]{7})',
            'numero_tel'=> 'required|numeric|regex:([2]{1}[0-9]{7})',
            'direccion'=>'required|max:100',
        ]);

        if($validator->fails()){
        
                $rules=[
                    'name' => 'required|max:110|min:5',
                    'dni'=> 'required|regex:([0-1]{1}[0-9]{1}[0-2]{1}[0-8]{1}[0-9]{9})|min:13',
                    'numero_cel'=> 'required|numeric|regex:([9,8,3]{1}[0-9]{7})|min:8',
                    'numero_tel'=> 'required|numeric|regex:([2]{1}[0-9]{7})|min:8',
                    'direccion'=>'required|max:100',
                    'password' => 'required|min:6',
                ];

                $mensaje=[
                    'name.required' => 'El nombre no puede estar vacío',
                    'name.max' => 'El nombre que ingresó es demasiado extenso',
                    'name.min' => 'El nombre debe de tener al menos seis caracteres',
                    'dni.required' => 'La identidad del usuario no puede estar vacía',
                    'dni.regex' => 'El formato de la identidad no es válida',
                    'dni.min' => 'La identidad debe de contener 13 dígitos',
                    'dni.unique' => 'La identidad que ingresó ya fue utilizada anteriormente',
                    'numero_cel.required' => 'El número de celular no puede estar vacio',
                    'numero_cel.regex' => 'El número de celular debe de tener 8 dígitos iniciar con 3,8 o 9',
                    'numero_cel.numeric' => 'En número de celular solo debe tener números',
                    'numero_cel.unique' => 'El número de celular que ingreso ya fue utilizado anteriomente',
                    'numero_cel.min' => 'El número de celular debe de tener 8 dígitos',
                    'numero_tel.required' => 'El número de teléfono fijo no puede estar vacío',
                    'numero_tel.regex' => 'El número de teléfono fijo debe tener 8 dígitos iniciar con 2',
                    'numero_tel.numeric' => 'En número de teléfono fijo solo debe tener números',
                    'numero_tel.min' => 'En número de teléfono fijo  debe de tener al menos 8 números',
                    'numero_tel.unique' => 'El número de teléfono fijo que ingreso ya lo uso anteriormente',
                    'direccion.required' => 'La dirección no puede estar vacía',
                    'direccion.min' => 'La dirección que ingresó es muy corta'
                ];

            $this->validate($request,$rules,$mensaje);

        }


        $usuario= User::findorFail($id);
        $usuario->name = $request->input('name');
        $usuario->dni= $request->input('dni');
        $usuario->numero_cel= $request->input('numero_cel');
        $usuario->numero_tel= $request->input('numero_tel');
        $usuario->direccion = $request->input('direccion');
        $creado = $usuario->save();

        // if ($actualizado){
            return redirect()->route('lista')->with('msj', 'El usuario se actualizó exitosamente');
        // } else {
          //
        // }

    }


    public function Principal() {return view('PaginaPrincipal');}
    public function VPUsuario() {return view('VentanaUsuarios');}
    public function VPProveedor() {return view('VentanaProveedores');}
    public function Ayuda() {return view('Ayuda');}

    }