<?php

namespace App\Http\Controllers;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{

    public function proveed(){

        $pro = Proveedor::paginate(10);
        return view('listaproveedores')->with('pro' , $pro);
    }
    //
}
