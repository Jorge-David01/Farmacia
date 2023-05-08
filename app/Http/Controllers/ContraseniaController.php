<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class ContraseniaController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    public function show($id,$from)
    {
 //abort_if(Gate::denies('cambio_contraseña'), redirect()->route('principal')->with('denegar','No tiene acceso a esta seccion'));
        $user = User::findOrFail($id);
            $verificar_contrasenia='';
            $password='';
            $password_confirmation = '';
      
        return view('contrasenia/cambiocontra')->with('user', $user)->with('from', $from)
        ->with('verificar_contrasenia',$verificar_contrasenia)       
        ->with('password',$password)        
        ->with('password_confirmation',$password_confirmation);        
    }

    public function cambio(Request $request)
    {
 //abort_if(Gate::denies('cambio_contraseña'), redirect()->route('principal')->with('denegar','No tiene acceso a esta seccion'));
        $from = $request->from;



        $mensaje=[
            'password_confirmation.same' => 'La contraseña no coincide',   
            'password_confirmation.required' => 'La verificacion de contraseña es requerida', 
            'verificar_contrasenia.required' => 'La verificacion de contraseña es requerida',
            'password.required' => 'La contraseña es requerida',                 
        ];


        $this->validate($request,[
                'password_confirmation' => 'required|required_with:password|same:password',
                'verificar_contrasenia' => 'required',
                'password' => 'required'
            ],$mensaje);

        

        if($from == 'navbar'){
            $user= User::findorFail($request->id);           
            if( !password_verify($request->verificar_contrasenia, $user->password)){
                $inputs = array(
                "verificar_contrasenia"=>$request->verificar_contrasenia,
                "password"=>$request->password_confirmation,
                "password_confirmation"=>$request->password_confirmation
                );
                
                $verificar_contrasenia=$request->verificar_contrasenia;
                $password=$request->password_confirmation;
                $password_confirmation = $request->password_confirmation;

                return view('contrasenia/cambiocontra')->with('user', $user)->with('from', $from)
                ->with('verificar_contrasenia',$verificar_contrasenia)       
                ->with('password',$password)        
                ->with('password_confirmation',$password_confirmation);  
            }else{

                session('erro', 'Ingrese la contraseña correcta');
                return redirect()->back();  
            }
        }
        


        $password = Hash::make($request->password_confirmation);

        $user= User::findorFail($request->id);
        $user->password = $password;
        $creado = $user->save();

        if($request->from == 'navbar'){
            return redirect()->route('principal')->with('msj', 'La contrasena se actualizo exitosamente');
        }else if($request->from == 'listausuarios'){
            $texto='';
            $employee=DB::table('users')
            ->orderBy('id', 'desc')
            ->paginate(10);
            return view('listausuarios' , compact ('employee', 'texto'))->with('mensaje', 'La contrasena se actualizo exitosamente');
        }

      
    }
}
