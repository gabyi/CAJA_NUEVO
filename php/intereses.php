<?php 
// es por un warning de strtotime function
date_default_timezone_set('UTC');

// Motrar todos los errores de PHP
error_reporting(-1);
 
// No mostrar los errores de PHP
error_reporting(0);
 
// Motrar todos los errores de PHP
error_reporting(E_ALL);
 
// Motrar todos los errores de PHP
ini_set('error_reporting', E_ALL);

if ($_REQUEST["tasa"] == "pactadasimple") 
{

    $tasa    = $_REQUEST["tasa"];
    $pactada = $_REQUEST["pactada"];
    $metodo = "Pactada Simple Mensual";
    //corrijo si es punto o coma en la tasa pactada
    list($peso, $centavo) = split('[,.]', $pactada);
    if ($centavo == "") {
        $centavo = "00";
    }

    $pactada = $peso . "." . $centavo;
    //////////////////////////////////////////////////////////
    $vfdesde = $_REQUEST["vfdesde"];
    $vfhasta = $_REQUEST["vfhasta"];
    //$vmonto = $_REQUEST["vmonto"];
    $importe = $_REQUEST['importe'];
    //$carat= $_REQUEST["carat"];
    $concepto = $_REQUEST["concepto"];

    include "../conexion.php";

    // realiza la consulta toma las variables del formulario

    // le doy diferente formato
    list($dia0, $mes0, $año0) = split('[/.-]', $vfdesde);
    list($dia1, $mes1, $año1) = split('[/.-]', $vfhasta);

    $vfecha1 = $año0 . "-" . $mes0 . "-" . $dia0;
    $vfecha2 = $año1 . "-" . $mes1 . "-" . $dia1;

    //busco la primera fecha valida para saber si es mayor a la ingresada

    $consulta  = "select * from tmix where fecha >= '" . $vfecha1 . "'";
    $query     = mysql_query($consulta) or die("no se puedo hacer la consulta paso 1 de consultatasas.php");
    $fila      = mysql_fetch_array($query);
    $firstdate = $fila['fecha'];

    //a la ultima fecha le resto un dia ya que el ultimo dia no corresponde a sumar intereses

    $vfecha2                   = date('Y-m-d', strtotime('-1 days', strtotime($vfecha2)));
    list($año1, $mes1, $dia1) = split('[/.-]', $vfecha2);
    $vfecha2                   = $año1 . "-" . $mes1 . "-" . $dia1;
    /*echo "Ultima fecha restada: ".$vfecha2;
    echo "dia0: ".$dia0;
    echo "dia1: ".$dia1;*/

    //print("primera fecha de la base de datos: ".$fila['fecha']."<br>");

    /*Comparo las fechas para saber si la fecha ingresada esta dentro del mismo mes que la
    primer fecha sacada de la base de datos*/

    if ($mes1 == $mes0 && $año0 == $año1) {
        $numeroDias    = cal_days_in_month(CAL_GREGORIAN, $mes0, $año0);
        $dias          = ($dia1 + 1) - $dia0;
        $vindice_final = round($pactada / $numeroDias * $dias, 3);
    } else {

/*Comparo fechas si no son del mismo mes*/

        if ($vfecha1 < $firstdate) {
            $numeroDias    = cal_days_in_month(CAL_GREGORIAN, $mes0, $año0);
            $vindice_final = ($pactada / $numeroDias) * ($numeroDias - $dia0 + 1);

            //print("Indice final de la primer comparacion si son fechas dif: ".$vindice_final."<br>");
            //ahora conculto la suma de los demas indices a partir del otro mes

            if ($mes0 == 12) {
                $mes0 = 1;
                $año0++;
            } else {
                $mes0++;
            }

            $vfecha1 = $año0 . "-" . $mes0 . "-" . $dia0;

            $consulta = "select * from tmix where fecha > '" . date("Y-m-d", strtotime($vfecha1)) . "'
        and fecha < '" . date("Y-m-d", strtotime($vfecha2)) . "'"; // utilizo esta consulta para saver cuantas meses tengo que multiplicar la tasa
            $query         = mysql_query($consulta) or die("No se puedo hacer la consulta en pàso 3 de consultadetasas.php");
            $fila          = mysql_num_rows($query);
            $vindice_final = ($pactada * $fila) + $vindice_final;

            /*print("Fecha sumado el mes si son fechas dif: ".$vfecha1."<br>");
        print("Indice sum  si son fechas dif: ".$fila['indice']."<br>");
        print("Indice final de la segunda consulta si son fechas dif: ".$vindice_final."<br>");
         */
        } else {

            $numeroDias    = cal_days_in_month(CAL_GREGORIAN, $mes0, $año0);
            $vindice_final = ($pactada / $numeroDias) * ($numeroDias - $dia0 + 1);

            /*print("cant de dias de la primer comparacion si son fechas iguales: ".$numeroDias."<br>");
            print("Indice final de la primer comparacion si son fechas iguales: ".$vindice_final."<br>");
            print("Cant de dias que se calculan comparacion si son fechas iguales: ".($numeroDias-$dia0+1)."<br>");
            print("Indice comparacion si son fechas iguales: ".$fila['indice']."<br>");*/

            $consulta = "select * from tmix where fecha > '" . date("Y-m-d", strtotime($vfecha1)) . "'
        and fecha < '" . date("Y-m-d", strtotime($vfecha2)) . "'";
            $query         = mysql_query($consulta) or die("No se puedo hacer la consulta en pàso 3 de consultadetasas.php");
            $fila          = mysql_num_rows($query);
            $vindice_final = ($pactada * $fila) + $vindice_final;
            //print("sumatoria indices de la segunda comparacion si son fechas iguales: ".$fila['indice']."<br>");
        }

        // consulta y calculo indice mes final mes final

        $numeroDias    = cal_days_in_month(CAL_GREGORIAN, $mes1, $año1);
        $fila          = mysql_fetch_array($query);
        $vindice_final = round($vindice_final + (($pactada / $numeroDias * $dia1)), 3);
    }
    //coloco la tasa en una variable para que se coloque en la tabla


    //modifico importe porque no suma si hay comas

    list($pesos,$centavos)=split('[,.]', $importe);
    if($centavos=="")
        $centavos=00;
    $importe= $pesos.".".$centavos;

    // calcula intereses

    $intereses = round($importe * ($vindice_final / 100), 3);

    //calculo total

    $total = round($intereses + $importe, 3);

    $cadena = '<td>' . $concepto . '</td><td>' . $metodo . '</td><td>' . $vfdesde . '</td><td>' . $vfhasta . '</td><td>' . $pactada . '</td><td class="totImporte">' .round($importe,3). '</td><td class="totInteres">' . $intereses . '</td><td class="total">' . $total . '</td><td><span class="glyphicon glyphicon-trash" onclick="Eliminar(this)"/></td>';

    echo $cadena;

} else {
    if ($_REQUEST["tasa"]== "compuestaSimple") {
        $tasa=$_REQUEST['pactada'];
        $vfdesde = $_REQUEST["vfdesde"];
        $vfhasta = $_REQUEST["vfhasta"];
        $importe = $_REQUEST['importe'];
        $saltos = $_REQUEST["saltos"];
        $concepto = $_REQUEST["concepto"];


        $lista= tasaCompuestaSimple($importe, $tasa, $vfdesde, $vfhasta, $saltos);
        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        $cadena = '<td>'.$lista[0].'</td><td>Interes pactada Simple</td><td>'.$vfdesde.'</td><td>'. $vfhasta.'</td><td>'.$lista[2].'</td><td class="totImporte">'.round($lista[3],3).'</td><td class="totInteres">'.round($lista[4],3).'</td><td class="total">'.round($lista[5],3).'</td><td><span class="glyphicon glyphicon-trash" onclick="Eliminar(this)"/></td>';
        
      echo $cadena;

    } else 
    {  ///////////////////////////////////////////////////tasa credisur/////////////////////////////////////////////////////////////////////
        if($_REQUEST["tasa"]== "credisur")
        {
            $tasa    = $_REQUEST["tasa"];
            $vfdesde = $_REQUEST["vfdesde"];
            $vfhasta = $_REQUEST["vfhasta"];
            $importe = $_REQUEST['importe'];
            $concepto = $_REQUEST["concepto"];

        $porcentajeMix= listaTasaMix($vfdesde, $vfhasta); // tengo la tasa mix de los dias
        
        $porcentajeCompensado=listaTasaCompensada($importe, $porcentajeMix, $vfdesde, $vfhasta); // tengo la tasa de la mix compensada

        $promedioPorcentaje=($porcentajeMix+$porcentajeCompensado)/2; //promedio de la tasa mix simple >2 y compesada. 

        $porcentajeSimple3= listaTasaSimpleMax($vfdesde, $vfhasta);

        if($promedioPorcentaje < $porcentajeSimple3)
            $tasafinal= $promedioPorcentaje;
        else
            $tasafinal= $porcentajeSimple3;

        $intereses= ($tasafinal * $importe)/100;

        $total= $intereses + $importe;



        $onClick=$porcentajeMix.", ".$porcentajeCompensado.", ".$porcentajeSimple3.", ".$importe;

        $cadena = '<td>'.$concepto.'</td><td>Tasa Credisur SRL c/ Sotelo</td><td>'.$vfdesde.'</td><td>'.$vfhasta.'</td><td>'.round($tasafinal,3).'</td><td class="totImporte">'.$importe.'</td><td class="totInteres">'.round($intereses,3).'</td><td class="total">'.round($total,3).'</td><td><span class="glyphicon glyphicon-trash" onclick="Eliminar(this)"/> <span class="glyphicon glyphicon-print" onclick="return verDetaJust('.$onClick.',this);"/></td>';
            echo $cadena;
        }else
        {

//======================================================================================Si las tasas son mix pasiva o activa =========================================================================

    $tasa    = $_REQUEST["tasa"];
    $vfdesde = $_REQUEST["vfdesde"];
    $vfhasta = $_REQUEST["vfhasta"];
    $importe = $_REQUEST['importe'];
    $concepto = $_REQUEST["concepto"];

     $lista=tasas($tasa, $vfdesde, $vfhasta, $importe, $concepto);

     $cadena = '<td>'.$concepto.'</td><td>'.$lista[1].'</td><td>'.$lista[2].'</td><td>'.$lista[3].'</td><td>'.$lista[4].'</td><td class="totImporte">'.$lista[5].'</td><td class="totInteres">'.round($lista[6],3).'</td><td class="total">'.round($lista[7],3).'</td><td><span class="glyphicon glyphicon-trash" onclick="Eliminar(this)"/></td>';
            echo $cadena;
    //$cadenas= array($cadena, $lista);

    //echo json_encode($cadenas);
    }
  }
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function listaTasaMix($vfdesde, $vfhasta)
{
    include "../conexion.php";
    
    $contReg=0;

    // le doy diferente formato
    list($dia0, $mes0, $año0) = split('[/.-]', $vfdesde);
    list($dia1, $mes1, $año1) = split('[/.-]', $vfhasta);

    $vfecha1 = $año0 . "-" . $mes0 . "-" . $dia0;
    $vfecha2 = $año1 . "-" . $mes1 . "-" . $dia1;

    //busco la primera fecha valida para saber si es mayor a la ingresada

    $consulta  = "select * from tmix where fecha >= '" . $vfecha1 . "'";
    $query     = mysql_query($consulta) or die("no se puedo hacer la consulta paso 1 de consultatasas.php");
    $fila      = mysql_fetch_array($query);
    $firstdate = $fila['fecha'];

    //a la ultima fecha le resto un dia ya que el ultimo dia no corresponde a sumar intereses

    $vfecha2                   = date('Y-m-d', strtotime('-1 days', strtotime($vfecha2)));
    list($año1, $mes1, $dia1) = split('[/.-]', $vfecha2);
    $vfecha2                   = $año1 . "-" . $mes1 . "-" . $dia1;

    if ($mes1 == $mes0 && $año0 == $año1) 
    {
        $consulta      = "select indice from tmix where MONTH(fecha) = '" . $mes0 . "' AND YEAR(fecha) = '" . $año0 . "' ";
        $query         = mysql_query($consulta) or die("no se pudo realizar la consulta paso 1");
        $numeroDias    = cal_days_in_month(CAL_GREGORIAN, $mes0, $año0);
        $dias          = ($dia1 + 1) - $dia0;
        $fila          = mysql_fetch_array($query);

        if($fila['indice'] < 2)
            $fila['indice']= 2;

        $vindice_final = round($fila['indice'] / $numeroDias * $dias, 3);

        $listaTabla= array($vfdesde, $vfhasta, $fila['indice']);

        $lista= array($vindice_final, $vindice_final);
    }else
    {
        if ($vfecha1 < $firstdate) 
        {
            $consulta = "select indice from tmix where month(fecha) = '" . $mes0 . "'  and year(fecha) = '" . $año0 . "'";
            $query         = mysql_query($consulta) or die("No se pudo hace la consulta paso 2 de consultatasas.php");
            $fila          = mysql_fetch_array($query);
            $numeroDias    = cal_days_in_month(CAL_GREGORIAN, $mes0, $año0);

            if($fila['indice']< 2)
                $fila['indice']= 2;

            $vindice_final = ($fila['indice'] / $numeroDias) * ($numeroDias - $dia0 + 1);

            //print("Indice final de la primer comparacion si son fechas dif: ".$vindice_final."<br>");
            //ahora conculto la suma de los demas indices a partir del otro mes

            if ($mes0 == 12) {
                $mes0 = 1;
                $año0++;
            } else {
                $mes0++;
            }

            $vfecha1 = $año0 . "-" . $mes0 . "-" . $dia0;

            $consulta = "select indice from tmix where fecha > '" . date("Y-m-d", strtotime($vfecha1)) . "' and fecha < '" . date("Y-m-d", strtotime($vfecha2)) . "'";
            $query = mysql_query($consulta) or die("No se puedo hacer la consulta en pàso 3 de consultadetasas.php");
            $cantFilas = mysql_num_rows($query);

                for ($i=0; $i < $cantFilas; $i++) 
                { 
                    $fila= mysql_fetch_array($query);

                        if($fila['indice'] < 2)
                            $fila['indice']= 2;

                    $vindice_final = $fila['indice'] + $vindice_final;
                }

        }else {

            $consulta = "select indice from tmix where month(fecha) = '" . $mes0 . "' and year(fecha) = '" . $año0 . "'";
            $query         = mysql_query($consulta) or die("No se pudo hace la consulta paso 2 de consultatasas.php");
            $numeroDias    = cal_days_in_month(CAL_GREGORIAN, $mes0, $año0);

            if($fila['indice'] < 2)
                $fila['indice']= 2;

            $vindice_final = ($fila['indice'] / $numeroDias) * ($numeroDias - $dia0 + 1);

            /*print("cant de dias de la primer comparacion si son fechas iguales: ".$numeroDias."<br>");
            print("Indice final de la primer comparacion si son fechas iguales: ".$vindice_final."<br>");
            print("Cant de dias que se calculan comparacion si son fechas iguales: ".($numeroDias-$dia0+1)."<br>");
            print("Indice comparacion si son fechas iguales: ".$fila['indice']."<br>");*/

            $consulta = "select indice from tmix where fecha > '" . date("Y-m-d", strtotime($vfecha1)) . "' and fecha < '" . date("Y-m-d", strtotime($vfecha2)) . "'";
            $query         = mysql_query($consulta) or die("No se puedo hacer la consulta en pàso 3 de consultadetasas.php");
            $cantFilas = mysql_num_rows($query);

                for ($i=0; $i < $cantFilas; $i++) 
                { 
                    $fila= mysql_fetch_array($query);

                        if($fila['indice'] < 2)
                            $fila['indice']= 2;

                    $vindice_final = $fila['indice'] + $vindice_final;
                }
        }

        $consulta      = "select indice from tmix where MONTH(fecha) = '" . $mes1 . "' AND YEAR(fecha) = '" . $año1 . "' ";
        $query         = mysql_query($consulta) or die("no se pudo realizar la consulta paso 4");
        $numeroDias    = cal_days_in_month(CAL_GREGORIAN, $mes1, $año1);
        $fila          = mysql_fetch_array($query);

        if($fila['indice'] < 2)
            $fila['indice']= 2;

        $vindice_final = $vindice_final + (($fila['indice'] / $numeroDias * $dia1));
    }

    return round($vindice_final,2);

}

function listaTasaCompensada($importe, $tasa, $vfdesde, $vfhasta)
{
    //corrijo si es punto o coma en la tasa pactada
        list($peso, $centavo) = split('[,.]', $tasa);
        if ($centavo == "") {
            $centavo = "00";
        }

        $tasa0 = $peso . "." . $centavo;
        $tasa = $tasa0/100;
        //////////////////////////////////////////////////////////



        //modifico importe porque no suma si hay comas
        list($pesos,$centavos)=split('[,.]', $importe);
        if($centavos=="")
            $centavos=00;

        $importe= $pesos.".".$centavos;


        // le doy diferente formato
        list($dia0, $mes0, $año0) = split('[/.-]', $vfdesde);
        list($dia1, $mes1, $año1) = split('[/.-]', $vfhasta);
        $vfecha0 = $año0 . "-" . $mes0 . "-" . $dia0;
        $vfecha1 = $año1 . "-" . $mes1 . "-" . $dia1;
        ////////////////////////////////////////////////////////// 

        $vfdesde=strtotime($vfecha0);
        $vfhasta=strtotime($vfecha1);



        $difSegundos= $vfhasta-$vfdesde;
        $dias=intval($difSegundos/60/60/24); //cant de dias entre las fechas

        $dias--; // le resto un dia al total de dias por el dia completo que tiene para pagar
        $tasa= $tasa/$dias;
        //Calculo la cantidad de saltos que tiene que dar la funcion (cantidad de veces que se computa el interes) para K.(1+i)^n 
        
        $n= $dias;
           

        $tasaInteres=(1+$tasa)**$n;
        $final= $importe*$tasaInteres;

        //ahora veo el interes total que tiene los montos finales en plata y en porcentaje
        //en plata
        $interesDinero=$final-$importe;         
        $interesTasa=($final*100)/$importe;
        $interesTasa=round(($interesTasa-100),5);
        

    return $interesTasa;
}

function listaTasaSimpleMax($vfdesde, $vfhasta)
{
    //le doy diferente formato
        list($dia0, $mes0, $año0) = split('[/.-]', $vfdesde);
        list($dia1, $mes1, $año1) = split('[/.-]', $vfhasta);
        $vfecha0 = $año0 . "-" . $mes0 . "-" . $dia0;
        $vfecha1 = $año1 . "-" . $mes1 . "-" . $dia1;
        ////////////////////////////////////////////////////////// 

        $vfdesde=strtotime($vfecha0);
        $vfhasta=strtotime($vfecha1);



        $difSegundos= $vfhasta-$vfdesde;
        $dias=intval($difSegundos/60/60/24); //cant de dias entre las fechas
        $dias--; // resto el dia de gracia

        $cantSaltos= $dias/30;

        $tasa= $cantSaltos * 3;

    return $tasa;
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//la funcion devuelve solamente si es mix, pasiva o activa con un array( $concepto, $metodo, $vfdesde, $vfhasta, $vindice_final, $importe, $intereses, $total);
function tasas($tasa, $vfdesde, $vfhasta, $importe, $concepto)
{
     include "../conexion.php";
    
    // realiza la consulta toma las variables del formulario

    // le doy diferente formato
    list($dia0, $mes0, $año0) = split('[/.-]', $vfdesde);
    list($dia1, $mes1, $año1) = split('[/.-]', $vfhasta);

    $vfecha1 = $año0 . "-" . $mes0 . "-" . $dia0;
    $vfecha2 = $año1 . "-" . $mes1 . "-" . $dia1;

    //busco la primera fecha valida para saber si es mayor a la ingresada

    $consulta  = "select * from " . $tasa . " where fecha >= '" . $vfecha1 . "'";
    $query     = mysql_query($consulta) or die("no se puedo hacer la consulta paso 1 de consultatasas.php");
    $fila      = mysql_fetch_array($query);
    $firstdate = $fila['fecha'];

    //a la ultima fecha le resto un dia ya que el ultimo dia no corresponde a sumar intereses

    $vfecha2                   = date('Y-m-d', strtotime('-1 days', strtotime($vfecha2)));
    list($año1, $mes1, $dia1) = split('[/.-]', $vfecha2);
    $vfecha2                   = $año1 . "-" . $mes1 . "-" . $dia1;
    /*echo "Ultima fecha restada: ".$vfecha2;
    echo "dia0: ".$dia0;
    echo "dia1: ".$dia1;*/

    //print("primera fecha de la base de datos: ".$fila['fecha']."<br>");

    /*Comparo las fechas para saber si la fecha ingresada esta dentro del mismo mes que la
    primer fecha sacada de la base de datos*/

    if ($mes1 == $mes0 && $año0 == $año1) {
        $consulta      = "select indice from " . $tasa . " where MONTH(fecha) = '" . $mes0 . "' AND YEAR(fecha) = '" . $año0 . "' ";
        $query         = mysql_query($consulta) or die("no se pudo realizar la consulta paso 1");
        $numeroDias    = cal_days_in_month(CAL_GREGORIAN, $mes0, $año0);
        $dias          = ($dia1 + 1) - $dia0;
        $fila          = mysql_fetch_array($query);
        $vindice_final = round($fila['indice'] / $numeroDias * $dias, 3);
    } else {

        if ($vfecha1 < $firstdate) {
            $consulta = "select indice from " . $tasa . " where month(fecha) = '" . $mes0 . "'
          and year(fecha) = '" . $año0 . "'";
            $query         = mysql_query($consulta) or die("No se pudo hace la consulta paso 2 de consultatasas.php");
            $fila          = mysql_fetch_array($query);
            $numeroDias    = cal_days_in_month(CAL_GREGORIAN, $mes0, $año0);
            $vindice_final = ($fila['indice'] / $numeroDias) * ($numeroDias - $dia0 + 1);

            //print("Indice final de la primer comparacion si son fechas dif: ".$vindice_final."<br>");
            //ahora conculto la suma de los demas indices a partir del otro mes

            if ($mes0 == 12) {
                $mes0 = 1;
                $año0++;
            } else {
                $mes0++;
            }

            $vfecha1 = $año0 . "-" . $mes0 . "-" . $dia0;

            $consulta = "select sum(indice) as indice from " . $tasa . " where fecha >= '" . date("Y-m-d", strtotime($vfecha1)) . "'
        and fecha < '" . date("Y-m-d", strtotime($vfecha2)) . "'";
            $query         = mysql_query($consulta) or die("No se puedo hacer la consulta en pàso 3 de consultadetasas.php");
            $fila          = mysql_fetch_array($query);
            $vindice_final = $fila['indice'] + $vindice_final;

            /*print("Fecha sumado el mes si son fechas dif: ".$vfecha1."<br>");
        print("Indice sum  si son fechas dif: ".$fila['indice']."<br>");
        print("Indice final de la segunda consulta si son fechas dif: ".$vindice_final."<br>");
         */
        } else {

            $consulta = "select indice from " . $tasa . " where month(fecha) = '" . $mes0 . "'
          and year(fecha) = '" . $año0 . "'";
            $query         = mysql_query($consulta) or die("No se pudo hace la consulta paso 2 de consultatasas.php");
            $numeroDias    = cal_days_in_month(CAL_GREGORIAN, $mes0, $año0);
            $vindice_final = ($fila['indice'] / $numeroDias) * ($numeroDias - $dia0 + 1);

            /*print("cant de dias de la primer comparacion si son fechas iguales: ".$numeroDias."<br>");
            print("Indice final de la primer comparacion si son fechas iguales: ".$vindice_final."<br>");
            print("Cant de dias que se calculan comparacion si son fechas iguales: ".($numeroDias-$dia0+1)."<br>");
            print("Indice comparacion si son fechas iguales: ".$fila['indice']."<br>");*/

            $consulta = "select sum(indice) as indice from " . $tasa . " where fecha > '" . date("Y-m-d", strtotime($vfecha1)) . "'
        and fecha < '" . date("Y-m-d", strtotime($vfecha2)) . "'";
            $query         = mysql_query($consulta) or die("No se puedo hacer la consulta en pàso 3 de consultadetasas.php");
            $fila          = mysql_fetch_array($query);
            $vindice_final = $fila['indice'] + $vindice_final;
            //print("sumatoria indices de la segunda comparacion si son fechas iguales: ".$fila['indice']."<br>");
        }

        // consulta y calculo indice mes final mes final

        $consulta      = "select indice from " . $tasa . " where MONTH(fecha) = '" . $mes1 . "' AND YEAR(fecha) = '" . $año1 . "' ";
        $query         = mysql_query($consulta) or die("no se pudo realizar la consulta paso 4");
        $numeroDias    = cal_days_in_month(CAL_GREGORIAN, $mes1, $año1);
        $fila          = mysql_fetch_array($query);
        $vindice_final = round($vindice_final + (($fila['indice'] / $numeroDias * $dia1)), 3);
    }
    //coloco la tasa en una variable para que se coloque en la tabla

    if ($tasa == "tmix") {
        $metodo = "Tasa Mix";
    } else {
        if ($tasa == "tactiva") {
            $metodo = "Activa BLP";
        } else {
            if ($tasa = "tpasiva") {
                $metodo = "Pasiva BLP";
            }

        }
    }

    //modifico importe porque no suma si hay comas

    list($pesos,$centavos)=split('[,.]', $importe);
    if($centavos=="")
        $centavos=00;

    $importe= $pesos.".".$centavos;

    // calcula intereses

    $intereses = round($importe * ($vindice_final / 100), 3);

    //calculo total

    $total = round($intereses + $importe, 3);

    $importe= round($importe,3);

    $lista=  array( $concepto, $metodo, $vfdesde, $vfhasta, $vindice_final, $importe, $intereses, $total);

    return $lista;
}



function tasaCompuestaSimple($importe, $tasa, $vfdesde, $vfhasta, $saltos)
{
    //corrijo si es punto o coma en la tasa pactada
        list($peso, $centavo) = split('[,.]', $tasa);
        if ($centavo == "") {
            $centavo = "00";
        }

        $tasa0 = $peso . "." . $centavo;
        $tasa = $tasa0/100;
        //////////////////////////////////////////////////////////


        //modifico importe porque no suma si hay comas
        list($pesos,$centavos)=split('[,.]', $importe);
        if($centavos=="")
            $centavos=00;

        $importe= $pesos.".".$centavos;

        $concepto = $_REQUEST["concepto"];
        


        // le doy diferente formato
        list($dia0, $mes0, $año0) = split('[/.-]', $_REQUEST["vfdesde"]);
        list($dia1, $mes1, $año1) = split('[/.-]', $_REQUEST["vfhasta"]);
        $vfecha0 = $año0 . "-" . $mes0 . "-" . $dia0;
        $vfecha1 = $año1 . "-" . $mes1 . "-" . $dia1;
        ////////////////////////////////////////////////////////// 

        $vfdesde=strtotime($vfecha0);
        $vfhasta=strtotime($vfecha1);



        $difSegundos= $vfhasta-$vfdesde;
        $dias=intval($difSegundos/60/60/24); //cant de dias entre las fechas
        $dias--;

        //Calculo la cantidad de saltos que tiene que dar la funcion (cantidad de veces que se computa el interes) para K.(1+i)^n 

        $n= $dias/$saltos;
           
        if ($n<1) { ////tomo el criterio de que si $n=0 tomo como 1 y si es mas tomo los intereses de $n

            $tasaInteres= (1+$tasa)**1;
            $final= $importe*$tasaInteres; //aca saco el interes de un solo periodo
            $reston= $dias%$saltos; // el resto de los dias

            $interesTasa=($reston*$tasa)/$saltos;
            $interesTasa=round($interesTasa,3);
            $interesDinero=$interesTasa*$importe;
            $inter=$importe+$interesDinero;
            //multiplico por 100 aca para que los porcentajes me salgan limpios
            $interesTasa=$interesTasa*100;

        }else{//Tengo que sacar los dias que quedan en el medio///

            $tasaInteres=(1+$tasa)**$n;
            $finaln= $importe*$tasaInteres;
            $reston=$dias%$saltos;

                if ($reston!=0) {
                    $finalReston=($finaln/$dias)*$reston;
                    $final=$finaln+$finalReston;
                }else{
                    $final=$finaln;
                }

            //ahora veo el interes total que tiene los montos finales en plata y en porcentaje
            //en plata
            $interesDinero=$final-$importe;         
            $interesTasa=($final*100)/$importe;
            $interesTasa=round(($interesTasa-100),3);
        }

    $lista=array($n, $vfhasta, $interesTasa, $importe, $interesDinero, $final);

    return $lista;
}

?>