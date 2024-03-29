@extends('plantilla.principalpag')
@section('pestania', 'Lista de proveedores')
@section('contenido')
@section('TituloPlantillas', 'Lista de proveedores')


<style>
  td {
    text-align: center;
  }
</style>



<div class="clearfix"></div>
        <div class="content-wrapper">
  <div class="container-fluid">

    <h1 style="margin-bottom: 6%;"></h1>

    @if (session('mensaje'))
    <div class="alert alert-success">
      {{session('mensaje')}}
    </div>
    @endif

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

              <form action="{{route('funt')}}" method="get" style="margin-bottom: 1%;">
                @csrf
                <div class="form-row">
                  <div class="col-sm-8">
                    <input required type="text" class="form-control" name="search" id="search" placeholder="Busqueda">
                  </div>
                  <li class="nav-item">
                    <input style="margin-left:1%" type="submit" value="Buscar" class="btn btn-success">
                  </li>
                </div>
              </form>


              <li>
                <a style="margin-left: 2%; " class="btn btn-warning" href="/Listpro">Limpiar</a>
              </li>

              <li class="nav-item">
                <button style="margin-right: 1%;" class="btn btn-danger float-right" onclick="pdf()">Descargar PDF</button>
              </li>


              <li>
                <a class="btn btn-warning float-right" href="proveedor/nuevo">Nuevo proveedor</a>
              </li>

              <script>
        setInterval('fg()', 1000);
        function fg(){
          document.getElementById('dat').innerHTML = "{{url()->previous();}}";
        }

        function pdf(){

          window.location.href="{{route('proveedores.pdf')}}";
          Swal.fire({
            position: 'bottom-end',
            icon: 'success',
            title: 'Se esta descargando el pdf',
            showConfirmButton: false,
            allowOutsideClick: false,
            timer: {{$pro->lastPage()*100*1}}
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

          <div  class="table-responsive">
            <table class="table table-bordered align-items-center table-flush table-borderless">



              <tr style="background: #0088cc; text-align: center; border: 2px solid #dddddd;">
                <th>#</th>
                <th>Nombre del proveedor</th>
                <th>Nombre del distribuidor</th>

                <th>Catálogo</th>
                <th>Ver detalles</th>
              </tr>

              <tbody>
                @if (count($pro)<=0) <tr>
                  <td colspan="6">No hay resultados</td>
                  </tr>
                  @endif
              </tbody>

              @forelse($pro as $prove)




              <tr style="border: 2px solid #dddddd;">



                <td class="numero">{{$pro->perPage()*($pro->currentPage()-1)+$loop->iteration}}</td>
                <td class="letras">{{$prove->Nombre_del_proveedor}}</td>
                <td class="letras">{{$prove->Nombre_del_distribuidor}}</td>

                <td> <a class="btn btn-info" href="Archivos/{{$prove->Archivo}}" target="blank_">Documentos</a></td>
                <td> <a class="btn btn-success" href="/Verprovee/{{$prove->id}}">Detalles</a></td>

              </tr>


              @empty

              @endforelse

              </tbody>

            </table>

          </div>
        </div>

        {{$pro-> links() }}
      </div>
    </div>
  </div>
</div>






@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection