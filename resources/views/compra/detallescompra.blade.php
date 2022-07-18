@extends('plantilla.principalpag')
@section('pestania', 'Detalles de compra')
@section('contenido')





<h1 style="margin-left: 4% ; margin-top: 70px; margin-bottom: 3%; "> <u>Detalles de compra</u> </h1>

<table class="table" style="margin-top: 1%; width: 78%; margin-left: 4%;  text-align: center; border: 2px solid #dddddd;" >
        <tr style="background: #0088cc; text-align: center; border: 2px solid #dddddd;">
            <th scope="col">Campo</th>
            <th scope="col">Valor</th>
        </tr>
       
        <tr>
            <th scope="row">Número de factura</th>
            <td>{{$comp->numero_factura}} </td>
        </tr>

        <tr>
           <th scope="row">Nombre del producto</th>
            <td>{{$details->id_producto}}</td>
        </tr>

        <tr>
           <th scope="row">Cantidad comprada</th>
            <td>{{$details->cantidad}}</td>
        </tr>

        <tr>
            <th scope="row">Número de lote</th>
            <td>{{$details->lote}}</td>
        </tr>

        <tr>
            <th scope="row">Fecha de vencimiento</th>
            <td>{{$details->fecha_vencimiento}}</td>
        </tr>

        <tr>
            <th scope="row">Precio de compra</th>
            <td>{{$details->precio_farmacia}}</td>
        </tr>
        <tr>
            <th scope="row">Precio de venta</th>
            <td>{{$details->precio_publico}}</td>
        </tr>

</table>



<button style="margin-left: 4%;" class="btn btn-success">
<a class="btn btn-success" href="/Listpro">Volver</a>
</button>

<button class="btn btn-primary">
<a class="btn btn-primary" href="">Actualizar</a>
</button>

<button class="btn btn-danger">
<form method="post" action="">
    @csrf
    @method('delete') 
    <input type="submit" onclick="return confirm('¿Está seguro que desea eliminar la compra?')"
    value="Eliminar" class="btn btn-danger" >
</form>
</button>
@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection

