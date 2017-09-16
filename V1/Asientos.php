<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CDONG</title>
      <!-- <link rel="icon" href="misc/img/icono.png"> -->
      <link rel="stylesheet" href="misc/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="misc/bootstrap/css/font-awesome.min.css">
      <link rel="stylesheet" href="misc/bootstrap/css/main.css">
      <script src="misc/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="misc/bootstrap/js/bootstrap.min.js"></script>
  </head>
  <body class="asientos">
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.html">CDONG TRAVEL</a>
        </div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="index.html">Home</a></li>
          <li><a href="#">Paquetes</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="login.html"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>
      </div>
    </nav>
    <div class="container text-center avioncito">
    <?php
    for ($i = 0; $i < 80; $i++){
        echo "<button type='button' class='btn btn-primary active' onclick = 'buttonFoo(" . $i++ . ")'>A</button>" . "\n";
        echo "<button type='button' class='btn btn-primary active' onclick = 'buttonFoo(" . $i++ . ")'>B</button>" . "\n";
        echo "<button type='button' class='btn btn-primary active' onclick = 'buttonFoo(" . $i++ . ")'>C</button>" . "\n";
        echo "<button type='button' class='btn btn-primary active' onclick = 'buttonFoo(" . $i . ")'>D</button>" . "\n";
        echo "</br>";
    }?>
  </div>
</div>
  <button type="submit" class="btn btn-success btn-block">Reservar</button>
</div>

    <script>

    function buttonFoo(pos){
      console.log(pos);
    }

    </script>

  </body>
</html>
