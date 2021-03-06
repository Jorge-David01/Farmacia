@extends('plantilla.principalpag')
@section('pestania', 'Editar empleado')
@section('contenido')


    @if($errors->any())
        <div class="alert alert-danger">
            
                @foreach($errors->all() as $messages)
                    <p>                        
                      &nbsp;&nbsp;{{$messages}}
                    </p>                                       
                @endforeach
            
        </div>
    @endif


    <h1 style="margin-left: 3% ;  margin-bottom: 3%; ">Editar Cliente </h1>
    
    <form style="margin-left: 2%;" method="POST" action="">
    @method('put')
        @csrf
        <div class="col-md-6 col-sm-6 ">
        <label for="nombre_cliente">Nombre del cliente:</label>
            <input type="text" class="form-control-file" name="nombre_cliente" id="nombre_cliente" 
             placeholder="Nombre del cliente" value="{{$client->nombre_cliente}}" maxlength="6" maxlength="50">
        </div>

        <div class="col-md-6 col-sm-6 ">
        <label for="numero_identidad">Numero de identidad:</label>
            <input type="text" class="form-control-file" name="numero_identidad" id="numero_identidad" 
            placeholder="Número de identidad " value="{{$client->numero_id}} "  minlength="13" maxlength="13">
        </div>
        
        <div class="col-md-6 col-sm-6 ">
        <label for="numero_tel">Numero de Telefono:</label>
            <input type="text" class="form-control-file" name="numero_tel" id="numero_tel" 
            placeholder="Número de teléfono" value="{{$client->telefono}}"  minlength="8" maxlength="8"  pattern="[2,9,8,3]{1}[0-9]{7}" >
        </div>
        <div class="col-md-6 col-sm-6 ">
        <label for="direccion">Dirección</label>
            <input type="text" class="form-control-file" name="direccion" id="direccion" 
            placeholder="Dirección" value="{{$client->direccion}}"  minlength="10" maxlength="50">
        </div>

      

        <button style="margin-top: 20px; margin-left: 10px;" type="submit" class="btn btn-primary">Guardar</button>
        <input style="margin-top: 20px;" type="reset" class="btn btn-danger">
        <a style="margin-top: 20px;" class="btn btn-success" href="/Cliente">Regresar</a>


</div>
      
    </form>
    @section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection