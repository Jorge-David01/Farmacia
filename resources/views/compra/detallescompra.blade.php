@extends('plantilla.principalpag')
@section('pestania', 'Detalles de compra')
@section('contenido')
@section('TituloPlantillas', 'Detalles de compras')



<div class="content-wrapper">
    <div class="container-fluid">
        <h1 style="margin-bottom: 6%;"></h1>







        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card">

                   <br>
                    <table style="text-align: center;  margin-left: 2%" class="table  align-items-center table-flush  table-responsive">

                        <tr style=" text-align: center; border: 2px solid #dddddd; margin-left: 5%;">
                            <th style="background: #0088cc; ">Número de factura:</th>
                            <td style=" border: 2px solid #dddddd; margin-left: 1%">{{$comp->numero_factura}} </td>     
                        </tr>

                        <tr style=" text-align: center; border: 2px solid #dddddd; margin-left: 5%;">
                        <th style="background: #0088cc; margin-left: 5%;">Proveedor:</th>
                            <td style=" border: 2px solid #dddddd;">{{$comp->proveed->Nombre_del_proveedor}} </td>
                        </tr>

                        <tr style=" text-align: center; border: 2px solid #dddddd; margin-left: 5%;">
                        <th style="background: #0088cc; margin-left: 5%;">Fecha de pago:</th>
                            <td style=" border: 2px solid #dddddd;">{{$comp->fecha_pago}} </td>
                        </tr>

                    </table>

                    <br>

                    
    


                    <table style="text-align: center; width: 96%; margin-left: 2%; " class="table table-bordered align-items-center table-flush table-borderless table-responsive">


                        <tr style="background: #0088cc; text-align: center; border: 1px solid #dddddd; ">
                            <th style="padding-right: 17px; padding-left: 17px;" >Nombre del producto</th>
                            <th style="padding-right: 17px; padding-left: 17px;">Laboratorio</th>
                            <th style="padding-right: 16.9px; padding-left: 16.9px;">Lotes</th>
                            <th style="padding-right: 16.9px; padding-left: 16.9px;">Fecha de vencimiento</th>
                            <th style="padding-right: 17px; padding-left: 17px;">Cantidad</th>                         
                            <th style="padding-right: 17px; padding-left: 17px;">Precio de compra</th>
                            <th style="padding-right: 17px; padding-left: 17px;">Precio de venta</th>
                            <th style="padding-right: 17px; padding-left: 17px;">Total</th>
                           
                        </tr>

                        <?php
                        $total = 0;
                        ?>

                        @forelse ($deta as $det)

                        <tr>
                            <td >{{$det->nombre_producto}}</td>
                            <td >{{$det->laboratorio}}</td>

                            <td >{{$det->lote}}</td>
                            <td >{{$det->fecha_vencimiento}}</td>
                            <td >{{$det->cantidad}}</td>
                           
                            <td >{{$det->precio_farmacia}}</td>
                            <td >{{$det->precio_publico}}</td>

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