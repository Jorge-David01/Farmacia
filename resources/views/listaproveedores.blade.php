@extends('plantilla.principalpag')
@section('pestania', 'Lista de empleados')
@section('contenido')

<style>
tr:nth-child(even) {
  background-color: #b3e0ff;
}

</style>


<style>
td {
    text-align: center;
  
}




</style>


</style>
@if (session('mensaje'))
<div class="alert alert-success">
  {{session('msj')}}
</div>
@endif




<h1 style="margin-left: 38% ; margin-top: 1%; margin-bottom: 3%; "> <u>Proveedores</u> </h1>


<a style="margin-left:4%" class="btn btn-warning" href="proveedor/nuevo">Nuevo Proveedor</a>

<table  style="margin-top: 1%; width: 80%; margin-left: 4%;" >


<tr style="background: #0088cc; text-align: center; border: 2px solid #dddddd;">
<th>Nombre del proveedor</th>
<th>Nombre del distribuidor</th>
<th>Teléfono</th>
<th>Ver detalles</th>
</tr>

<tbody>
    @if (count($pro)<=0)
        <tr>
            <td colspan="6">No hay resultados</td>
    </tr>
    @endif
</tbody>

@forelse($pro as $prove)

<tr style="border: 2px solid #dddddd;">
<td>{{$prove->Nombre_del_proveedor}}</td>
<td>{{$prove->Nombre_del_distribuidor}}</td>
<td>{{$prove->Correo_electronico}}</td>
<td > <a  class="btn btn-success" href="/Emple/{{$prove->id}}"> Detalles </a></td>
</tr>

@empty

@endforelse


{{$pro -> links() }}



</tbody>

</table>



@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection

