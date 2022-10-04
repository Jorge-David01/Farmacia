<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ContraseniaController extends Controller
{
    public function show($id,$from)
    {

        $user = User::findOrFail($id);
        return view('contrasenia/cambiocontra')->with('user', $user)->with('from', $from);
        
    }

    public function cambio(Request $request)
    {


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
