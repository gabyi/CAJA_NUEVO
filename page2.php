<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php 
	
	$concepto= $_GET["concepto"];
	$fOrigen= $_GET["fOrigen"];
	$fCalc= $_GET["fCalc"];
	$importe= $_GET["importe"];

	echo "concepto: ".$concepto."<br>";
	echo "fOrigen: ".$fOrigen."<br>";
	echo "fCalc: ".$fCalc."<br>";
	echo "Importe: ".$importe."<br>";	
		 ?>
</body>
</html>