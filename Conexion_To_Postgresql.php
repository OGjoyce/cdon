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

    $cadenaConexion = "host=$host port=$port dbname=$dbname user=$user password=$pass";

    $conexion = pg_connect($cadenaConexion) or die("Error en la Conexión: ".pg_last_error());

echo "<h3>Conexion Exitosa PHP - PostgreSQL</h3><hr><br>";
$query = "SELECT * FROM Persona";

$resultado = pg_query($conexion, $query) or die("Error en la Consulta!");

echo "<table>\n";   
while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";


pg_free_result($result);


pg_close($dbconn);


pg_close($conexion);
echo 'el registro fue eliminado exitosamente<br>';
?>

     <center>
         <a href="index.html">regresar</a>
     </center>
  </body>
</html>
