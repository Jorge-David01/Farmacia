@extends('plantilla.principalpag')
@section('pestania', 'Lista de ventas')
@section('contenido')
@section('TituloPlantillas', 'Lista de ventas')


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

<h1 style="margin-bottom: 6%;"></h1>
<div class="content-wrapper">
  <div class="container-fluid">

    <h1 style=" margin-bottom: 2%; margin-left: 2%;">  </h1>

     
    <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card">
                    <div class="card-body">


                        <ul class="nav nav-tabs nav-tabs-primary  nav-justified">









    <form action="{{route('factura.busqueda')}}" method="POST" style="margin-bottom:2%;">
      @csrf
      <div class="form-row">
      <div class="col-sm-8">
      <input type="text"  class="form-control" name="missing" id="missing" placeholder="Busqueda">
      </div>
    
        <li class="nav-item">
      <input style="margin-top: 1%" type="submit" value="Buscar" class="btn btn-success">
     </li>

      </div>
    </form>


    <li>
    <a style="margin-left: 2%;" class="btn btn-warning" href="/listaventa">Limpiar</a>
    </li>


    <li class="nav-item">
    <button style="margin-right: 1%;" class="btn btn-danger float-right" onclick="pdf()">Descargar PDF</button>
    </li>


    <li>
    <a   class="btn btn-warning float-right" href="/venta/nuevo">Nueva venta</a>
    </li>



    </ul>

</div>
</div>
</div>
</div>

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