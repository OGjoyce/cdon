<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- Mobiles -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--misc -->
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

<body>

<h3>Vuelos Disponibles</h3>
<?php
session_start();
$from = $_GET['origen'];
$to = $_GET['destino'];
$date = $_GET['fecha'];
$_SESSION['from'] = $from;
$_SESSION['to'] = $to;
$_SESSION['date'] = $date;
//$url = "http://192.168.1.66:8081/v1/aviones.xml?origen=". $from . "&destino=" . $to . "&fecha=" . $date;
$indres = 'http://imart-gt.com/script_lista_vuelos/?origen='.$_SESSION['from']. '&destino='.$_SESSION['to'] . '&fecha='. $_SESSION['date'];
$all_urls = array($indres, 'lamda.xml', 'idc.xml');
//echo $indres;
/*$xml=simplexml_load_file("script_vuelos.xml") or die("Error: Cannot create object1");
$xml_2=simplexml_load_file("idc.xml") or die("Error: Cannot create object3");
$xml_3=simplexml_load_file("lamda.xml") or die("Error: Cannot create object4");*/





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
<th>Informacion</th></tr>";



foreach ($all_urls as $url) {
    $xml = simplexml_load_file($url);
    foreach($xml->vuelo as $vuelo) {
        if($vuelo->origen == $from && $vuelo->destino == $to && $vuelo->fecha == $date){
                          $x = $xml->aerolinea;
                          echo "<tr><td>".$vuelo->numero."</td>";
                          if($x == "GAL"){
                            $x = "<img src='../misc/img/GuateAirlines.jpg' class='img-rounded' alt='Cinque Terre' width='50' height='50'>";
                          }
                          elseif($x =="LMA"){
                            $x = "<img src='../misc/img/LamdaAirlines.png' class='img-rounded' alt='Cinque Terre' width='50' height='50'>";
                          }
                          elseif($x == "IDC"){
                            $x = "<img src='../misc/img/IndresAirlines.png' class='img-rounded' alt='Cinque Terre' width='50' height='50'>";

                          }
                          echo "<td>".$x."</td>";
                        echo "<td>".$vuelo->fecha."</td>";
                        echo "<td>".$vuelo->hora."</td>";
                        echo "<td>".$vuelo->origen."</td>";
                        echo "<td>".$vuelo->destino."</td>";
                        echo "<td>".$vuelo->precio."</td>";
                        echo "<td><form action='Asientos.php' method='get'> <button type='button' class='btn btn-default btn-sm' name='aerolinea' value=".$xml->aerolinea." onclick='foofi(\"".$xml->aerolinea."\",\"".$vuelo->numero."\", " . $vuelo->precio .  ")'>
          <span class='glyphicon glyphicon-usd'></span> Buy
        </button></form></td></tr>";



                      }



      }
}




?>
<script>
function foofi(a, b, c){
  window.location.href = "Asientos.php?aerolinea=" + a + "&numero="+b + "&precio="+c;
}
</script>







</body>
</html>
