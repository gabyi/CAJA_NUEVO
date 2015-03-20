<head>
<title>Consulta de Liquidación de Expedientes</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<style type="text/css">
<!--
.Estilo1 {
	font-size: large;
	font-weight: bold;
	font-style: italic;
}
-->
</style>
</head>

<body>
<?php
include("titulo.php");
function conectarse()
{
	if (!($link=mysql_connect("www.cforense.org","cfore2","ossur+wodge"))) {
		echo("Error al Conectarse al Servidor");
		exit();
	}
	if (!mysql_select_db("cfore2",$link)) {
		echo "Error al seleccionar la Base de Datos";
		exit();
	}
	return $link;
}

			?>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			
			
			<div align="center">

<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="480" height="125">
  <param name="movie" value="loto.swf" />
  <param name="quality" value="high" />
  <param name="allowScriptAccess" value="always" />
  <param name="wmode" value="transparent">
     <embed src="loto.swf"
      quality="high"
      type="application/x-shockwave-flash"
      WMODE="transparent"
      width="480"
      height="125"
      pluginspage="http://www.macromedia.com/go/getflashplayer"
      allowScriptAccess="always" />
</object>
</div>
			
			
			
		<form id="form1" name="form1" method="post" action="consulta.php">
		  <div align="center"><span class="Estilo1">
		    <label>
		    <u>Consulta de  Liquidaci&oacute;n de Expedientes:</u></span>  </div>
		  <div align="center"><br />
		    <br />
		    <span class="Estilo1">1)</span> Seleccione el Tipo de Juicio:				
		    <select name="juicio" size="1" value="<? echo $juicio; ?>">
		    	
				<?php
			 	// CARGA LA LISTA
				 $link = conectarse();
		   		$result = mysql_query("select materia from ValoresCajaRentas order by Materia",$link); //consulta
		 	  	while ($row = mysql_fetch_array($result)) {
		   			echo("<option>".$row["materia"]."</option>");
		   		} 
		   		//mysql_free_result($result)	
				?>	
		           
		    </select>
		    <div align="center">
			<span class="Estilo1">2)</span> Ingrese el Monto del Juicio:				
			<input type="text" name="monto" value ="0.00" />
			<input type="submit" name="consultar" value="Consultar" />		    
		  </div>
		  </label>			
<?php
if($consultar) {

	// realiza la consulta
	$sql = "select * from ValoresCajaRentas where Materia = '".$juicio."' order by Materia";
	$link = conectarse();
	$result = mysql_query($sql,$link); //consulta
	$vtotal = 0;
	
	echo('<img src="linea.gif" width="100%" height="10" alt="" />');
	echo('<p align="right"><img src="volver.gif" alt="" width="46" height="17" onclick="history.back()"/></p>');
	
	echo "<p>&nbsp;</p><div align='center'><table border='2'><tr align='center'><th align='center' scope='row'><h2> Materia: ".mysql_result($result, 0, "materia")." </h2>";
	echo "<h3> CÓdigo Materia: ".mysql_result($result, 0, "codmateria")."</h3>";   /// muestra los resultados
	echo "<h3> Monto del Juicio: $ ".number_format($monto,2)."</h3></table></div>";   /// muestra los resultados
		
	// Muestra Resultados Caja Forense	
	echo("<p>&nbsp;</p><div align='center'><table border='2'><tr align='center'><th align='center' scope='row'><h2>Ingresos al Inicio del Proceso</h2>");
	echo("<br/><u>Caja Forense de La Pampa</u>");
	echo ('<table border="1" width="500" align="center">');		
	if(mysql_result($result, 0, "bono_ley")>0) {echo "<tr width='328'><th scope='row'><p>Bono Ley N° 422:</th><td WIDTH='180' align='right'>$ ".number_format(mysql_result($result, 0, "bono_ley"),2)."</p></td></tr>"; 
	$vtotal=mysql_result($result, 0, "bono_ley");
	}
	
	if(mysql_result($result, 0, "caja_inicio_aporte")>0) { echo "<tr><th scope='row'><p>Aportes:</th><td width0'180' align='right'>$ ".number_format(mysql_result($result, 0, "caja_inicio_aporte"),2)."</p></td></tr>";
	$vtotal = $vtotal + mysql_result($result, 0, "caja_inicio_aporte");
	}
	if(mysql_result($result, 0, "caja_inicio_ap_porc")>0) {
		echo "<tr><th scope='row'><p>Aportes:</th><td align='right'>$ ";
		$vap = round(mysql_result($result, 0, "caja_inicio_ap_porc")/100*$monto, 2);
		if ($vap > 60) {echo number_format($vap,2); $vtotal = $vtotal + $vap;} 
		else { echo "60.00"; $vtotal = $vtotal + 60;}
		echo "<td align='right'>(".mysql_result($result, 0, "caja_inicio_ap_porc")." %)</td></p></td></tr>";
	}
	
	if(mysql_result($result, 0, "caja_inicio_cont_porc")>0) {
		echo "<tr><th scope='row'><p>Contribuciones:</th><td align='right'>$ ";
		$vap = round(mysql_result($result, 0, "caja_inicio_cont_porc")/100*$monto, 2);
		if ($vap > 40) {echo number_format($vap,2); $vtotal = $vtotal + $vap;} else {echo "40.00"; $vtotal = $vtotal + 40;}
		echo " <td align='right'>(".mysql_result($result, 0, "caja_inicio_cont_porc")." %)</td></p></td></tr>";
	}
	
	if(mysql_result($result, 0, "caja_inicio_cont")>0) {
		echo "<tr><th scope='row'><p>Contribuciones: </th><td align='right'>$ ".number_format(mysql_result($result, 0, "caja_inicio_cont"),2)."</p></td></tr>";
		$vtotal = $vtotal + mysql_result($result, 0, "caja_inicio_cont");
	}
	
	echo "<tr><th scope='row'><p><h3>Total: </h3></th><td align='right'><h3>$ ".number_format($vtotal,2)."</h3>";
	
	echo('</table>');
	 $vtotal = 0;

	echo("<br/><u>Dirección General de Rentas</u>");

	echo ('<table border="1" width="500" align="center">');////////    aca
	
	if(mysql_result($result, 0, "rentas_inicio_general")>0) { echo "<tr width='328'><th scope='row'><p>Tasa General: </th><td width='180' align='right'>$ ".number_format(mysql_result($result, 0,"rentas_inicio_general"),2)."</p></td></tr>";
	$vtotal = $vtotal + mysql_result($result, 0,"rentas_inicio_general");
	}

	if(mysql_result($result, 0, "rentas_inicio_tfija")>0) { echo "<tr width='328'><th scope='row'><p>Tasa Especial Fija:</th><td WIDTH='180' align='right'> $ ".number_format(mysql_result($result, 0,"rentas_inicio_tfija"),2)."</p></td></tr>";
	$vtotal = $vtotal + mysql_result($result, 0,"rentas_inicio_tfija");
	}
	
	
	if(mysql_result($result, 0, "rentas_inicio_tvariable")>0) {
		echo "<tr><th scope='row'><p>Tasa Especial Variable: </th><td align='right'>$";
		$vap = round(mysql_result($result, 0, "rentas_inicio_tvariable")/100*$monto, 2);
		$vtotal = $vtotal + $vap;	
		echo number_format($vap,2)."<td align='right'> (".mysql_result($result, 0, "rentas_inicio_tvariable")." %)</td></p></td></tr>";
	}
	
	echo "<tr><th scope='row'><p><h3>Total: </h3></th><td align='right'><h3>$ ".number_format($vtotal,2)."</h3>";
	
	$vtotal = 0;
	
	echo("</table>");
	
	if(mysql_result($result, 0, "caja_inicio_obs")<>'') echo "<p>Observaciones Caja Forense: ".mysql_result($result, 0, "caja_inicio_obs")."</p>";
	echo("</table></table></div>");
	
	echo("<p>&nbsp;</p><div align='center'><table border='2'><tr align='center'><th align='center' scope='row'><h2>Ingresos al Finalizar el Proceso</h2>");
	echo("<br/><u>Caja Forense de La Pampa</u>");
	echo ('<table border="1" width="500" align="center">');

	if(mysql_result($result, 0, "caja_fin_aportes")>0) {echo "<tr width='328'><th scope='row'><p>Aportes: </th><td align='right'>$ ".number_format(mysql_result($result, 0, "caja_fin_aportes"),2)."</p></td></tr>";
	$vtotal = $vtotal + mysql_result($result, 0, "caja_fin_aportes");
	}
	
	if(mysql_result($result, 0, "caja_fin_ap_porc")>0) {
		echo "<tr width='328'><th scope='row'><p>Aportes: </th><td align='right'>$ ";
		$vap = round(mysql_result($result, 0, "caja_fin_ap_porc")/100*$monto, 2);		
		if ($vap > 60) {echo number_format($vap,2);
		$vtotal = $vtotal + $vap;} else {echo "60.00"; $vtotal = $vtotal + 60;}
		echo " <td align='right'>(".mysql_result($result, 0, "caja_fin_ap_porc")." %)</td></p></td></tr>";
	}
	
	
	if(mysql_result($result, 0, "caja_fin_cont")>0) {echo "<tr width='328'><th scope='row'><p>Contribuciones: </th><td align='right'>$ ".number_format(mysql_result($result, 0, "caja_fin_cont"),2)."</p></td></tr>";
	$vtotal = $vtotal + mysql_result($result, 0, "caja_fin_cont");
	}
	
	if(mysql_result($result, 0, "caja_fin_cont_porc")>0) {
		echo "<tr width='328'><th scope='row'><p>Contribuciones: </th><td align='right'>$";
		$vap = round(mysql_result($result, 0, "caja_fin_cont_porc")/100*$monto, 2);
		if ($vap > 40) { echo number_format($vap,2); 
			$vtotal = $vtotal + $vap;}		
		else { echo "40.00"; 	$vtotal = $vtotal + 40;}
		echo "<td align='right'> (".mysql_result($result, 0, "caja_fin_cont_porc")." %)</td></p></td></tr>";
	}

	echo "<tr><th scope='row'><p><h3>Total: </h3></th><td align='right'><h3>$ ".number_format($vtotal,2)."</h3>";
	
	$vtotal = 0;
	
	
	echo("</table>");

	echo("<br/><u>Dirección General de Rentas</u>");
	echo ('<table border="1" width="500" align="center">');
	
	if(mysql_result($result, 0, "rentas_fin_general")>0) {echo "<tr width='328'><th scope='row'><p>Tasa General: </th><td align='right'>$ ".number_format(mysql_result($result, 0, "rentas_fin_general"),2)."</p>"; 
		$vtotal = $vtotal + mysql_result($result, 0, "rentas_fin_general");
	}
	
	
	if(mysql_result($result, 0, "rentas_fin_tfija")>0) {
		echo "<tr width='328'><th scope='row'><p>Tasa Especial Fija:</th><td align='right'> $";
		$vap = round(mysql_result($result, 0, "rentas_fin_tfija")/100*$monto, 2);	
		echo number_format($vap,2)." <td align='right'>(".mysql_result($result, 0, "rentas_fin_tfija")." %)</td></p></td></tr>";
		$vtotal = $vtotal + $vap;
	}
	
	if(mysql_result($result, 0, "rentas_fin_tvariable")>0) {
		echo "<tr width='328'><th scope='row'><p>Tasa Especial Variable:</th><td align='right'> $";
		$vap = round(mysql_result($result, 0, "rentas_fin_tvariable")/100*$monto, 2);	
		echo number_format($vap,2)." <td align='right'>(".mysql_result($result, 0, "rentas_fin_tvariable")." %)</td></p></td></tr>";
		$vtotal = $vtotal + $vap;
	}
	
		echo "<tr><th scope='row'><p><h3>Total: </h3></th><td align='right'><h3>$ ".number_format($vtotal,2)."</h3>";
	
	echo("</table>");
	
	if(mysql_result($result, 0, "caja_fin_obs")<>'') echo "<p>Observaciones Caja Forense: ".mysql_result($result, 0, "caja_fin_obs")."</p></td>";
	
	if(mysql_result($result, 0, "rentas_obs")<>'') echo "<p>Observaciones Rentas: ".mysql_result($result, 0, "rentas_obs")."</p>";



} 
echo("</table></table></div>");
echo "<br/>"
?>

<p>Datos de Referencia:</p>
<ol>
  Manual del Afiliado (LEy 1861)
  Rentas  
</ol>
<p>** Datos  meramente informativo, los cuales no reemplazan las liquidaciones originales de  las instituciones.<br />
**  Proceso a modo de Prueba. Pendiente a ser controlada.</p>
<hr />


</body>
</html>
