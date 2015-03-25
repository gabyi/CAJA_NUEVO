
<html>
<h1><em><strong>Aplicativo para utilizar en los registro cuyo codmateria son (61, 62, 63, 119, 174, 400)</strong></em></h1>

<?php

//// esto es lo mismo que antes
function conectarse()
{
	if (!($link=mysql_connect("www.cforense.org","cfore2","O55ur+wodge"))) {
		echo("Error al Conectarse al Servidor");
		exit();
	}
	if (!mysql_select_db("cfore2",$link)) {
		echo "Error al seleccionar la Base de Datos";
		exit();
	}
	return $link;
}

/// Datos Nuevos
if ($consultar) {
		?>	
		<table border="1" width="500" align="center">
	 		<tr><th><td><h2><u><p align="center">Acervo Hereditario</p> </u></h2></td></th></tr>
	 	</table>	
		  <table border="1" width="500" align="center">
		    <tr>
		      <th scope="row">&nbsp;</th>
		      <td><em><strong>Bienes en la Provincia de La Pampa </strong></em></td>
		      <td><em><strong>Bienes Extra&ntilde;a Jurisdicci&oacute;n </strong></em></td>
		    </tr>
		    <tr>
		      <th scope="row">Bienes Gananciales: </th>
		      <td><p align="right">$ <? echo number_format($bg1,2); ?> </p></td>
		      <td><p align="right">$ <? echo number_format($bg2,2); ?> </td>
		    </tr>
		    <tr>
		      <th scope="row">Bienes Propios: </th>
		      <td><p align="right">$ <? echo number_format($bp1,2); ?> </td>
		      <td><p align="right">$ <? echo number_format($bp2,2); ?> </td>
		    </tr>		  
		  </table>
  
  <?php
} else {
	
?>
	
<form id="form1" name="form1" method="post" action="">
  <h2><u>Acervo Hereditario:</u></h2>
 <h3><u>(Datos necesarios para calcular el costo)</u></h3>
  <table width="200" border="1">
    <tr>
      <th scope="row">&nbsp;</th>
      <td><em><strong>Bienes en la Provincia de La Pampa </strong></em></td>
      <td><em><strong>Bienes Extra&ntilde;a Jurisdicci&oacute;n </strong></em></td>
    </tr>
    <tr>
      <th scope="row">Bienes Gananciales: </th>
      <td><input type="text" name="bg1" /></td>
      <td><input type="text" name="bg2" /></td>
    </tr>
    <tr>
      <th scope="row">Bienes Propios: </th>
      <td><input type="text" name="bp1" /></td>
      <td><input type="text" name="bp2" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  
   <label>
      <input type="radio" name="sel" value="1" checked="checked"/>
      Actúa con Poder (Apoderado) </label>
    <br />
    <label>
      <input type="radio" name="sel" value="2" />
      Actúa por Derecho Propio (Letrado)</label>
    <br />
    <label>
	<input type="checkbox" name="oficio" />Oficio Ley 22.172</label>
  
  <p>&nbsp; </p>
  
    <label>
      <input type="submit" name="consultar" value="Calcular" />
    </label>
  </p>
</form>


<?php
}

/// datos nuevos
if ($consultar) {	


	$sql = "select * from ValoresCajaRentas where Materia = 'SUCESION AB-INTESTATO' order by Materia";
	$link = conectarse();
	$result = mysql_query($sql,$link); //consulta
	$vtotal = 0;
	
		
	// Muestra Resultados Caja Forense	
	echo("<p>&nbsp;</p><div align='center'><table border='2'><tr align='center'><th align='center' scope='row'><h2>Ingresos al inicio del proceso</h2>");
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
echo ("</table></table>");	




	if ($oficio) {$sel = 1;}
	if ($sel < 2) {$vhonorarios = ($bg1 + ($bg2 / 3 * 2)) * 0.0693 + ($bp1 + ($bp2 / 3 * 2)) * 0.0924;
	if ($oficio) {$vhonorarios = $vhonorarios / 3;}}
		else {$vhonorarios = ($bg1 + ($bg2 / 3 * 2)) * 0.0495 + ($bp1 + ($bp2 / 3 * 2)) * 0.066;}
	echo("<p>&nbsp;</p><div align='center'><table border='2'><tr align='center'><th align='center' scope='row'><h2>Ingresos previo a inscribirse los bienes</h2>");
	
	if ($sel < 2) {}		 
		else {echo("<p>Actúa por Derecho Propio</p>");}

	
		if ($oficio) {echo ("<p>Oficio Ley 22.172</p>");}
			else {echo ("<p>Actúa con Poder</p>");}			 
		



	Echo ("<p><b>Honorarios M&iacute;nimos según Ley de Aranceles: $ ".number_format($vhonorarios,2)." </b></p>");
	echo("<br/><u>Caja Forense de La Pampa</u>");
	echo ('<table border="1" width="500" align="center">');
	$vcontribuciones = ($bg1 + $bg2 + $bp1+$bp2)*0.005;
	
	echo ("<tr width='328'><td><p align='center'><b>Contribuciones: </b></p></td><td><p align='right'>$ ".number_format($vcontribuciones,2)." </p></td></tr>");
	$vaportes = $vhonorarios*0.15;	
	Echo ("<tr><td><p align='center'><b>Aportes: </b></td><td><p align='right'>$ ".number_format($vaportes,2)." </p></td></tr>");
	Echo ("<tr><td><p align='center'><b>Total:</b></td><td><p align='right'>$ ".number_format($vaportes + $vcontribuciones,2)." </b></p></td></tr></table>");
	
	/// de Rentas
	
	echo("<br/><u>Dirección General de Rentas</u>");
	echo ('<table border="1" width="500" align="center">');
	if ($oficio) {echo ("No Se debe Ingresar");}
	else {
			if(mysql_result($result, 0, "rentas_fin_general")>0) {echo "<tr><td><p>* Tasa General: $ ".number_format(mysql_result($result, 0, "rentas_fin_general"),2)."</p></tr></td>"; 
				}
			
			
			if(mysql_result($result, 0, "rentas_fin_tfija")>0) {
				echo "<tr width='450'><td><p align='center'><b>Tasa Especial Fija: </b></p></td><td><p align='right'> $";
				$vap = round(mysql_result($result, 0, "rentas_fin_tfija")/100*($bg1+$bp1), 2);	
				echo number_format($vap,2)." (".mysql_result($result, 0, "rentas_fin_tfija")." %)</p></td></tr>";
			}
			
			if(mysql_result($result, 0, "rentas_fin_tvariable")>0) {
				echo "<p>* Tasa Especial Variable:  $";
				$vap = round(mysql_result($result, 0, "rentas_fin_tvariable")/100*($bg1+$bp1), 2);	
				echo number_format($vap,2)." (".mysql_result($result, 0, "rentas_fin_tvariable")." %)";}
		}
		echo("</table>");
	}

echo("</table>")

?>   

</html>
