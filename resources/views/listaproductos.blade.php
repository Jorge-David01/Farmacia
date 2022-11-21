@extends('plantilla.principalpag')
@section('pestania', 'Lista de productos')
@section('contenido')
@section('TituloPlantillas', 'Lista de productos')

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





<div class="clearfix"></div>
<div class="content-wrapper">
  <div class="container-fluid">

  <h1 style="margin-bottom: 6%;"></h1>
    <div class="row">
      <div class="col-12 col-lg-12">
        <div class="card">
          <div class="card-body">


            <ul class="nav nav-tabs nav-tabs-primary  nav-justified">


              </style>
              @if (session('msj'))
              <div class="alert alert-success">
                {{session('msj')}}
              </div>
              @endif








              <form action="{{route('producto.busqueda')}}" method="POST" style="margin-bottom:2%;">
                @csrf
                <div class="form-row" ]>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="busca" id="busca" placeholder="Busqueda">
                  </div>


                  <li class="nav-item">
                    <input style=" margin-left:1%;" type="submit" value="Buscar" class="btn btn-success">
                  </li>

                </div>
              </form>

              <li>
                <a style="margin-left: 2%;" class="btn btn-warning" href="/Producto">Limpiar</a>
              </li>

              <li class="nav-item">
                <button style="margin-right: 1%;" class="btn btn-danger float-right" onclick="pdf()">Descargar PDF</button>

              </li>

              <li>
                <a class="btn btn-warning float-right" href="/productos/nuevo">Nuevo Producto</a>
              </li>


              <script>
                function pdf() {

                  window.location.href = "{{route('productos.pdf')}}";
                  Swal.fire({
                    position: 'bottom-end',
                    icon: 'success',
                    title: 'Se esta descargando el pdf',
                    showConfirmButton: false,
                    timer: 1500
                  })


                }
              </script>



            </ul>

          </div>
        </div>
      </div>
    </div>


    <div class="row">
      <div class="col-12 col-lg-12">
        <div class="card">


	<div class="row" >
	<div class="col-12 col-lg-12">
	<div class="card" >
		 
	<div class="table-responsive">
  <table class="table table-bordered align-items-center table-flush table-borderless">

<tr style="background: #0088cc; text-align: center; border: 2px solid #dddddd;">
<th>#</th>
<th>Nombre del proveedor</th>
<th>Nombre del producto</th>
<th>Principio activo</th>
<th>Ver detalles</th>
</tr>

          <div class="table-responsive">
            <table class="table align-items-center table-flush table-borderless">

              <tr style="background: #0088cc; text-align: center; border: 2px solid #dddddd;">
                <th>Nombre del proveedor</th>
                <th>Nombre del producto</th>
                <th>Principio activo</th>
                <th>Ver detalles</th>
              </tr>


              <tbody>
                @if (count($produc)<=0) <tr>

                  <td colspan="6">No hay resultados</td>
                  </tr>
                  @endif
              </tbody>

              @forelse($produc as $producto)


<tr style="border: 2px solid #dddddd;">
<td>{{$produc->perPage()*($produc->currentPage()-1)+$loop->iteration}}</td>
<td>{{$producto->proveedores->Nombre_del_proveedor}}</td>
<td>{{$producto->nombre_producto}}</td>
<td>{{$producto->principio_activo}}</td>
<td > <a  class="btn btn-success" href="/Detallesproduct/{{$producto->id}}"> Detalles </a></td>
</tr>

              <tr style="border: 2px solid #dddddd;">
                <td>{{$producto->proveedores->Nombre_del_proveedor}}</td>
                <td>{{$producto->nombre_producto}}</td>
                <td>{{$producto->principio_activo}}</td>
                <td> <a class="btn btn-success" href="/Detallesproduct/{{$producto->id}}"> Detalles </a></td>
              </tr>





              @empty

              @endforelse





              </tbody>

            </table>


          </div>
        </div>
        {{$produc -> links() }}
      </div>
    </div>



    @section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
    @endsection