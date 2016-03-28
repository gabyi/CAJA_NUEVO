<?php
if (!isset($boton)) {
?> 
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Caja Forense de La Pampa</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="offcanvas.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
<body>
<form method= "post" role="form" action="mix.php">
  <div class="form-group">
    <label>Fecha de Inicio</label>
    <input type="date" class="form-control" name="vfdesde" placeholder="Fecha Inicio" required>
    <br>
	<label>Fecha Final</label>
    <input type="date" class="form-control" name="vfhasta" placeholder="Fecha Fin" required>
	<br>
	<label>Monto a Actualizar</label>
    <input type="number" class="form-control" name="vmonto" placeholder="Monto Actualizar" required>
  </div>
  <button type="submit" name="boton" class="btn btn-default">Calcular</button>
</form>

<? 
}else{
	include("conexion.php");
	// realiza la consulta toma las variables del formulario
	$vfdesde =str_replace("/", "-", $_REQUEST["vfdesde"]); 
	$vfhasta= $_REQUEST["vfhasta"];
	$vmonto = $_REQUEST["vmonto"];
	// incremente 1 mes para calcular los indices entre las 2 fechas
	list($dia, $mes, $año)=split('[/.-]',date("d-n-Y",strtotime($vfdesde)));
	if ($mes == 12) {
		$mes = 1;
		$año ++;
	}else {
		$mes ++;
	}
	$vfecha1 = $año."-".$mes."-".$dia;
	$vfecha2 = date("Y-m-d", strtotime($vfhasta));
	// realiza la consulta 1 de 3
	$consulta="select sum(indice) as indice from tmix where fecha > '$vfecha1' and fecha < '$vfecha2' ";		
	$query= mysql_query($consulta) or die ("no se pudo realizar la consulta");	
	$vindice_final =  (mysql_result($query, 0, "indice"));
	print "fecha 1: ".$vfecha1."<br>";
	print "fecha 2: ".$vfecha2."<br>";
	print "1er indice:!!!!!".$vindice_final."<br>";
	
	// consulta 2 de 3 el mes inicial
	$mes = date("m", strtotime($vfdesde));	
	$año = date("Y", strtotime($vfdesde));
	$consulta="select indice from tmix where MONTH(fecha) = '$mes' AND YEAR(fecha) = '$año' ";	
	$query= mysql_query($consulta) or die ("no se pudo realizar la consulta");	
		
	$numeroDias = cal_days_in_month(CAL_GREGORIAN, $mes, $año);	
	$vindice_final =  $vindice_final + (mysql_result($query, 0, "indice")/$numeroDias* ($numeroDias-$dia+1));
	
	// consulta 3 de 3 el mes final
	$dia = date("d", strtotime($vfhasta));	
	$mes = date("m", strtotime($vfhasta));	
	$año = date("Y", strtotime($vfhasta));
	
	$consulta="select indice from tmix where MONTH(fecha) = '$mes' AND YEAR(fecha) = '$año' ";	
	$query= mysql_query($consulta) or die ("no se pudo realizar la consulta");	
	$numeroDias = cal_days_in_month(CAL_GREGORIAN, $mes, $año);	
	$vindice_final =  round($vindice_final + ((mysql_result($query, 0, "indice")/$numeroDias* $dia)),2);
	print $vindice_final;
}
 ?>