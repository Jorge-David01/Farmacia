<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Caja;
use App\Models\caja_respuesta;
use Illuminate\Support\Facades\DB;
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
        $cajadatos = caja::paginate(10) ;
        return view('caja') ->with('cajadatos',$cajadatos);

        //
    }

    
    public function pregunta(){
        abort_if(Gate::denies('caja_pregunta'), redirect()->route('principal')->with('denegar','No tiene acceso a esta seccion'));
        return view('cajavaciar');       
       }
   

    public function respuesta(Request $request){
        abort_if(Gate::denies('caja_respuesta'), redirect()->route('principal')->with('denegar','No tiene acceso a esta seccion'));
      

        $rules=[
            'cajaalivio' => 'max:2|min:2',
         
           
        ];

        $msj=[
            'Answer.max' => 'La caja de alivio no se ha vaciado',
            'Answer.min' => 'La caja de alivio no se ha vaciado',
           
        ];
        $this->validate($request,$rules,$msj);

        $ques = new caja_respuesta();

        $ques-> respuesta = $request->input('cajaalivio');

        

        $guardado = $ques->save();



        

        if ($guardado) {
            return redirect()->route('caja.alivio')
                ->with('mensaje', 'La caja de alivio se ha vaciado exitosamente');
        }
    

        
       
    }


    public function busqueda(Request $request){
        
        $sear=trim($request->get('search'));
        $cajadatos=DB::table('cajas')

        ->where('Fecha','like','%'.$sear.'%')
        ->orderBy('Fecha', 'asc')->paginate(10);



        return view('caja')->with('cajadatos',  $cajadatos);
    }

}

