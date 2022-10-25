<!DOCTYPE html>
    <html>
        <head>
            <title>Laravel 8 Generate PDF From View</title>

           <!-- CSS only -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        </head>
        <body>
            <h3><center>{{ $title }} {{ $date }}</center></h3>

            <table class="table table-striped">
                <thead>
            <tr>
                <th>Numero</th>
                <th>Nombre del proveedor</th>
                <th>Nombre del distribuidor</th>
                <th>Correo Electronico</th>
            </tr>

        </thead>

        <tbody>

        //variable que almacena la enumeracion de cada registro de proveedores
            var=i;
            <?php $i=1?>

            @foreach($pro as $prove)
            <tr>
                <td>{{$i}}</td>
                <td>{{$prove->Nombre_del_proveedor}}</td>
                <td>{{$prove->Nombre_del_distribuidor}}</td>
                <td>{{$prove->Correo_electronico}}</td>
            </tr>

            <?php $i++?>

            @endforeach
                </tbody>
            </table>

           
            <s<script type="text/php">
        if ( isset($pdf) ) {
            $pdf->page_script('
                $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
                $pdf->text(370, 570, "Pág $PAGE_NUM de $PAGE_COUNT", $font, 10);
            ');
        }
    	</script>


        </body>
    </html>