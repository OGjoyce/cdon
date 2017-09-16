<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"> 
      <link rel="stylesheet" href="misc/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="misc/bootstrap/css/font-awesome.min.css">
      <link rel="stylesheet" href="misc/bootstrap/css/main.css">
      <script src="misc/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="misc/bootstrap/js/bootstrap.min.js"></script>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.html">CDON TRAVEL</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="index.html">Home</a></li>
        <li class="active"><a href="paquetes.html">Paquetes</a></li>
        <li><a href="contact.html">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="login.html"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>

</head>
<body>
<?php
$host="127.0.0.1";
    $port="5432";
    $user="postgres";
    $pass="password";
    $dbname="agencia2";
    $paquete =$_POST['packet'];

    $cadenaConexion = "host=$host port=$port dbname=$dbname user=$user password=$pass";

    $conexion = pg_connect($cadenaConexion) or die("Error en la Conexión: ".pg_last_error());
echo "<h3>Paquetes Disponibles</h3><hr><br>";

if($paquete==0){
$query = "SELECT * FROM paquetes WHERE nombre LIKE 'fa%'";

$resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL");

$numReg = pg_num_rows($resultado);

if($numReg>0){
echo "<table class='table table-bordered'>
<tr bgcolor='skyblue'>
<th>descripcion</th>
<th>id_aerolinea</th>
<th>dias</th>
<th>precio</th>
<th>Informacion</th></tr>";
while ($fila=pg_fetch_array($resultado)) {
echo "<tr><td>".$fila['descripcion']."</td>";
echo "<td>".$fila['id_aerolinea']."</td>";
echo "<td>".$fila['dias']."</td>";
echo "<td>".$fila['precio']."</td>";
echo "<td><a href='#'>Comprar</a></td></tr>";
}
                echo "</table>";
}else{
                echo "No hay Registros";
}
}
if($paquete==1){
$query = "SELECT * FROM paquetes WHERE nombre LIKE 'mi%'";

$resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL");

$numReg = pg_num_rows($resultado);

if($numReg>0){
echo "<table class='table table-bordered'>
<tr bgcolor='skyblue'>
<th>descripcion</th>
<th>id_aerolinea</th>
<th>dias</th>
<th>precio</th>
<th>Informacion</th></tr>";
while ($fila=pg_fetch_array($resultado)) {
echo "<tr><td>".$fila['descripcion']."</td>";
echo "<td>".$fila['id_aerolinea']."</td>";
echo "<td>".$fila['dias']."</td>";
echo "<td>".$fila['precio']."</td>";
echo "<td><a href='#'>Comprar</a></td></tr>";
}
                echo "</table>";
}else{
                echo "No hay Registros";
}
}
if($paquete==2){
$query = "SELECT * FROM paquetes WHERE nombre LIKE 'so%'";

$resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL");

$numReg = pg_num_rows($resultado);

if($numReg>0){
echo "<table class='table table-bordered'>
<tr bgcolor='skyblue'>
<th>descripcion</th>
<th>id_aerolinea</th>
<th>dias</th>
<th>precio</th>
<th>Informacion</th></tr>";
while ($fila=pg_fetch_array($resultado)) {
echo "<tr><td>".$fila['descripcion']."</td>";
echo "<td>".$fila['id_aerolinea']."</td>";
echo "<td>".$fila['dias']."</td>";
echo "<td>".$fila['precio']."</td>";
echo "<td><a href='#'>Comprar</a></td></tr>";
}
                echo "</table>";
}else{
                echo "No hay Registros";
}
}
pg_close($conexion);


?>
</body>
