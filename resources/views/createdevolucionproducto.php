@extends('plantilla.principalpag')
@section('pestania', 'Formulario de devolucion')
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

<h1 style="margin-left: 4% ; margin-top: 70px; margin-bottom: 3%; "> <u>Registro de devolucion</u> </h1>

    <form  action="{{route('devolucions.store')}}" method="POST" 
    style="margin-left: 3%;" method="post" enctype="multipart/form-data" >
        @csrf

        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nombre del Producto: <span class="required"></span>
            </label>
            <div class="col-md-6 col-sm-6 ">
                <input maxlength="110" type="text" id="nombre_del_producto" name="nombre_del_producto" required="required" class="form-control "
                value="{{old('nombre_del_producto')}}"
                placeholder="Ingrese el nombre del producto">
            </div>
        </div>

     

        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Cantidad de Producto: <span class="required"></span>
            </label>
            <div class="col-md-6 col-sm-6 ">
                <input maxlength="110" type="number" id="cantidad_producto" name="cantidad_producto" required="required" class="form-control "
                value="{{old('cantidad_producto')}}"
                placeholder="Ingrese la cantidad del producto">
            </div>
        </div>

        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Precio Unitario: <span class="required"></span>
            </label>
            <div class="col-md-6 col-sm-6 ">
                <input maxlength="110" type="number" id="precio_unitario" name="precio_unitario" required="required" class="form-control "
                value="{{old('precio_unitario')}}"
                placeholder="Ingrese el precio del producto">
            </div>
        </div>

        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Precio Total: <span class="required"></span>
            </label>
            <div class="col-md-6 col-sm-6 ">
                <input maxlength="110" type="number" id="precio_total" name="precio_total" required="required" class="form-control "
                value="{{old('precio_total')}}"
                placeholder="Ingrese el precio total del producto">
            </div>
        </div>

        
        

      

    </form>
</div>

@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection
