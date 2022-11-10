@extends('plantilla.principalpag')
@section('pestania', 'Lista de ventas')
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

<div class="content-wrapper">
  <div class="container-fluid">

    <h1 style=" margin-bottom: 3%; margin-left: 2%;"> Lista de ventas </h1>

    <a   style="float: right;" class="btn btn-warning" href="/venta/nuevo">Nueva venta</a>

    <form action="{{route('factura.busqueda')}}" method="POST" style="margin-top: 1%; width: 78%;">
      @csrf
      <div class="form-row">
<div style="margin:left: 0%;" class="col-sm-4">
      <input type="text"  class="form-control" name="missing" id="missing" placeholder="Busqueda">
      </div>
      </div>

      <input style="margin-top: 1%" type="submit" value="Buscar" class="btn btn-success">
      <a style="margin-left: 13%; margin-top:1%;" class="btn btn-warning" href="/listaventa">Limpiar</a>
    </form>


    <h1 style="margin-bottom: 2%;"></h1>

    <div class="row">
      <div class="col-12 col-lg-12">
        <div class="card">


          <div class="table-responsive">

            <table class="table align-items-center table-flush table-borderless">

              <tr style="background: #0088cc; text-align: center; border: 2px solid #dddddd;">
                <th>Número de factura</th>

                <th>Método de pago</th>
                <th>Detalles de compra</th>
              </tr>

              <tbody>
                @if (count($lista)<=0) <tr>
                  <td colspan="6">No hay resultados</td>
                  </tr>
                  @endif
              </tbody>

              @forelse($lista as $list )


              <tr style="border: 2px solid #dddddd;">
                <td> {{$list->numero_factura}} </td>

                <td> {{$list->pago}} </td>

                <td> <a class="btn btn-success" href="/detallesventa/{{$list->id}}"> Detalles </a></td>
              </tr>


              @empty

              @endforelse

            </table>
    

          </div>
        </div>
        {{$lista -> links() }}
      </div>
    </div>
  </div>
</div>

<!-- SUBIR PARA ARRIBA SI ES MUY GRANDE LAS LISTA -->
<a href="javaScript:void();" class="back-to-top" style="display: inline;"><i class="fa fa-angle-double-up"></i> </a>

@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection