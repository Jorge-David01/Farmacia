@extends('plantilla.principalpag')
@section('pestania', 'Detalle de empleado')
@section('contenido')

<style>
tr:nth-child(even) {
  background-color: #b3e0ff;
}
</style>

    <br>
    <h2>Detalles del empleado: </h2>
    <table class="table">
        <thead>
        <tr style="background: #d9d9d9">
            <th scope="col">Campo</th>
            <th scope="col">Valor</th>
        </tr>
        </thead>
        <tbody>
       
        <tr>
            <th scope="row">Nombres</th>
            <td>{{$empleado->nombres}}</td>
        </tr>
        <tr>
           <th scope="row">Apellidos</th>
            <td>{{$empleado->apellidos}}</td>
        </tr>
        <tr>
           <th scope="row">Fecha de Nacimiento</th>
            <td>{{$empleado->fecha_de_nacimiento}}</td>
        </tr>
        <tr>
           <th scope="row">Identidad</th>
            <td>{{$empleado->DNI}}</td>
        </tr>
        <tr>
            <th scope="row">Telefono Personal</th>
            <td>{{$empleado->telefono_personal}}</td>
        </tr>
        <tr>
            <th scope="row">Correo Electronico</th>
            <td>{{$empleado->correo_electronico}}</td>
        </tr>
        <tr>
            <th scope="row">Direccion</th>
            <td>{{$empleado->direccion}}</td>
            </tr>
            <tr>
            <th scope="row">Genero</th>
            <td>{{$empleado->genero}}</td>
            </tr>
            <tr>

         
</tbody>
</table>

<a class="btn btn-primary" href="/Lista">Volver</a>
<a class="btn btn-primary" href="/Empleado/{{$empleado->id}}/editar">Actualizar</a>
<form method="post" action="{{route('empleados.delete',['id'=>$empleado->id])}}">
                        @csrf
                  @method('delete') <input type="submit" onclick="return confirm('¿Está seguro que desea eliminar el empleado?')"
 value="eliminar" class="btn btn-primary">
                    </form>

@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection