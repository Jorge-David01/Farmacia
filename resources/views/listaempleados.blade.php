@extends('plantilla.principalpag')
@section('pestania', 'Lista de empleados')
@section('contenido')

<style>
tr:nth-child(even) {
  background-color: #b3e0ff;

}
</style>


<style>
th {
    style="border: 2px solid #dddddd"
}

</style>

<h1 style="margin-left: 38% ; margin-top: 1%; margin-bottom: 3%; "> <u>Empleados</u> </h1>


<div class="col-x1-12">
    <form action="{{route('lista')}}" method="GET">
        <div class="form-row">
            <div style="margin-left: 4%" class="col-sm-2">
                <input type="text" class="form-control" placeholder="Busqueda" name="texto" value="{{$texto}}">
            </div>
            <div class="col-auto">
        <input type="submit" class="btn btn-primary" value="Buscar">
            </div>
        </div>
    </form>

</div>



<table  style="margin-top: 1%; width: 80%; margin-left: 4%;" >

<tr style="background: #0088cc; text-align: center; border: 2px solid #dddddd;">
<th >Identificador</th>
<th >Nombre</th>
<th >Apellido</th>
<th >Número de identidad</th>
<th >Teléfono</th>
<th >Ver detalles</th>
</tr>

<tbody>
    @if (count($employee)<=0)
        <tr>
            <td colspan="6">No hay resultados</td>
    </tr>
    @endif
</tbody>

@forelse($employee as $emple)

<tr style="text-align: center; border: 2px solid #dddddd;" >
<td>{{$emple->id}}</td>
<td>{{$emple->nombres}}</td>
<td>{{$emple->apellidos}}</td>
<td>{{$emple->DNI}}</td>
<td>{{$emple->telefono_personal}}</td>
<td > <a class="btn btn-success" href="/Emple/{{$emple->id}}">  Detalles  </a></td>
</tr>

@empty

@endforelse


{{$employee -> links() }}



</tbody>

</table>



@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection

