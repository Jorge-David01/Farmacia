<!DOCTYPE html>
    <html>
        <head>
            <title>Laravel 8 Generate PDF From View</title>
            <link rel="stylesheet" href="{{asset('css/app.css')}}">

            <style>
                @page { margin: 140px 40px 40px 40px; font-family: 'Roboto', sans-serif;}
                .table td { padding: 0rem !important;}
                #header { position: fixed; left: 150px; top: -120px; right: 0px;  text-align: center; }
                h1,h2,h3,h4,h5,h6{margin-top:0;margin-bottom:.5rem}
                .h3,h3{font-size:1.75rem}.h4,h4{font-size:1.5rem}
                .h1,.h2,.h3,.h4,.h5,.h6,h1,h2,h3,h4,h5,h6{margin-bottom:.5rem;font-weight:500;line-height:1.2}.h1,h1{font-size:2.5rem}
                .table-striped tbody tr:nth-of-type(odd){background-color:rgba(0,0,0,.05)}
                .table thead th{vertical-align:bottom;border-bottom:2px solid #dee2e6;text-align: left}.table tbody+tbody{border-top:2px solid #dee2e6}
                .table{width:100%;margin-bottom:1rem;color:#212529}.table td,.table th{padding:.75rem;vertical-align:top;}
            </style>
            <!-- CSS only -->
            </head>
        <body>
            <div id="header">
                <div style="float: right">
                    <img src="{{asset('assets/images/Logo.jpeg')}}" width="150px" class="logo-icon" alt="logo icon">
                </div>
                <br>
                <center><h3>FARMACIA LA POPULAR</h3></center>
                    <h4><center>{{ $title }} {{ $date }}</center></h4>
            </div>

        <div id="content">
            <table class="table table-striped">

            <thead>
                <th>Número</th>
                <th>Id Venta</th>
<th>Id Producto</th>
<th>Cantidad</th>
<th>Descuento</th>
<th>Precio</th>
        </tr>
    </thead>

    <tbody>

    //variable que almacena la enumeracion de cada registro de productos
            var=i;
            <?php $i=1?>

            @forelse($lisdevolucion as $devolucion)
        <tr>
        <td class="numero">{{$i}}</td>
        <td class="numero"> {{$devolucion->id_venta}} </td>
<td class="numero">  {{$devolucion->id_producto}} </td>
<td class="numero">  {{$devolucion->cantidad}}  </td>
<td class="numero">  {{$devolucion->descuento}}  </td>
<td class="numero">  {{$devolucion->precio}}  </td>
        </tr>

        <?php $i++?>

        @endforeach
                </tbody>
            </div>
            </table>


        <script type="text/php">
        if ( isset($pdf) ) {
            $pdf->page_script('
                $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
                $pdf->text(370, 570, "Pág $PAGE_NUM de $PAGE_COUNT", $font, 10);
            ');
        }
    	</script>


        </body>
    </html>
