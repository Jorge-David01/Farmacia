@extends('plantilla.principalpag')
@section('pestania', 'Inventario')
@section('contenido')

<h1 style="margin-left: 2% ; margin-top: 55px; margin-bottom: 3%; "> <u>Lista de inventario disponible.</u> </h1>

<form action="{{route('busqueda')}}" method="POST" style="margin-top: 1%; width: 78%; margin-left: 4%">
@csrf
<input type="text" name="good" id="good" placeholder="Busqueda">
<input style="margin-left: 15px" type="submit" value="Buscar" class="btn btn-success">
</form>

<table  style="margin-top: 1%; width: 80%; margin-left: 4%;" >

<tr style="background: #0088cc; text-align: center; border: 2px solid #dddddd;">
<th>Nombre del producto</th>
<th>Cantidad</th>
<th>Precio</th>
<th>Vencimiento</th>
</tr>

<tbody>
    @if (count($Inventa)<=0)
        <tr>
            <td colspan="4">No hay resultados</td>
    </tr>
    @endif
</tbody>

@forelse($Inventa as $listaInv)


<tr style="background: #0088cc; text-align: center; border: 2px solid #dddddd;">
<td> {{$listaInv->id_producto}} </td>
<td> {{$listaInv->cantidad}}</td>
<td> {{$listaInv->precio_publico}}</td>

<td > <a  class="btn btn-success" href=""> Expiración </a></td>
</tr>




@empty



@endforelse



{{$Inventa -> links() }}



</tbody>

</table>

@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection