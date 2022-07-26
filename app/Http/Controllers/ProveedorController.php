<?php

namespace App\Http\Controllers;
use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreProveedorRequest;
use Illuminate\Support\Facades\Validator;




class ProveedorController extends Controller{

//----------------------------------------------------------
//----------------- EDITAR PROVEEDOR -----------------------
    public function proveed(){
        $pro = Proveedor::paginate(10);
        return view('listaproveedores')->with('pro' , $pro);
    }

    //

    public function Ver($id){
        $provee = Proveedor::findOrFail($id);
        return view('showProvee')->with('provee', $provee);  
    }


//----------------------------------------------------------
//----------------- CREAR PROVEEDOR -----------------------
    public function nuevo(){

     return view('/createproveedor');       
    }


    public function crear(Request $request){
  
        $rules= ([
            'nombrepro'=>'required | max:70'  ,
            'nombredis'=>'required | max:70',
            'telefonopro'=>'required|unique:proveedors,Telefono_del_proveedor|min:8| max:8',
            'telefonodis'=>'required|unique:proveedors,Telefono_del_distribuidor|min:8|max:8|regex:([9,8,3]{1}[0-9]{7})',
            'correo'=>'required|unique:proveedors,Correo_electronico',
            

        ]);

        $messages =[
            'nombrepro.required'=>'El nombre del proveedor es obligatorio' ,
            'nombrepro.max'=>'El nombre del proveedor es demasiado largo' ,

            'nombredis.required'=>'El nombre del distribuidor es obligatorio' ,
            'nombrepro.max'=>'El nombre del proveedor es demasiado largo' ,

            'telefonopro.required'=>'El teléfono del proveedor es obligatorio' ,
            'telefonopro.unique'=>'El teléfono de proveedor que ingreso ya ha sido usado' ,
            'telefonopro.min'=>'El teléfono del proveedor debe de tener un minimo de 8 digitos' ,
            'telefonopro.max'=>'El teléfono del proveedor debe de tener un máximo de 8 digitos' ,


            'telefonodis.required'=>'El teléfono del distribuidor es obligatorio' ,
            'telefonodis.unique'=>'El teléfono de distribuidor que ingreso ya ha sido usado' ,
            'telefonodis.min'=>'El teléfono del distribuidor debe de tener un minimo de 8 digitos' ,
            'telefonodis.max'=>'El teléfono del distribuidor debe de tener un máximo de 8 digitos' ,

            'correo.required'=>'El correo electrónico es obligatorio' ,
            'correo.unique'=>'El correo electrónico que ingreso ya ha sido utilizado' ,
        ];


        $this->validate($request, $rules, $messages);

        $proveedor = new Proveedor();

        $proveedor->Nombre_del_proveedor = $request->input('nombrepro');
        $proveedor->Nombre_del_distribuidor= $request->input('nombredis');
        $proveedor->Telefono_del_proveedor= $request->input('telefonopro');
        $proveedor->Telefono_del_distribuidor= $request->input('telefonodis');
        $proveedor->Correo_electronico= $request->input('correo');
     


        $creado = $proveedor->save();

        if ($creado) {
            return redirect()->route('lista.proveedor')
                ->with('mensaje', 'El proveedor fue creado con exito');
        } else {

        }
    }


    
//----------------------------------------------------------
//----------------- EDITAR PROVEEDOR -----------------------
    public function edit(Request $request, $id)//Editar
    {
        $proveedor = Proveedor::find($id);
        return view('editProvee') ->with('proveedor',$proveedor);


    }

    public function update(Request $request, $id){


        $validator = Validator::make($request->all(), [
            'nombrepro'=>'required|max:110',
            'nombredis'=>'required|max:110',
            'telefonopro'=>'required|numeric|regex:([9,8,3]{1}[0-9]{7})',
            'telefonodis'=>'required|numeric|regex:([9,8,3]{1}[0-9]{7})',
            'correo'=>'required',
        ]);

        if($validator->fails()){
        
            $rules=[

                'nombrepro' => 'required|max:110|min:5',
                'nombredis'=> 'required|max:110|min:5',
                'telefonopro'=> 'required|numeric|regex:([9,8,3]{1}[0-9]{7})|min:8',
                'telefonodis'=> 'required|numeric|regex:([9,8,3]{1}[0-9]{7})|min:8',
                'correo'=>'required|max:100',
            ];

        $mensaje =[
            'nombrepro.required'=>'El nombre del proveedor es obligatorio',
            'nombrepro.max'=>'El nombre del proveedor es demasiado largo',
            'nombrepro.min' => 'El nombre del proveedor debe de tener al menos seis caracteres',
            'nombredis.required'=>'El nombre del distribuidor es obligatorio',
            'nombredis.max'=>'El nombre del distribuidor es demasiado largo',
            'nombredis.min' => 'El nombre del distribuidor debe de tener al menos seis caracteres',
            'telefonopro.required'=>'El teléfono del proveedor es obligatorio',
            'telefonopro.regex' => 'El número de teléfono  debe de tener 8 dígitos iniciar con 3,8 o 9',
            'telefonopro.numeric' => 'En número de teléfono solo debe de tener números',
            'telefonopro.unique'=>'El teléfono de proveedor que ingreso ya ha sido usado anteriormente',
            'telefonopro.min'=>'El teléfono del proveedor debe de tener un minimo de 8 digitos',
            'telefonodis.required'=>'El teléfono del distribuidor es obligatorio',
            'telefonodis.regex' => 'El número de teléfono  debe de tener 8 dígitos iniciar con 3,8 o 9',
            'telefonodis.numeric' => 'En número de teléfono solo debe de tener números',
            'telefonodis.unique'=>'El teléfono de distribuidor que ingreso ya ha sido usado',
            'telefonodis.min'=>'El teléfono del distribuidor debe de tener un minimo de 8 digitos',
            'correo.required'=>'El correo electrónico es obligatorio',
            'correo.unique'=>'El correo electrónico que ingreso ya ha sido utilizado',
        ];

        $this->validate($request,$rules,$mensaje);

        }

        $proveedor=Proveedor::findorFail($id);
        $proveedor->Nombre_del_proveedor = $request->input('nombrepro');
        $proveedor->Nombre_del_distribuidor= $request->input('nombredis');
        $proveedor->Telefono_del_proveedor= $request->input('telefonopro');
        $proveedor->Telefono_del_distribuidor= $request->input('telefonodis');
        $proveedor->Correo_electronico= $request->input('correo');
        $creado = $proveedor->save();
    
            return redirect()->route('lista.proveedor')->with('msj', 'El proveedor se actualizo exitosamente');
    

    }


//-----------------------------------------------------------
//------------- BUSCADOR Y BORRAR PROVEEDOR -----------------
    public function sear(Request $REQUEST){
        $pro = Proveedor::where('Nombre_del_proveedor','like', '%'.$REQUEST->search.'%' )
        ->orWhere('Nombre_del_distribuidor', 'like', '%'.$REQUEST->search.'%')->paginate(10);
        return view('listaproveedores')->with('pro', $pro);
    }

    
}
