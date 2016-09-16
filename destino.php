<?php

$nombre=$_POST['nombre'];
$localidad= $_POST['localidad'];

include "conexion.php";

if(isset($nombre) || isset($localidad))
{

if($localidad=="" || $nombre=="")
	{
		if($localidad=="")
		{
			$consulta=mysql_query("SELECT * FROM profesio1 WHERE nombrepro='".$nombre."';",$conexion) or die("No se encuentra producto: $buscar " . mysql_errno());
		}
		
		if($nombre=="")
		{
			$consulta=mysql_query("SELECT * FROM profesio1 WHERE locaprof='".$localidad."';",$conexion) or die("No se encuentra producto: $buscar " . mysql_errno());
		}
	}else{

		$consulta=mysql_query("SELECT * FROM profesio1 WHERE nombrepro='".$nombre."' and locaprof='".$localidad."';",$conexion) or die("No se encuentra producto: $buscar " . mysql_errno());
	}	
	
	while($fila=mysql_fetch_array($consulta))	
	{ 
       //Aca le das el formato a tu respuesta. En ste caso creas una fila con sus respectivas columnas
		$cadena.='<tr><td>'.$fila['nombrepro'].'</td><td>'.$fila['domiciprof'].'</td><td>'.$fila['teprof'].'</td><td>'.$fila['correoelec'].'</td><td>'.$fila['locaprof'].'</td>';
	}
	
	echo $cadena;
}
?>
