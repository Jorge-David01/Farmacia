<?php  
session_start();
?>

@extends('plantilla.principalpag')
@section('pestania', 'Formulario de venta')

@section('contenido')

@if(session('mensaje'))
<div id="mensaje" class="alert alert-success">
    {{session('mensaje')}}
</div>
@endif

<style>
    input{
        border-radius: 0px !important;
    }
</style>
<h2 style="margin-left: 3% ; margin-bottom: 1%; "> Datos de la factura de venta </h2>

<div style="width: 80%;margin-left: 3%">
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
                <center><label for="" >Número de factura:</label></center>
                <input placeholder="Número de factura" class="form-control" id="factura" name="factura"
                maxlength="10" type="text"  required value="@if(isset($numero)){{$numero}}@else{{old("factura")}}@endif" readonly>
            </div>
            <?php $fecha_actual = date("Y-m-d");?>
            <div style="width: 24%; float: left;margin-right: 1%">
                <center><label for="" >Fecha de venta:</label></center>
                <input type="date" class="form-control" id="fecha" name="fecha"
                disabled value="{{$fecha_actual}}" >
            </div>

            <div style="width: 24%; float: left;margin-right: 1%">
                <center><label for="" >Tipo de pago:</label></center>
                <select name="pago" id="pago" class="form-control selectpicker"
                data-live-search="true">
                @if(old('pago'))
                <option value="{{old('pago')}}" style="display:none">{{old('pago')}}</option>
                @else
                    @if (isset($idpago))
                        <option value="{{$idpago}}" style="display:none">{{$idpago}}</option>
                    @else
                        <option value="" style="display:none">Seleccione</option>
                    @endif
                @endif
                    <option value="Efectivo">Efectivo</option>
                    <option value="Tarjeta">Tarjeta</option>
                </select>
            </div>

            <div style="width: 24%; float: left;margin-right: 1%">
                <center><label for="" >Nombre del cliente:</label></center>
                <select name="cliente" id="cliente" class="form-control selectpicker"
                data-live-search="true">
                @if(old('cliente'))
                @foreach ($clientes as $p)
                    @if (old('cliente') == $p->id)
                        <option value="{{$p->id}}">{{$p->nombre}}</option>
                    @endif
                @endforeach
                @else
                    @if (isset($idcliente))
                    <option style="display: none" value="{{$idcliente}}">{{$clientenomb}}</option>
                    @else
                    <option style="display: none" value="">Seleccione el cliente</option>
                    @endif
                @endif
                    @foreach ($clientes as $p)
                        <option value="{{$p->id}}">{{$p->nombre_cliente}}</option>
                    @endforeach
                </select>
            </div>

            <div style="width: 100%; float: left; height: 30px;">
            </div>

            <div style="width:32%; float: left;margin-right: 1%">
                <center><label for="" >Producto:</label></center>
            <select name="productos" id="productos" class="form-control selectpicker"
                data-live-search="true">
                @if(old('productos'))
                @foreach ($productos as $p)
                    @if (old('productos') == $p->id)
                        <option value="{{$p->id}}">{{$p->nombre_producto}}</option>
                    @endif
                    @foreach ($productos as $p)
                    <option value="{{$p->id}}">{{$p->nombre_producto}}</option>
                    @endforeach
                @endforeach
                @else
                    <option style="display: none" value="">Seleccione el producto</option>
                    @foreach ($productos as $p)
                    <option value="{{$p->id}}">{{$p->nombre_producto}}</option>
                    @endforeach
                @endif
                </select>
            </div>
            <div style="width: 32%; float: left;margin-right: 1%">
                <center><label for="" >Cantidad:</label></center>
                <input type="number" placeholder="0" class="form-control" id="cantidad" name="cantidad"
                min="0" maxlength="7" max="999999999" required value="{{old("cantidad")}}"
                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
            </div>
            <div style="width: 32%; float: left;margin-right: 1%">
                <center><label for="" >Descuento:</label></center>
                <input placeholder="0.00" class="form-control" id="descuento" name="descuento"
                min="0" max="100" maxlength="3" type="number" step="any" 
                title="Formato de descuento incorrecto" value="{{old("descuento")}}"
                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
            </div>
            <div style="width: 100%; float: left;margin-top: 2%; margin-bottom: 1%;">
                <button class="btn btn-success" type="submit" style="width: 100%">Agregar producto</button> <br><hr>
            </div>
        </form>
    </div>
    <div>

    <h2 style="margin-left: 0% ;  margin-bottom: 2%; "> Productos Facturados </h2>
    <table style="border: 2px solid #dddddd;" class="table table-bordered">

        <tr style="background: #0088cc; text-align: center; border: 2px solid #dddddd;">
            <th style="text-align: center">Eliminar</th>
           <th style="text-align: center">Producto</th>
           <th style="text-align: center">Precio</th>
           <th style="text-align: center">Cantidad</th>
           <th style="text-align: center">Sub Total</th>
           <th style="text-align: center">Descuento</th>
           <th style="text-align: center">Total</th>
        </tr>
            <?php
            $total =0;
            ?>
            @forelse ($temporal as $p)
                <tr>
                    <td>
                        <form method="post"
                        action="{{route('venta.eliminar',['id'=>$p->id,'factura'=>$numero,'cliente'=>$idcliente,'pago'=>$idpago])}}">
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
                    <td style="text-align: right">L.{{ number_format($p->precio,2)}}</td>
                    <td style="text-align: left;">

                        <form method="post" style="display: none" id="oculto{{$p->id}}"
                        action="{{route('venta.editar',['id'=>$p->id,'factura'=>$numero,'cliente'=>$idcliente,'pago'=>$idpago])}}">
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
                            function cambio{{$p->id}}(){
                                var x = document.getElementById("oculto{{$p->id}}");
                                var y = document.getElementById("mostrar{{$p->id}}");

                                x.style.display = "block";
                                y.style.display = "none";
                            }
                        </script>

                    </td>
                    <td style="text-align: right">L.{{ number_format($p->precio*$p->cantidad,2)}}</td>
                    <td style="text-align: right">L.{{ number_format(($p->precio*$p->cantidad)*($p->descuento/100),2)}}</td>
                    <td style="text-align: right">L.{{ number_format(($p->precio*$p->cantidad)*(1-$p->descuento/100),2)}}</td>
                    <?php $total += ($p->precio*$p->cantidad)*(1-$p->descuento/100);?>
                  
                </tr>
            @empty
                <tr>
                    <td colspan="8"><center>No hay datos ingresados</center></td>
                </tr>
            @endforelse

<?php   

$variable = $total;

?>

        <tr>
            <td style="text-align: right" colspan="6">Total</td>
            <td style="text-align: right">L.{{ number_format($total,2)}}</td>
        </tr>
    </table>
  

    <form style="float: left" action="{{route('venta.cancelar')}}"
    method="get">
    <button class="btn btn-danger" type="submit">Cancelar</button>
    </form>

    <form style="float: left" action="{{route('venta.destruir')}}" method="get">
        <button type="submit" class="btn btn-warning">Borrar todo</button>
    </form>

    <form style="float: left"
    action="{{route('venta.almacenar')}}"
    method="post">
    @csrf
    @method('put')
    <script>
        setInterval('actualizar()',1000);

        function actualizar(){
            var a = document.getElementById('factura').value;
            var c = document.getElementById('cliente').value;
            var p = document.getElementById('pago').value;

            document.getElementById('factura2').value = a;
            document.getElementById('cliente2').value = c;
            document.getElementById('pago2').value = p;
        }

    </script>
    <input type="text" name="factura" id="factura2" value="{{$numero}}" readonly style="display: none" >
    <input type="text" name="cliente" id="cliente2" value="{{$idcliente}}" readonly style="display: none">
    <input type="text" name="pago" id="pago2" value="{{$idpago}}" readonly style="display: none">
    @if (count($temporal) != 0)
    <button onclick="caja()" type="submit" target="_blank" class="btn btn-success">Vender</button>

    @else
    <button type="submit" class="btn btn-success" disabled>Vender</button>
    @endif
    </form>
    </div>

  
    

    <script>
       

    function caja(){

 
var caja = '<?=$variable?>' ;


        
        var caja_total;


if ( caja < 3000){
   

    caja_total = caja_total + caja; 
   

    if (caja_total >= 3000 ) {
        window.alert("La caja de alivio se ha llenado");
            caja_total = 0;
             
    }

}else{
    caja_total = caja ;
   
}


if (caja_total >= 3000){

   
    window.alert("La caja de alivio se ha llenado");

  caja_total = 0;

 
}


}



document.write(caja_total);




</script>




</div>

@stop
