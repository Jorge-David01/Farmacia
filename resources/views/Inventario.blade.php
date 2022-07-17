@extends('plantilla.principalpag')
@section('pestania', 'Inventario')
@section('contenido')

<h1 style="margin-left: 2% ; margin-top: 55px; margin-bottom: 3%; "> <u>Lista de inventario disponible.</u> </h1>


<table  style="margin-top: 1%; width: 80%; margin-left: 4%;" >

<tr style="background: #0088cc; text-align: center; border: 2px solid #dddddd;">
<th>Nombre del producto</th>
<th>Cantidad</th>
<th>Precio</th>
<th>Vencimiento</th>
</tr>




<tr style="background: #0088cc; text-align: center; border: 2px solid #dddddd;">
<td>A</td>
<td>B</td>
<td>C</td>
<td > <a  class="btn btn-success" href=""> Expiración </a></td>
</tr>




</tbody>

</table>

@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection