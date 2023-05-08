@extends('plantilla.principalpag')
@section('pestania', 'Lista de compras')
@section('contenido')
@section('TituloPlantillas', 'Listado de compras')

<style>
  td {
    text-align: center;
  }
</style>



</style>
@if (session('msj'))
<div class="alert alert-success">
  {{session('msj')}}
</div>
@endif


<div class="clearfix"></div>
</style>
@if (session('msj'))
<div class="alert alert-success">
  {{session('msj')}}
</div>
@endif
<div style="margin-top: 5%;" class="content-wrapper">
  <div class="container-fluid">

   

    <div class="row">
      <div class="col-12 col-lg-12">
        <div class="card">
          <div class="card-body">


            <ul class="nav nav-tabs nav-tabs-primary  nav-justified">

              <form action="{{route('buscador')}}" method="POST" style="margin-bottom: 1%;">
                @csrf
                <div class="form-row">
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="missing" id="missing" value="{{ isset($texto)?$texto:'' }}" placeholder="Busqueda">
                  </div>

                  <li class="nav-item">
                    <input style="margin-top: 1%" type="submit" value="Buscar" class="btn btn-success">
                  </li>
                </div>
              </form>

              <li>
                <a style="margin-left: 2%;" class="btn btn-warning" href="/listacompra">Limpiar</a>
              </li>

              <li class="nav-item">
                <button style="margin-right: 1%;" class="btn btn-danger float-right" onclick="pdf()">Descargar PDF</button>
              </li>

              <li>
                <a class="btn btn-warning float-right" href="/compra/nuevo">Ingresar compra</a>
              </li>

              <script>

function pdf(){

  window.location.href = "{{route('compras.pdf')}}";
  Swal.fire({
    position: 'bottom-end',
    icon: 'success',
    title: 'Se esta descargando el pdf',
    showConfirmButton: false,
    allowOutsideClick: false,
    timer: {{$lista->lastPage()*100*1}}
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

          <div class="table-responsive">

            <table class="table align-items-center table-flush table-borderless">


              <tbody>
                @if (count($lista)<=0) <tr>
                  <td colspan="6">No hay resultados</td>
                  </tr>
                  @endif
              </tbody>





    <table class="table table-bordered align-items-center table-flush table-borderless">

<tr style="background: #0088cc; text-align: center; border: 2px solid #dddddd;">
            <th>#</th>
            <th>Número de factura</th>
            <th>Proveedor</th>
            <th>Total factura</th>
            <th>Detalles de compra</th>





              @forelse($lista as $list )


<tr style="border: 2px solid #dddddd;">
<td class="numero">{{$lista->perPage()*($lista->currentPage()-1)+$loop->iteration}}</td>
<td class="numero"> {{$list->numero_factura}} </td>
            <td class="letras">{{$list->proveed->Nombre_del_proveedor}}</td>
            <td class="numero">
              <?php $sum=0?>
              @foreach ($list->detalles as $detall)
              <?php $sum+= ($detall->cantidad*$detall->precio_farmacia)?>
              @endforeach
              L.{{number_format($sum,2)}}
            </td>
<td> <a class="btn btn-success" href="/detallescompra/{{$list->id}}"> Detalles </a></td>

              @empty




              @endforelse





              </tbody>

            </table>

          </div>
        </div>

        {{$lista -> links() }}
      </div>
    </div>

    <!-- SUBIR PARA ARRIBA SI ES MUY GRANDE LAS LISTA -->
    <a href="javaScript:void();" class="back-to-top" style="display: inline;"><i class="fa fa-angle-double-up"></i> </a>

    @section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
    @endsection
