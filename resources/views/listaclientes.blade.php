@extends('plantilla.principalpag')
@section('pestania', 'Lista de clientes')
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
@if (session('msj'))
<div class="alert alert-success">
  {{session('msj')}}
</div>
@endif


<h1 style="margin-left: 4% ; margin-top: 70px; margin-bottom: 3%; "> <u>Clientes</u> </h1>

<a style="margin-left: 4%;" class="btn btn-warning" href="/clientes/nuevo">Registrar cliente</a>

<form action="{{route('cliente.busqueda')}}" method="POST" style="margin-top: 1%; width: 78%; margin-left: 4%;">
@csrf
<input type="text" name="busca" id="busca" placeholder="Busqueda">
<input style="margin-left: 15px" type="submit" value="Buscar" class="btn btn-success">
<a style="margin-left: 4%;" class="btn btn-warning" href="/Cliente">Limpiar</a>

</form>

<table  style="margin-top: 1%; width: 80%; margin-left: 4%;" >


<tr style="background: #0088cc; text-align: center; border: 2px solid #dddddd;">
<th>Nombre Completo</th>
<th>Telefono</th>
<th>Numero de Carnet</th>
<th>Identidad</th>
<th>Ver detalles</th>
</tr>

<tbody>
    @if (count($liscliente)<=0)
        <tr>
            <td colspan="6">No hay resultados</td>
    </tr>
    @endif
</tbody>

@forelse($liscliente as $cliente)


<tr style="border: 2px solid #dddddd;">
<td> {{$cliente->nombre_cliente}} </td>
<td>  {{$cliente->telefono}} </td>
<td>  {{$cliente->num_carnet}}  </td>
<td>  {{$cliente->numero_id}}  </td>

<td > <a href="/Vercliente/{{$cliente->id}}" class="btn btn-success"> Detalles </a></td>
</tr>

@empty

@endforelse

{{$liscliente -> links() }}

</tbody>
</table>

@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection