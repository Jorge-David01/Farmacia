@extends('plantilla.principalpag')
@section('pestania', 'Lista de devoluciones')
@section('contenido')
@section('TituloPlantillas', 'Devoluciones')
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


            



              <form action="{{route('devolucion.busqueda')}}" method="get" style="margin-bottom: 1%;">
                @csrf
                <div class="form-row" ]>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="busca" id="busca" placeholder="Busqueda" value= "{{$buscar}}">
                  </div>


                  <li class="nav-item">
                    <input style=" margin-left:1%;" type="submit" value="Buscar" class="btn btn-success">
                  </li>

                </div>
              </form>

              <li>
                <a style="margin-left: 2%;" class="btn btn-warning" href="/devolucionProducto/listadevoluciones">Limpiar</a>
              </li>






	<div class="table-responsive">

    <table class="table table-bordered align-items-center table-flush table-borderless">
<tr style="background: #0088cc; text-align: center; border: 2px solid #dddddd;">
<th>#</th>
<th>Id Venta</th>
<th>Nombre Producto</th>
<th>Cantidad</th>
<th>Descuento</th>
<th>Precio</th>
</tr>

<tbody>
    @if (count($lisdevolucion)<=0)
        <tr>
            <td colspan="6">No hay resultados</td>
    </tr>
    @endif
</tbody>

@forelse($lisdevolucion as $devolucion)


<tr style="border: 2px solid #dddddd;">
<td>{{$lisdevolucion->perPage()*($lisdevolucion->currentPage()-1)+$loop->iteration}}</td>
<td> {{$devolucion->id_venta}} </td>
<td>  {{$devolucion->nombre_producto}} </td>
<td>  {{$devolucion->cantidad}}  </td>
<td>  {{$devolucion->descuento}}  </td>
<td>  {{$devolucion->precio}}  </td>

</tr>

@empty

@endforelse



</tbody>

</table>

                
</div>
</div>
{{$lisdevolucion -> links() }}
</div>
</div>
@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection