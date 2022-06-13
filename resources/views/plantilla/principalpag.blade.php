<!doctype html>
<html lang="en">

<!-- ------------------------------------ESTILO DEL NAVEGADOR VERTICAL-------------------------------------- -->
<style>
body {
  margin: 0;
}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  width: 12%;
  background-color: #3385ff;  
  position: fixed;
  height: 100%;
  overflow: auto;
}

li a {
  display: block;
  color: #000;
  padding: 8px 16px;
  text-decoration: none;
}

li a.active {
  background-color: #00cc00;
  color: white;
}

li a:hover:not(.active) {
  background-color: #006699;
  color: white;
}

</style>

<head>
<!-- ---------------------------------------------LINK DE  BOOTSTRAP--------------------------------------- -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>L4 - @yield('pestania')</title>
</head>

<body>
<header>

<!-- --------------------------------------------------------NAVBAR #1-------------------------------------------------------- -->
    <nav style="background-color: #3385ff;  border-bottom: 4px solid black;" class="navbar navbar-expand-lg ">
        <div class="container-fluid">
        <a class="navbar-brand" href="/"><img src="https://thumbs.dreamstime.com/b/fondo-m%C3%A9dico-del-extracto-del-concepto-del-logotipo-de-la-farmacia-53181525.jpg" alt="logo" style="width:150px;"></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <h1 class="fst-italic text-white  " >  FARMACIA LA POPULAR  </h1>   
                </div>
            </div>
        </div>
    </nav>

<!-- --------------------------------------------------------NAVBAR #2-------------------------------------------------------- -->
    <nav  >
        <ul style="border-right: 4px solid black;">
            <br><li><a href="/Empleados">Empleados</a></li> <br>
            <li><a href="/Proveedores">Proveedores</a></li><br>
            <li><a href="#about">Clientes</a></li> <br>
            <li><a href="#contact">Facturación</a></li> <br>
            <li><a href="#about">Inventario</a></li>  <br>
      </ul>
    </nav>   
</header>

<main class="flex-shrink-0">
<div class="container" style="margin-left:12%;">
    @yield('contenido')
</div>
</main>

<footer class="footer mt-auto py-3 bg-light" style="margin-left:12%;">
    <div class="container">
        <span class="text-muted">@yield('pie_pagina')</span>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>

</html>
