@extends('plantilla.principalpag')
@section('pestania', 'Lista de productos')
@section('contenido')

<style>
tr:nth-child(even) {
  background-color: #b3e0ff;
}php
</style>


<style>
td {
    text-align: center;
}
</style>

@if (session('Mensaje'))
<div class="alert alert-danger">
  {{session('Mensaje')}}
</div>
@endif

</style>
@if (session('msj'))
<div class="alert alert-success">
  {{session('msj')}}
</div>
@endif




<h1 style="margin-left: 38% ; margin-top: 1%; margin-bottom: 3%; "> <u>Productos</u> </h1>

<a style="margin-left: 4%;" class="btn btn-warning" href="/productos/nuevo">Nuevo</a>

<table  style="margin-top: 1%; width: 80%; margin-left: 4%;" >

<tr style="background: #0088cc; text-align: center; border: 2px solid #dddddd;">
<th>Nombre del proveedor</th>
<th>Nombre del producto</th>
<th>Principio activo</th>
<th>Ver detalles</th>
</tr>

<tbody>
    @if (count($produc)<=0)
        <tr>
        
            <td colspan="6">No hay resultados</td>
    </tr>
    @endif
</tbody>

@forelse($produc as $producto)

<tr style="border: 2px solid #dddddd;">
<td>{{$producto->id_proveedor}}</td>
<td>{{$producto->nombre_producto}}</td>
<td>{{$producto->principio_activo}}</td>
<td > <a  class="btn btn-success" href="/Detallesproduct/{{$producto->id}}"> Detalles </a></td>
</tr>

@empty

@endforelse


{{$produc -> links() }}



</tbody>

</table>



@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection
