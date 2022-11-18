@extends('plantilla.principalpag')
@section('pestania', 'Detalles de compra')
@section('contenido')
@section('TituloPlantillas', 'Detalles de compras')


<h1 style="margin-bottom: 6%;"></h1>
<div class="content-wrapper">
    <div class="container-fluid">

        
        <h1 style="margin-bottom: 2%;"></h1>

        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card">

                    <table style="text-align: center; " class="table table-bordered align-items-center table-flush table-borderless">

                        <tr style="background: #0088cc; text-align: center; border: 2px solid #dddddd;">
                            <th scope="row">Número de factura</th>
                            <td style="background: #0088cc; border: 2px solid #dddddd;">{{$comp->numero_factura}} </td>

                        </tr>

                        <tr style="background: #0088cc; text-align: center; border: 2px solid #dddddd;">
                            <th>Nombre de producto</th>
                            <th>Cantidad</th>
                            <th>Lote</th>
                            <th>Fecha de vencimiento</th>
                            <th>Precio de compra</th>
                            <th>Precio de venta</th>
                            <th>Total</th>
                        </tr>

                        <?php
                        $total = 0;
                        ?>

                        @forelse ($deta as $det)

                        <tr>

                            <td>{{$det->nombre_producto}}</td>
                            <td>{{$det->cantidad}}</td>
                            <td>{{$det->lote}}</td>
                            <td>{{$det->fecha_vencimiento}}</td>
                            <td>{{$det->precio_farmacia}}</td>
                            <td>{{$det->precio_publico}}</td>

                            <?php $total = $det->precio_farmacia * $det->cantidad;
                            ?>

                            <td> {{$total }} </td>

                        </tr>

                        @empty
                        @endforelse

                        <?php
                        $total_suma = 0;
                        ?>

                    </table>

                    <div style="text-align: center; margin-top: 2%;">
                        <a class="btn btn-success" href="/listacompra">Volver</a>
                        
                    </div>
                    <h1 style="margin-bottom: 2%;"></h1>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SUBIR PARA ARRIBA SI ES MUY GRANDE LAS LISTA -->
<a href="javaScript:void();" class="back-to-top" style="display: inline;"><i class="fa fa-angle-double-up"></i> </a>


@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection