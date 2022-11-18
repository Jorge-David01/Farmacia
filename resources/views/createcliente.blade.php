@extends('plantilla.principalpag')
@section('pestania', 'Formulario de cliente')
@section('contenido')
@section('TituloPlantillas', 'Registro de clientes ')





<div class="content-wrapper">
    <div class="container-fluid">

        <h1 style=" margin-left: 2%; margin-bottom: 2%;"> </h1>

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

<h1 style="margin-bottom: 6%;"></h1>
        <div style="margin: auto;" class="col-lg-6">
            <div class="card">
                <div class="card-body">

                    <form action="{{route('clientes.store')}}" method="POST" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="first-name">Nombre Completo: <span class="required"></span>
                            </label>
                            <div>
                                <input maxlength="110" type="text" id="nombre_cliente" name="nombre_cliente" required="required" class="form-control " value="{{old('nombre_cliente')}}" placeholder="Ingrese el nombre completo del cliente">
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="last-name">Numero de Identidad: <span class="required"></span>
                            </label>
                            <div>
                                <input maxlength="13" type="text" id="numero_id" name="numero_id" required="required" class="form-control" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" value="{{old('numero_id')}}" pattern="[0-1]{1}[0-9]{1}[0-2]{1}[0-8]{1}[0-9]{9}" placeholder="Ingrese el numero de identidad sin guiones">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="last-name">Telefono: <span class="required"></span>
                            </label>
                            <div>
                                <input maxlength="8" type="tel" id="telefono" name="telefono" required="required" class="form-control" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" value="{{old('telefono')}}" pattern="[0-9]{1}[0-9]{7}" placeholder="Ingrese el número de telefono">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="last-name">Numero de Carnet: <span class="required"></span>
                            </label>
                            <div>
                                <input maxlength="8" type="carnet" id="num_carnet" name="num_carnet" required="required" class="form-control" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" value="{{old('num_carnet')}}" placeholder="Ingrese el número de carnet">
                            </div>
                        </div>



                        <div class="form-group">
                            <labelfor="last-name">Dirección: <span class="required"></span>
                                </label>
                                <div>
                                    <textarea minlength="10" maxlength="200" placeholder="Ingrese la dirección" name="direccion" id="direccion" name="direccion" cols="1" rows="3" required="required" class="form-control">{{old('direccion')}}</textarea>
                                </div>
                        </div>



                        <div style="text-align: center;">
                            
                            <div style="display:inline-block;">
                                <button class="btn btn-danger" type="button" onclick="window.location='/Cliente'">Cancelar</button>
                                <a type="button" href="javascript:location.reload()" class="btn btn-warning">Limpiar</a>
                                <button style="display:inline-block;" type="submit" class="btn btn-success">Guardar</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection