@extends('plantilla.principalpag')
@section('pestania', 'Caja de Alivio')
@section('contenido')


<style>
td {
    text-align: center;
}
</style>




@if (session('mensaje'))
<div class="alert alert-success">
  {{session('mensaje')}}
</div>
@endif



<h1 style="margin-left: 4% ; margin-top: 70px; margin-bottom: 3%; "> <u>Caja De Alivio</u> </h1>


<a style="margin-left: 4%;" class="btn btn-warning" href="/CajaPregunta/respuesta">Vaciar caja de alivio</a>





        
</form>


<table  style="margin-top: 1%; width: 80%; margin-left: 4%;" >


<tr style="background: #0088cc; text-align: center; border: 2px solid #dddddd;">
<th>Descripción</th>
<th>Veces</th>
<th>Fecha</th>
</tr>



@forelse($cajadatos as $datos)

<tr style="border: 2px solid #dddddd;">
<td>{{$datos->Descripcion}}</td>
<td>{{$datos->id}}</td>
<td>{{$datos->Fecha}}</td>
</tr>
@empty

@endforelse

{{$cajadatos -> links() }}

</tbody>
</table>

@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection