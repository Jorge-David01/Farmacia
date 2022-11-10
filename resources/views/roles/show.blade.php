@extends('plantilla.principalpag')
@section('pestania', 'Formulario de roles')

@section('contenido')


<div class="content-wrapper">
  <div class="container-fluid">


    @if($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
        <li>
          {{$error}}
        </li>
        @endforeach
      </ul>
    </div>
    @endif

    <style>
      input {
        border-radius: 0px !important;
      }
    </style>

    <h1 style="margin-left: 2% ;  margin-bottom: 3%; "> Detalle de {{$role->name}} </h1>

    <div class="row">
      <div class="col-12 col-lg-12">
        <div class="card">

          <h6 style="margin-left: 2% ; margin-bottom: 2%; margin-top: 1%;">{{$role->descripcion}}</h6>
          <div style="margin-left: 2% ;">
            <label for="name">Permisos:</label>

            <table style="text-align: center;" class="table table-bordered align-items-center table-flush table-borderless">

              <?php
              $i = 1;
              ?>

              @foreach ($role->permissions as $permission)

              <tr>
                <td>
                  {{ $i }}
                </td>

                <td>
                  {{ $permission->name }}
                </td>

              </tr>

              <?php
              $i++;
              ?>

              @endforeach

            </table>

            <div style="text-align: center; margin-top: 2%; ">
              <button class="btn btn-danger" type="button" onclick="window.location='/roles'">Regresar</button>
            </div>
            <h1 style="margin-bottom: 2%;"></h1>

          </div>
        </div>
      </div>
    </div>
  </div>


  @endsection