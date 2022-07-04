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
            <th scope="row">Nombre Completo</th>
            <td>{{$empleado->nombre_completo}}</td>
        </tr>
        <tr>
           <th scope="row">Numero de Celular</th>
            <td>{{$empleado->numero_cel}}</td>
        </tr>
        <tr>
           <th scope="row">Numero de telefono</th>
            <td>{{$empleado->numero_tel}}</td>
        </tr>
        <tr>
           <th scope="row">Identidad</th>
            <td>{{$empleado->DNI}}</td>
        </tr>
        <tr>
            <th scope="row">Direccion</th>
            <td>{{$empleado->direccion}}</td>
            </tr>
          
        <tr>

         
</tbody>
</table><br>


<button class="btn btn-success">
<a class="btn btn-success" href="/Lista">Volver</a>
</button>
<button class="btn btn-primary">
<a class="btn btn-primary" href="/Empleado/{{$empleado->id}}/editar">Actualizar</a>
</button>
<button class="btn btn-danger">
<form method="post" action="{{route('empleados.delete',['id'=>$empleado->id])}}">
    @csrf
    @method('delete') 
    <input type="submit" onclick="return confirm('¿Está seguro que desea eliminar el empleado?')"
    value="eliminar" class="btn btn-danger" >
</form>
</button>


@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection