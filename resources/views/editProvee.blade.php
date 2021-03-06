@extends('plantilla.principalpag')
@section('pestania', 'Editar proveedor')
@section('contenido')


    @if($errors->any())
        <div class="alert alert-danger">
            
                @foreach($errors->all() as $error)
                    <p>
                        {{$error}}
                     </p>
                @endforeach
            
        </div>
    @endif

    
    <h1 style="margin-left: 3% ; margin-bottom: 3%; "> Editar Proveedor </h1>

    <form style="margin-left: 2%;" method="POST" action="">
        @method('put')
        @csrf

        <div class="col-md-6 col-sm-6 ">
        <label for="Nombre_del_proveedor">Nombre del Proveedor:</label>
            <input type="text" class="form-control-file" name="nombrepro" id="nombrepro" 
            placeholder="Nombre_del_proveedor" value="{{$proveedor->Nombre_del_proveedor}}" maxlength="50" >
        </div>

        <div class="col-md-6 col-sm-6 ">
        <label for="Nombre_del_distribuidor">Nombre del Distribuidor:</label>
            <input type="text" class="form-control-file" name="nombredis" id="nombredis" 
            placeholder="Nombre_del_distribuidor" value="{{$proveedor->Nombre_del_distribuidor}}" maxlength="50" >
        </div>
        
        <div class="col-md-6 col-sm-6 ">
        <label for="Telefono_del_proveedor">Telefono del Proveedor:</label>
            <input type="text" class="form-control-file" name="telefonopro" id="telefonopro" 
            placeholder="Telefono_del_proveedor" value="{{$proveedor->Telefono_del_proveedor}}"  maxlength="8"  >
        </div>

        <div class="col-md-6 col-sm-6 ">
        <label for="Telefono_del_distribuidor">Telefono del Distribuidor:</label>
            <input type="text" class="form-control-file" name="telefonodis" id="telefonodis" 
            placeholder="Telefono_del_distribuidor" value="{{$proveedor->Telefono_del_distribuidor}}"  maxlength="8"  >
        </div>

        <div class="col-md-6 col-sm-6 ">
        <label for="Correo_electronico">Correo Electronico:</label>
            <input type="text" class="form-control-file" name="correo" id="correo" 
            placeholder="Correo_electronico" value="{{$proveedor->Correo_electronico}}" >
        </div>      

        <div style="margin-top: 20px;">

        <button style=" margin-left: 10px;" type="submit" class="btn btn-primary">Guardar</button>
        <input type="reset" class="btn btn-danger">
        <a class="btn btn-success" href="/Listpro">Regresar</a>

</div>
      
    </form>
    @section('pie_pagina', 'Copyright ?? 2022. FARMACIA LA POPULAR.')
@endsection