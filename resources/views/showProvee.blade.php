@extends('plantilla.principalpag')
@section('pestania', 'Ventana de empleados')
@section('contenido')



<h1 style="margin-left: 4% ; margin-top: 70px; margin-bottom: 3%; "> <u>Detalles del proveedor</u> </h1>

<table class="table" style="margin-top: 1%; width: 78%; margin-left: 4%;  text-align: center; border: 2px solid #dddddd;" >
        <tr style="background: #0088cc; text-align: center; border: 2px solid #dddddd;">
            <th scope="col">Campo</th>
            <th scope="col">Valor</th>
        </tr>
       
        <tr>
            <th scope="row">Nombre del proveedor</th>
            <td>{{$provee->Nombre_del_proveedor}}</td>
        </tr>

        <tr>
           <th scope="row">Nombre del distribuidor</th>
            <td>{{$provee->Nombre_del_distribuidor}}</td>
        </tr>

        <tr>
           <th scope="row">Telefono del proveedor</th>
            <td>{{$provee->Telefono_del_proveedor}}</td>
        </tr>

        <tr>
            <th scope="row">Telefono del distribuidor</th>
            <td>{{$provee->Telefono_del_distribuidor}}</td>
        </tr>

        <tr>
            <th scope="row">Correo Electronico</th>
            <td>{{$provee->Correo_electronico}}</td>
        </tr>
</table>



<button style="margin-left: 4%;" class="btn btn-success">
<a class="btn btn-success" href="/Listpro">Volver</a>
</button>

<button class="btn btn-primary">
<a class="btn btn-primary" href="/Editprovee/{{$provee->id}}/editar">Actualizar</a>
</button>

<button class="btn btn-danger">
<form method="post" action="{{route('proveedores.delete',['id'=>$provee->id])}}">
    @csrf
    @method('delete') 
    <input type="submit" onclick="return confirm('¿Está seguro que desea eliminar el proveedor?')"
    value="Eliminar" class="btn btn-danger" >
</form>
</button>
@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection
