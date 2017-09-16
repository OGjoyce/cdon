<html>
<head>
  <meta charset="utf-8">
  <title>CDONG</title>

    <link rel="stylesheet" href="misc/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="misc/bootstrap/css/font-awesome.min.css">
    <link rel="stylesheet" href="misc/bootstrap/css/main.css">
    <script src="misc/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="misc/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.html">CDONG TRAVEL</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.html">Home</a></li>
        <li><a href="#">Paquetes</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="login.html"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </nav>
<?php
$from = $_GET["origen"];
$to = $_GET["destino"];
$date = $_GET["fecha"];
$url = "http://aerolinea/script_lista_vuelos?origen=". $from . "&destino=" . $to . "&fecha=" . date;
$xml = simplexml_load_file($url);
$aerolinea = $xml->aerolinea;
$numeroV = $xml->vuelo->numero;
$hora = $xml->vuelo->hora;
$precio = $xml->vuelo->precio;
$status = $xml->vuelo->status;
?>
<div class="container">
  <h2>Vuelos</h2>
  <?php
  $from = $_GET["origen"];
  $to = $_GET["destino"];
  $date = $_GET["fecha"];
  echo "<h3>Estos son vuelos de <mark>". $from . "</mark> a <mark>" . $to . "</mark> para <mark>" . $date . "</mark></h3>";
  ?>
  <table class="table">
    <thead>
      <tr>
        <th>
          Aerolinea
        </th>
        <th>Numero</th>
        <th>Hora</th>
        <th>Precio</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><img src="misc/img/IndresAirlines.png" class="img-rounded" alt="Cinque Terre" width="50" height="50"></td>
        <td>1234</td>
        <td>john@example.com</td>
        <td>1234</td>
        <td>john@example.com</td>
      </tr>
      <tr>
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@example.com</td>
        <td>1234</td>
        <td>john@example.com</td>
      </tr>
      <tr>
        <td>July</td>
        <td>Dooley</td>
        <td>july@example.com</td>
        <td>1234</td>
        <td>john@example.com</td>
      </tr>
    </tbody>
  </table>
</div>

<ul class="pager">
  <li><a href="index.html">Regresar</a></li>
  <li><a href="Asientos.php">Siguiente</a></li>
</ul>

</body>
</html>
