<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de empleados</title>



    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    
<style>




</style>

</head>


<body>

<a style="color: #0088cc; text-decoration: none; margin-top: 2%;" href="/Empleados"> <img src="https://us.123rf.com/450wm/faysalfarhan/faysalfarhan1711/faysalfarhan171112773/89435989-%C3%ADcono-de-flecha-hacia-atr%C3%A1s-aislado-en-la-ilustraci%C3%B3n-abstracta-de-bot%C3%B3n-redondo-azul-cian-especial.jpg?ver=6" style="width: 3%; height: 3%; margin-left: 5%; margin-top: 2%; float: left;"  alt=""> <h3 style="float: left; paddign: 1%; margin-top: 2.3%;" >Atrás</h3></a>
<br>
<h1 style="text-align: center; margin-top: 1%; padding-top: 3%;">Empleados</h1>

<table  style="width: 85%; margin: auto; margin-top: 3%; " >

<tbody >
<tr style="background: #0088cc; text-align: center; border: 2px solid #dddddd;">
<th style="border: 2px solid #dddddd" >Identificador</th>
<th style="border: 2px solid #dddddd">Nombre</th>
<th style="border: 2px solid #dddddd">Apellido</th>
<th style="border: 2px solid #dddddd">Número de identidad</th>
<th style="border: 2px solid #dddddd">Teléfono</th>
<th style="border: 2px solid #dddddd">Ver detalles</th>

</tr>



@forelse($employee as $emple)

<tr>

<td>{{$emple->nombres}}</td>
<td>{{$emple->apellidos}}</td>
<td>{{$emple->dni}}</td>
<td>{{$emple->telefono_personal}}</td>
<td href="/showempleado" >Ver detalles</td>
</tr>

@empty

@endforelse


{{$employee -> links() }}











</tbody>

</table>



</body>

</html>