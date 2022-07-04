@extends('plantilla.principalpag')
@section('pestania', 'Editar empleado')
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
        <label for="nombre_completo">Nombre Completo:</label>
            <input type="text" class="form-control-file" name="nombre_completo" id="nombre_completo" 
            placeholder="nombre_completo" value="{{$empleado->nombre_completo}}">
        </div>

        <div class="form-group">
        <label for="numero_cel">Numero de Celular:</label>
            <input type="text" class="form-control-file" name="numero_cel" id="numero_cel" 
            placeholder="numero_cel" value="{{$empleado->numero_cel}}">
        </div>
        
        <div class="form-group">
        <label for="numero_tel">Numero de Telefono:</label>
            <input type="text" class="form-control-file" name="numero_tel" id="numero_tel" 
            placeholder="numero_tel" value="{{$empleado->numero_tel}}" >
        </div>
        <div class="form-group">
        <label for="DNI">DNI:</label>
            <input type="text" class="form-control-file" name="DNI" id="DNI" 
            placeholder="DNI" value="{{$empleado->DNI}}" >
        </div>

        <div class="form-group">
        <label for="direccion">Direccion:</label>
            <input type="text" class="form-control-file" name="direccion" id="direccion" 
            placeholder="Direccion" value="{{$empleado->direccion}}" >
        </div>
     
        <div class="form-group">
        <label for="contraseña">Contraseña:</label>
            <input type="contraseña" class="form-control-file" name="contraseña" id="contraseña" 
            placeholder="contraseña" value="{{$empleado->contraseña}}" >
        </div>
      

        <button type="submit" class="btn btn-primary">Guardar</button>
<input type="reset" class="btn btn-danger">
 <a class="btn btn-success" href="/Lista">Regresar</a>


</div>
      
    </form>
    @section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection