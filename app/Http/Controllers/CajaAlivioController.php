<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Caja;
use App\Models\caja_respuesta;

use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreProveedorRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Gate;

class CajaAlivioController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }



    public function caja()
    {
        abort_if(Gate::denies('caja_nuevo'), redirect()->route('principal')->with('denegar','No tiene acceso a esta seccion'));
        $cajadatos = caja::paginate(10);
        return view('caja') ->with('cajadatos',$cajadatos);

        //
    }

    
    public function pregunta(){
        abort_if(Gate::denies('caja_pregunta'), redirect()->route('principal')->with('denegar','No tiene acceso a esta seccion'));
        return view('cajavaciar');       
       }
   

    public function respuesta(Request $request){
        abort_if(Gate::denies('caja_respuesta'), redirect()->route('principal')->with('denegar','No tiene acceso a esta seccion'));
        $rules= ([
            'cajaalivio'=>'required |min:2 |max:2 | alpha'  ,
        ]);

        $messages =[
            'cajaalivio.required'=>'Si desea vacias la caja de escribir "si" ' ,
            
            'cajaalivio.min'=>'La palabra a ingresar debe contener únicamente 2 letras ' ,
            'cajaalivio.max'=>'La palabra a ingresar debe contener únicamente 2 letras ' ,
        ];


        $this->validate($request, $rules, $messages);

        $answer = new caja_respuesta();

        $answer-> respuesta = $request->input('cajaalivio');

        $guardado = $answer->save();

        if ($guardado) {
            return redirect()->route('caja.alivio')
            ->with('mensaje', 'La caja de alivio se vacio exitosamente')   ;
        } else {

        }
    }
    //
}
