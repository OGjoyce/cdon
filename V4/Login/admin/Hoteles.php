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
<h1>HOTELES<h1>
    <?php
      $dbconn = pg_connect("host=localhost dbname=agencia user=agenciaadmin password=123");
      $query = pg_query($dbconn, "select * from hotels");

      ?>
      <div class="container">
        <!-- <h2>aerolineas</h2> -->
        <!-- <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p> -->
        <table class="table">
          <thead>
            <tr>
              <th>Codigo</th>
              <th>Nombre</th>
              <th></th>
            </tr>
           </thead>
           <tbody>

  <?php

       while ($row=pg_fetch_assoc($query)){
?>

   <tr>
<?php
         echo "<th>". $row['codigo'] . "</th>";
         echo "<th>". $row['nombre'] . "</th>";
         echo "<th> <form action='Hoteles.php' method='post'><button type='submit' class='btn-danger' name = 'borrar' value = '". $row['codigo'] . "' >Borrar </button> </form> </th>";
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
  $q = "delete from hotels where codigo = '" . $x."'";
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
<form action='Hoteles.php' method='post'>
  <div class="form-group">
    <label for="Hoteles">HOTEL</label>
    <input type="text" class="form-control" name="hotel" id="hotel"  >
  </div>
<button type="submit" class="btn btn-success">Agregar</button>
</form>

<?php
$nombre = $_POST["hotel"];
echo $nombre;
if ($nombre != ""){
$q = "insert into hotels values(DEFAULT,'" . $nombre . "')";
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
