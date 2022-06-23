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
    <form method="post" action="{{route('empleados.edit',['id'=>$empleado->id])}}">
    @method('put')
        @csrf
        <div class="form-group">
        <label for="nombres">Nombres:</label>
            <input type="text" class="form-control-file" name="nombres" id="nombres" 
            placeholder="" value="{{$empleado->nombres}}">
        </div>

        <div class="form-group">
        <label for="apellidos">Apellidos:</label>
            <input type="text" class="form-control-file" name="apellidos" id="apellidos" 
            placeholder="Apellidos" value="{{$empleado->apellidos}}">
        </div>
        
        <div class="form-group">
        <label for="fecha_de_nacimiento">Apellido:</label>
            <input type="text" class="form-control-file" name="fecha_de_nacimiento" id="fecha_de_nacimiento" 
            placeholder="Fecha de nacimiento" value="{{$empleado->fecha_de_nacimiento}}" >
        </div>
        <div class="form-group">
        <label for="identidad">Identidad:</label>
            <input type="text" class="form-control-file" name="identidad" id="identidad" 
            placeholder="Identidad" value="{{$empleado->identidad}}" >
        </div>
        <div class="form-group">
        <label for="telefono_personal">Telefono personal:</label>
            <input type="text" class="form-control-file" name="telefono_personal" id="telefono_personal" 
            placeholder="telefono_personal" value="{{$empleado->telefono_personal}}" >
        </div>
        
        <div class="form-group">
        <label for="correo_electronico">Correo electronico:</label>
            <input type="text" class="form-control-file" name="correo_electronico" id="correo_electronico" 
            placeholder="Correo electronico" value="{{$empleado->correo_electronico}}" >
        </div>
        <div class="form-group">
        <label for="direccion">Direccion:</label>
            <input type="text" class="form-control-file" name="direccion" id="direccion" 
            placeholder="Direccion" value="{{$empleado->direccion}}" >
        </div>

    </form>
    @section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection