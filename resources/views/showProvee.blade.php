@extends('plantilla.principalpag')
@section('pestania', 'Ventana de proveedores')
@section('contenido')



<div class="clearfix"></div>
  <div class="content-wrapper">
  <div class="container-fluid">





<h1 style=" margin-left: 2%; margin-bottom: 3%; "> Detalles del proveedor </h1>

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
            <th scope="row">Nombre del proveedor</th>
            <td>{{$provee->Nombre_del_proveedor}}</td>
        </tr>

        <tr>
           <th scope="row">Nombre del distribuidor</th>
            <td>{{$provee->Nombre_del_distribuidor}}</td>
        </tr>

        <tr>
           <th scope="row">Telefono del proveedor</th>
            <td>{{$provee->Telefono_del_proveedor}}</td>
        </tr>

        <tr>
            <th scope="row">Telefono del distribuidor</th>
            <td>{{$provee->Telefono_del_distribuidor}}</td>
        </tr>

        <tr>
            <th scope="row">Correo Electronico</th>
            <td>{{$provee->Correo_electronico}}</td>
        </tr>
        </tbody>

</table><br>

</div>

<div style="text-align: center">
<a class="btn btn-success" href="/Listpro">Volver</a>

<a class="btn btn-primary" href="/Editprovee/{{$provee->id}}/editar">Actualizar</a>
</div>


<h1 style="margin-bottom: 2%;"></h1>

<!-- SUBIR PARA ARRIBA SI ES MUY GRANDE LAS LISTA --> 
<a href="javaScript:void();" class="back-to-top" style="display: inline;"><i class="fa fa-angle-double-up"></i> </a>

@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection
