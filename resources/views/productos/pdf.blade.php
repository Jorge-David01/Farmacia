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
            <th>Nombre del proveedor</th>
            <th>Nombre del producto</th>
            <th>Principio activo</th>
        </tr>
    </thead>

    <tbody>
        @foreach($produc as $producto)
        <tr>
        <td>{{$producto->proveedores->Nombre_del_proveedor}}</td>
        <td>{{$producto->nombre_producto}}</td>
        <td>{{$producto->principio_activo}}</td>
        </tr>
        @endforeach
                </tbody>
            </table>
        </body>
    </html>