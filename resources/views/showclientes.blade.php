@extends('plantilla.principalpag')
@section('pestania', 'Ventana de proveedores')
@section('contenido')



<h1 style="margin-left: 4% ; margin-top: 70px; margin-bottom: 3%; "> <u>Detalles del Cliente</u> </h1>

<table class="table" style="margin-top: 1%; width: 78%; margin-left: 4%;  text-align: center; border: 2px solid #dddddd;" >
        <tr style="background: #0088cc; text-align: center; border: 2px solid #dddddd;">
            <th scope="col">Campo</th>
            <th scope="col">Valor</th>
        </tr>
       
        <tr>
            <th scope="row">Nombre del cliente</th>
            <td>{{$cliente->nombre_cliente}}</td>
        </tr>

        <tr>
           <th scope="row">Número de Identidad</th>
            <td>{{$cliente->numero_id}}</td>
        </tr>

        <tr>
           <th scope="row">Telefono</th>
            <td>{{$cliente->telefono}}</td>
        </tr>

        <tr>
           <th scope="row">Número de Carnet</th>
            <td>{{$cliente->num_carnet}}</td>
        </tr>

</table>



<button style="margin-left: 4%;" class="btn btn-success">
<a class="btn btn-success" href="/Cliente">Volver</a>
</button>

<!-- <button class="btn btn-primary">
<a class="btn btn-primary" href="">Actualizar</a>
</button> -->

@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection
