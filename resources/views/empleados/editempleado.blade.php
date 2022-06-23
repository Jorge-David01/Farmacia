@extends('plantilla.principalpag')
@section('pestania', 'Detalle de empleado')
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

    <h2>Editar empleado</h2>
    <form method="POST" action="">
    @method('put')
        @csrf
        <div class="form-group">
        <label for="nombres">Nombres:</label>
            <input type="text" class="form-control-file" name="nombres" id="nombres" 
            placeholder="Nombres" value="{{$empleado->nombres}}">
        </div>

        <div class="form-group">
        <label for="apellidos">Apellidos:</label>
            <input type="text" class="form-control-file" name="apellidos" id="apellidos" 
            placeholder="Apellidos" value="{{$empleado->apellidos}}">
        </div>
        
        <div class="form-group">
        <label for="birthday">Birthday:</label>
            <input type="text" class="form-control-file" name="birthday" id="birthday" 
            placeholder="birthday" value="{{$empleado->fecha_de_nacimiento}}" >
        </div>
        <div class="form-group">
        <label for="dni">DNI:</label>
            <input type="text" class="form-control-file" name="dni" id="dni" 
            placeholder="dni" value="{{$empleado->DNI}}" >
        </div>
        <div class="form-group">
        <label for="personal">Telefono personal:</label>
            <input type="text" class="form-control-file" name="personal" id="personal" 
            placeholder="personal" value="{{$empleado->telefono_personal}}" >
        </div>
        
        <div class="form-group">
        <label for="email">Correo electronico:</label>
            <input type="text" class="form-control-file" name="email" id="email" 
            placeholder="email" value="{{$empleado->correo_electronico}}" >
        </div>
        <div class="form-group">
        <label for="direccion">Direccion:</label>
            <input type="text" class="form-control-file" name="direccion" id="direccion" 
            placeholder="Direccion" value="{{$empleado->direccion}}" >
        </div>
     
        <div class="form-group">
        <label for="genero">Genero:</label>
            <input type="text" class="form-control-file" name="genero" id="genero" 
            placeholder="Genero" value="{{$empleado->genero}}" >
        </div>
      
        <div class="form-group">
        <label for="password">Contraseña:</label>
            <input type="password" class="form-control-file" name="password" id="password" 
            placeholder="Password" value="{{$empleado->contraseña}}" >
        </div>
      

        <div class="text-center">
<button type="submit" class="btn btn-primary">Guardar Datos</button>
<input type="reset" class="btn btn-danger">

</div>
      
    </form>
    @section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection