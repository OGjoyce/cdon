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
      <?php
   session_start();
$_SESSION['paquete']=$_POST['paquete'];
             echo "<div class='container'>
      <h3>Registration</h3>
     <hr>
     <form method='post' action='compraP.php'>
     <div class='row'>
         <div class='col-lg-6'>
             <div class='form-group'>
                 <label>Username</label>
                 <div class='input-group'> <span class='input-group-addon'><span class='glyphicon glyphicon-user'></span></span>
                     <input type='text' class='form-control' name='Username' id='Username' placeholder='Ingrese su usuario' required>
                 </div>
             </div>
             <div class='form-group'>
                 <label>Email</label>
                 <div class='input-group'> <span class='input-group-addon'><span class='glyphicon glyphicon-envelope'></span></span>
                     <input type='text' class='form-control' name='Email' id='Email' placeholder='Correo electronico' required >
                 </div>
             </div>
             <div class='form-group'>
                 <label>Password</label>
                 <div class='input-group'> <span class='input-group-addon'><span class='glyphicon glyphicon-lock'></span></span>
                     <input type='password' class='form-control' name='password' id='password' placeholder='Password' required data-toggle='popover' title='Password Strength' data-content='Enter Password...'>
                 </div>
             </div>
             <input type='submit' name='submit' id='submit' value='Submit' class='btn btn-primary pull-right'>
         </div>
     </div>
     </form>
 </div>";
  ?>






      </body>

      </html>
