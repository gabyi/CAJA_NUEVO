<?php
// es por un warning de strtotime function
date_default_timezone_set('UTC');

if ($_REQUEST["tasa"] == "pactadasimple") {

    $tasa    = $_REQUEST["tasa"];
    $pactada = $_REQUEST["pactada"];
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
        $vindice_final = round($pactada / $numeroDias * $dias, 2);
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
        $vindice_final = round($vindice_final + (($pactada / $numeroDias * $dia1)), 2);
    }
    //coloco la tasa en una variable para que se coloque en la tabla

    if ($tasa = "pactadasimple") {
        $metodo = "Pactada Simple Mensual";
    }

    // calcula intereses

    $intereses = round($importe * ($vindice_final / 100), 2);

    //calculo total

    $total = round($intereses + $importe, 2);

    $cadena = '<td>' . $concepto . '</td><td>' . $metodo . '</td><td>' . $vfdesde . '</td><td>' . $vfhasta . '</td><td>' . $pactada . '</td><td class="totImporte">' . $importe . '</td><td class="totInteres">' . $intereses . '</td><td class="total">' . $total . '</td><td><input type="image" style="height:20px;" src="images/boton_eliminar.png" onclick="Eliminar(this)"/></td>';

    echo $cadena;

} else {
    if ($_REQUEST["tasa"]== "compuestaSimple") {
        $tasa=$_REQUEST['pactada'];

        //corrijo si es punto o coma en la tasa pactada
        list($peso, $centavo) = split('[,.]', $tasa);
        if ($centavo == "") {
            $centavo = "00";
        }

        $tasa0 = $peso . "." . $centavo;
        $tasa = $tasa0/100;
        //////////////////////////////////////////////////////////

        $importe = $_REQUEST['importe'];
        $concepto = $_REQUEST["concepto"];
        $saltos=$_REQUEST['saltos'];


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


        //Calculo la cantidad de saltos que tiene que dar la funcion (cantidad de veces que se computa el interes) para K.(1+i)^n 

        $n= floor($dias/$saltos);
           

        if ($n==0) { ////tomo el criterio de que si $n=0 tomo como 1 y si es mas tomo los intereses de $n

            $tasaInteres= (1+$tasa)**1;
            $final= $importe*$tasaInteres;
            $reston= $dias%$saltos;

            $interesTasa= ($reston*$tasa)/$saltos;// regla de 3 simpole
            $interesTasa=round($interesTasa,2);//regla de 3 simple
            $interesDinero=($interesTasa/100)*$importe; //paso a $ los intereses
            $final=$interesDinero+$importe; // sumo los intereses en pesos al importe


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
            $interesTasa=round(($interesTasa-100),2);
        }


        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



        $cadena = '<td>'.$concepto.'</td><td>Interes Compuesto Simple</td><td>'.$_REQUEST["vfdesde"].'</td><td>'.$_REQUEST["vfhasta"].'</td><td>'.$interesTasa.'</td><td class="totImporte">'.round($importe,2).'</td><td class="totInteres">'.round($interesDinero,2).'</td><td class="total">'.round($final,2).'</td><td><input type="image" style="height:20px;" src="images/boton_eliminar.png" onclick="Eliminar(this)"/></td>';
        
      echo $cadena;

    } else {

//======================================================================================Si las tasas son mix pasiva o activa =========================================================================

    $tasa    = $_REQUEST["tasa"];
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
        $vindice_final = round($fila['indice'] / $numeroDias * $dias, 2);
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

            $consulta = "select sum(indice) as indice from " . $tasa . " where fecha > '" . date("Y-m-d", strtotime($vfecha1)) . "'
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
        $vindice_final = round($vindice_final + (($fila['indice'] / $numeroDias * $dia1)), 2);
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

    // calcula intereses

    $intereses = round($importe * ($vindice_final / 100), 2);

    //calculo total

    $total = round($intereses + $importe, 2);

    $cadena = '<td>' . $concepto . '</td><td>' . $metodo . '</td><td>' . $vfdesde . '</td><td>' . $vfhasta . '</td><td>' . $vindice_final . '</td><td class="totImporte">' . $importe . '</td><td class="totInteres">' . $intereses . '</td><td class="total">' . $total . '</td><td><input type="image" style="height:20px;" src="images/boton_eliminar.png" onclick="Eliminar(this)"/></td>';

    echo $cadena;

    //$cadenas= array($cadena, $lista);

    //echo json_encode($cadenas);
    }
}
