<!DOCTYPE html>
    <html>
        <head>
            <title>Laravel 8 Generate PDF From View</title>
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
    <!-- Bootstrap CSS -->
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
                        <tr>
                            <th>Número</th>
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
            </div>


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