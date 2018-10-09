  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="js/jquery-1.10.2.js"></script>
  <script src="js/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
    
    <!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>


<?php
date_default_timezone_set('UTC');
ECHO "Emitiendo Informe de ". $_REQUEST['cod']. " - ".$_REQUEST["informe"];

include 'conexion.php';
$link = $conexion;


IF ($_REQUEST["informe"]=="ingresos") {
	$sql = "select * from ingresos where codprof = '".$_REQUEST['cod']."' order by fecha";			
	$result = mysql_query($sql,$link);
	
	if (!$result) {
	    die('Could not query:' . mysql_error());
	}
	?>
	<table class="table table-striped" style="width:100%">
		<thead>
	  		<tr>
			    <th>Fecha</th>
			    <th>Boleta</th>	    
			    <th>Caratula</th>
			    <th>Aportes</th>	   
		  	</tr>
		</tread>
		<tbody>
	  
			<?php
			$total = 0;
			while ($row = mysql_fetch_array($result)) {
				echo "<tr><td style='width:10%'>".date("d-m-Y", strtotime($row["fecha"]))."</td>"; 
				echo "<td>".$row["boleta"]."</td>";
				echo "<td>".$row["caratula"]."</td>";		
				echo "<td>".number_format($row["aportes"],2)."</td>";
				$total = $total + $row["aportes"];
			}
				echo "<tr><th></th><th></th><th></th><th>".number_format($total,2)."</th>";
		echo "</tbody>";
	echo "</table>";
	}


////// Calculos Egresos ////



IF ($_REQUEST["informe"]=="egresos") {
	$sql = "select * from Egresos where codprof = '".$_REQUEST['cod']."'";	
	$link = $conexion;
	$result = mysql_query($sql,$link);
	
	if (!$result) {
	    die('Could not query:' . mysql_error());
	}
	?>
	<table  class="table table-striped" style="width:100%">
	  <tr>
	    <th scope="col">Fecha</th>
	    <th scope="col">Concepto</th>	    
	    <th scope="col">Egresos Abonados</th>
	    <th scope="col">Diferencia Res. 1014/09</th>
	    <th scope="col">Tope Cuota OSDE</th>			   
	  </tr>
	  
	<?php
	$total1 = 0;
	$total2 = 0;	
	
	while ($row = mysql_fetch_array($result)) {
		echo "<tr><td>".date("d-m-Y", strtotime($row["fecha"]))."</td>"; 
		echo "<td>".$row["concepto"]."</th>";
		echo "<td>".number_format($row["debitoreti"],2)."</td>";
		echo "<td>".number_format($row["debito"],2)."</td>";
		echo "<td>".number_format($row["tope"],2)."</td>";
		$total1 = $total1 + $row["debitoreti"];
		$total2 = $total2 + $row["debito"];

	}
		echo "<tr><th></th><th></th><th>".number_format($total1,2)."</th>";
		echo "<th>".number_format($total2,2)."</th><th></th>";
	echo "</table>";
	}

IF ($_REQUEST["informe"]=="deudas") {
	$sql = "select * from deudas where codprof = '".$_REQUEST['cod']."'";	
	$link = $conexion;
	$result = mysql_query($sql,$link);
	
	if (!$result) {
	    die('Could not query:' . mysql_error());
	}
	?>
	<table width="100%" border="2" cellpadding="1">
	  <tr>
	    <th scope="col">Fecha</th>
	    <th scope="col">Concepto</th>
	    <th scope="col">Deuda</th>
	    <th scope="col">Interes</th>
	    <th scope="col">Multa</th>
	  </tr>
	  
	<?php
	$total1 = 0;
	$total2 = 0;
	$total3 = 0;
	
	while ($row = mysql_fetch_array($result)) {
		echo "<tr><th>".$row["fecha"]."</th>"; 
		echo "<th>".$row["concepto"]."</th>";
		echo "<th>".number_format($row["aportes"],2)."</th>";
		echo "<th>".number_format($row["interes"],2)."</th>";
		echo "<th>".number_format($row["multa"],2)."</th></tr>";
		$total1 = $total1 + $row["aportes"];
		$total2 = $total2 + $row["interes"];
		$total3 = $total3 + $row["multa"];
	}
	echo "<tr><th></th><th></th><th>".number_format($total1,2)."</th><th>".number_format($total2,2)."</th><th>".number_format($total3,2)."</th>";
	$total1 = $total1+$total2+$total3;
	echo "<tr><th></th><th>Total General:</th><th>".number_format($total1,2)."</th>"; 
	echo "</table>";
	}
?>