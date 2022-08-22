@extends('plantilla.principalpag')
@section('pestania', '')

@section('contenido')

<style>
td {
  text-align: center;
}
</style>



<h1 style="margin-left: 4% ; margin-bottom: 3%; "> Entradas y Salidas </h1>



<form action="{{route('kardex.index')}}" method="GET">
<div style="width: 80%;margin-left: 4%">
          <div>
            <label for="">Fecha:</label>
            <span class="input-group-text bg-info text-white" id="basic-addon1"><i class="fas fa-calendar-alt"></i></span>
          </div>
          <div>
            <input type="date" class="form-control" id="fecha" name="fecha" onchange="this.form.submit()"  value="{{date("Y-m-d", strtotime($fecha))}}">
          </div>
        </div>
</form>

<br>
<table  style="margin-top: 1%; width: 80%; margin-left: 4%;" >

<tr style="background: #0088cc; text-align: center; border: 2px solid #dddddd;">
<th rowspan="2">producto</th>
<th colspan="3">Entrada</th>
<th colspan="3">Salida</th>
</tr>
<tr style="background: #0088cc; text-align: center; border: 2px solid #dddddd;">
<th>Cantidad</th>
<th>Precio</th>
<th>Total</th>
<th>Cantidad</th>
<th>Precio</th>
<th>Total</th>
</tr>


<tbody>
@forelse($kardex as $k)

<tr style="border: 2px solid #dddddd;">

<td>{{$k->nombre_producto}}</td>

@if($k->tipo == 'venta')
<td></td>
<td></td>
<td></td>
<td>{{$k->cantidad}}</td>
<td>{{$k->precio}}</td>
<td>{{$k->precio * $k->cantidad}}</td>
@else
<td>{{$k->cantidad}}</td>
<td>{{$k->precio}}</td>
<td>{{$k->precio * $k->cantidad}}</td>
<td></td>
<td></td>
<td></td>
@endif

</tr>

@empty

@endforelse

</tbody>

</table>

@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection
