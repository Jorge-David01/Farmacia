@extends('plantilla.principalpag')
@section('pestania', 'Editar empleado')
@section('contenido')


@if($errors->any())
<div class="alert alert-danger">

    @foreach($errors->all() as $error)
    <p>
        &nbsp;&nbsp;{{$error}}
    </p>
    @endforeach

</div>
@endif


<div class="content-wrapper">
    <div class="container-fluid">

        <h1 style="margin-left: 3% ;  margin-bottom: 3%; ">Editar empleados </h1>

        <h1 style="margin-bottom: 2%;"></h1>
        <div style="margin: auto;" class="col-lg-6">
            <div class="card">
                <div class="card-body">

                    <form style="margin-left: 2%;" method="POST" action="">
                        @method('put')
                        @csrf
                        <div>
                            <label for="nombre_completo">Nombre Completo:</label>
                            <input  class="form-control "type="text" class="form-control-file" name="nombre_completo" id="nombre_completo " placeholder="nombre_completo" value="{{$empleado->nombre_completo}}" maxlength="50">
                        </div>

                        <div>
                            <label for="numero_cel">Numero de Celular:</label>
                            <input class="form-control " type="text" class="form-control-file" name="numero_cel" id="numero_cel" placeholder="numero_cel" value="{{$empleado->numero_cel}} " maxlength="8">
                        </div>

                        <div>
                            <label for="numero_tel">Numero de Telefono:</label>
                            <input class="form-control " type="text" class="form-control-file" name="numero_tel" id="numero_tel" placeholder="numero_tel" value="{{$empleado->numero_tel}}" maxlength="8">
                        </div>

                        <div>
                            <label for="DNI">DNI:</label>
                            <input class="form-control " type="text" class="form-control-file" name="dni" id="dni" placeholder="DNI" value="{{$empleado->DNI}}" maxlength="13">
                        </div>

                        <div>
                            <label for="direccion">Direccion:</label>
                            <input class="form-control " type="text" class="form-control-file" name="direccion" id="direccion" placeholder="Direccion" value="{{$empleado->direccion}}" maxlength="100">
                        </div>

                        <div>
                            <label for="email">Correo Electronico:</label>
                            <input class="form-control " type="email" class="form-control-file" name="email" id="email" placeholder="email" value="{{$empleado->correo_electronico}}" maxlength="100">
                        </div>
<hr>
                        <div style="text-align: center">
                            <input  type="reset" class="btn btn-danger">
                            <a  class="btn btn-success" href="/empleados">Regresar</a>
                            <button  type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                        <h1 style="margin-bottom: 2%;"></h1>
                </div>

                </form>


            </div>
        </div>
    </div>
</div>
@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection