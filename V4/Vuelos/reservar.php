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

  <div class="container">

  </div>
<?php
session_start();
$usr= $_POST['Username'];
$email = $_POST['Email'];
$password = $_POST['password'];
$_SESSION['nombre_de_usuario'] = $usr;


$link = 'http://'.$_SESSION['ip']. '/script_reserva' .$_SESSION['extension']. '?aerolinea=' .$_SESSION['aerolinea'] . '&vuelo=' . $_SESSION['numero'] . '&fecha='. $_SESSION['date'] . '&asiento='. $_SESSION['data'].'&nombre=' .$_SESSION['nombre_de_usuario']. '&formato='. $_SESSION['formato'];
echo $link;
if ($_SESSION['formato']  == 'xml'){
  $load = simplexml_load_file($link);
}
else if ($_SESSION['formato']  == 'json'){
  $json= file_get_contents($link);
  $load = json_decode($json);
}
$_SESSION['ticket'] = $load->numero;
//--- si el asiento fue ocupado en el transcurso de la compra
$asiento = $load->numero;
if ($asiento == -1){
  echo "<div class='alert alert-danger'>
<strong>ERROR</strong> El asiento no esta disponible,<form action='Asientos.php' method='get'> <button type='button' class='btn btn-default btn-sm' name='aerolinea' value=".$_SESSION['aerolinea']." onclick='foofi(\"".$_SESSION['aerolinea']."\",\"".$_SESSION['numero']."\")'>
REGRESAR
</button></form>
</div>";
}
else {
//conexion a la base de datos
  $host="localhost";
  $user="agenciaadmin";
  $pass="123";
  $dbname="agencia";
  $cadenaConexion = "host=$host dbname=$dbname user=$user password=$pass";
  $conexion = pg_connect($cadenaConexion);
//--- revisar si el usario existe
  $query = "SELECT id_usuario FROM usuarios where username = '$usr'";
  $resultado = pg_query($conexion, $query);
  $row=pg_fetch_assoc($resulado);
  if ($row['id_usuario'] == ""){
    echo "ingreso a no hay usuario";
    $query = "INSERT INTO usuarios (id_usuario, username, correo, password) VALUES (DEFAULT, '$usr', '$email', md5('$password'))";
    pg_query($conexion, $query);
    $query = "SELECT id_usuario FROM usuarios where username = '$usr'";
    $resultado = pg_query($conexion, $query);
    $row = pg_fetch_assoc($resultado);
    $idu = $row['id_usuario']; //numero de usuario generado
    // 1 = NO HOTEL
    $query = "Insert into paquetes values (DEFAULT, 'VUELO', 'Viaje de ". $_SESSION['from'] ." hacia ". $_SESSION['to'] ." con fecha ".$_SESSION['date']." con numero de ticket "  .  $_SESSION['ticket']   .".', '1', '".$_SESSION['aerolinea']."', '0', '".$_SESSION['precio']."')  ";
    pg_query($conexion, $query);
    $query = "Select max(id_paquete) from paquetes";
    $resultado =pg_query($conexion, $query);
    $row=pg_fetch_assoc($resultado);
    $idp = $row['max'];
    $query = "Insert into reservaciones values ('$idu','$idp',DEFAULT)";
    pg_query($conexion, $query);
    echo "<div class='alert alert-info'>
          Usted ha reservado su boleto con exito.
          </div>";
    echo "<div class='alert alert-success'>
  <strong>Enhorabuena!</strong> Para ver el estado de su vuelo,<button href='../Login/login.html' class='btn btn-primary'>Ingrese</button>
  </div>";
  echo "<div class='alert alert-info'>
  <strong>Su documento imprimible</strong> esta listo,<form method='get' action='imprimible.php'><button class ='btn btn-primary' name='impri' value='".$_SESSION['nombre_de_usuario']."'>continuar</button></form>
  </div>";
  }
  else{
    echo "ingreso a hay usuario";
    $query = "SELECT id_usuario FROM usuarios where username = '$usr' AND correo = '$email' AND password=md5('$password')";
    $resultado = pg_query($conexion, $query);
    $row=pg_fetch_assoc($resulado);
    if ($row['id_usuario'] == ""){
      echo "ingreso a hay usuario y contraseña invalida";
      echo "<div class='alert alert-danger'>
      <strong>ERROR</strong> Este usuario ya existe,<form action='reservar_form.php' method='get'> <button type='button' class='btn btn-default btn-sm' name='aerolinea' onclick='buttonFoo(\"".$_SESSION['data']."\")'>
      REGRESAR
      </button></form>
      </div>";
    }
    else{
      $query = "Insert into paquetes values (DEFAULT, 'VUELO', 'Viaje de ". $_SESSION['from'] ." hacia ". $_SESSION['to'] ." con fecha ".$_SESSION['date']." con numero de ticket "  .  $_SESSION['ticket']   .".', '1', '".$_SESSION['aerolinea']."', '0', '".$_SESSION['precio']."')  ";
      pg_query($conexion, $query);
      $query = "Select max(id_paquete) from paquetes";
      $resultado =pg_query($conexion, $query);
      $row=pg_fetch_assoc($resultado);
      $idp = $row['max'];
      $query = "SELECT id_usuario FROM usuarios where username = '$usr'";
      $resultado = pg_query($conexion, $query);
      $row = pg_fetch_assoc($resultado);
      $idu = $row['id_usuario'];
      $query = "Insert into reservaciones values ('$idu','$idp',DEFAULT)";
      pg_query($conexion, $query);
      echo "<div class='alert alert-info'>
            Usted ha reservado su boleto con exito.
            </div>";
      echo "<div class='alert alert-success'>
    <strong>Enhorabuena!</strong> Para ver el estado de su vuelo,<button href='../Login/login.html' class='btn btn-primary'>Ingrese</button>
    </div>";
    echo "<div class='alert alert-info'>
    <strong>Su documento imprimible</strong> esta listo,<form method='get' action='imprimible.php'><button class ='btn btn-primary' name='impri' value='".$_SESSION['nombre_de_usuario']."'>continuar</button></form>
    </div>";
    }
  }
}

  ?>



  <script>
  function foofi(a, b){
    window.location.href = "Asientos.php?aerolinea=" + a + "&numero="+b;
  }
  </script>


  <script>

  function buttonFoo(pos){

    window.location.href = "reservar_form.php?data=" + pos;
  }

  </script>
  </body>
  </html>
