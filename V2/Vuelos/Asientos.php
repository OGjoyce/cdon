<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CDON</title>
      <!-- <link rel="icon" href="misc/img/icono.png"> -->
      <link rel="stylesheet" href="../misc/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="../misc/bootstrap/css/font-awesome.min.css">
      <link rel="stylesheet" href="../misc/bootstrap/css/main.css">
      <script src="../misc/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="../misc/bootstrap/js/bootstrap.min.js"></script>
  </head>
  <body class="asientos">
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="../index.html">CDON TRAVEL</a>
        </div>
        <ul class="nav navbar-nav">
          <li><a href="../index.html">Home</a></li>
          <li><a href="paquetes.html">Paquetes</a></li>
          <li><a href="contact.html">Contact</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="../Login/login.html"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>
      </div>
    </nav>

    <div class="container text-center avioncito">
    <?php
    session_start();
    $aerolinea = $_GET['aerolinea'];
    $numero_boleto = $_GET['numero'];
    $_SESSION['numero'] = $numero_boleto;
      $_SESSION['precio']=  $_GET['precio'];
    $_SESSION['aerolinea'] = $aerolinea;
    // if($_SESSION['aerolinea'] == 'IDC'){
    //   $url = 'http://imart-gt.com/script_lista_asientos/?aerolinea='.$_SESSION['aerolinea'].'&vuelo='.$_SESSION['numero'].'&fecha='.$_SESSION['date'];
    //   $xml = simplexml_load_file($url);
    // }


    for ($i = 1; $i <= 80; $i++){
        echo "<button type='button' class='btn btn-primary active' onclick = 'buttonFoo(" . $i++ . ")'>A</button>" . "\n";
        echo "<button type='button' class='btn btn-primary active' onclick = 'buttonFoo(" . $i++ . ")'>B</button>" . "\n";
        echo "<button type='button' class='btn btn-primary active' onclick = 'buttonFoo(" . $i++ . ")'>C</button>" . "\n";
        echo "<button type='button' class='btn btn-primary active' onclick = 'buttonFoo(" . $i . ")'>D</button>" . "\n";
        echo "</br>";
    }?>
  </div>
</div>
</div>

    <script>

    function buttonFoo(pos){

      window.location.href = "reservar_form.php?data=" + pos;
    }

    </script>

  </body>
</html>
