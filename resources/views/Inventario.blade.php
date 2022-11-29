@extends('plantilla.principalpag')
@section('pestania', 'Inventario')
@section('contenido')
@section('TituloPlantillas', 'Inventario')


<style>
  td {
    text-align: center;
  }
</style>



<div class="content-wrapper">
  <div class="container-fluid">

    <h1 style="margin-bottom: 6%;"></h1>

    <div class="row">
      <div class="col-12 col-lg-12">
        <div class="card">
          <div class="card-body">


            <ul class="nav nav-tabs nav-tabs-primary  nav-justified">




              <form action="{{route('busqueda')}}" method="POST" style="margin-bottom: 1%;">
                @csrf
                <div class="form-row">
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="good" id="good" placeholder="Busqueda">
                  </div>


                  <li class="nav-item">
                    <input style="margin-top: 1%" type="submit" value="Buscar" class="btn btn-success">
                  </li>


                </div>
              </form>

              <li>
                <a style="margin-left: 2%;" class="btn btn-warning" href="/inventarioVista">Limpiar</a>
              </li>


              <li class="nav-item">
                <button class="btn btn-danger float-right" onclick="pdf()">Descargar PDF</button>
              </li>


              <script>

                function pdf(){
              
                  window.location.href = "{{route('inventario.pdf')}}";
                  Swal.fire({
                    position: 'bottom-end',
                    icon: 'success',
                    title: 'Se esta descargando el pdf',
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    timer: {{$Inventa->lastPage()*100*1}}
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

  <table class="table table-bordered align-items-center table-flush table-borderless">




<tr style="background: #0088cc; text-align: center; border: 2px solid #dddddd;">
<th>#</th>
<th >Nombre del producto</th>
<th >Cantidad</th>

              <tbody>
                @if (count($Inventa)<=0) <tr>
                  <td colspan="4">No hay resultados</td>
                  </tr>
                  @endif
              </tbody>






              @forelse($Inventa as $listaInv)

              <tr style="border: 2px solid #dddddd;">
                <td class="numero">{{$Inventa->perPage()*($Inventa->currentPage()-1)+$loop->iteration}}</td>
                <td class="letras"> {{$listaInv->productos->nombre_producto}} </td>
                <td class="numero"> {{$listaInv-> cantidad}}</td>



                <!--  <td> <a  class="btn btn-success" href="/Precio/{{$listaInv->id}}"> Precio unitario </a></td>
                <td > <a  class="btn btn-success" href="/vencimiento/{{$listaInv->id}}"> fecha de vencimiento </a></td>
                </tr> -->





                @empty



                @endforelse







                </tbody>

            </table>


          </div>
        </div>
        {{$Inventa -> links() }}
      </div>
    </div>
  </div>
</div>

@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection
