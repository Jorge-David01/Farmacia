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
                    <table style="text-align: center; width: 96%; margin-left: 2%" class="table table-bordered align-items-center table-flush table-borderless table-responsive">

                        <tr style=" text-align: center; border: 2px solid #dddddd; margin-left: 5%;">
                            <th style="background: #0088cc; ">Número de factura:</th>
                            <td style=" border: 2px solid #dddddd; margin-left: 1%">{{$comp->numero_factura}} </td> 

                            <th style="background: #0088cc; margin-left: 5%;">Proveedor:</th>
                            <td style=" border: 2px solid #dddddd;">{{$comp->proveed->Nombre_del_proveedor}} </td>

                            <th style="background: #0088cc; margin-left: 5%;">Fecha de pago:</th>
                            <td>{{$comp->fecha_pago}} </td>
                        </tr>

                    </table>

                    <br>




                    <table style="text-align: center; width: 96%;margin-left: 2%" class="table table-bordered align-items-center table-flush table-borderless table-responsive">


                        <tr style="background: #0088cc; text-align: center; border: 2px solid #dddddd;">
                            <th>Nombre de producto</th>
                           
                            <th>Cantidad</th>
                            
                            <th>Precio de compra</th>
                            <th>Precio de venta</th>
                            <th>Total</th>

                            <th>Laboratorio</th>

                            <th>Lote</th>
                            <th>Fecha de vencimiento</th>

                        </tr>

                        <?php
                        $total = 0;
                        ?>

                        @forelse ($deta as $det)

                        <tr>
                            <td>{{$det->nombre_producto}}</td>
                            
                            <td>{{$det->cantidad}}</td>
                           
                            <td>{{$det->precio_farmacia}}</td>
                            <td>{{$det->precio_publico}}</td>

                            <?php $total = $det->precio_farmacia * $det->cantidad;
                            ?>

                            <td> {{$total }} </td>
                            <td>{{$det->laboratorio}}</td>

                            <td>{{$det->lote}}</td>
                            <td>{{$det->fecha_vencimiento}}</td>


                        </tr>

                        @empty
                        @endforelse

                        <?php
                        $total_suma = 0;
                        ?>

                    </table>












                    <br><br> 
                    <hr>
                    <br><br> 













                    <table style="text-align: center; width: 96%;margin-left: 2%" class="table table-bordered align-items-center table-flush table-borderless table-responsive">

                        <tr style="background: #0088cc; text-align: center; border: 2px solid #dddddd;">
                            <th scope="row">Número de factura:</th>
                            <td style="background: #0088cc; border: 2px solid #dddddd;">{{$comp->numero_factura}} </td>
                        </tr>

                        <tr style="background: #0088cc; text-align: center; border: 2px solid #dddddd;">
                            <th>Nombre de producto</th>
                            <th scope="row">Proveedor:</th>
                            <th>Cantidad</th>
                            <th scope="row">Fecha de pago:</th>
                            <th>Precio de compra</th>
                            <th>Precio de venta</th>
                            <th>Total</th>

                            <th>Laboratorio</th>

                            <th>Lote</th>
                            <th>Fecha de vencimiento</th>

                        </tr>

                        <?php
                        $total = 0;
                        ?>

                        @forelse ($deta as $det)

                        <tr>
                            <td>{{$det->nombre_producto}}</td>
                            <td>{{$comp->proveed->Nombre_del_proveedor}}</td>
                            <td>{{$det->cantidad}}</td>
                            <td>{{$comp->fecha_pago}}</td>
                            <td>{{$det->precio_farmacia}}</td>
                            <td>{{$det->precio_publico}}</td>

                            <?php $total = $det->precio_farmacia * $det->cantidad;
                            ?>

                            <td> {{$total }} </td>
                            <td>{{$det->laboratorio}}</td>

                            <td>{{$det->lote}}</td>
                            <td>{{$det->fecha_vencimiento}}</td>


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