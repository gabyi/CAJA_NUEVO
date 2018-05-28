<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Jurisprudencia</title>
</head>
<body>
	<?php 
	include "../conexion.php";
		//echo "Variable $ident: ".$_GET['id']."<br>";
		$consulta = mysql_query("SELECT * FROM cfjuri WHERE ident=".$_GET['id'], $conexion) or die("No se encuentra producto: $sumario " . mysql_errno());
		$fila = mysql_fetch_array($consulta);
		//echo "Ya consultado :".$fila["Titulo"];
	 ?>
<table width="75%" border="1" bgcolor="#FFFFFF" bordercolor="#003366" bordercolorlight="#003366" bordercolordark="#003366" align="center">
  <tr bgcolor="#004080"> 
    <td> 
      <div align="center"><b><font color="#FFFFFF"><?php echo $fila['Titulo']; ?></font></b></div></td>
  </tr>
</table>
<p>&nbsp;</p>
<hr>
<table width="75%" border="1" bordercolor="#003366" bordercolorlight="#003366" bordercolordark="#003366" align="center">

  <tr bgcolor="#F2F2F2"> 
    <td><font color="#004080"><?php echo $fila['Sumario']; ?>
 </font></td>
  </tr>
</table>
<br>
<table width="75%" border="1" bordercolorlight="#003366" bordercolordark="#003366" bordercolor="#003366" align="center">
  <tr bgcolor="#F2F2F2"> 
    <td><font color="#004080"><b><?php echo $fila['Fallo']; ?>
   </b></font></td>
  </tr>
</table>
<hr>
</body>
</html>