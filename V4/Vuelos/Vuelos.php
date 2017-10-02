<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../misc/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../misc/bootstrap/css/font-awesome.min.css">
    <link rel="stylesheet" href="../misc/bootstrap/css/main.css">
    <script src="../misc/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../misc/bootstrap/js/bootstrap.min.js"></script>

    <nav class="navbar navbar-inverse">
    <div class="container-fluid">
    <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="../index.html">CDON TRAVEL</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav">
      <li><a href="../index.html">Home</a></li>
      <li><a href="paquetes.html">Paquetes</a></li>
      <li><a href="contact.html">Contact</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="../Login/login.html"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
    </div>
    </div>
    </nav>

    </head>

    <body class="vuelos">
    <h3>Vuelos Disponibles</h3>
    <?php
    session_start();
    //-----Get del formulario
    $_SESSION['from'] = $_GET['origen'];
    $_SESSION['to'] = $_GET['destino'];
    $_SESSION['date'] = str_replace("-", "", $_GET['fecha']);
    //----- Conexión a la base de datos
    $host="localhost";
    $user="agenciaadmin";
    $pass="123";
    $dbname="agencia";
    $cadenaConexion = "host=$host dbname=$dbname user=$user password=$pass";
    $conexion = pg_connect($cadenaConexion);
    $query = "select * from aerolineas";  //-- Query para recibir todas las aerolineas
    $resultado = pg_query($conexion, $query); //-- Ejecucion del query
    //---------Creando una tabla
    echo "<br>";
    echo "<table class='table table-striped'>
    <tr bgcolor='red'>
    <th>Numero</th>
    <th>Aerolinea</th>
    <th>Fecha</th>
    <th>Hora</th>
    <th>Origen</th>
    <th>Destino</th>
    <th>Precio</th>
    <th>Comprar</th></tr>";
    //-- Revisando por todos los links
    while ($row=pg_fetch_assoc($resultado)){
      $link = 'http://'. $row['ip']. '/script_lista_vuelos' .$row['extension']. '?origen=' .$_SESSION['from'].'&destino='.$_SESSION['to'] .'&fecha='. $_SESSION['date'].'&formato='.$row['formato'];
      echo $link;
      // revisar el formato
      if ($row['formato'] == 'xml'){
        $load = simplexml_load_file($link);
      }
      else if ($row['formato'] == 'json'){
        $json= file_get_contents($link);
        $load = json_decode($json);
      }

      //----load cada columna
      foreach($load->vuelo as $vuelo) {
        $x = $load->aerolinea; // la aerolinea
        //cargando logotipo
        if($x == "GAL"){
          $x = "GuateAirlines.jpg";
        }
        elseif($x =="LMA"){
          $x = "LamdaAirlines.png";
        }
        elseif($x == "IDC"){
          $x = "IndresAirlines.png";

        }
        elseif($x == "DBA"){
          $x = "DBairlines.png";
        }
        //generacion de la tablas
        echo "<tr><td>".$vuelo->numero."</td>";
        echo "<td><img src='../misc/img/$x' class='img-rounded' alt='Cinque Terre' width='50' height='50'></td>";
        echo "<td>".$vuelo->fecha."</td>";
        echo "<td>".$vuelo->hora."</td>";
        echo "<td>".$vuelo->origen."</td>";
        echo "<td>".$vuelo->destino."</td>";
        echo "<td>".$vuelo->precio."</td>";
        echo "<td><form action='Asientos.php' method='get'> <button type='button' class='btn btn-default btn-sm' name='aerolinea' value=$load->aerolinea onclick='foofi(\"$load->aerolinea\",\"$vuelo->numero\",\"$vuelo->precio\")'>
<span class='glyphicon glyphicon-usd'></span> Buy
</button></form></td></tr>";
      }
    }
    //--desconexion con la base de datos
    pg_close($conexion);
    ?>
    <script>
    //funcion para enviar el form
    function foofi(a, b, c){
      window.location.href = "Asientos.php?aerolinea=" + a + "&numero="+b + "&precio="+c;
    }
    </script>
    </body>
    </html>
