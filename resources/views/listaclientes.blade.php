@extends('plantilla.principalpag')
@section('pestania', 'Lista de clientes')
@section('contenido')
@section('TituloPlantillas', 'Clientes')
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


<h1 style="margin-bottom: 5%;"></h1>
<div class="clearfix"></div>
  <div class="content-wrapper">
  <div class="container-fluid">

@if (session('msj'))
<div class="alert alert-success">
  {{session('msj')}}
</div>
@endif



<div class="row">
            <div class="col-12 col-lg-12">
                <div class="card">
                    <div class="card-body">


                        <ul class="nav nav-tabs nav-tabs-primary  nav-justified">






<form  action="{{route('cliente.busqueda')}}" method="POST" style="margin-bottom:1%;">
@csrf
<div class="form-row">
<div class="col-sm-8">
<input  type="text" class="form-control"  name="busca" id="busca" placeholder="Busqueda">
</div>

<li class="nav-item">
<input style="margin-top: 1%" type="submit" value="Buscar" class="btn btn-success">
</li>

</div>
</form>

<li>
<a style="margin-left: 2%;" class="btn btn-warning" href="/Cliente">Limpiar</a>
</li>

<li class="nav-item">
<button style="margin-right: 1%;" class="btn btn-danger float-right" onclick="pdf()" id="descpdf">Descargar PDF</button>
</li>


<li>
<a class="btn btn-warning float-right" href="/clientes/nuevo">Registrar cliente</a>
</li>

<script>

    function pdf(){

      window.location.href = "{{route('clientes.pdf')}}";
      Swal.fire({
        position: 'bottom-end',
        icon: 'success',
        title: 'Se esta descargando el pdf',
        showConfirmButton: false,
        timer: 1500
      })

      document.getElementById('descpdf').disabled = true;
    }
    </script>



</ul>

</div>
</div>
</div>
</div>


	<div class="row" >
	<div class="col-12 col-lg-12">
	<div class="card" >
		 

	<div class="table-responsive">

    <table class="table table-bordered align-items-center table-flush table-borderless">
<tr style="background: #0088cc; text-align: center; border: 2px solid #dddddd;">
<th>#</th>
<th>Nombre completo</th>
<th>Teléfono</th>
<th>Número de carnet</th>
<th>Identidad</th>
<th>Ver detalles</th>
</tr>

<tbody>
    @if (count($liscliente)<=0)
        <tr>
            <td colspan="6">No hay resultados</td>
    </tr>
    @endif
</tbody>

@forelse($liscliente as $cliente)


<tr style="border: 2px solid #dddddd;">
<td>{{$liscliente->perPage()*($liscliente->currentPage()-1)+$loop->iteration}}</td>
<td> {{$cliente->nombre_cliente}} </td>
<td>  {{$cliente->telefono}} </td>
<td>  {{$cliente->num_carnet}}  </td>
<td>  {{$cliente->numero_id}}  </td>

<td > <a href="/Vercliente/{{$cliente->id}}" class="btn btn-success"> Detalles </a></td>
</tr>

@empty

@endforelse





</tbody>

</table>

                
</div>
</div>
{{$liscliente -> links() }}
</div>
</div>
@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection