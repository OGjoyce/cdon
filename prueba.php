<?php

  echo "la cago duro\n";
  $dbconn = pg_connect("host=localhost dbname=agencia user=agenciaadmin password=123");
  if(!$dbconn) {
    echo "la cago grueso\n";
  } else {
    echo "fuck you bitch\n";

  }

  $query = pg_query($dbconn, "select * from aerolineas");
  echo "TABLE";
  while ($row=pg_fetch_assoc($query)){
    echo "<h1>". $row['nombre'] . "</h1>";
  }

?>
