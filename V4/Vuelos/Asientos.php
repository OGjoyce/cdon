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
  </head>
    <body class="asientos">
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
      <div class="container text-center avioncito">
    <?php
    session_start();
    //--- Recibir los datos de la vuelos.php
    $_SESSION['aerolinea'] = $_GET['aerolinea'];
    $_SESSION['numero'] = $_GET['numero'];
    $_SESSION['precio']=  $_GET['precio'];
    //--- Conexion con la base de datos
    $host="localhost";
    $user="agenciaadmin";
    $pass="123";
    $dbname="agencia";
    $cadenaConexion = "host=$host dbname=$dbname user=$user password=$pass";
    $conexion = pg_connect($cadenaConexion);
    $query = "select * from aerolineas where codigo= '" . $_SESSION['aerolinea'] ."'";
    $resultado = pg_query($conexion, $query);
    $row=pg_fetch_assoc($resultado);
    $_SESSION['ip'] = $row['ip'];
    $_SESSION['extension'] = $row['extension'];
    $_SESSION['formato'] = $row['formato'];
    $link = 'http://'. $_SESSION['ip']. '/script_lista_asientos' .$_SESSION['extension']. '?aerolinea=' .$_SESSION['aerolinea'].'&vuelo='.$_SESSION['numero'] .'&fecha='. $_SESSION['date']. '&formato='.$_SESSION['formato'];
    if ($_SESSION['formato']  == 'xml'){
      $load = simplexml_load_file($link);
    }
    else if ($_SESSION['formato']  == 'json'){
      $json= file_get_contents($link);
      $load = json_decode($json);
    }
    $arr = array();
    foreach($load->asiento as $asiento) {
      array_push($arr,$asiento->numero);
    }
    for ($cont = 1; $cont <= 80; $cont++){
      if (in_array($cont,$arr)){
        $disable = 'active';
      }
      else{
        $disable = 'disabled';
      }
      echo "<button type='button' class='btn btn-primary $disable' onclick = 'buttonFoo($cont)'>$cont</button>" . "\n";
      if (($cont%4) == 0){
        echo "</br>";
      }
    }
    ?>
  </div>
      <script>
      function buttonFoo(pos){
        window.location.href = "reservar_form.php?data=" + pos;
      }
      </script>
    </body>
  </html>
