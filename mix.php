

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

    <!--PARA EL DATEPICKER-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  	<link rel="stylesheet" href="/resources/demos/style.css">


   </head>
<body>
<form method= "post" role="form" action="mix.php">
  <div class="form-group">
    <label>Fecha de Inicio</label>
    <input class="form-control" id="datepicker1" name="vfdesde" placeholder="DD/MM/YYYY" type="text" value=""/>
    <br>
	<label>Fecha Final</label>
    <input class="form-control" id="datepicker2" name="vfhasta" placeholder="DD/MM/YYYY" type="text" value="" disabled/>
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
	$vfdesde =$_REQUEST["vfdesde"]; 
	$vfhasta= $_REQUEST["vfhasta"];
	$vmonto = $_REQUEST["vmonto"];
	// incremente 1 mes para calcular los indices entre las 2 fechas
	list($dia0, $mes0, $año0)=split('[/.-]',$vfdesde);
	list($dia1, $mes1, $año1)=split('[/.-]',$vfhasta);
	$vfecha0=$año0."-".$mes0."-".$dia0;
	$dia=$dia0;
	$mes=$mes0;
	$año=$año0;
	if ($mes0 == 12) {
		$mes = 1;
		$año ++;
	}else {
		$mes ++;
	}

	if($mes0<10)
		$mes="0".$mes0;

	$vfecha1 = $año."-".$mes."-".$dia;
	$vfecha2 = $año1."-".$mes1."-".$dia1;
	print "fecha 1: ".$vfecha1."<br>";
	print "fecha 2: ".$vfecha2."<br>";

	// realiza la consulta 1 de 3
	$consulta="select sum(indice) as indice from tmix where fecha >= '".date("Y-m-d", strtotime($vfecha1))."' and fecha <= '".date("Y-m-d", strtotime($vfecha2))."' ";		
	$query= mysql_query($consulta) or die ("no se pudo realizar la consulta");	
	$fila= mysql_fetch_array($query);
	$vindice_final =  $fila["indice"];
	print "fecha 1: ".$vfecha0."<br>";
	print "fecha 2: ".$vfecha2."<br>";
	print "primer indice: ".$vindice_final."<br>";

	// consulta 2 de 3 el mes inicial

	$consulta="select indice from tmix where MONTH(fecha) = '".$mes0."' AND YEAR(fecha) = '".$año0."' ";	
	$query= mysql_query($consulta) or die ("no se pudo realizar la consulta");	

/*	print "Dia :".$dia."<br>";
	print "Mes :".$mes."<br>";
	print "Ano :".$año."<br>";
*/		
	$fila= mysql_fetch_array($query);
	$numeroDias = cal_days_in_month(CAL_GREGORIAN, $mes0, $año0);	
	$vindice_final =  $vindice_final + ($fila['indice']/$numeroDias* ($numeroDias-$dia0+1));
	print "segundo indice: ".$vindice_final."<br>";
	
	// consulta 3 de 3 el mes final

	
	$consulta="select indice from tmix where MONTH(fecha) = '".$mes1."' AND YEAR(fecha) = '".$año1."' ";	
	$query= mysql_query($consulta) or die ("no se pudo realizar la consulta");	
	$numeroDias = cal_days_in_month(CAL_GREGORIAN, $mes1, $año1);
	$fila=	mysql_fetch_array($query);
	$vindice_final =  round($vindice_final + (($fila['indice']/$numeroDias* $dia1)),2);
	print $vindice_final;
}
 ?>
 <script type="text/javascript">
$("#datepicker1").datepicker();
$("#datepicker2").datepicker();

$("#datepicker1").change(function() {
  if ($("#datepicker1").datepicker("getDate") !== null) {
    $("#datepicker2").val('');
    $("#datepicker2").prop('disabled', false);
  } else {
    $("#datepicker2").prop('disabled', true);
  }
});

$('#borrar').click(function() {
  $("#datepicker1").val('');
  $("#datepicker2").val('');

});

$(function($){
$.datepicker.regional['es'] = {
closeText: 'Cerrar',
dateFormat: "dd/mm/yyyy",
prevText: '',
currentText: 'Hoy',
monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
weekHeader: 'Sm',
dateFormat: 'dd/mm/yy',
firstDay: 1,
isRTL: false,
showMonthAfterYear: false,
yearSuffix: ''
};
$.datepicker.setDefaults($.datepicker.regional['es']);
});
</script>