@extends('plantilla.principalpag')
@section('pestania', 'Editar proveedor')
@section('contenido')

<br>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <h2>Editar proveedor</h2>
    <form method="POST" action="">
    @method('put')
        @csrf
        <div class="form-group">
        <label for="Nombre_del_proveedor">Nombre del Proveedor:</label>
            <input type="text" class="form-control-file" name="Nombre_del_proveedor" id="Nombre_del_proveedor" 
            placeholder="Nombre_del_proveedor" value="{{$proveedor->Nombre_del_proveedor}}">
        </div>

        <div class="form-group">
        <label for="Nombre_del_distribuidor">Nombre del Distribuidor:</label>
            <input type="text" class="form-control-file" name="Nombre_del_distribuidor" id="Nombre_del_distribuidor" 
            placeholder="Nombre_del_distribuidor" value="{{$proveedor->Nombre_del_distribuidor}}">
        </div>
        
        <div class="form-group">
        <label for="Telefono_del_proveedor">Telefono del Proveedor:</label>
            <input type="text" class="form-control-file" name="Telefono_del_proveedor" id="Telefono_del_proveedor" 
            placeholder="Telefono_del_proveedor" value="{{$proveedor->Telefono_del_proveedor}}" >
        </div>
        <div class="form-group">
        <label for="Telefono_del_distribuidor">Telefono del Distribuidor:</label>
            <input type="text" class="form-control-file" name="Telefono_del_distribuidor" id="Telefono_del_distribuidor" 
            placeholder="Telefono_del_distribuidor" value="{{$proveedor->Telefono_del_distribuidor}}" >
        </div>
        <div class="form-group">
        <label for="Correo_electronico">Correo Electronico:</label>
            <input type="text" class="form-control-file" name="Correo_electronico" id="Correo_electronico" 
            placeholder="Correo_electronico" value="{{$proveedor->Correo_electronico}}" >
        </div>      

        <div class="text-center">

<button type="submit" class="btn btn-primary">Guardar</button>
<input type="reset" class="btn btn-danger">
 <a class="btn btn-success" href="/Listpro">Regresar</a>



</div>
      
    </form>
    @section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection