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



<div class="clearfix"></div>
  <div class="content-wrapper">
  <div class="container-fluid">



<h1 style=" margin-bottom: 3%; margin-left: 2%; "> Clientes </h1>
@if (session('msj'))
<div class="alert alert-success">
  {{session('msj')}}
</div>
@endif
<a class="btn btn-warning" href="/clientes/nuevo">Registrar cliente</a>

<form action="{{route('cliente.busqueda')}}" method="POST" style="margin-top: 1%; width: 78%;">
@csrf
<input type="text" name="busca" id="busca" placeholder="Busqueda">
<input style="margin-left: 15px" type="submit" value="Buscar" class="btn btn-success">
<a style="margin-left: 4%;" class="btn btn-warning" href="/Cliente">Limpiar</a>

</form>

<h1 style="margin-bottom: 2%;"></h1>

	<div class="row" >
	<div class="col-12 col-lg-12">
	<div class="card" >
		 

	<div class="table-responsive">

    <table class="table align-items-center table-flush table-borderless">
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

                
</div>
</div>
</div>
</div>
@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection