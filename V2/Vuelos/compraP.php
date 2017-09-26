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

$conexion = pg_connect($cadenaConexion) or die("Error en la Conexión: ".pg_last_error());

$query = "INSERT INTO usuarios (id_usuario, username, correo, password) VALUES (DEFAULT, '$usr', '$email', md5('$password'))";
$resultado = pg_query($conexion, $query);
if ($resultado){

  $q1 = "Select id_usuario from usuarios where username = '". $usr."'" ;
  $pp =pg_query($conexion, $q1);
  $row=pg_fetch_assoc($pp);
  $idpp = $row['id_usuario'];
  $idpp1= $_SESSION['paquete'];
  $q2 = "Insert into reservaciones values ('$idpp','$idpp1',DEFAULT)";
  pg_query($conexion, $q2);


  echo "<div class='alert alert-info'>
        Usted ha reservado su paquete con exito.
        </div>";
  echo "<div class='alert alert-success'>
<strong>Enhorabuena!</strong> Para ver el estado de su vuelo,<a href='../Login/login.html' class='alert-link'>Ingrese</a>
</div>";
}
else{
  echo "<div class='alert alert-danger'>
  <strong>ERROR</strong> Este usuario ya existe,<form action='paquete-form.php' method='post'> <button type='button' class='btn btn-default btn-sm' name='paquete' onclick='buttonFoo(\"".$_SESSION['paquete']."\")'>
  REGRESAR
  </button></form>
  </div>";
}


?>









<script>

function buttonFoo(pos){

  window.location.href = "compraP.php?paquete=" + pos;
}

</script>




  </body>
  </html>
