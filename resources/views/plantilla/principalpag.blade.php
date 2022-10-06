<!doctype html>
<html lang="es">

<!-- ---------------------------------------------LINK DE  BOOTSTRAP--------------------------------------- -->

<head>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js " crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>

  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

  <!-- loader-->
  <link href="/assets/css/pace.min.css" rel="stylesheet" />
  <script src="/assets/js/pace.min.js"></script>
  <!--favicon-->
  <link rel="icon" href="/assets/images/favicon.ico" type="image/x-icon">
  <!--Full Calendar Css-->
  <link href="/assets/plugins/fullcalendar/css/fullcalendar.min.css" rel='stylesheet' />
  <!-- simplebar CSS-->
  <link href="/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
  <!-- Bootstrap core CSS-->
  <link href="/assets/css/bootstrap.min.css" rel="stylesheet" />
  <!-- animate CSS-->
  <link href="/assets/css/animate.css" rel="stylesheet" type="text/css" />
  <!-- Icons CSS-->
  <link href="/assets/css/icons.css" rel="stylesheet" type="text/css" />
  <!-- Sidebar CSS-->
  <link href="/assets/css/sidebar-menu.css" rel="stylesheet" />
  <!-- Custom Style-->
  <link href="/assets/css/app-style.css" rel="stylesheet" />

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <link href="{{ asset('css/select-multiple.css') }}" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>



  <title>Farmacia - @yield('pestania')</title>

</head>

<body class="bg-theme bg-theme1" ; onload="startTime()">


  <!-- Catgador de arranque -->
  <div id="pageloader-overlay" class="visible incoming">
    <div class="loader-wrapper-outer">
      <div class="loader-wrapper-inner">
        <div class="loader"></div>
      </div>
    </div>
  </div>

  <!-- ------------------------------------------------------------------------------------------------------------------------------ -->
  <!-- ----------------------------------------------------------NAVEGADOR #1-------------------------------------------------------- -->
  <div id="wrapper">

    <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
      <div class="brand-logo">
        <a href="/Principal">
          <img src="/assets/images/Logo.jpeg" class="logo-icon" alt="logo icon">
        </a>
      </div>

      <ul class="sidebar-menu do-nicescrol">
        <li>
          <a href="/Lista">
            <i class="fa fa-address-card-o"></i> <span>Empleados</span>
          </a>
        </li>

        <!-- <a href="/registro">
          <i class="fa fa-address-card-o"></i> <span>Registrar</span>
          </a>
      </li> -->

        <li>
          <a href="/Listpro">
            <i class="fa fa-truck"></i> <span>Proveedores</span>
          </a>
        </li>

        <li>
          <a href="/Producto">
            <i class="fa fa-medkit"></i> <span>Producto</span>
          </a>
        </li>

        <li>
          <a href="/listacompra">
            <i class="fa fa-cart-plus"></i> <span>Compras</span>
          </a>
        </li>

        <li>
          <a href="/Cliente">
            <i class="fa fa-users"></i> <span>Clientes</span>
          </a>
        </li>

        <li>
          <a href="/listaventa">
            <i class="fa fa-file-text-o"></i> <span>Facturación</span>
          </a>
        </li>

        <li>
          <a href="/inventarioVista">
            <i class="fa fa-columns"></i> <span>Inventario</span>
          </a>
        </li>

        <li>
          <a href="#">
            <i class="zmdi zmdi-face"></i> <span>Caja de alivio</span>
          </a>
        </li>


        <li>
          <a href="/kardex">
            <i class="zmdi zmdi-lock"></i> <span>Cardex</span>
          </a>
        </li>

        <li>
          <a href="/cotizacion/nuevo">
            <i class="fa fa-file-text-o"></i> <span>Cotizacion</span>
          </a>
        </li>

        <li>
          <a href="/permissions">
            <i class="fa fa-address-card-o"></i> <span>Permisos</span>
          </a>
        </li>

        <li>
          <a href="/roles">
            <i class="fa fa-file-text-o"></i> <span>Roles</span>
          </a>
        </li>
      </ul>
    </div>



    <!-- ------------------------------------------------------------------------------------------------------------------------------ -->
    <!-- ----------------------------------------------------------NAVEGADOR #2-------------------------------------------------------- -->
    <header class="topbar-nav">
      <nav class="navbar navbar-expand fixed-top">

        <ul class="navbar-nav mr-auto align-items-center">
          <li class="nav-item">
            <a class="nav-link toggle-menu" href="javascript:void();">
              <i class="icon-menu menu-icon"></i>
            </a>
          </li>
        </ul>




        <ul class="navbar-nav align-items-center right-nav-link">
          <!-- ------------------------------------------------------------------------------------------------------------------------------ -->
          <!-- ---------------------------------------------------- PERFIL Y CONFIGURACIÓN -------------------------------------------------- -->
          <li class="nav-item">

            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
              <span class="user-profile"><img src="/assets/images/Logoim.png" class="img-circle" alt="user avatar"></span>
            </a>


            <ul class="dropdown-menu dropdown-menu-right">

              <li class="dropdown-item user-details">
                <a href="javaScript:void();">
                  <div class="media">
                    <div class="avatar"><img class="align-self-start mr-3" src="/assets/images/Logo.jpeg" alt="user avatar"></div>
                    <div class="media-body">

                      <h6 class="mt-2 user-title">{{ Auth::user()->name }}</h6>
                      <p class="user-subtitle">Administrador</p>

                    </div>
                  </div>
                </a>
              </li>

              <li class="dropdown-divider"></li>
              <li class="dropdown-item"> <a href="#" class="icon-settings"> Cambio de contraseña</a></li>

              <li class="dropdown-divider"></li>
              <li class="dropdown-item"><a href="/Ayuda" class="icon-envelope"> Ayuda</a> </li>

              <li class="dropdown-divider"></li>
              <li class="dropdown-item"><a href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();" class="icon-power"> Cerrar sesión</a> </li>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>

            </ul>

          </li>

        </ul>

      </nav>
    </header>
    <ul class="dropdown-menu dropdown-menu-right">
    </ul>
    </li>
    </ul>


    <!-- CON LA NUEVA PLANTILLA -->

    <main>
      <div>
        @yield('contenido')
      </div>
    </main>



    <!-- CON LA VIEJA PLANTILLA -->
    <!-- 
<main>
  <div style="margin-left:16%;">
    @yield('contenido')
  </div>
</main>
-->



    <!-- Bootstrap core JavaScript-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- simplebar js -->
    <script src="assets/plugins/simplebar/js/simplebar.js"></script>
    <!-- sidebar-menu js -->
    <script src="assets/js/sidebar-menu.js"></script>

    <!-- Custom scripts -->
    <script src="assets/js/app-script.js"></script>

    <!-- Full Calendar -->
    <script src='assets/plugins/fullcalendar/js/moment.min.js'></script>
    <script src='assets/plugins/fullcalendar/js/fullcalendar.min.js'></script>
    <script src="assets/plugins/fullcalendar/js/fullcalendar-custom-script.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <script>


    </script>

</body>

</html>