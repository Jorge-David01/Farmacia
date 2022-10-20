@extends('plantilla.principalpag')
@section('pestania', 'Formulario de roles')

@section('contenido')

<div class="container-fluid">
    <div class="row">

    <div class="col-md-12">
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
        input{
            border-radius: 0px !important;
        }
    </style>

    <h1 style="margin-left: 4% ;  margin-bottom: 3%; "> Detalle de {{$role->name}} </h1>
<br>
        <div class="card ">
          <!--Header-->
          <div class="card-header card-header-primary">

          </div>
          <!--End header-->
          <!--Body-->

<p>{{$role->descripcion}}</p>
<br>
            <div class="row">
              <label for="name" class="col-sm-2 col-form-label">Permisos:</label>
              <div class="col-sm-7">
                <div class="form-group">
                  <div class="tab-content">
                    <div class="tab-pane active">
                      <table class="table" style="font-size: 15px">
                        <tbody>
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
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!--End body-->

          <!--Footer-->
          <div class="ln_solid"></div>
                <div class="item form-group">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                        <button class="btn btn-danger" type="button" onclick="window.location='/roles'">Regresar</button>
                    </div>
                </div>
        </div>
          <!--End footer-->
        </div>
    </div>
    </div>
</div>
@endsection
