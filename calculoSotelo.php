<?php date_default_timezone_set('UTC'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Caja Forense de Abogados de La Pampa</title>
	<style>body, td, th {font-family:Arial, Helvetica, sans-serif; font-size:10px;color:#4d4d4d;}</style>
	<link href='css/bootstrap.min.css' rel='stylesheet'>
  <link href='css/fuentes.css' rel='stylesheet'>
</head>
<body onload='window.print()' bgcolor='#ffffff'><img style='width: 100%' src='imagenes/logos/Sin titulo.png'>

	<?php 
	
	$concepto= $_GET["concepto"];
	$fOrigen= $_GET["fOrigen"];
	$fCalc= $_GET["fCalc"];
	$mix= $_GET["mix"];
  $compensado= $_GET["compensado"];
  $simple= $_GET["simple"];
	$importe= $_GET["importe"];

  $mixEnPlata= (($mix/100)* $importe);
  $promedioTasas= ($mix+$compensado)/2;

  if($promedioTasas<$simple)
  {
    $tasaDefinitiva= "Promedio Tasa Mix y Compuesta";
    $tasaFinal= $promedioTasas;
  }else
    {
      $tasaDefinitiva= "Tasa Interes Simple 3%";
      $tasaFinal= $simple;
    }

$tasaFinalEnPlata= round($tasaFinal/100*$importe,2);

/////////////////////////////////////////////////////////////fecha en catellano//////////////////////////////////////////////////////////////////////////////
$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
 
$fechaActual= $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


		 
	echo "<div align='center'><h3>Cálculo de Intereses mediante el método de Inter&eacute;s Mensual Compuesto</h3></div>";
	echo "<div align='center'><h4>Monto a Calcular: $ ".number_format($importe,2)."</h4></div>";
	echo("<br/>");
  echo("<div align='center'><h4>Desde el : " .$fOrigen. " Hasta el: " .$fCalc. "</h4></div>");
  echo("<br/>");
  echo("<h4>Períodos Calculados</h4>");
  echo('<table width="100%" border="0"><tr><td width="45%" valign="top"><table border="0" width="100%"><thead><tr><th style="text-align:center;">Desde</th><th style="text-align:center;">Hasta</th><th style="text-align:center;">Tasa</th></thead><tbody>');

  include "conexion.php";
    
      // le doy diferente formato
    list($dia0, $mes0, $año0) = split('[/.-]', $fOrigen);
    list($dia1, $mes1, $año1) = split('[/.-]', $fCalc);

    $vfecha1 = $año0 . "-" . $mes0 . "-" . $dia0;
    $vfecha2 = $año1 . "-" . $mes1 . "-" . $dia1;

    if(($año0 == $año1)&&($mes0 == $mes1))
      {
        $consulta  = "select * from tmix where fecha <= '".$vfecha2."' order by fecha desc LIMIT 1";
        $query     = mysql_query($consulta) or die("no se puedo hacer la consulta paso 1 de consultatasas.php");
        $cantFilas=  mysql_num_rows($query);
        $mitad= ceil($cantFilas/2);
      }else
        {
          $consulta  = "select * from tmix where fecha >= '" . $vfecha1 . "' and fecha <= '".$vfecha2."'";
          $query     = mysql_query($consulta) or die("no se puedo hacer la consulta paso 1 de consultatasas.php");
          $cantFilas=  mysql_num_rows($query);
          $mitad= ceil($cantFilas/2);
        }

    

    $cabeza=false;
    for ($i=0; $i < $cantFilas; $i++) 
    { 
      $fila= mysql_fetch_array($query);
      if($fila['indice']<2)
        $fila['indice']=2;      

      if (($i+1>$mitad) && (!$cabeza)) 
      {
        $cabeza=true;
        echo('</tbody></table><td width="5%">&nbsp;</td><td width="45%" valign="top"><table border="0" width="100%"><thead><tr><th style="text-align:center;">Desde</th><th style="text-align:center;">Hasta</th><th style="text-align:center;">Tasa</th></thead><tbody>');
      }
      if($i<1)
        echo('<tr><td align="center">' .$fOrigen. '</td><td align="center">' .formatDia($fila['fecha']). '</td><td align="center">' .number_format($fila['indice'],2). '</td></tr>');
      else
      {
        if($i< ($cantFilas-1))
          echo('<tr><td align="center">' .sumaDia($hasta,1). '</td><td align="center">' .formatDia($fila['fecha']). '</td><td align="center">' .number_format($fila['indice'],2). '</td></tr>');
        else
          echo('<tr><td align="center">' .sumaDia($hasta,1). '</td><td align="center">' .$fCalc. '</td><td align="center">' .number_format($fila['indice'],2). '</td></tr>');
      }
    
      $desde= $fila['fecha'];
      $hasta=$fila['fecha'];
    }

  echo('</tbody></table></table>');
  echo('<br/><div style="width:75%;margin-left:10%;margin-right:15%;border:1px black solid;"><table border="0" width="100%"><tr><td width="20%" rowspan="5">&nbsp;</td>');
  echo('<td>Interes Simple Tasa Mix:</td><td align="right">' .number_format($mixEnPlata,2). '</td><td align="right">' .number_format($mix,2). '%</td><td width="10%" rowspan="5">&nbsp;</td></tr>');
  echo('<tr><td>Interes Compuesto:</td><td align="right">' .number_format(($compensado/100)*$importe,2). '</td><td align="right">' .number_format($compensado, 2). '%</td></tr>');
  echo('<tr><td>Promedio ambas tasas:</td><td align="right">' .round(($promedioTasas/100)*$importe,2). '</td><td align="right">' .number_format($promedioTasas,2). '%</td></tr>');
  echo('<tr><td colspan="3"><hr></td></tr>');
  echo('<tr><td>Interes Simple 3%:(' .cantDias($fOrigen, $fCalc). ' Días)</td><td align="right">' .round(($simple/100)*$importe,2). '</td><td align="right">' .number_format($simple,2). '%</td></tr>');
  echo('</table></div>');
  echo('<br/><div style="width:75%;margin-left:10%;margin-right:15%;border:1px black solid;"><table border="0" width="100%"><tr><td width="20%" rowspan="4">&nbsp;</td>');
  echo('<td>Tasa Definitiva:</td><td align="right">' .$tasaDefinitiva. '</td><td width="10%" rowspan="4">&nbsp;</td></tr>');
  echo('<tr><td>Monto:</td><td align="right">' .number_format($importe,2). '</td></tr>');
  echo('<tr><td>Interes:</td><td align="right">' .number_format($tasaFinalEnPlata,2). '</td></tr>');
  echo('<tr><td>Total Monto Actualizado:</td><td align="right">' .number_format($importe+($tasaFinal/100)*$importe,2). '</td></tr>');
  echo('</table></div><br>');
  echo("<div id='total-IniFin' class= 'well well-sm'>La información que se suministra no tiene validez legal. Los datos son meramente informativos, por lo que no constituyen ni reemplazan las liquidaciones formales que efectúan la Caja Forense de La Pampa y la Dirección General de Rentas. Para la programación de este aplicativo se han tomado como referencia las disposiciones de la Ley 1861 y de la Ley Impositiva. Valor Provisorio de Tasas impreso el día ".$fechaActual.".-</div>");
?>

<?php 

function sumaDia($fecha, $dias)
{
	//$fecha="2005-10-03";  tu sabrás como la obtienes, solo asegurate que tenga este formato
	//$dias= 1; // los días a restar

	$final= date("Y-m-d", strtotime("$fecha +$dias day"));
	list($dia0, $mes0, $año0) = split('[/.-]', $final);
	$modificada= $año0 . "/" . $mes0 . "/" . $dia0;

	return $modificada;
}

function formatDia($fecha)// aaaa-mm-dd a dd/mm/aaaa
{
  list($año0, $mes0, $dia0) = split('[/.-]', $fecha);
  $fecha= $dia0 . "/" . $mes0 . "/" . $año0;

  return $fecha;
}

function cantDias($diaIni, $diaFin)
{
  // le doy diferente formato
  list($dia0, $mes0, $año0) = split('[/.-]', $diaIni);
  list($dia1, $mes1, $año1) = split('[/.-]', $diaFin);
  $vfecha0 = $año0 . "-" . $mes0 . "-" . $dia0;
  $vfecha1 = $año1 . "-" . $mes1 . "-" . $dia1;
  ////////////////////////////////////////////////////////// 

  $vfdesde=strtotime($vfecha0);
  $vfhasta=strtotime($vfecha1);



  $difSegundos= $vfhasta-$vfdesde;
  $dias=intval($difSegundos/60/60/24); //cant de dias entre las fechas

return $dias;
}

 ?>
</body>
</html>