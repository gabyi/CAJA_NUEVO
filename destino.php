<?php

$nombre=$_POST['nombre'];
$localidad= $_POST['localidad'];
$paginaactual= $_POST['partida'];
$nrolotes=5;
$lista="";

include "conexion.php";

//hago la consulta para saber cuantos elementos tiene
if($localidad=="" || $nombre=="")
	{
		if($localidad=="")
		{
			$consulta=mysql_query("SELECT * FROM profesio1 WHERE nombrepro='".$nombre."';",$conexion) or die("No se encuentra producto: $buscar " . mysql_errno());
			$nroprofesio= mysql_num_rows($consulta);
		}
		
		if($nombre=="")
		{
			$consulta=mysql_query("SELECT * FROM profesio1 WHERE locaprof='".$localidad."';",$conexion) or die("No se encuentra producto: $buscar " . mysql_errno());
			$nroprofesio= mysql_num_rows($consulta);
		}
	}else{

		$consulta=mysql_query("SELECT * FROM profesio1 WHERE nombrepro='".$nombre."' and locaprof='".$localidad."';",$conexion) or die("No se encuentra producto: $buscar " . mysql_errno());
		$nroprofesio= mysql_num_rows($consulta);
	}	
//====================================================================================================================

	$nroPaginas = ceil($nroprofesio/$nroLotes);


	if($paginaActual > 1){
        $lista = $lista.'<li><a href="javascript:pagination('.($paginaActual-1).');">Anterior</a></li>';
    }
    for($i=1; $i<=$nroPaginas; $i++){
        if($i == $paginaActual){
            $lista = $lista.'<li class="active"><a href="javascript:pagination('.$i.');">'.$i.'</a></li>';
        }else{
            $lista = $lista.'<li><a href="javascript:pagination('.$i.');">'.$i.'</a></li>';
        }
    }
    if($paginaActual < $nroPaginas){
        $lista = $lista.'<li><a href="javascript:pagination('.($paginaActual+1).');">Siguiente</a></li>';
    }

	
	while($fila=mysql_fetch_array($consulta))	
	{ 
       //Aca le das el formato a tu respuesta. En ste caso creas una fila con sus respectivas columnas		
		$cadena.='<tr><td>'.$fila['nombrepro'].'</td><td>'.$fila['domiciprof'].'</td><td>'.$fila['teprof'].'</td><td>'.$fila['correoelec'].'</td><td>'.$fila['locaprof'].'</td>';
	}
	
	$cadenas= array($cadena, $lista);

	echo json_encode($cadenas);

?>
