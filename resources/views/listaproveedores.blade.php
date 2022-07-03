@extends('plantilla.principalpag')
@section('pestania', 'Lista de empleados')
@section('contenido')


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
@if (session('mensaje'))
<div class="alert alert-success">
  {{session('msj')}}
</div>
@endif





<h1 style="margin-left: 38% ; margin-top: 1%; margin-bottom: 3%; "> <u>Proveedores</u> </h1>


<a style="margin-left:4%" class="btn btn-warning" href="proveedor/nuevo">Nuevo Proveedor</a>

<br><br>
<h1 style="margin-left: 37% ; margin-top: 1%; margin-bottom: 3%; "> <u>Proveedores</u> </h1>



<table  style="margin-top: 1%; width: 78%; margin-left: 4%;" >


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

@forelse($pro as $provee)

<tr style="border: 2px solid #dddddd;">

<td>{{$prove->Nombre_del_proveedor}}</td>
<td>{{$prove->Nombre_del_distribuidor}}</td>
<td>{{$prove->Correo_electronico}}</td>
<td > <a  class="btn btn-success" href="/Emple/{{$prove->id}}"> Detalles </a></td>

<td>{{$provee->Nombre_del_proveedor}}</td>
<td>{{$provee->Nombre_del_distribuidor}}</td>
<td>{{$provee->Telefono_del_proveedor}}</td>
<td > <a  class="btn btn-success" href="/Verprovee/{{$provee->id}}"> Detalles </a></td>

</tr>

@empty

@endforelse


{{$pro -> links() }}



</tbody>

</table>



@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection

