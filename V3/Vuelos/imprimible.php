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
      <body>


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
      <div class ='container'>


         <?php

      session_start();
      if($_SESSION['aerolinea'] == "IDC"){
      echo "<div class='jumbotron'>
    <h1>Estimado ".$_SESSION['nombre_de_usuario']."</h1>
    <p>Por su seguridad, imprima este documento con sus datos personales del vuelo.</p>
  </div>
  <div class='container'>
  <h2>Importante</h2>
  <p>La siguiente tabla muestra la informacion de su vuelo(s)</p>
  <table class='table table-hover'>
    <thead>
      <tr>
        <th>Aerolinea</th>
        <th>Origen</th>
        <th>Destino</th>
        <th>Asiento</th>
        <th>Numero de Boleto</th>
        <th>TICKET</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><img src='../misc/img/IndresAirlines.png' class='img-rounded' alt='Cinque Terre' width='50' height='50'></td>
        <td>".$_SESSION['from']."</td>
        <td>".$_SESSION['to']."</td>
        <td>".$_SESSION['data']."</td>
         <td>".$_SESSION['numero']."</td>
         <td>".$_SESSION['ticket']."</td>
      </tr>
    </tbody>
  </table>
</div>";
  }
   if($_SESSION['aerolinea'] == "GAL"){
      echo "<div class='jumbotron'>
    <h1>Estimado ".$_SESSION['nombre_de_usuario']."</h1>
    <p>Por su seguridad, imprima este documento con sus datos personales del vuelo.</p>
  </div>
  <div class='container'>
  <h2>Importante</h2>
  <p>La siguiente tabla muestra la informacion de su vuelo(s)</p>
  <table class='table table-hover'>
    <thead>
      <tr>
        <th>Aerolinea</th>
        <th>Origen</th>
        <th>Destino</th>
        <th>Asiento</th>
        <th>Numero de Boleto</th>
        <th>TICKET</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><img src='../misc/img/GuateAirlines.jpg' class='img-rounded' alt='Cinque Terre' width='50' height='50'></td>
        <td>".$_SESSION['from']."</td>
        <td>".$_SESSION['to']."</td>
        <td>".$_SESSION['data']."</td>
        <td>".$_SESSION['numero']."</td>
        <td>".$_SESSION['ticket']."</td>
      </tr>
    </tbody>
  </table>
</div>";
  }
   if($_SESSION['aerolinea'] == "LMA"){
      echo "<div class='jumbotron'>
    <h1>Estimado ".$_SESSION['nombre_de_usuario']."</h1>
    <p>Por su seguridad, imprima este documento con sus datos personales del vuelo.</p>
  </div>
  <div class='container'>
  <h2>Importante</h2>
  <p>La siguiente tabla muestra la informacion de su vuelo(s)</p>
  <table class='table table-hover'>
    <thead>
      <tr>
        <th>Aerolinea</th>
        <th>Origen</th>
        <th>Destino</th>
        <th>Asiento</th>
        <th>Numero de Boleto</th>
        <th>TICKET</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><img src='../misc/img/LamdaAirlines.png' class='img-rounded' alt='Cinque Terre' width='50' height='50'></td>
        <td>".$_SESSION['from']."</td>
        <td>".$_SESSION['to']."</td>
        <td>".$_SESSION['data']."</td>
         <td>".$_SESSION['numero']."</td>
         <td>".$_SESSION['ticket']."</td>
      </tr>
    </tbody>
  </table>
</div>";
  }
      ?>

      </div>
      <br><br><br><br><br><br><br><br>
      <div class='col-md-4 center-block'>
      <button type='button' class='btn btn-primary btn-xs' name='printable'  onclick='print_thatsht()'>
          <span class='glyphicon glyphicon-print'></span> Imprimir
        </button>
      </div>
      <script>
      function print_thatsht(){
      	window.print();
      }
      </script>

      </body>
      </html>
