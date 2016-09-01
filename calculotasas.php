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
  $vfecha0=$año0."-".$mes0."-".$dia0;
  $dia=$dia0;
  $mes=$mes0;
  $año=$año0;

  if ($mes0 == 12) {
    $mes = 1;
    $año ++;
  }else {
    $mes ++;
  }


  $vfecha1 = $año."-".$mes."-".$dia;
  $vfecha2 = $año1."-".$mes1."-".$dia1;
  

  if($mes1==$mes0 && $año0==$año1)
    {
      $consulta="select indice from ".$tasa." where MONTH(fecha) = '".$mes0."' AND YEAR(fecha) = '".$año0."' ";  
      $query= mysql_query($consulta) or die ("no se pudo realizar la consulta paso 1");  
      $numeroDias = cal_days_in_month(CAL_GREGORIAN, $mes0, $año0);
      $dias=($dia1+1)-$dia0;
      $fila=  mysql_fetch_array($query);
      $vindice_final =  round($fila['indice']/$numeroDias* $dias,2);

    }else
      {
      // realiza la consulta 1 de 3 

      $consulta="select sum(indice) as indice from ".$tasa." where fecha >= '".date("Y-m-d", strtotime($vfecha1))."' and fecha < '".date("Y-m-d", strtotime($vfecha2))."' ";   
      $query= mysql_query($consulta) or die ("no se pudo realizar la consulta paso 2");  
      $fila= mysql_fetch_array($query);
      $vindice_final =  $fila["indice"];
     
      // consulta 2 de 3 el mes inicial

      $consulta="select indice from ".$tasa." where MONTH(fecha) = '".$mes0."' AND YEAR(fecha) = '".$año0."' ";  
      $query= mysql_query($consulta) or die ("no se pudo realizar la consulta paso 3");  
      $fila= mysql_fetch_array($query);
      $numeroDias = cal_days_in_month(CAL_GREGORIAN, $mes0, $año0); 
      $vindice_final = $vindice_final + ($fila['indice']/$numeroDias* ($numeroDias-$dia0+1));
      
  
      // consulta 3 de 3 el mes final
  
      $consulta="select indice from ".$tasa." where MONTH(fecha) = '".$mes1."' AND YEAR(fecha) = '".$año1."' ";  
      $query= mysql_query($consulta) or die ("no se pudo realizar la consulta paso 4");  
      $numeroDias = cal_days_in_month(CAL_GREGORIAN, $mes1, $año1);
      $fila=  mysql_fetch_array($query);
      $vindice_final =  round($vindice_final + (($fila['indice']/$numeroDias* $dia1)),2);

    
    }//del else si es un mismo mes el calculo

}

?>