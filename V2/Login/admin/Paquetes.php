<?php session_start();?>
<html>
  <head>
    <meta charset="utf-8">
    <title>LOG</title>
      <!-- <link rel="icon" href="misc/img/icono.png"> -->
      <link rel="stylesheet" href="../../misc/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="../../misc/bootstrap/css/font-awesome.min.css">
      <link rel="stylesheet" href="../../misc/bootstrap/css/main.css">
      <script src="../../misc/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="../../misc/bootstrap/js/bootstrap.min.js"></script>
  </head>
  <body>

    <nav class="navbar navbar-inverse">'
      <ul class="nav navbar-nav">
        <?php echo '<li><a href="../admin.php">'. $_SESSION["usuario"]   .'</a></li>'; ?>
    </ul>
      <ul class="nav navbar-nav navbar-right">
    <li><a href="../login.html"><span class="glyphicon glyphicon-log-in"></span> LOGOUT</a></li>
    </ul>
    </nav>
<h1>Paquetes<h1>
    <?php
      $dbconn = pg_connect("host=localhost dbname=agencia user=agenciaadmin password=123");

      $query = pg_query($dbconn, "select p.id_paquete, p.nombre, p.descripcion, a.nombre, h.nombre,p.dias , p.precio from
      paquetes p, aerolineas a, hotels h
        where p.id_aerolinea=a.codigo and p.id_hotel = h.codigo");
      ?>
      <div class="container">
        <!-- <h2>aerolineas</h2> -->
        <!-- <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p> -->
        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Descripcion</th>
              <th>Aerolinea</th>
              <th>Hotel</th>
              <th>Dias</th>
              <th>Precio</th>
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


         echo "<th> <form action='Paquetes.php' method='post'><button type='submit' class='btn-danger' name = 'borrar' value = '". $row[0] . "' >Borrar </button> </form> </th>";
     ?>
          </tr>
  <?php
  }
  ?>
        </tbody>
      </table>
    </div>
<?php
$x = $_POST["borrar"];
echo $x;
//pg_close($dbconn);
//$dbconn = pg_connect("host=localhost dbname=agencia user=agenciaadmin password=123");
if ($x != ""){
  $q = "delete from paquetes where id_paquete = '" . $x."'";
  if (pg_query($dbconn, $q)){
    echo '<div class="alert alert-success">
    <strong>Success!</strong> Borrado exitosamente.
  </div>';
  }else{
    echo '<div class="alert alert-danger">
    <strong>ERROR!</strong> No se pudo borrar.
  </div>';
  }
}
?>
<form action='Paquetes.php' method='post'>
  <div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" class="form-control" name="nombre" id="nombre" required >
  </div>
  <div class="form-group">
    <label for="aerolinea">Descripcion</label>
    <input type="text" class="form-control" name="Descripcion" id="Descripcion"  required>
  </div>
  <div class="form-group">
    <label for="Aero">Aerolinea ID</label>
    <input type="text" maxlength="3"class="form-control" name="Aero" id="Aero"  required>
  </div>
  <div class="form-group">
    <label for="Hotel">Hotel ID</label>
    <input type="number" class="form-control" name="Hotel" id="Hotel" required >
  </div>
  <div class="form-group">
    <label for="dias">Dias</label>
    <input type="number" class="form-control" name="Dias" id="Dias" required >
  </div>
  <div class="form-group">
    <label for="precio">Precio</label>
    <input type="number" class="form-control" name="precio" id="Precio" required >
  </div>
<button type="submit" class="btn btn-success">Agregar</button>
</form>

<?php
$nombre = $_POST["nombre"];
$desc = $_POST["Descripcion"];
$aero = $_POST["Aero"];
$hotel = $_POST["Hotel"];
$days = $_POST["Dias"];
$price = $_POST["precio"];
if ($nombre != ""){
$q = "insert into paquetes values(default,'" . $nombre . "',' ". $desc . " ','" . $hotel . "','" . $aero . "','" . $days. "','" . $price.  "')";
if (pg_query($dbconn, $q)){
  echo '<div class="alert alert-success">
  <strong>Success!</strong> Agregado exitosamente.
</div>';
}
else{
  echo '<div class="alert alert-danger">
  <strong>ERROR!</strong> No se pudo realizar el cambio.
</div>';
}
}

echo $codigo;

?>





  </body>
</html>
