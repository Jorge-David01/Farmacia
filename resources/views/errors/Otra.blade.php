<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
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

</head>

<style>
    html {
        line-height: 1.15;
        -ms-text-size-adjust: 100%;
        -webkit-text-size-adjust: 100%;
    }

    header,
    nav,
    section {
        display: block;
    }

    figcaption,
    main {
        display: block;
    }

    a {
        background-color: transparent;
        -webkit-text-decoration-skip: objects;
    }

    strong {
        font-weight: inherit;
    }

    strong {
        font-weight: bolder;
    }

    code {
        font-family: monospace, monospace;
        font-size: 1em;
    }

    dfn {
        font-style: italic;
    }

    svg:not(:root) {
        overflow: hidden;
    }

    button,
    input {
        font-family: sans-serif;
        font-size: 100%;
        line-height: 1.15;
        margin: 0;
    }

    button,
    input {
        overflow: visible;
    }

    button {
        text-transform: none;
    }

    button,
    html [type="button"],
    [type="reset"],
    [type="submit"] {
        -webkit-appearance: button;
    }

    button::-moz-focus-inner,
    [type="button"]::-moz-focus-inner,
    [type="reset"]::-moz-focus-inner,
    [type="submit"]::-moz-focus-inner {
        border-style: none;
        padding: 0;
    }

    button:-moz-focusring,
    [type="button"]:-moz-focusring,
    [type="reset"]:-moz-focusring,
    [type="submit"]:-moz-focusring {
        outline: 1px dotted ButtonText;
    }

    legend {
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        color: inherit;
        display: table;
        max-width: 100%;
        padding: 0;
        white-space: normal;
    }

    [type="checkbox"],
    [type="radio"] {
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        padding: 0;
    }

    [type="number"]::-webkit-inner-spin-button,
    [type="number"]::-webkit-outer-spin-button {
        height: auto;
    }

    [type="search"] {
        -webkit-appearance: textfield;
        outline-offset: -2px;
    }

    [type="search"]::-webkit-search-cancel-button,
    [type="search"]::-webkit-search-decoration {
        -webkit-appearance: none;
    }

    ::-webkit-file-upload-button {
        -webkit-appearance: button;
        font: inherit;
    }

    menu {
        display: block;
    }

    canvas {
        display: inline-block;
    }

    template {
        display: none;
    }

    [hidden] {
        display: none;
    }

    *,
    *::before,
    *::after {
        -webkit-box-sizing: inherit;
        box-sizing: inherit;
    }

    p {
        margin: 0;
    }

    button {
        background: transparent;
        padding: 0;
    }

    button:focus {
        outline: 1px dotted;
        outline: 5px auto -webkit-focus-ring-color;
    }

    *,
    *::before,
    *::after {
        border-width: 0;
        border-style: solid;
        border-color: #dae1e7;
    }

    button,
    [type="button"],
    [type="reset"],
    [type="submit"] {
        border-radius: 0;
    }

    button,
    input {
        font-family: inherit;
    }

    input::-webkit-input-placeholder {
        color: inherit;
        opacity: .5;
    }

    input:-ms-input-placeholder {
        color: inherit;
        opacity: .5;
    }

    input::-ms-input-placeholder {
        color: inherit;
        opacity: .5;
    }

    input::placeholder {
        color: inherit;
        opacity: .5;
    }

    button,
    [role=button] {
        cursor: pointer;
    }

    .bg-transparent {
        background-color: transparent;
    }

    .bg-white {
        background-color: #fff;
    }

    .bg-teal-light {
        background-color: #64d5ca;
    }

    .bg-blue-dark {
        background-color: #2779bd;
    }

    .bg-indigo-light {
        background-color: #7886d7;
    }

    .bg-purple-light {
        background-color: #a779e9;
    }

    .bg-no-repeat {
        background-repeat: no-repeat;
    }

    .bg-cover {
        background-size: cover;
    }

    .border-grey-light {
        border-color: #dae1e7;
    }

    .hover\:border-grey:hover {
        border-color: #b8c2cc;
    }

    .rounded-lg {
        border-radius: .5rem;
    }

    .border-2 {
        border-width: 2px;
    }

    .hidden {
        display: none;
    }

    .flex {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
    }

    .items-center {
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
    }

    .justify-center {
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
    }

    .font-sans {
        font-family: Nunito, sans-serif;
    }

    .font-light {
        font-weight: 300;
    }

    .font-bold {
        font-weight: 700;
    }

    .font-black {
        font-weight: 900;
    }

    .h-1 {
        height: .25rem;
    }

    .leading-normal {
        line-height: 1.5;
    }

    .m-8 {
        margin: 2rem;
    }

    .my-3 {
        margin-top: .75rem;
        margin-bottom: .75rem;
    }

    .mb-8 {
        margin-bottom: 2rem;
    }

    .max-w-sm {
        max-width: 30rem;
    }

    .min-h-screen {
        min-height: 100vh;
    }

    .py-3 {
        padding-top: .75rem;
        padding-bottom: .75rem;
    }

    .px-6 {
        padding-left: 1.5rem;
        padding-right: 1.5rem;
    }

    .text-black {
        color: #22292f;
    }

    .text-grey-darkest {
        color: #3d4852;
    }

    .text-grey-darker {
        color: #606f7b;
    }

    .text-2xl {
        font-size: 1.5rem;
    }

    .text-5xl {
        font-size: 3rem;
    }

    .uppercase {
        text-transform: uppercase;
    }

    .antialiased {
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    .tracking-wide {
        letter-spacing: .05em;
    }

    .w-16 {
        width: 4rem;
    }

    .w-full {
        width: 100%;
        height: 100%;
    }

    @media (min-width: 768px) {
        .md\:bg-left {
            background-position: left;
        }

        .md\:bg-right {
            background-position: right;
        }

        .md\:flex {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
        }

        .md\:my-6 {
            margin-top: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .md\:min-h-screen {
            min-height: 100vh;
        }

        .md\:pb-0 {
            padding-bottom: 0;
        }

        .md\:text-3xl {
            font-size: 1.875rem;
        }

        .md\:text-15xl {
            font-size: 9rem;
        }

        .md\:w-1\/2 {
            width: 50%;
        }
    }
</style>

<body class=" bg-theme bg-theme1">
    <div class="content-wrapper">
        <div class="container-fluid">
            <div style="text-align: center">
        
            <h1 style="margin-bottom: 2%;"></h1>
                <div>
                    <div>

                        <div>
                            <div class="text-black text-5xl md:text-15xl font-black">
                                @yield('code', __('Mensaje'))
                            </div>

                            <p class="text-white text-2xl md:text-3xl font-light mb-8 leading-normal">
                                @yield('message')
                            </p>

                            <a href="/Principal">
                                <button class=" btn btn-success text-white font-bold uppercase tracking-wide py-3 px-6 border-2 border-white hover:border-black rounded-lg">
                                    {{ __('Pagina principal') }}
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>










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

                <!-- @can('usuario_listado', 'empleado_nuevo','empleado_detalles','empleado_actualizar') -->
                <!-- @endcan -->

        <li>
            <a href="empleados/index">
              <i class="fa fa-users"></i> <span>Empleados</span>
            </a>
          </li>
    

       
        <li>
          <a href="/Listempleado">
            <i class="fa fa-truck"></i> <span>Empleados</span>
          </a>
        </li>
       
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
                    <a href="/devolucion">
                        <i class="fa fa-cart-plus"></i> <span>Devolucion de Producto</span>
                    </a>
                </li>
               <li>
                    <a href="/inventarioVista">
                        <i class="fa fa-columns"></i> <span>Inventario</span>
                    </a>
                </li>
                 <li>
                    <a href="/CajaAlivio">
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


        <!-- ------------------------------------------------------------------------------------------------------------------------------ -->
        <!-- ---------------------------------------------------- PERFIL Y CONFIGURACIÓN -------------------------------------------------- -->

        <ul class="navbar-nav align-items-center right-nav-link">
          <li class="nav-item">

            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
              <span class="user-profile"><img src="/assets/images/li.jpg" class="img-circle" alt="user avatar"></span>
            </a>


            <ul class="dropdown-menu dropdown-menu-right">

              <li class="dropdown-item user-details">
                <a href="javaScript:void();">
                  <div class="media">
                    <div class="avatar"><img class="align-self-start mr-3" src="/assets/images/LogoDos.png" alt="user avatar"></div>
                    <div class="media-body">

                     
                    </div>
                  </div>
                </a>
              </li>

              <li class="dropdown-divider"></li>
              <li class="dropdown-item"> <a   class="icon-settings"> Cambio de contraseña</a></li>

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
    <ul class="dropdown-menu dropdown-menu-right"></ul>




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
    </div>
    </main>
     -->



        <!-- Bootstrap core JavaScript-->
        <script src="/assets/js/jquery.min.js"></script>
        <script src="/assets/js/popper.min.js"></script>
        <script src="/assets/js/bootstrap.min.js"></script>

        <!-- simplebar js -->
        <script src="/assets/plugins/simplebar/js/simplebar.js"></script>
        <!-- sidebar-menu js -->
        <script src="/assets/js/sidebar-menu.js"></script>

        <!-- Custom scripts -->
        <script src="/assets/js/app-script.js"></script>

        <!-- Full Calendar -->
        <script src='/assets/plugins/fullcalendar/js/moment.min.js'></script>
        <script src='/assets/plugins/fullcalendar/js/fullcalendar.min.js'></script>
        <script src="/assets/plugins/fullcalendar/js/fullcalendar-custom-script.js"></script>
        <!-- Full Calendar 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  Full Calendar -->
        <script>
        </script>

</body>

</html>