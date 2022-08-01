@extends('plantilla.principalpag')
@section('pestania', 'Pagina principal')
@section('contenido')

<style>
body {
  background-image: url('https://4512ab7139.cbaul-cdnwnd.com/b0bdd800a45fb0ebba48fdac08e4ca00/200000045-005d701534/fondo-abstracto-azul-salud_66029-25-1.jpg?ph=4512ab7139');
  background-repeat: no-repeat;
  background-attachment: fixed; 
  background-size: 100% 100%;
}

.HoraCentro {
  padding-top: 170px;
  padding-left: 30%;
}

.FechaCentro {
  padding-top: 70px;
  padding-left: 30%;
}

</style>





<div style="display: block; width: 100%;  overflow-x: auto;">

<h1 style="font-size: 60px; color: black; text-shadow: 2px 2px 2px #4db8ff, 0 0 5px #4db8ff;" class="fst-italic; HoraCentro" id="hora"></h1>

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

  <h1 style="font-size: 60px; color: black; text-shadow: 2px 2px 2px #4db8ff, 0 0 5px #4db8ff;" class="fst-italic; FechaCentro">
    <?php 
     date_default_timezone_set("America/El_Salvador");
     echo "Fecha: " . date("d/m/y");
    ?>
  </h1>

  </div>

  
@endsection
