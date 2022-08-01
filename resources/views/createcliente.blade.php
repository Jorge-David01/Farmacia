@extends('plantilla.principalpag')
@section('pestania', 'Formulario de cliente')
@section('contenido')

<div class="x_content">

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

<h1 style="margin-left: 4% ; margin-top: 70px; margin-bottom: 3%; "> <u>Registro de Clientes</u> </h1>

    <form  action="{{route('clientes.store')}}" method="POST" 
    style="margin-left: 3%;" method="post" enctype="multipart/form-data" >
        @csrf

        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nombre Completo: <span class="required"></span>
            </label>
            <div class="col-md-6 col-sm-6 ">
                <input maxlength="110" type="text" id="nombre_cliente" name="nombre_cliente" required="required" class="form-control "
                value="{{old('nombre_cliente')}}"
                placeholder="Ingrese el nombre completo del cliente">
            </div>
        </div>


        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Numero de Identidad: <span class="required"></span>
            </label>
            <div class="col-md-6 col-sm-6 ">
                <input maxlength="13" type="text" id="numero_id" name="numero_id" required="required" class="form-control"
                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                value="{{old('numero_id')}}"
                pattern="[0-1]{1}[0-9]{1}[0-2]{1}[0-8]{1}[0-9]{9}"
                placeholder="Ingrese el numero de identidad sin guiones">
            </div>
        </div>

        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Telefono: <span class="required"></span>
            </label>
            <div class="col-md-6 col-sm-6 ">
                <input maxlength="8" type="tel" id="telefono" name="telefono" required="required" class="form-control"
                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                value="{{old('telefono')}}"
                pattern="[0-9]{1}[0-9]{7}"
                placeholder="Ingrese el número de telefono">
            </div>
        </div>


        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Dirección: <span class="required"></span>
            </label>
            <div class="col-md-6 col-sm-6 ">
                <textarea maxlength="200" placeholder="Ingrese la dirección" name="direccion" id="direccion" name="direccion" cols="1" rows="3" required="required"
                class="form-control">{{old('direccion')}}</textarea>
            </div>
        </div>


        <div class="ln_solid"></div>
        <div class="item form-group">
            <br><br>
            <div class="col-md-6 col-sm-6 offset-md-3">
                <button class="btn btn-danger" type="button" onclick="window.location='/Cliente'">Cancelar</button>
                <a type="button" href="javascript:location.reload()" class="btn btn-warning">Limpiar</a>
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
        </div>

    </form>
</div>

@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection
