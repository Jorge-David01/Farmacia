@extends('plantilla.principalpag')
@section('pestania', 'Ventana de empleados')
@section('contenido')


<br>
<h2 style="margin-left: 37% ; margin-top: 1%; margin-bottom: 3%;" >Detalles del proveedor</h2> 

<table class="table" style="margin-top: 1%; width: 78%; margin-left: 4%;  text-align: center; border: 2px solid #dddddd;" >
        <tr style="background: #d9d9d9">
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

@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection