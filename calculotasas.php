<?php 

if(!isset($calcular))
	{
  	session_register('contador'); //cuenta las veces que aprete el isset
  	session_register('valores');//guarda los valores de la tabla
  	session_register('totales');//suma los totales
	}

if(isset($calcular) && $_REQUEST["importe"])
{

    
  $vfdesde =$_REQUEST["vfdesde"]; 
  $vfhasta= $_REQUEST["vfhasta"];
  $vmonto = $_REQUEST["vmonto"];
  $tasa= $_REQUEST["tasa"];
  $carat= $_REQUEST["carat"];
  $concep= $_REQUEST["concep"];
  $importe= $_REQUEST["importe"];
  

  include("conexion.php");

  // realiza la consulta toma las variables del formulario

  // incremente 1 mes para calcular los indices entre las 2 fechas
  list($dia0, $mes0, $año0)=split('[/.-]',$vfdesde);
  list($dia1, $mes1, $año1)=split('[/.-]',$vfhasta);

  $vfecha1 = $año0."-".$mes0."-".$dia0;
  $vfecha2 = $año1."-".$mes1."-".$dia1;

  //busco la primera fecha valida para saber si es mayor a la ingresada

  $consulta= "select * from ".$tasa." where fecha >= '".$vfecha1."'";
  $query= mysql_query($consulta) or die("no se puedo hacer la consulta paso 1 de consultatasas.php");
  $fila=mysql_fetch_array($query);
  $firstdate=$fila['fecha'];

  //print("primera fecha de la base de datos: ".$fila['fecha']."<br>");

  /*Comparo las fechas para saber si la fecha ingresada esta dentro del mismo mes que la 
  primer fecha sacda de la base de datos*/

  if($mes1==$mes0 && $año0==$año1)
    {
      $consulta="select indice from ".$tasa." where MONTH(fecha) = '".$mes0."' AND YEAR(fecha) = '".$año0."' ";  
      $query= mysql_query($consulta) or die ("no se pudo realizar la consulta paso 1");  
      $numeroDias = cal_days_in_month(CAL_GREGORIAN, $mes0, $año0);
      $dias=($dia1+1)-$dia0;
      $fila=  mysql_fetch_array($query);
      $vindice_final =  round($fila['indice']/$numeroDias* $dias,2);
    }else{

  	if ($vfecha1 < $firstdate) {
  		$consulta="select indice from ".$tasa." where month(fecha) = '".$mes0."' 
  				and year(fecha) = '".$año0."'";
  		$query=mysql_query($consulta) or die ("No se pudo hace la consulta paso 2 de consultatasas.php");
  		$fila=mysql_fetch_array($query);
  		$numeroDias= cal_days_in_month(CAL_GREGORIAN, $mes0, $año0);
  		$vindice_final= ($fila['indice']/$numeroDias)*($numeroDias-$dia0+1);

  		//print("Indice final de la primer comparacion si son fechas dif: ".$vindice_final."<br>");
  		//ahora conculto la suma de los demas indices a partir del otro mes

  		if ($mes0 == 12) {
    		$mes0 = 1;
    		$año0 ++;
  			}else {
    			$mes0 ++;
  			}

  			$vfecha1 = $año0."-".$mes0."-".$dia0;

  			$consulta="select sum(indice) as indice from ".$tasa." where fecha > '".date("Y-m-d", strtotime($vfecha1))."'
  			and fecha < '".date("Y-m-d", strtotime($vfecha2))."'";
  			$query=mysql_query($consulta) or die ("No se puedo hacer la consulta en pàso 3 de consultadetasas.php");	
  			$fila=mysql_fetch_array($query);
  			$vindice_final= $fila['indice'] + $vindice_final;

  			/*print("Fecha sumado el mes si son fechas dif: ".$vfecha1."<br>");
  			print("Indice sum  si son fechas dif: ".$fila['indice']."<br>");
  			print("Indice final de la segunda consulta si son fechas dif: ".$vindice_final."<br>");
			*/
  			}else{

  			$consulta="select indice from ".$tasa." where month(fecha) = '".$mes0."' 
  				and year(fecha) = '".$año0."'";
  			$query=mysql_query($consulta) or die ("No se pudo hace la consulta paso 2 de consultatasas.php");
  			$numeroDias= cal_days_in_month(CAL_GREGORIAN, $mes0, $año0);
  			$vindice_final= ($fila['indice']/$numeroDias)*($numeroDias-$dia0+1);

  			/*print("cant de dias de la primer comparacion si son fechas iguales: ".$numeroDias."<br>");
  			print("Indice final de la primer comparacion si son fechas iguales: ".$vindice_final."<br>");
  			print("Cant de dias que se calculan comparacion si son fechas iguales: ".($numeroDias-$dia0+1)."<br>");
  			print("Indice comparacion si son fechas iguales: ".$fila['indice']."<br>");*/

  			$consulta="select sum(indice) as indice from ".$tasa." where fecha > '".date("Y-m-d", strtotime($vfecha1))."'
  			and fecha < '".date("Y-m-d", strtotime($vfecha2))."'";
  			$query=mysql_query($consulta) or die ("No se puedo hacer la consulta en pàso 3 de consultadetasas.php");	
  			$fila=mysql_fetch_array($query);
  			$vindice_final= $fila['indice'] + $vindice_final;
  			//print("sumatoria indices de la segunda comparacion si son fechas iguales: ".$fila['indice']."<br>");
  			}

  		 // consulta y calculo indice mes final mes final
  
      	$consulta="select indice from ".$tasa." where MONTH(fecha) = '".$mes1."' AND YEAR(fecha) = '".$año1."' ";  
      	$query= mysql_query($consulta) or die ("no se pudo realizar la consulta paso 4");  
      	$numeroDias = cal_days_in_month(CAL_GREGORIAN, $mes1, $año1);
      	$fila=  mysql_fetch_array($query);
      	$vindice_final =  round($vindice_final + (($fila['indice']/$numeroDias* $dia1)),2);
    }
}
 ?>