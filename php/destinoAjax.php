<?php
// ESTE PHP SE UTILIZA EN PADRON.PHP  

$nombre       = $_REQUEST['nombre'];
$localidad    = $_REQUEST['localidad'];
$lista        = '';
$tipo         = $_REQUEST['tipo'];

include "../conexion.php";

switch ($tipo) {
	case 'padron':
		{

			// Hago de nuevo las consultas para paginar con el limite que impongo en nroLotes

			if ($localidad != "") {
			    $consulta    = mysql_query("SELECT * FROM profesio1 WHERE locaprof='" . $localidad . "' order by nombrepro asc ", $conexion) or die("No se encuentra producto: $buscar " . mysql_errno());
    			$nroprofesio = mysql_num_rows($consulta);
			} else {	
    			$consulta    = mysql_query("SELECT * FROM profesio1 WHERE nombrepro='" . $nombre . "'", $conexion) or die("No se encuentra producto: $buscar " . mysql_errno());
    			$nroprofesio = mysql_num_rows($consulta);
			}	

			while ($fila = mysql_fetch_array($consulta)) {
    			//Aca le das el formato a tu respuesta. En ste caso creas una fila con sus respectivas columnas
    			$cadena .= '<tr><td>' . $fila['nombrepro'] . '</td><td>' . $fila['domiciprof'] . '</td><td>' . $fila['teprof'] . '</td><td>' . $fila['locaprof'] . '</td>';
			}

				if($nroprofesio!=0 && ($localidad!="" && $nombre!=""))
			    $cadenas = "";
			else
			    $cadenas = array($cadena, $lista);

			echo json_encode($cadenas);
			//echo $lista;

		}
		break;
	
	default:
		# code...
		break;
}
