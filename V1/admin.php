<?php
$user = $_GET["user"];
$password = $_GET["password"];
  $dbconn = pg_connect("host=localhost dbname=agencia user=agenciaadmin password=123");

  $query = pg_query($dbconn, "Select * from aerolineas");
  echo "TABLE";
  while ($row=pg_fetch_assoc($query)){
    echo "<h1>". $row['nombre'] . "</h1>";
  }
?>
