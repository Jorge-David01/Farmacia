@extends('plantilla.principalpag')
@section('pestania', 'Editar usuario')
@section('contenido')
@section('TituloPlantillas', 'Editar Usuario')



    @if($errors->any())
        <div class="alert alert-danger">
            
                @foreach($errors->all() as $error)
                    <p>                        
                      &nbsp;&nbsp;{{$error}}
                    </p>                                       
                @endforeach
            
        </div>
    @endif

    <h1 style="margin-bottom: 6%;"></h1>
<div class="content-wrapper">
  <div class="container-fluid">

    <h1 style="margin-left: 3% ;  margin-bottom: 3%; "> </h1>
    
    <form style="margin-left: 2%;" method="POST" action="">
         @method('put')
         @csrf
        <div class="col-md-6 col-sm-6 ">
        <label for="name">Nombre Completo:</label>
            <input type="text" class="form-control"  name="name" id="name " 
             placeholder="name" value="{{$usuario->name}}" maxlength="50">
        </div>

        <div class="col-md-6 col-sm-6 ">
        <label for="email">Correo electronico:</label>
            <input type="text" class="form-control"  name="email" id="email" 
            placeholder="email" value="{{$usuario->email}}" >
        </div>


        <button style="margin-top: 20px; margin-left: 10px;" type="submit" class="btn btn-primary">Actualizar</button>
        <a style="margin-top: 20px;" class="btn btn-success" href="/ListaUsuarios">Regresar</a>

      
    </form>

</div>
</div>

    @section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection