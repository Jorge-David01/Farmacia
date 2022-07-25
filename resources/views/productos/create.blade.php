@extends('plantilla.principalpag')
@section('pestania', '')

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

<h1 style="margin-left: 4% ; margin-top: 70px; margin-bottom: 3%; "> <u>Creación de Productos</u> </h1>

    <form style="margin-left: 3%;" method="post" enctype="multipart/form-data">
        @csrf

        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nombre del proveedor: <span class="required"></span>
            </label>
            <div class="col-md-6 col-sm-6 ">
                <select name="nombrepro" id="nombrepro" required="required" class="form-control selectpicker"
                    data-live-search="true">
                    <option style="display:none" value="">Seleccione una opcion</option>
                    @foreach ($proveedors as $pro)
                    <option value="{{$pro->id}}">{{$pro->Nombre_del_proveedor}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nombre del producto: <span class="required"></span>
            </label>
            <div class="col-md-6 col-sm-6 ">
                <input maxlength="110" type="text" id="nombre_producto" name="nombre_producto" class="form-control "
                value="{{old('nombre_producto')}}"
                placeholder="Ingrese el nombre del producto">
            </div>
        </div>

        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Principio Activo: <span class="required"></span>
            </label> <div class="col-md-6 col-sm-6 ">
                <textarea maxlength="200" type="text" id="principio_activo" name="principio_activo" required="required" class="form-control"
                value="{{old('principio_activo')}}"
                placeholder="Ingrese el principio activo ">{{old('principio_activo')}}</textarea>
            </div>
        </div>


        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Descripción: <span class="required"></span>
            </label> <div class="col-md-6 col-sm-6 ">
                <textarea maxlength="200" type="text" id="descripcion" name="descripcion" required="required" class="form-control"
                value="{{old('descripcion')}}"
                placeholder="Ingrese la descripción ">{{old('descripcion')}}</textarea>
            </div>
        </div>

                <div class="ln_solid"></div>
                <div class="item form-group">
                    <br><br>
                    <div class="col-md-6 col-sm-6 offset-md-3">
                        <button class="btn btn-danger" type="button" onclick="window.location='/Producto'">Cancelar</button>
                        <a type="button" href="javascript:location.reload()" class="btn btn-warning">Limpiar</a>
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </div>

    </form>
</div>


@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection
