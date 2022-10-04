@extends('plantilla.principalpag')
@section('pestania', 'Detalle de empleado')
@section('contenido')


<div class="clearfix"></div>
  <div class="content-wrapper">
  <div class="container-fluid">


    <h1 > Detalles del empleado </h1>

  <h1 style="margin-bottom: 2%;"></h1>

	<div class="row" >
	<div class="col-12 col-lg-12">
	<div class="card" >
		 

	<div class="table-responsive">

    <table style="text-align: center; " class="table table-bordered align-items-center table-flush table-borderless">  

   
        <thead>
        <tr style="background: #0088cc; text-align: center; border: 2px solid #dddddd;">
            <th scope="col">Campo</th>
            <th scope="col">Valor</th>
        </tr>
        </thead>
        <tbody>
       
        <tr>
            <th scope="row">Nombre Completo</th>
            <td>{{$empleado->nombre_completo}}</td>
        </tr>
        <tr>
           <th scope="row">Numero de Celular</th>
            <td>{{$empleado->numero_cel}}</td>
        </tr>
        <tr>
           <th scope="row">Numero de telefono</th>
            <td>{{$empleado->numero_tel}}</td>
        </tr>
        <tr>
           <th scope="row">Identidad</th>
            <td>{{$empleado->DNI}}</td>
        </tr>
        <tr>
            <th scope="row">Direccion</th>
            <td>{{$empleado->direccion}}</td>
            </tr>
          
        <tr>

         
</tbody>
</table><br>






<div style="text-align: center; ">

<a class="btn btn-success" href="/Lista">Volver</a>


<a class="btn btn-primary" href="/Empleado/{{$empleado->id}}/editar">Actualizar</a>


<form style="display:inline-block;" method="post" action="{{route('empleados.delete',['id'=>$empleado->id])}}">
    @csrf
    @method('delete') 
    <input type="submit" onclick="return confirm('¿Está seguro que desea eliminar el empleado?')"
    value="eliminar" class="btn btn-danger" >
</form>

</div>

<h1></h1>

@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection