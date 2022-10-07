@extends('plantilla.principalpag')
@section('pestania', 'Lista de proveedores')
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



<div class="clearfix"></div>
  <div class="content-wrapper">
  <div class="container-fluid">

<h1 style="margin-bottom: 3%;"> Lista de proveedores </h1>

<a  class="btn btn-warning" href="proveedor/nuevo">Nuevo proveedor</a>

<form action="{{route('funt')}}" method="POST" style="margin-top: 1%; width: 78%; ">
@csrf
<input type="text" name="search" id="search" placeholder="Busqueda">
<input style="margin-left: 15px" type="submit" value="Buscar" class="btn btn-success">
</form>




<h1 style="margin-bottom: 2%;"></h1>
<div class="row" >
<div class="col-12 col-lg-12">
<div class="card" >

<div class="table-responsive">
<table class="table align-items-center table-flush table-borderless">



<tr style="background: #0088cc; text-align: center; border: 2px solid #dddddd;">
<th>Nombre del proveedor</th>
<th>Nombre del distribuidor</th>
<th>Correo Electronico</th>
<th>Ver detalles</th>
</tr>

<tbody>
    @if (count($pro)<=0)
        <tr>
            <td colspan="6">No hay resultados</td>
    </tr>
    @endif
</tbody>

@forelse($pro as $prove)

<tr style="border: 2px solid #dddddd;">

<td>{{$prove->Nombre_del_proveedor}}</td>
<td>{{$prove->Nombre_del_distribuidor}}</td>
<td>{{$prove->Correo_electronico}}</td>
<td > <a  class="btn btn-success" href="/Verprovee/{{$prove->id}}"> Detalles </a></td>
</tr>

@empty

@endforelse


{{$pro -> links() }}



</tbody>

</table>




</div>
</div>
</div>
</div>
</div>
</div>
</div>





@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection

