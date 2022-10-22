@extends('plantilla.principalpag')
@section('pestania', 'Formulario de compra')

@section('contenido')

@if(session('mensaje'))
<div id="mensaje" class="alert alert-success">
    {{session('mensaje')}}
</div>
@endif





<div class="content-wrapper">
    <div class="container-fluid">

        <h2 style="margin-left: 2%; margin-bottom: 3%; "> Datos de la factura de compra </h2>

        <div style="margin-bottom: 2%;" class="row">
            <div class="col-12 col-lg-12">
                <div class="card">

                    <div style="width: 97%; margin-left: 2%">
                        <div style="width: 100%">
                            <form method="post">
                                @csrf

                                <br>
                                @if($errors->any())
                                <div id="error" class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                        <li>
                                            {{$error}}
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                <div style="width: 24%; float: left;margin-right: 1%">
                                    <center><label for="">Número de factura:</label></center>
                                    <input placeholder="Número de factura" class="form-control" id="factura" name="factura" maxlength="10" type="text" required value="@if(isset($numero)){{$numero}}@else{{old("factura")}}@endif">
                                </div>
                                <?php $fecha_actual = date("Y-m-d"); ?>
                                <div style="width: 24%; float: left;margin-right: 1%">
                                    <center><label for="">Fecha de compra:</label></center>
                                    <input type="date" class="form-control" id="fecha" name="fecha" disabled value="{{$fecha_actual}}">
                                </div>
                                <div style="width: 24%; float: left;margin-right: 1%">
                                    <center><label for="">Fecha de pago:</label></center>
                                    <input type="date" class="form-control" id="pago" name="pago" min="{{$fecha_actual}}" max="<?php echo date('Y-m-d', strtotime($fecha_actual . "+ 10 year")); ?>" required value="@if(isset($pago)){{$pago}}@else{{old("pago")}}@endif">
                                </div>
                                <div style="width: 24%; float: left;margin-right: 1%">
                                    <center><label for="">Nombre del proveedor:</label></center>
                                    <select name="proveedor" id="proveedor" class="form-control selectpicker" data-live-search="true" onchange="llenar()">
                                        @if(old('proveedor'))
                                        @foreach ($proveedor as $p)
                                        @if (old('proveedor') == $p->id)
                                        <option value="{{$p->id}}">{{$p->nombre}}</option>
                                        @endif
                                        @endforeach
                                        @else
                                        @if (isset($idproveedor))
                                        <option style="display: none" value="{{$idproveedor}}">{{$proveedornomb}}</option>
                                        @else
                                        <option style="display: none" value="">Seleccione el proveedor</option>
                                        @endif
                                        @endif
                                        @foreach ($proveedor as $p)
                                        <option value="{{$p->id}}">{{$p->Nombre_del_proveedor}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div style="width: 100%; float: left; height: 30px;"></div>
                                <div style="width: 19%; float: left;margin-right: 1%">
                                    <center><label for="">Producto:</label></center>
                                    <select name="productos" id="productos" class="form-control selectpicker" data-live-search="true">
                                        @if(old('productos'))
                                        @foreach ($productos as $p)
                                        @if (old('productos') == $p->id)
                                        <option value="{{$p->id}}">{{$p->nombre}}</option>
                                        @endif
                                        @endforeach
                                        @else
                                        <option style="display: none" value="">Seleccione el producto</option>
                                        @endif
                                    </select>
                                </div>

                                <div style="width: 11%; float: left;margin-right: 1%">
                                    <center><label for="">Cantidad:</label></center>
                                    <input type="number" placeholder="0" class="form-control" id="cantidad" name="cantidad" min="0" maxlength="7" max="999999999" required value="{{old("cantidad")}}" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                                <div style="width: 12%; float: left;margin-right: 1%">
                                    <center><label for="">Lote:</label></center>
                                    <input type="number" placeholder="0" class="form-control" id="lote" name="lote" min="0" maxlength="7" max="999999999" required value="{{old("lote")}}" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                                <div style="width: 15%; float: left;margin-right: 1%">
                                    <center><label for="">Fecha de vencimiento:</label></center>
                                    <input type="date" class="form-control" id="vencimiento" name="vencimiento" min="<?php echo date('Y-m-d', strtotime($fecha_actual . "+ 30 days")); ?>" max="<?php echo date('Y-m-d', strtotime($fecha_actual . "+ 10 year")); ?>" required value="{{old("vencimiento")}}">
                                </div>
                                <div style="width: 12%; float: left;margin-right: 1%">
                                    <center><label for="">Precio Farmacia:</label></center>
                                    <input placeholder="0.00" class="form-control" id="compra" name="compra" min="0" max="999999.99" maxlength="10" type="number" step="any" required title="Formato de precio incorrecto" value="{{old("compra")}}" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                                <div style="width: 12%; float: left;margin-right: 1%">
                                    <center><label for="">Precio Público:</label></center>
                                    <input placeholder="0.00" class="form-control" id="venta" name="venta" min="0" max="999999.99" maxlength="10" type="number" step="any" required title="Formato de precio incorrecto" value="{{old("venta")}}" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                                <div style="width: 12%; float: left;margin-right: 1%">
                                    <center><label for="">Laboratorio:</label></center>
                                    <input placeholder="ingrese laboratorio" class="form-control" id="laboratorio" name="laboratorio" maxlength="10" type="text" step="any" required value="{{old("laboratorio")}}">
                                </div>
                                <div style="width: 100%; float: left;margin-top: 2%; margin-bottom: 1%;">
                                    <button class="btn btn-success" type="submit" style="width: 100%">Agregar producto</button> <br>
                                </div>
                            </form>
                        </div>

                        <div>
                            <script>
                                window.onload = llenar();

                                function llenar() {
                                    $("#productos").find('option').not(':first').remove();
                                    var select = document.getElementById("proveedor");
                                    var valor = select.value;
                                    var selectnw = document.getElementById("productos");
                                    @foreach($productos as $p)
                                    if ({
                                            {
                                                $p - > id_proveedor
                                            }
                                        } == valor) {
                                        // creando la nueva option
                                        var opt = document.createElement('option');
                                        // Añadiendo texto al elemento (opt)
                                        opt.innerHTML = "{{ $p->nombre_producto }}";
                                        //Añadiendo un valor al elemento (opt)
                                        opt.value = "{{ $p->id }}";
                                        // Añadiendo opt al final del selector (sel)
                                        selectnw.appendChild(opt);
                                    }
                                    @endforeach
                                }
                            </script>
                        </div>

                    </div>
                </div>

            </div>
        </div>




        <h2 style="margin-bottom: 0%; "> Productos Facturados </h2>

        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card">


                    <table style="border: 2px solid #dddddd;" class="table table-bordered">

                        <tr style="background: #0088cc; text-align: center; border: 2px solid #dddddd;">
                            <th style="text-align: center">Eliminar</th>
                            <th style="text-align: center">Producto</th>
                            <th style="text-align: center">Lote</th>
                            <th style="text-align: center">Fecha de Vencimiento</th>
                            <th style="text-align: center">Precio de Farmacia</th>
                            <th style="text-align: center">Cantidad</th>
                            <th style="text-align: center">Total</th>
                        </tr>

                        <?php
                        $total = 0;
                        ?>
                        @forelse ($temporal as $p)

                        <tr>
                            <td>
                                <form method="post" action="{{route('compra.eliminar',['id'=>$p->id,'factura'=>$numero,'pago'=>$pago,'proveedor'=>$idproveedor])}}">
                                    @csrf
                                    @method('delete')
                                    <center>
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </center>
                                </form>
                            </td>

                            <td>{{$p->productos->nombre_producto}}</td>
                            <td style="text-align: right">{{$p->lote}}</td>
                            <td style="text-align: center">{{$p->fecha_vencimiento}}</td>
                            <td style="text-align: right">L.{{ number_format($p->precio_farmacia,2)}}</td>

                            <td style="text-align: left;">

                                <form method="post" style="display: none" id="oculto{{$p->id}}" action="{{route('compra.editar',['id'=>$p->id,'factura'=>$numero,'pago'=>$pago,'proveedor'=>$idproveedor])}}">
                                    @csrf
                                    @method('post')
                                    <input style="float: left" type="text" min="1" name="cantidad{{$p->id}}" id="cantidad" value="{{$p->cantidad}}">

                                    <button style="float: right" type="submit" class="btn btn-success">
                                        <i class="fa fa-save" aria-hidden="true"></i>
                                    </button>
                                </form>


                                <div id="mostrar{{$p->id}}">
                                    <button style="float: left" type="submit" class="btn btn-warning" onclick="cambio{{$p->id}}()">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </button>

                                    <div style="text-align: right; float: right;">{{$p->cantidad}}</div>
                                </div>

                                <script>
                                    function cambio {
                                        {
                                            $p - > id
                                        }
                                    }() {
                                        var x = document.getElementById("oculto{{$p->id}}");
                                        var y = document.getElementById("mostrar{{$p->id}}");

                                        x.style.display = "block";
                                        y.style.display = "none";
                                    }
                                </script>

                            </td>

                            <td style="text-align: right">L.{{ number_format($p->precio_farmacia*$p->cantidad,2)}}</td>
                            <?php $total += $p->precio_farmacia * $p->cantidad; ?>
                        </tr>

                        @empty

                        <tr>
                            <td colspan="8">
                                <center>No hay datos ingresados</center>
                            </td>
                        </tr>

                        @endforelse

                        <tr>
                            <td style="text-align: right" colspan="6">Total</td>
                            <td style="text-align: right">L.{{ number_format($total,2)}}</td>
                        </tr>

                    </table>



                    <div style="display:inline-block; margin-bottom: 1%;">
                        <form style="float: left" action="{{route('compra.cancelar')}}" method="get">
                            <button class="btn btn-danger" type="submit">Cancelar</button>
                        </form>

                        <form style="float: left" action="{{route('compra.destruir')}}" method="get">
                            <button type="submit" class="btn btn-warning">Borrar todo</button>
                        </form>

                        <form style="float: left" action="{{route('compra.almacenar')}}" method="post">
                            @csrf
                            @method('put')
                            <script>
                                setInterval('actualizar()', 1000);

                                function actualizar() {
                                    var a = document.getElementById('factura').value;
                                    var b = document.getElementById('pago').value;
                                    var c = document.getElementById('proveedor').value;

                                    document.getElementById('factura2').value = a;
                                    document.getElementById('pago2').value = b;
                                    document.getElementById('proveedor2').value = c;
                                }
                            </script>
                            <input type="text" name="factura" id="factura2" value="{{$numero}}" readonly style="display: none">
                            <input type="text" name="pago" id="pago2" value="{{$pago}}" readonly style="display: none">
                            <input type="text" name="proveedor" id="proveedor2" value="{{$idproveedor}}" readonly style="display: none">
                            @if (count($temporal) != 0)
                            <button type="submit" class="btn btn-success">Comprar</button>
                            @else
                            <button type="submit" class="btn btn-success" disabled>Comprar</button>
                            @endif
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@stop