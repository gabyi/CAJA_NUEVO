<?php
// ESTE PHP SE UTILIZA EN PADRON.PHP  

$campo1   = $_REQUEST['campo1'];
$campo2   = $_REQUEST['campo2'];
$campo3   = $_REQUEST['campo3'];
$lista    = '';
$tipo     = $_REQUEST['tipo'];

include "../conexion.php";

switch ($tipo) {
	case 'padron':
		{

			// Hago de nuevo las consultas para paginar con el limite que impongo en nroLotes

			if ($campo2 != "") {
			    $consulta    = mysql_query("SELECT * FROM profesio1 WHERE locaprof='" . $campo2 . "' order by nombrepro asc ", $conexion) or die("No se encuentra producto: $buscar " . mysql_errno());
    			$nroprofesio = mysql_num_rows($consulta);
			} else {	
    			$consulta    = mysql_query("SELECT * FROM profesio1 WHERE nombrepro='" . $campo1. "'", $conexion) or die("No se encuentra producto: $buscar " . mysql_errno());
    			$nroprofesio = mysql_num_rows($consulta);
			}	

			while ($fila = mysql_fetch_array($consulta)) {
    			//Aca le das el formato a tu respuesta. En ste caso creas una fila con sus respectivas columnas
    			$cadena .= '<tr><td>' . $fila['nombrepro'] . '</td><td>' . $fila['domiciprof'] . '</td><td>('.$fila['prefijo'].') ' . $fila['teprof'] . '</td><td>' . $fila['locaprof'] . '</td>';
			}

				if($nroprofesio!=0 && ($campo2!="" && $campo1!=""))
			    $cadenas = "";
			else
			    $cadenas = array($cadena, $lista);

			echo json_encode($cadenas);
			//echo $lista;

		}
		break;

	case 'jurisprudencia':
		{/*
			$cadena .= '<tr><td>' . $campo1 . '</td><td>' . $campo2 . '</td><td>' . $campo3 . '</td><td>EXITO</td>';
			//echo json_encode($cadena);
			echo $cadena;
			*/
					
			//$cadena .= '<tr><td>hay valores</td>';
			if($campo1!=""&&$campo2==""&&$campo3=="")
				{
					$consulta = mysql_query("SELECT * FROM cfjuri WHERE Titulo LIKE '%" . $campo1 . "%' ORDER BY ident DESC", $conexion) or die("No se encuentra producto: $titulo " . mysql_errno());
				}
			if($campo1==""&&$campo2!=""&&$campo3=="")
				{
					$consulta = mysql_query("SELECT * FROM cfjuri WHERE Sumario LIKE '%" . $campo2 . "%' ORDER BY ident DESC", $conexion) or die("No se encuentra producto: $sumario " . mysql_errno());
				}
			if($campo1==""&&$campo2==""&&$campo3!="")
				{
					$consulta = mysql_query("SELECT * FROM cfjuri WHERE Fallo LIKE '%" . $campo3 . "%' ORDER BY ident DESC", $conexion) or die("No se encuentra producto: $fallo " . mysql_errno());
				}else
					{
						if ($campo1!=""&&$campo2!=""&&$campo3=="") 
						{
							$consulta = mysql_query("SELECT * FROM cfjuri WHERE Titulo LIKE '%".$campo1."%'AND Sumario LIKE '%".$campo2."%' ORDER BY ident DESC", $conexion) or die("No se encuentra producto: $sumario " . mysql_errno());
						}
						if ($campo1!=""&&$campo2==""&&$campo3!="") 
						{
							$consulta = mysql_query("SELECT * FROM cfjuri WHERE Titulo LIKE '%".$campo1."%'AND Fallo LIKE '%".$campo3."%' ORDER BY ident DESC", $conexion) or die("No se encuentra producto: $sumario " . mysql_errno());
						}
						if($campo1==""&&$campo2!=""&&$campo3!="")
						{
							$consulta = mysql_query("SELECT * FROM cfjuri WHERE Fallo LIKE '%".$campo3."%'AND Sumario LIKE '%".$campo2."%' ORDER BY ident DESC", $conexion) or die("No se encuentra producto: $sumario " . mysql_errno());
						}
						if($campo1!=""&&$campo2!=""&&$campo3!="")
						{
							$consulta = mysql_query("SELECT * FROM cfjuri WHERE Titulo LIKE '%".$campo1."%'AND Sumario LIKE '%".$campo2."%' AND Fallo LIKE '%".$campo3."%' ORDER BY ident DESC", $conexion) or die("No se encuentra producto: $sumario " . mysql_errno());
						}
					}
				

			while ($fila = mysql_fetch_array($consulta))
				{
    				//Aca le das el formato a tu respuesta. En ste caso creas una fila con sus respectivas columnas
    				$cadena .= '<tr><td><a href="php/muestraJuris.php?id='.$fila['ident'].'" target="_blank">'.$fila['Titulo'].'</a></td>';
				}



			$cadenas = array($cadena, $lista);
			echo json_encode($cadenas);
		}
		break;
	
	/*default:
		# code...
		break;*/
}
