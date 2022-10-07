@extends('plantilla.principalpag')
@section('pestania', 'Pagina principal')
@section('contenido')


<style>

h1 {
  font-family: 'Rig Bold Face', sans-serif;
	text-transform: uppercase;
	font-size: 18vw;
	text-align: center;
	font-weight: normal;
	margin: 0;
  
	left: 50%;
	font-size: 60px;
	transform: translate(-50%, -50%);
	position: absolute;
	color: #91d4ff;
}



h1:before, h1:after,
h1 span:before,
h1 span:after {
  content: attr(data-heading);
  position: absolute;
  overflow: hidden;
  left: 0;
  top: 0;
  width: 100%;
  z-index: 5;
  font-weight: normal;
  text-shadow: none;
}
h1:before {
  color: #fff;
  font-family: "Rig Bold Inline", sans-serif;
}
h1:after {
  font-family: "Rig Bold Coarse", sans-serif;
  color: #040351;
}

span::before {
  font-family: "Rig Bold Shadow", sans-serif;
  color: #cbc7e3;
  z-index: -1;
}
span::after {
  font-family: "Rig Bold Extrude", sans-serif;
  color: #4d8bea;
  z-index: -1;
}

@font-face {
  font-family: "Rig Bold Coarse";
  src: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/209981/Rig-BoldCoarse.otf");
}
@font-face {
  font-family: "Rig Bold Extrude";
  src: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/209981/Rig-BoldExtrude.otf");
}
@font-face {
  font-family: "Rig Bold Shadow";
  src: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/209981/Rig-BoldShadow.otf");
}
@font-face {
  font-family: "Rig Bold Face";
  src: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/209981/Rig-BoldFace.otf");
}
@font-face {
  font-family: "Rig Bold Inline";
  src: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/209981/Rig-BoldInline.otf");
}


.HoraCentro {
  padding-top: 10%;
  text-align: center;
}
.FechaCentro {
  padding-top: 5%;
  text-align: center;
}

</style>


<div class="content-wrapper">
    <div class="container-fluid">

   <div class="row mt-3">
    <div class="col-lg-12">

<div class="card">
<div class="card-body">

<div style="padding-top: 10%;">
<h1  data-heading="Farmacia la popular">
		<span>Farmacia la popular</span>
</h1>
</div>

<div >

<h2 style="font-size: 60px; color: black; text-shadow: 2px 2px 2px #4db8ff, 0 0 5px #4db8ff;" class="fst-italic; HoraCentro" id="hora"></h2>

  <script >

    function startTime() {
      const Momento = new Date();

      let hora = Momento.getHours();
      let min = Momento.getMinutes();
      let seg = Momento.getSeconds();

      min = checkTime(min);
      seg = checkTime(seg);
        
      document.getElementById('hora').innerHTML = "Hora: " + hora + ":" + min + ":" + seg ;
      setTimeout(startTime, 1000);
    }

    function checkTime(i) {
      if (i < 10) {i = "0" + i}; 
      return i;
    }

  </script>

  <h2 style="font-size: 60px; color: black; text-shadow: 2px 2px 2px #4db8ff, 0 0 5px #4db8ff;"  class="fst-italic; FechaCentro">
    <?php 
     date_default_timezone_set("America/El_Salvador");
     echo "Fecha: " . date("d/m/y");
    ?>
  </h2>

  

  </div>
  </div>
  </div>
  
  </div>

  </div>
  </div>
  </div>
  </div>
  
  <footer class="footer">
      <div class="container">
        <div class="text-center">
        Copyright © 2022. FARMACIA LA POPULAR.
        </div>
      </div>
  </footer>

@section('pie_pagina', 'Copyright © 2022. FARMACIA LA POPULAR.')
@endsection
