<html>
<head>
   <title>
      CDONG
   </title>
</head>

  <body>
    <h1>PENE1</h1>
<?php
for ($i = 0; $i < 20; $i++){
    echo "<button type='button' onclick = 'buttonFoo(0," . $i . ")'>A</button>" . "\n";
    echo "<button type='button' onclick = 'buttonFoo(1," . $i . ")'>B</button>" . "\n";
    echo "<button type='button' onclick = 'buttonFoo(2," . $i . ")'>C</button>" . "\n";
    echo "<button type='button' onclick = 'buttonFoo(3," . $i . ")'>D</button>" . "\n";
    echo "</br>";
}?>


<script>

function buttonFoo(columna, fila){
  console.log(fila +", " +columna);
}

</script>
</body>
</html>
