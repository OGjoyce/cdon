<?php session_start();?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Resumen</title>
      <!-- <link rel="icon" href="misc/img/icono.png"> -->
      <link rel="stylesheet" href="../misc/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="../misc/bootstrap/css/font-awesome.min.css">
      <link rel="stylesheet" href="../misc/bootstrap/css/main.css">
      <script src="../misc/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="../misc/bootstrap/js/bootstrap.min.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-inverse">'
      <ul class="nav navbar-nav">
        <?php echo '<li><a href="#">'. $_SESSION["usuario"]   .'</a></li>'; ?>
    </ul>
      <ul class="nav navbar-nav navbar-right">
    <li><a href="login.html"><span class="glyphicon glyphicon-log-in"></span> LOGOUT</a></li>
    </ul>
    </nav>
<h1>Resumen de reservaciones</h1>

    <?php
        $dbconn = pg_connect("host=localhost dbname=agencia user=agenciaadmin password=123");
        $query = "select r.recibo, p.Nombre , p.descripcion,  p.dias,  p.id_aerolinea, h.nombre
from reservaciones r, paquetes p, usuarios u, hotels h where r.id_usuario = u.id_usuario and p.id_paquete = r.id_paquete and p.id_hotel = h.codigo and u.username = '".$_SESSION["usuario"] ."'" ;
        $query = pg_query($dbconn, $query);
    ?>


    <div class="container">
      <!-- <h2>aerolineas</h2> -->
      <!-- <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p> -->
      <table class="table">
        <thead>
          <tr>
            <th>Recibo</th>
            <th>Nombre del paquete</th>
            <th>Descripcion</th>
            <th>Dias</th>
            <th>Aerolinea</th>
            <th>Hotel</th>
          </tr>
         </thead>
         <tbody>

<?php

     while ($row=pg_fetch_array($query)){
?>

 <tr>
<?php

echo "<th>". $row[0] . "</th>";
echo "<th>". $row[1] . "</th>";
echo "<th>". $row[2] . "</th>";
 echo "<th>". $row[3] . "</th>";
  echo "<th>". $row[4] . "</th>";
  echo "<th>". $row[5] . "</th>";
  echo "<th>". $row[6] . "</th>";
 ?>
        </tr>
<?php
}
?>
      </tbody>
    </table>
  </div>







    </body>
    </html>
