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
 // $data = $_GET['data'];
 //$_SESSION['data']= $data;
$usr = $_GET['Username'];
$email = $_GET['Email'];
$password = $_GET['password'];
$_SESSION['nombre_de_usuario'] = $usr;

$url = 'http://imart-gt.com/script_reserva/?aerolinea='.$_SESSION['aerolinea'].'&vuelo='.$_SESSION['numero'].'&fecha='.$_SESSION['date'] . '&asiento='. $_SESSION['data'].'&nombre=' .$_SESSION['nombre_de_usuario'];
$xml=simplexml_load_file($url) or die("Error: no se conecto a la Aerolinea");
$asiento = $xml->numero;
// echo $url. "\n";
// echo $_SESSION['aerolinea'] . "\n";
// echo $_SESSION['numero']. "\n";
// echo $_SESSION['date']. "\n";
// echo $_SESSION['data']. "\n";
// echo $_SESSION['nombre_de_usuario']. "\n";
// echo $asiento. "\n";
if ($asiento == -1){
  echo "<div class='alert alert-danger'>
<strong>ERROR</strong> El asiento no estaba disponible,<form action='Asientos.php' method='get'> <button type='button' class='btn btn-default btn-sm' name='aerolinea' value=".$_SESSION['aerolinea']." onclick='foofi(\"".$_SESSION['aerolinea']."\",\"".$_SESSION['numero']."\")'>
REGRESAR
</button></form>
</div>";
}
else {
  //echo $_SESSION['data'];
  $host="localhost";
  $user="agenciaadmin";
  $pass="123";
  $dbname="agencia";

  $cadenaConexion = "host=$host dbname=$dbname user=$user password=$pass";

  $conexion = pg_connect($cadenaConexion) or die("Error en la Conexión: ".pg_last_error());
  $query = "INSERT INTO usuarios (id_usuario, username, correo, password) VALUES (DEFAULT, '$usr', '$email', md5('$password'))";
  $resultado = pg_query($conexion, $query);
  if ($resultado){
    echo "<div class='alert alert-info'>
          Usted ha reservado su boleto con exito.
          </div>";
    echo "<div class='alert alert-success'>
  <strong>Enhorabuena!</strong> Para ver el estado de su vuelo,<a href='../Login/login.html' class='alert-link'>Ingrese</a>
  </div>";
  echo "<div class='alert alert-info'>
  <strong>Su documento imprimible</strong> esta listo,<a href='imprimible.php' class='alert-link'>continuar</a>
  </div>";
  }
  else{
    echo "<div class='alert alert-danger'>
    <strong>ERROR</strong> Este usuario ya existe,<form action='reservar_form.php' method='get'> <button type='button' class='btn btn-default btn-sm' name='aerolinea' onclick='buttonFoo(\"".$_SESSION['data']."\")'>
    REGRESAR
    </button></form>
    </div>";
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
