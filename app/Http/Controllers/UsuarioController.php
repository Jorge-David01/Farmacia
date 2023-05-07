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
use Spatie\Permission\Models\Role;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use PDF;

class UsuarioController extends Controller
{

    
    
    public function createPDF(){
        $employee = User::all();

        $data = [
            'title' => 'Listado de Usuarios',
            'date' => date('m/d/Y'),
            'employee' =>$employee,
        ];
        return PDF::loadView('usuarios/pdf', $data)
        ->setPaper('a4', 'landscape')
        ->download('Listado_de_Usuarios_'.date('m_d_Y').'.pdf');

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
        // abort_if(Gate::denies('usuario_lista'), redirect()->route('principal')->with('denegar','No tiene acceso a esta seccion'));
        $texto=trim($request->get('texto'));
        $employee=DB::table('users')

       
        ->orwhere('name','like','%'.$texto.'%')
        ->orWhere('email','like','%'.$texto.'%')
        ->orderBy('id', 'desc')
        ->paginate(10);
        return view('listausuarios' , compact ('employee', 'texto'));
    }


    public function store(Request $request)
    {
        // abort_if(Gate::denies('usuario_nuevo'), redirect()->route('principal')->with('denegar','No tiene acceso a esta seccion'));
        $rules=[
            'nombre_completo' => 'required|max:110',
            'password' => 'required|confirmed|min:6',
        ];

        $mensaje=[
            'nombre_completo.required' => 'El nombre no puede estar vacío',
            'nombre_completo.max' => 'El nombre es demasiado extenso',
            'password.required' => 'La contraseña no puede estar vacía',
            'password.confirmed' => 'Las contraseñas que ingreso no coinciden.',
        ];

        $this->validate($request,$rules,$mensaje);



      
        $user = User::create([
            'name' => $request['nombre_completo'],
            'email' => $request['email'],
            'role' => $request['role'],
            'password' => Hash::make($request['password']),
        ]);  
        
        if($request['role'] == "Administrador"){
            $user->assignRole('Administrador');
        }else if($request['role'] == "Vendedor"){
            $user->assignRole('Vendedor');
        }
        
    


            $texto='';
            $employee=DB::table('users')
            ->orderBy('id', 'desc')
            ->paginate(10);
            return view('listausuarios' , compact ('employee', 'texto'))->with('msj', 'El usuario fue creado con éxito');
   
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
           
        ]);

        if($validator->fails()){
        
                $rules=[
                    'name' => 'required|max:110|min:5',
                    'password' => 'required|min:6',
                ];

                $mensaje=[
                    'name.required' => 'El nombre no puede estar vacío',
                    'name.max' => 'El nombre que ingresó es demasiado extenso',
                    'name.min' => 'El nombre debe de tener al menos seis caracteres',
                    
                ];

            $this->validate($request,$rules,$mensaje);

        }


        $usuario= User::findorFail($id);
        $usuario->name = $request->input('name');
      
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