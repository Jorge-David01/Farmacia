@extends('plantilla.principalpag')
@section('pestania', 'Caja de Alivio')
@section('contenido')


<style>
  td {
    text-align: center;
  }
</style>




@if (session('mensaje'))
<div class="alert alert-success">
  {{session('mensaje')}}
</div>
@endif

<div class="content-wrapper">
  <div class="container-fluid">

    <h1 style=" margin-bottom: 3%; margin-left: 2%;"> Caja de alivio </h1>
    <a  class="btn btn-warning" href="/CajaPregunta/respuesta">Vaciar caja de alivio</a>
    <h1 style="margin-bottom: 2%;"></h1>
    <div class="row">
      <div class="col-12 col-lg-12">
        <div class="card">


          <table style="text-align: center; " class="table table-bordered align-items-center table-flush table-borderless">


            <tr style="background: #0088cc; text-align: center; border: 2px solid #dddddd;">
              <th>Descripción</th>
              <th>Veces</th>
              <th>Fecha</th>
            </tr>

            @forelse($cajadatos as $datos)

            <tr style="border: 2px solid #dddddd;">
              <td>{{$datos->Descripcion}}</td>
              <td>{{$datos->id}}</td>
              <td>{{$datos->Fecha}}</td>
            </tr>
            @empty

            @endforelse

            {{$cajadatos -> links() }}

            </tbody>
          </table>

        </div>
      </div>
    </div>



@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection