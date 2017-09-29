<?php 
// es por un warning de strtotime function
date_default_timezone_set('UTC');


$comunica =$_REQUEST['comunica'];
//controlo si ponen vacio el campo
if($comunica=="")
	$comunica=1;
///////////////////////////////////////
$respuesta="hola";

include "../conexion.php";


$consulta  = "SELECT * FROM comunicas WHERE nro = ".$comunica;
$query     = mysql_query($consulta, $conexion);
$fila      = mysql_fetch_array($query);
$num	= mysql_num_rows($query);

if($num>0)
	$respuesta=$comunica;
else
	$respuesta=0;

echo $respuesta;
 ?>