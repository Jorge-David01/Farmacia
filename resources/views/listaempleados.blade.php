@extends('plantilla.principalpag')
@section('pestania', 'Lista de empleados')
@section('contenido')

<style>
tr:nth-child(even) {
  background-color: #b3e0ff;
}

</style>
@if (session('Mensaje'))
<div class="alert alert-danger">
  {{session('Mensaje')}}
</div>
@endif


<a style="color: #0088cc; text-decoration: none; margin-top: 2%;" href="/Empleados"> <img src="https://us.123rf.com/450wm/faysalfarhan/faysalfarhan1711/faysalfarhan171112773/89435989-%C3%ADcono-de-flecha-hacia-atr%C3%A1s-aislado-en-la-ilustraci%C3%B3n-abstracta-de-bot%C3%B3n-redondo-azul-cian-especial.jpg?ver=6" style="width: 3%; height: 3%; margin-left: 5%; margin-top: 2%; float: left;"  alt=""> <h3 style="float: left; paddign: 1%; margin-top: 2.3%;" >Atrás</h3></a>
<br>
<h1 style="text-align: center; margin-top: 1%; padding-top: 3%;">Empleados</h1>

<table  style="width: 85%; margin: auto; margin-top: 3%; " >

<tbody >
<tr style="background: #0088cc; text-align: center; border: 2px solid #dddddd;">
<th style="border: 2px solid #dddddd" >Identificador</th>
<th style="border: 2px solid #dddddd">Nombre</th>
<th style="border: 2px solid #dddddd">Apellido</th>
<th style="border: 2px solid #dddddd">Número de identidad</th>
<th style="border: 2px solid #dddddd">Teléfono</th>
<th style="border: 2px solid #dddddd">Ver detalles</th>

</tr>



@forelse($employee as $emple)

<tr>
<td>{{$emple->id}}</td>
<td>{{$emple->nombres}}</td>
<td>{{$emple->apellidos}}</td>
<td>{{$emple->DNI}}</td>
<td>{{$emple->telefono_personal}}</td>
<td > <a class="btn btn-success" href="/Emple/{{$emple->id}}"> Ver detalles  </a></td>
</tr>

@empty

@endforelse


{{$employee -> links() }}



</tbody>

</table>



@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection

