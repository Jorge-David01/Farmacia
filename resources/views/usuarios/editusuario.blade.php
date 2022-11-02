@extends('plantilla.principalpag')
@section('pestania', 'Editar usuario')
@section('contenido')



    @if($errors->any())
        <div class="alert alert-danger">
            
                @foreach($errors->all() as $error)
                    <p>                        
                      &nbsp;&nbsp;{{$error}}
                    </p>                                       
                @endforeach
            
        </div>
    @endif

<div class="content-wrapper">
  <div class="container-fluid">

    <h1 style="margin-left: 3% ;  margin-bottom: 3%; ">Editar Usuario </h1>
    
    <form style="margin-left: 2%;" method="POST" action="">
         @method('put')
         @csrf
        <div class="col-md-6 col-sm-6 ">
        <label for="name">Nombre Completo:</label>
            <input type="text" class="form-control-file" name="name" id="name " 
             placeholder="name" value="{{$usuario->name}}" maxlength="50">
        </div>

        <div class="col-md-6 col-sm-6 ">
        <label for="email">Correo electronico:</label>
            <input type="text" class="form-control-file" name="email" id="email" 
            placeholder="email" value="{{$usuario->email}}" maxlength="13">
        </div>

        <div class="col-md-6 col-sm-6 ">
        <label for="dni">Identidad:</label>
            <input type="text" class="form-control-file" name="dni" id="dni" 
            placeholder="dni" value="{{$usuario->dni}}" maxlength="13">
        </div>

        <div class="col-md-6 col-sm-6 ">
        <label for="numero_cel">Numero de Celular:</label>
            <input type="text" class="form-control-file" name="numero_cel" id="numero_cel" 
            placeholder="numero_cel" value="{{$usuario->numero_cel}} " maxlength="8">
        </div>
        
        <div class="col-md-6 col-sm-6 ">
        <label for="numero_tel">Telefono fijo:</label>
            <input type="text" class="form-control-file" name="numero_tel" id="numero_tel" 
            placeholder="numero_tel" value="{{$usuario->numero_tel}}" maxlength="8" >
        </div>
      

        <div class="col-md-6 col-sm-6 ">
        <label for="direccion">Direccion:</label>
            <input type="text" class="form-control-file" name="direccion" id="direccion" 
            placeholder="Direccion" value="{{$usuario->direccion}}"maxlength="100" >
        </div>     

        <button style="margin-top: 20px; margin-left: 10px;" type="submit" class="btn btn-primary">Actualizar</button>
        <a style="margin-top: 20px;" class="btn btn-success" href="/ListaUsuarios">Regresar</a>

      
    </form>

</div>
</div>

    @section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection