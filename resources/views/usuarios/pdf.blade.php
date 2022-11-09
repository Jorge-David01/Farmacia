<!DOCTYPE html>
    <html>
        <head>
            <title>Laravel 8 Generate PDF From View</title>


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        </head>
        <body>
        <center><h1>FARMACIA LA POPULAR</h1></center>
            <h3><center>{{ $title }} {{ $date }}</center></h3>

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
