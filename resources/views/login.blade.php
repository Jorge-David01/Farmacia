<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    


<style> 
 .still{
    border: 3px solid #0000ff;
    border-radius: 5px; 
  }

 .centrar{
    text-align: center;
 }

</style>

</head>


<body style="background: #e6e6e6" >


<div style="width: 25%; height: 230px; margin: auto; margin-top: 15%; background: white"  class="still  " > 
<h1 class="centrar">Inicio de sesión</h1>

<form style="text-align: center"  >



<input style="margin: auto" class="centrar"  type="text" id="uses" name="Usuario" placeholder="Ingrese su usuario">
<br> <br>



<input style="margin: auto" class="centrar" type="password" id="pass" name="Contraseña" placeholder="Ingrese su contraseña">
<br> <br>
<botton  class="btn btn-primary btn-lg"  type="submit" onclick="entrar()" >Ingresar</botton>
</form>


</div>

<h4 class="centrar" style="margin-top: 16%" >&#169copyright [R]</h4>

<script>

function entrar(){
var usuar = document.getElementById("uses").value;
var contra =  document.getElementById("pass").value;

var usuario1 = "admin";
var contra1 = "admin";

if(usuar == usuario1 && contra == contra1){
  window.location.href="/Principal";
}

}

</script>
</body>

</html>