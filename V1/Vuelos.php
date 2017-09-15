<html>
<body>
<?php
$from = $_GET["from"];
$to = $_GET["to"];
$date = $_GET["date"];
echo $date;
echo $to;
echo $from;
$url = "http://aerolinea/script_lista_vuelos?origen=". $from . "&" . $to . "&" . date


?>
</body>
</html>
