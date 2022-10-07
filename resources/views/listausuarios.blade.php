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
@if (session('msj'))
<div class="alert alert-success">
  {{session('msj')}}
</div>
@endif



<h1 style="margin-left: 4% ;margin-bottom: 3%; "> Lista de Usuarios </h1>

<a style="margin-left: 4%;" class="btn btn-warning" href="/usuarios/nuevo">Nuevo Usuario</a>










  <div class="clearfix"></div>
  <div class="content-wrapper">
  <div class="container-fluid">

<h1 style="margin-bottom: 3%;"> Lista de empleados </h1>

<a  class="btn btn-warning" href="/empleados/nuevo">Nuevo empleado</a>

<div class="col-x1-12" style="margin-top: 2%;">
    <form action="{{route('lista')}}" method="get">
        <div class="form-row">
            <div class="col-sm-2">
                <input  type="text" class="form-control" placeholder="Busqueda" name="texto" value="{{$texto}}">
            </div>
            <div class="col-auto">
        <input type="submit" class="btn btn-primary" value="Buscar">
            </div>
        </div>
    </form>
</div>

<h1 style="margin-bottom: 2%;"></h1>

	<div class="row" >
	<div class="col-12 col-lg-12">
	<div class="card" >
		 

	<div class="table-responsive">

    <table class="table align-items-center table-flush table-borderless">
                 

<tr style="background: #0088cc; text-align: center; border: 2px solid #dddddd;">
<th>#</th>
<th>Nombre</th>
<th>Email</th>
<th>Rol</th>
<th>Ver detalles</th>
<th></th>
</tr>

<tbody>
    @if (count($employee)<=0)
        <tr>
            <td colspan="6">No hay resultados</td>
    </tr>
    @endif
</tbody>

@forelse($employee as $emple)

<tr style="border: 2px solid #dddddd;">
<!-- <td>{{$emple->id}}</td> -->
<td>{{$loop->index+1}}</td>
<td>{{$emple->name}}</td>
<td>{{$emple->email}}</td>
<td>{{$emple->role}}</td>
<td > <a  class="btn btn-success" href="/Emple/{{$emple->id}}"> Detalles </a></td>
<td > <a  class="btn btn-success" href="/contrasenia/{{$emple->id}}/listausuarios"> Cambiar Contrasena </a></td>
</tr>

@empty

@endforelse


{{$employee -> links() }}



</tbody>

</table>

                
</div>
</div>
</div>
</div>

@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection

