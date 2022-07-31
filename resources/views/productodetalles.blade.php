@extends('plantilla.principalpag')
@section('pestania', 'Detalles del producto')
@section('contenido')


<h1 style="margin-left: 4% ; margin-bottom: 3%; "> Detalles de productos </h1>

<table class="table" style="margin-top: 1%; width: 78%; margin-left: 4%;  text-align: center; border: 2px solid #dddddd;" >
        <tr style="background: #0088cc; text-align: center; border: 2px solid #dddddd;">
            <th scope="col">Campo</th>
            <th scope="col">Valor</th>
        </tr>

        <tr>
            <th scope="row">Nombre del proveedor</th>
            <td>{{$details->Nombre_del_proveedor}}</td>
        </tr>

        <tr>
           <th scope="row">Nombre del producto</th>
            <td>{{$details->nombre_producto}}</td>
        </tr>



        <tr>

           <th scope="row">Principio activo</th>
           <td>{{$details->principio_activo}}</td>
        </tr>



        <tr>
            <th scope="row">Descripción</th>
            <td>{{$details->descripcion}}</td>
        </tr>


</table>



<a  class="btn btn-success" href="/Producto">Volver</a>



<a style="display:inline-block;margin-left:1%;" class="btn btn-primary" href="/productoeditar/{{$details->id}}/editar">Actualizar</a>

</button>



@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection
