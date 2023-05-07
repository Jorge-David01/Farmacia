@extends('plantilla.principalpag')
@section('pestania', 'Editar empleado')
@section('contenido')
@section('TituloPlantillas', 'Editar cliente')

@if($errors->any())
<div class="alert alert-danger">

    @foreach($errors->all() as $messages)
    <p>
        &nbsp;&nbsp;{{$messages}}
    </p>
    @endforeach

</div>
@endif


<div class="content-wrapper">
    <div class="container-fluid">

        <h1 style="margin-bottom: 6%;"></h1>

        <div style="margin: auto;" class="col-lg-6">
            <div class="card">
                <div class="card-body">

                    <form style="margin-left: 2%;" method="POST" action="">
                        @method('put')
                        @csrf
                        <div>
                            <label style="margin-top: 3%;" for="nombre_cliente">Nombre del cliente:</label>
                            <input type="text" pattern="[a-zA-Z\s]+" class="form-control" name="nombre_cliente" id="nombre_cliente" placeholder="Nombre del cliente" value="{{$client->nombre_cliente}}" minlength="3" maxlength="20" autofocus>
                        </div>

                        <div>
                            <label style="margin-top: 3%;" for="numero_identidad">Numero de identidad:</label>
                            <input type="number" class="form-control" name="numero_identidad" id="numero_identidad" placeholder="Número de identidad " value="{{$client->numero_id}}" minlength="13" maxlength="13" pattern="[0-1]{1}[1-9]{1}[0-2]{1}[0-9]{10}">
                        </div>

                        <div>
                            <label style="margin-top: 3%;" for="numero_tel">Numero de Telefono:</label>
                            <input type="text" class="form-control" name="numero_tel" id="numero_tel" placeholder="Número de teléfono" value="{{$client->telefono}}" minlength="8" maxlength="8" pattern="[2,9,8,3]{1}[0-9]{7}">
                        </div>

                        <div>
                            <label style="margin-top: 3%;" for="direccion">Dirección</label>
                            <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Dirección" value="{{$client->direccion}}" pattern="[a-zA-Z0-9\s]+" minlength="5" maxlength="100">
                        </div>

                        <hr>
                        <div style="text-align: center">
                        <a  class="btn btn-warning" href="/Cliente">Volver</a>
                            <input type="reset" class="btn btn-danger">
                            <button  type="submit" class="btn btn-success">Guardar</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection