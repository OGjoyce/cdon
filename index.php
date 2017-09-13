<html>
<head>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
</head>


  <script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
  });
  </script>

<body>
<h1>pene1</h1>

<!-- <?php

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

for($i=0;$i <10; $i++) {
  echo "1";
}


?> -->


<form onsubmit = "verificar()">
  From<br>
  <select id = "from" onchange="disable1();"><br>
  <option selected>Ingrese pais</option>
  <option value="SEA">SEA</option>
  <option value="SXF">SXF</option>
  <option value="GUA">GUA</option>
</select>
  To<br>
  <select id = "to" onchange="disable2();"><br>
  <option selected>Ingrese pais</option>
  <option value="SEA">SEA</option>
  <option value="SXF">SXF</option>
  <option value="GUA">GUA</option>
</select>
Date
    <br>
    <input id="datepicker" ><br><br>
  <input type="reset" value="Reset">
  <input type="submit"value="Continuar">
</form>
<script>
function verificar(){
  var date = document.getElementById("datepicker").value;
  var FROM = document.getElementById("from").value;
  var TO = document.getElementById("to").value;
  console.log(date);
  if (FROM == TO){
    alert("SON IGUALES");
  }
  else{
    alert("SON DIFERENTES");
  }
}

function disable1() {
  var disabled = document.getElementById("from").value;
  var  from = document.getElementById("to");

  for(var i=0; i < from.options.length; i++) {
    if(from.options[i].text === disabled) {
      from.options[i].disabled = true;
    }else{
      from.options[i].disabled = false;
    }
  }

}
function disable2(){
  var disabled = document.getElementById("to").value;
  var  from = document.getElementById("from");

  for(var i=0; i < from.options.length; i++) {
    if(from.options[i].text === disabled) {
      from.options[i].disabled = true;
    }else{
      from.options[i].disabled = false;
    }
  }



}

</script>
</body>
</html>
