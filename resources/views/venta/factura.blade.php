<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura</title>
</head>
<body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<center>
<h1>Farmacia La Popular</h1>
<h2>Drogeria y Farmacia La Popular S.A.</h2>

<h3>Barrio Las Flores Contiguo al Antiguo Local del Banco Continental</h3>

<h3>marvgio14@gmail.com&nbsp&nbsp&nbsp&nbspTELÉFONO: 96081179&nbsp&nbsp&nbsp&nbspRTN: 08011987167855</h3>

<h4>Horario de atencion: De 8:00 Am a 9:00 pm de Lunes a Domingo </h4>

<h3>Cliente: {{$venta->clientes->nombre_cliente}}&nbsp&nbsp&nbsp&nbspIdentidad: {{$venta->clientes->numero_id}}</h3>

</center>

<a type="buttom" style="width: 100px;margin-left: 10px;margin-bottom: 10px;" href="{{route('venta.create')}}" target="_blank" class="btn btn-info">Regresar</a>

<button type="buttom" style="width: 100px;margin-left: 10px;margin-bottom: 10px;" onclick="imprimir()" class="btn btn-danger">Imprimir</button>

<script>
    function imprimir(){
        var conteudo = document.getElementById('printer').innerHTML;
        tela_impressao = window.open('about:blank');
        tela_impressao.document.write(conteudo);
        tela_impressao.window.print();
        tela_impressao.window.close();
    }
</script>

<table class="table">
    <thead>
        <th>N°</th>
        <th>Producto</th>
        <th>Cantidad</th>
        <th>Precio</th>
        <th>Sub Total</th>
        <th>Descuento</th>
        <th>Total</th>
    </thead>
    <tbody>
        @foreach($venta->detalles as $key => $detall)
<tr>
    <td>{{$key+1}}</td>
    <td>{{$detall->productos->nombre_producto}}</td>
    <td>{{$detall->cantidad}}</td>
    <td>{{$detall->precio}}</td>
    <td>L.{{ number_format($detall->precio*$detall->cantidad,2)}}</td>
    <td>L.{{ number_format(($detall->precio*$detall->cantidad)*($detall->descuento/100),2)}}</td>
    <td>L.{{ number_format(($detall->precio*$detall->cantidad)*(1-$detall->descuento/100),2)}}</td>

</tr>
        @endforeach
        <tr>
            <td colspan="6">Total a pagar</td>
            <?php $sum = 0?>
            @foreach($venta->detalles as $detall)
            <?php $sum = $sum+($detall->cantidad * $detall->precio)?>
            @endforeach
            <td>L.{{ number_format($sum,2)}}</td>
        </tr>
    </tbody>
</table>

<div style="display: none;" id="printer">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <center>
        <h1>Farmacia La Popular</h1>
        <h2>Drogeria y Farmacia La Popular S.A.</h2>

        <h3>Barrio Las Flores Contiguo al Antiguo Local del Banco Continental</h3>

        <h3>marvgio14@gmail.com&nbsp&nbsp&nbsp&nbspTELÉFONO: 96081179&nbsp&nbsp&nbsp&nbspRTN: 08011987167855</h3>

        <h4>Horario de atencion: De 8:00 Am a 9:00 pm de Lunes a Domingo </h4>

        <h3>Cliente: {{$venta->clientes->nombre_cliente}}&nbsp&nbsp&nbsp&nbspIdentidad: {{$venta->clientes->numero_id}}</h3>

        </center>


        <table class="table">
            <thead>
                <th>N°</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Sub Total</th>
                <th>Descuento</th>
                <th>Total</th>
            </thead>
            <tbody>
                @foreach($venta->detalles as $key => $detall)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$detall->productos->nombre_producto}}</td>
            <td>{{$detall->cantidad}}</td>
            <td>{{$detall->precio}}</td>
            <td>L.{{ number_format($detall->precio*$detall->cantidad,2)}}</td>
            <td>L.{{ number_format(($detall->precio*$detall->cantidad)*($detall->descuento/100),2)}}</td>
            <td>L.{{ number_format(($detall->precio*$detall->cantidad)*(1-$detall->descuento/100),2)}}</td>

        </tr>
                @endforeach
                <tr>
                    <td colspan="6">Total a pagar</td>
                    <?php $sum = 0?>
                    @foreach($venta->detalles as $detall)
                    <?php $sum = $sum+($detall->cantidad * $detall->precio)?>
                    @endforeach
                    <td>L.{{ number_format($sum,2)}}</td>
                </tr>
            </tbody>
        </table>

        <h3>¡Gracias por Preferirnos!</h3>
</div>

<!-- SUBIR PARA ARRIBA SI ES MUY GRANDE LAS LISTA -->
<a href="javaScript:void();" class="back-to-top" style="display: inline;"><i class="fa fa-angle-double-up"></i> </a>

</body>
</html>
