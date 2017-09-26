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
    $aerolinea = $_GET['aerolinea'];
    $numero_boleto = $_GET['numero'];
    $_SESSION['numero'] = $numero_boleto;
      $_SESSION['precio']=  $_GET['precio'];
    $_SESSION['aerolinea'] = $aerolinea;

    $host="localhost";
    $user="agenciaadmin";
    $pass="123";
    $dbname="agencia";

    $cadenaConexion = "host=$host dbname=$dbname user=$user password=$pass";
    $conexion = pg_connect($cadenaConexion);
    $query = "select * from aerolineas where codigo= '" . $_SESSION['aerolinea'] ."'";
    $resultado = pg_query($conexion, $query);
    $all_urls = array();
    $row=pg_fetch_assoc($resultado);
    $_SESSION['ip'] = $row['ip'];
    $_SESSION['extension'] = $row['extension']
    $link = 'http://'.   $_SESSION['ip']. '/script_lista_vuelos' .$_SESSION['extension']. '?aerolinea=' .$_SESSION['aerolinea'].'&vuelo='.$_SESSION['numero'] .'&fecha='. $_SESSION['date'];

    $xml = simplexml_load_file($link);
    $arr = array();
    foreach($xml->asiento as $asiento) {
      $arr[]= $asiento->numero;
    }
    $disable = 'active';
    $j = 0;
    for ($cont = 1; $cont <=80; $cont++){
      foreach($arr as $a) {
        if ($cont == $a){
          $disable = 'disabled';
        }
      }
      if ($j == 0){
        echo "<button type='button' class='btn btn-primary ". $disable . "' onclick = 'buttonFoo(" . $cont . ")'>A</button>" . "\n";
        $j++;
      }
      elseif ($j == 1) {
        echo "<button type='button' class='btn btn-primary ". $disable . "' onclick = 'buttonFoo(" . $cont . ")'>B</button>" . "\n";
        $j++;
      }
      elseif ($j == 2) {
        echo "<button type='button' class='btn btn-primary ". $disable . "' onclick = 'buttonFoo(" . $cont . ")'>C</button>" . "\n";
        $j++;
      }
      elseif ($j == 3) {
        echo "<button type='button' class='btn btn-primary ". $disable . "' onclick = 'buttonFoo(" . $cont . ")'>D</button></br>" . "\n";
        $j = 0;
      }
      $disable = 'active';
    }

    ?>
  </div>
</div>
</div>

    <script>

    function buttonFoo(pos){

      window.location.href = "reservar_form.php?data=" + pos;
    }

    </script>

  </body>
</html>
