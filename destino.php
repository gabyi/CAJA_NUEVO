<?php

$buscar=$_POST['code'];

if(isset($buscar))
{
	$conexion=mysql_connect("www.cforense.org","cfore2","O55ur+wodge");
	mysql_select_db("cfore2",$conexion) or die("error en seleccion de BD: ".mysql_errno());
	$consulta=mysql_query("SELECT * FROM profesio1 WHERE nombrepro='".$buscar."';",$conexion) or die(	"No se encuentra producto: $buscar " . mysql_errno());
	
	while($fila=mysql_fetch_array($consulta))	
	{ 
        //Aca le das el formato a tu respuesta. En ste caso creas una fila con sus respectivas columnas
		$cadena.='<tr><td>'.$fila['nombrepro'].'</td><td>'.$fila['domiciprof'].'</td><td>'.$fila['teprof'].'</td><td>'.$fila['correoelec'].'</td><td>'.$fila['locaprof'].'</td>';
	}
	
	echo $cadena;
}
?>
