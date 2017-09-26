<?php
session_start();
?>
<html>
  <head>
    <meta charset="utf-8">
    <title>ADMINISTRACION</title>
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
        <?php echo '<li><a href="admin.php">'. $_SESSION["usuario"]   .'</a></li>'; ?>
    </ul>
      <ul class="nav navbar-nav navbar-right">
    <li><a href="login.html"><span class="glyphicon glyphicon-log-in"></span> LOGOUT</a></li>
    </ul>
    </nav>

    <div class="list-group">

      <a href="admin/Aerolineas.php" class="list-group-item list-group-item-action">Aerolineas</a>
      <a href="admin/Hoteles.php" class="list-group-item list-group-item-action">Hoteles</a>
      <a href="admin/Paquetes.php" class="list-group-item list-group-item-action">Paquetes</a>
    </div>






</body>
</html>
