<html>
  <head>
     <title>
        Consulta de vuelo
     </title>
  </head>
  <body>
<?php
$host="127.0.0.1";
    $port="5432";
    $user="postgres";
    $pass="password";
    $dbname="Cdon_DB";

    $origen = $_GET['origen'];  
    $destino = $_GET['destino'];
    $fecha = $_GET['date'];


    $cadenaConexion = "host=$host port=$port dbname=$dbname user=$user password=$pass";

    $conexion = pg_connect($cadenaConexion) or die("Error en la Conexión: ".pg_last_error());
echo "<h3>Conexion Exitosa PHP - PostgreSQL</h3><hr><br>";

$query = "SELECT numero, destino, origen FROM Vuelos";

$resultado = pg_query($conexion, $query) or die("Error en la Consulta!");

$numReg = pg_num_rows($resultado);

if($numReg>0){
echo "<table border='1' align='center'>
<tr bgcolor='skyblue'>
<th>nombre</th>
<th>destino</th>
<th>origen</th></tr>";
while ($fila=pg_fetch_array($resultado)) {
echo "<tr><td>".$fila['nombre']."</td>";
echo "<td>".$fila['origen']."</td>";
echo "<td>".$fila['destino']."</td></tr>";
}
                echo "</table>";
}else{
                echo "No hay Registros";
}

pg_close($conexion);

echo 'el registro fue eliminado exitosamente<br>';




?>

     <center>
         <a href="index.html">regresar</a>
     </center>
  </body>
</html>
