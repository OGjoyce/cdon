<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CDON</title>
      <!-- <link rel="icon" href="misc/img/icono.png"> -->
      <link rel="stylesheet" href="../misc/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="../misc/bootstrap/css/font-awesome.min.css">
      <link rel="stylesheet" href="../misc/bootstrap/css/main.css">
      <script src="../misc/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="../misc/bootstrap/js/bootstrap.min.js"></script>

    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="../index.html">CDON TRAVEL</a>
        </div>
        <ul class="nav navbar-nav">
          <li><a href="../index.html">Home</a></li>
          <li><a href="paquetes.html">Paquetes</a></li>
          <li><a href="contact.html">Contact</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="../Login/login.html"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>
      </div>
    </nav>
      </head>
  <body>
<?php
session_start();
$usr = $_POST['Username'];
$email = $_POST['Email'];
$password = $_POST['password'];
$host="localhost";
$user="agenciaadmin";
$pass="123";
$dbname="agencia";

$cadenaConexion = "host=$host dbname=$dbname user=$user password=$pass";

$conexion = pg_connect($cadenaConexion);
$query = "SELECT id_usuario FROM usuarios where username = '$usr'";
$resultado = pg_query($conexion, $query);
$row=pg_fetch_assoc($resulado);
if ($row['id_usuario'] == ""){
  $query = "INSERT INTO usuarios (id_usuario, username, correo, password) VALUES (DEFAULT, '$usr', '$email', md5('$password'))";
  pg_query($conexion, $query);
  $query = "SELECT id_usuario FROM usuarios where username = '$usr'";
  $resultado = pg_query($conexion, $query);
  $row = pg_fetch_assoc($resultado);
  $idu = $row['id_usuario']; //numero de usuario generado
  $idp = $_SESSION['paquete'];
  $query = "Insert into reservaciones values ('$idu','$idp',DEFAULT)";
  pg_query($conexion, $query);
  echo "<div class='alert alert-info'>
        Usted ha reservado su paquete con exito.
        </div>";
  echo "<div class='alert alert-success'>
<strong>Enhorabuena!</strong> Para ver el estado de su vuelo,<a href='../Login/login.html' class='alert-link'>Ingrese</a>
</div>";
}
else{
  $query = "SELECT id_usuario FROM usuarios where username = '$usr' AND correo = '$email' AND password=md5('$password')";
  $resultado = pg_query($conexion, $query);
  $row=pg_fetch_assoc($resulado);
  if ($row['id_usuario'] == ""){
    echo "<div class='alert alert-danger'>
    <strong>ERROR</strong> Este usuario ya existe revise su correo y contraseña<form action='paquete-form.php' method='post'> <button type='button' class='btn btn-default btn-sm' name='paquete' onclick='buttonFoo(\"".$_SESSION['paquete']."\")'>
    REGRESAR
    </button></form>
    </div>";
  }
  else{
    $idp =$_SESSION['paquete'];
    $query = "SELECT id_usuario FROM usuarios where username = '$usr'";
    $resultado = pg_query($conexion, $query);
    $row = pg_fetch_assoc($resultado);
    $idu = $row['id_usuario'];
    $query = "Insert into reservaciones values ('$idu','$idp',DEFAULT)";
    pg_query($conexion, $query);
    echo "<div class='alert alert-info'>
          Usted ha reservado su paquete con exito.
          </div>";
    echo "<div class='alert alert-success'>
  <strong>Enhorabuena!</strong> Para ver el estado de su vuelo,<a href='../Login/login.html' class='alert-link'>Ingrese</a>
  </div>";
  }
}



?>









<script>

function buttonFoo(pos){

  window.location.href = "compraP.php?paquete=" + pos;
}

</script>




  </body>
  </html>
