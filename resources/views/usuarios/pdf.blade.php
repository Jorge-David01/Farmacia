<!DOCTYPE html>
    <html>
        <head>
            <title>Laravel 8 Generate PDF From View</title>
            <style>
                @page { margin: 140px 40px 40px 40px; }
                .table td { padding: 0rem !important;}
                #header { position: fixed; left: 150px; top: -120px; right: 0px;  text-align: center; }
            </style>

            <!-- CSS only -->
            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

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
            <th>Nombre del usuario</th>
            <th>Correo Electronico</th>
            <th>Rol</th>
            </tr>
            </thead>

        <tbody>
//variable que almacena la enumeracion de cada registro de productos
            var=i;
            <?php $i=1?>

        @foreach($employee as $user )
        <tr>
  	<td>{{$i}}</td>
    <td>{{$user->name}}</td>
    <td>{{$user->email}}</td>
    <td>{{$user->role}}</td>
        </tr>
 <?php $i++?>

        @endforeach
                </tbody>
            </table>
        </div>
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