@extends('plantilla.principalpag')
@section('pestania', 'Creación de productos')

@section('contenido')
@section('TituloPlantillas', 'Creación de producto')




<div class="content-wrapper">
    <div class="container-fluid">
        <h1 style="margin-bottom: 6%;"></h1>

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


        <div style="margin: auto;" class="col-lg-6">
            <div class="card">
                <div class="card-body">

                    <form method="post" enctype="multipart/form-data">
                        @csrf

                        <div class=" form-group">

                            <label for="first-name">Nombre del proveedor: <span class="required"></span></label>

                            <div>
                                <select name="nombrepro" id="nombrepro" required="required" class="form-control selectpicker" data-live-search="true">
                                    <option style="display:none" value="">Seleccione una opcion</option>
                                    @foreach ($proveedors as $pro)
                                    <option value="{{$pro->id}}">{{$pro->Nombre_del_proveedor}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="first-name">Nombre del producto: <span class="required"></span></label>
                            <div>
                                <input maxlength="110" type="text" id="nombre_producto" name="nombre_producto" class="form-control " value="{{old('nombre_producto')}}" placeholder="Ingrese el nombre del producto">
                            </div>
                        </div>


                        <div class="item form-group">
                            <label for="last-name">Principio Activo: <span class="required"></span>
                            </label>
                            <div>
                                <textarea maxlength="200" type="text" id="principio_activo" name="principio_activo" required="required" class="form-control" value="{{old('principio_activo')}}" placeholder="Ingrese el principio activo ">{{old('principio_activo')}}</textarea>
                            </div>
                        </div>


                        <div class="item form-group">
                            <label for="last-name">Descripción: <span class="required"></span>
                            </label>
                            <div>
                                <textarea maxlength="200" type="text" id="descripcion" name="descripcion" required="required" class="form-control" value="{{old('descripcion')}}" placeholder="Ingrese la descripción ">{{old('descripcion')}}</textarea>
                            </div>
                        </div>
                        <hr>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div style="text-align: center; ">
                                <button class="btn btn-warning" type="button" onclick="window.location='/Producto'">Volver</button>
                                <a type="button" href="javascript:location.reload()" class="btn btn-danger">Restablecer</a>
                                <button type="submit" class="btn btn-success">Guardar</button>
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