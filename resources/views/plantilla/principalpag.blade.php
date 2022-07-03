<!doctype html>
<html lang="es">

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
  padding: 18px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #006699;
  color: white;
}

.sticky {
  position: fixed;
  top: 0;
  width: 100%;
  display: block;
}

@media (max-width: 600px) {
  body {
    flex-direction: column;
    background: #66ff33;
  }
}

</style>



<!-- ---------------------------------------------LINK DE  BOOTSTRAP--------------------------------------- -->
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
 
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <title>Farmacia - @yield('pestania')</title>
</head>

<body class="body" onload="startTime()">

<header >

<!-- ------------------------------------------------------------------------------------------------------------------------- -->
<!-- --------------------------------------------------------NAVBAR #1-------------------------------------------------------- -->
<nav style="background-color: #0088cc;  border-bottom: 4px solid black; margin-left:12%; height: 120px;" class="navbar navbar-expand-lg body">

  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <h1 style="font-size: 60px; color: white; text-shadow: 3px 3px 3px black, 0 0 30px black, 0 0 5px black;" class="fst-italic">FARMACIA LA POPULAR</h1>   
      </div>
    </div>
  </div>

 <!-- ------------------BOTÓN CONFIGURACIÓN---------------- -->
  <div class="w3-container">
    <div class="w3-dropdown-hover">
      <button class="w3-button fa fa-cog fst-italic"> Ajustes</button>
      <div class="w3-dropdown-content ">
        <a href="#" class="w3-bar-item w3-button">Perfil</a>
        <a href="#" class="w3-bar-item w3-button">Cambio de contraseña</a>
        <a href="#" class="w3-bar-item w3-button">Modo oscuro</a>
        <a href="#" class="w3-bar-item w3-button">Ayuda</a>
        <a href="/" class="w3-bar-item w3-button">Cerrar sesión</a>
      </div> 
    </div>
  </div>

</nav>

</header>

<!-- ------------------------------------------------------------------------------------------------------------------------- -->
<!-- --------------------------------------------------------NAVBAR #2-------------------------------------------------------- -->
<nav class="sticky body">

  <ul style="height: 100%; border-right: 4px solid black; background-color: #0088cc; ">

   <!-- -------------------LOGO FARMACIA----------------- -->
  <li>  
    <div class="container-fluid">
      <a style="margin-left:-19%;"  href="/Principal"><img src="https://thumbs.dreamstime.com/b/logotipo-o-emblema-m%C3%A9dico-de-la-farmacia-bot%C3%B3n-cristal-azul-con-c-100946974.jpg
" alt="logo de farmacia" style="width:120px;"></a>
   </div>
  </li>

   <!-- ------------------GRUPO DE BOTONES---------------- -->
    
    <li><a class="fst-italic text-white" href="/Empleados" class="w3-bar-item w3-button"><i class="fa fa-address-card-o">Empleados</i></a></li>
    <li><a class="fst-italic text-white" href="/Proveedores" class="w3-bar-item w3-button"><i class="fa fa-truck"> Proveedores</i></a></li>
    <li><a class="fst-italic text-white" href="#" class="w3-bar-item w3-button"><i class="fa fa-users"> Clientes</i></a></li>
    <li><a class="fst-italic text-white" href="#" class="w3-bar-item w3-button"><i class="fa fa-file-text-o"> Facturación</i></a></li>
    <li><a class="fst-italic text-white" href="#" class="w3-bar-item w3-button"><i class="fa fa-columns"> Inventario</i></a></li>

  </ul>
</nav>  



<main class="flex-shrink-0 body">
  <div class="container-fluid" style="margin-left:12%;">
    @yield('contenido')
  </div>
</main>

<!--  
<footer class="footer mt-auto py-3 bg-light" style="margin-left:12%;">
    <div class="container">
        <span class="text-muted">@yield('pie_pagina')</span>
    </div>
</footer>
-->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>
