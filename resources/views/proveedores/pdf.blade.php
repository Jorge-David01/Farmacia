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
                <th>Nombre del proveedor</th>
                <th>Nombre del distribuidor</th>
                <th>Correo Electronico</th>
            </tr>

        </thead>

        <tbody>
            @foreach($pro as $prove)
            <tr>
                <td>{{$prove->Nombre_del_proveedor}}</td>
                <td>{{$prove->Nombre_del_distribuidor}}</td>
                <td>{{$prove->Correo_electronico}}</td>
            </tr>
            @endforeach
                </tbody>
            </table>
        </body>
    </html>