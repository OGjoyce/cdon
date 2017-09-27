<html>
  <head>
    <meta charset="utf-8">
    <title>LOG</title>
      <!-- <link rel="icon" href="misc/img/icono.png"> -->
      <link rel="stylesheet" href="../misc/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="../misc/bootstrap/css/font-awesome.min.css">
      <link rel="stylesheet" href="../misc/bootstrap/css/main.css">
      <script src="../misc/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="../misc/bootstrap/js/bootstrap.min.js"></script>
  </head>
  <body>
<?php
session_start();

  $_SESSION["usuario"] = $_POST["user"];
  $_SESSION["password"] = $_POST["password"];
  if ($_SESSION["usuario"] == "agenciaadmin" && $_SESSION["password"] == "123"){
    header('Location: admin.php');
  }
  else{
    $dbconn = pg_connect("host=localhost dbname=agencia user=agenciaadmin password=123");
    $query = "select * from usuarios where username= '". $_SESSION["usuario"] ."' and password =md5('" .$_SESSION["password"] . "')";
    $query = pg_query($dbconn, $query);
    //echo "cambio1";
    if ($query){
      while ($row=pg_fetch_assoc($query)){
        if ($row['username'] == $_SESSION["usuario"]) {
          pg_close($dbconn);
          echo "entro aqui";
            header('Location: user.php');
        }
      }
      header('Location: Login.html');
    }
    else{
      echo "Su usuario es incorrecto";
      header('Location: Login.html');
    }


  }
?>


</body>
</html>
