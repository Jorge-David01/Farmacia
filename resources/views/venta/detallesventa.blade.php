@extends('plantilla.principalpag')
@section('pestania', 'Detalles de la venta')
@section('contenido')




<div class="content-wrapper">
    <div class="container-fluid">

        <h1 style="margin-left: 2% ; ">Detalles de venta </h1>
        <h1 style="margin-bottom: 2%;"></h1>

        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card">

                    <table style="text-align: center; " class="table table-bordered align-items-center table-flush table-borderless">


                        <tr style="background: #0088cc; text-align: center; border: 2px solid #dddddd;">
                            <th scope="row">Número de factura:</th>
                            <td style="background: #0088cc; border: 2px solid #dddddd;">{{$factu->numero_factura}}</td>

                        </tr>

                        <tr style="background: #0088cc; text-align: center; border: 2px solid #dddddd;">
                            <th>Nombre del producto</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Descuento</th>
                            <th>Total</th>
                        </tr>

                        <?php
                        $total = 0;
                        ?>

                        @forelse ($detalles as $det)

                        <tr>

                            <td>{{$det->nombre_producto}}</td>
                            <td>{{$det->cantidad}}</td>
                            <td>{{$det->precio}}</td>
                            <?php $real = (($det->precio * $det->cantidad) * $det->descuento) / 100;
                            ?>
                            <td> {{$real }}</td>
                            <?php $total = ($det->precio * $det->cantidad) - $real;
                            ?>
                            <td> {{$total }} </td>
                        </tr>

                        @empty
                        <td>No hay resultados</td>
                        @endforelse

                        <?php
                        $total_suma = 0;
                        ?>

                    </table><br>


                    <div style="text-align: center;">
                        <a class="btn btn-success" href="/listaventa">Volver</a>
                    </div>
                    <h1 style="margin-bottom: 2%;"></h1>


                </div>
            </div>
        </div>

    </div>
</div>

@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection