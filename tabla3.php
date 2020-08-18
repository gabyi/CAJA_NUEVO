<?php

if (isset($_POST['calcular'])) {
    $juicio = "juicio";
    //session_register ("juicio");
    $_SESSION['juicio'] = $juicio;

}

?>

<!DOCTYPE html>
<html lang="es">
<meta charset="utf-8">

  <head>
    <!--<meta charset="utf8">para que aparezca la ñ-->
  <?php
include 'head2.php';
    ?>
   <title>Costos de Juicios</title>

  </head>
  <?php

    include 'conexion.php';
    $materia  = $_REQUEST['juicio'];
    $monto    = $_REQUEST['monto'];
    $montoCalculo= $monto;//USO MONTO CALCULO PARA EL TITULO, SI HAY MATERIA COMO ACEPTACION CARGO DEFENSOR QUE CUALQUIERA SEA EL MONTO TIENE UN SOLO VALOR
    $oficio   = $_REQUEST['oficio'];
    $beneficio= $_REQUEST['beneficio'];
    $indeterminado= $_REQUEST['indeterminado'];


    if($beneficio)
        $consulta = mysql_query("select * from ValoresCajaRentas where materia= 'BENEFICIO DE LITIGAR SIN GASTOS'") or die("No se pudo realizar la consulta");
    else
       {
            if($indeterminado)
                 $consulta = mysql_query("select * from ValoresCajaRentas where materia= 'MONTO INDETERMINADO'") or die("No se pudo realizar la consulta");
             else
                 $consulta = mysql_query("select * from ValoresCajaRentas where materia= '" . $materia . "'") or die("No se pudo realizar la consulta");
       }
         /////////////////////////////USO ESTO PARA CUALQUIER MATERIA  QUE TENGA UN MISMO MONTO/////////////////////////////////////////////////////////////////

    if($materia == "ACEPTACION CARGO DEFENSOR")
    {
        if($monto != 0 || $monto != 0.00 )
        {
            $monto=0;
        }
    }

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //si la consulta devuelve falso que salga un cartel

    $filaconsulta= mysql_num_rows($consulta);

    //consulto la ultima fila de los minimos para sacar el valor actualizado
    $consultaMinimos = mysql_query("select * from minimos") or die("No se puedo realizar consulta de minimos");

    $nfilas = mysql_num_rows($consultaMinimos);

    for ($i = 0; $nfilas > $i; $i++) {
        $filaMinimos = mysql_fetch_array($consultaMinimos);
    }
    $fila = mysql_fetch_array($consulta);

    if ($fila['bono_ley'] != 0.00) {
        $bono_ley = $fila['bono_ley'];
    }

    //Verificacion de valores de aportes


if($monto == 0.00 || $monto == 0)
{
    if($oficio)
    {
        $caja_inicio_ap_porc = $fila['caja_inicio_ap_porc'];
        $caja_inicio_aporte  = $filaMinimos['caja_min_aporte'];
        $controlAporte=1;
    }else
    {
        if ($fila['caja_inicio_ap_porc'] == 0.00 && $fila['caja_inicio_aporte'] == 0.00) 
        {
        $caja_inicio_ap_porc = 0.00;
        $controlAporte       = 0.00;
        }else 
            {
                if ($fila['caja_inicio_ap_porc'] != 0.00 && $fila['caja_inicio_aporte'] == 0.00) 
                    {
                        $caja_inicio_ap_porc = $fila['caja_inicio_ap_porc'];
                        $caja_inicio_aporte  = $filaMinimos['caja_min_aporte'];
                        $controlAporte=1;
                    }else 
                        {
                            if ($fila['caja_inicio_ap_porc'] == 0.00 && $fila['caja_inicio_aporte'] != 0.00) 
                                {
                                    $caja_inicio_aporte = $fila['caja_inicio_aporte'];                                
                                    $controlAporte = 1;
                                }
                        }
            }
            }
}

if($monto != 0 || $monto != 0.00)
{
    if($oficio)
    {
        $controlAporte      = 2;
        $caja_inicio_ap_porc = number_format(0.6, 2);
        $caja_inicio_aporte = verifica($monto, 0.60, $filaMinimos['caja_min_aporte']);
        if ($caja_inicio_aporte == $filaMinimos['caja_min_aporte']) 
                $controlAporte=1;

    }else
    {
        if ($fila['caja_inicio_ap_porc'] == 0.00 && $fila['caja_inicio_aporte'] == 0.00) 
        {
        $caja_inicio_ap_porc = 0.00;
        $controlAporte       = 0.00;
        } else {
            if ($fila['caja_inicio_ap_porc'] != 0.00 && $fila['caja_inicio_aporte'] == 0.00) {
                $caja_inicio_ap_porc = $fila['caja_inicio_ap_porc'];
                $caja_inicio_aporte  = verifica($monto, $caja_inicio_ap_porc, $filaMinimos['caja_min_aporte']);
            if ($caja_inicio_aporte == $filaMinimos['caja_min_aporte']) 
            {
                $controlAporte=1;
            }else
                $controlAporte= 2;
            }else 
            {
                if ($fila['caja_inicio_ap_porc'] == 0.00 && $fila['caja_inicio_aporte'] != 0.00) 
                {
                    $caja_inicio_aporte = $filaMinimos['caja_min_aporte'];
                    $controlAporte      = 1;
                }
            }
        }
    }
}


    //Verificacion de valores de contribuciones


if($monto == 0.00 || $monto == 0)
{
    if ($fila['caja_inicio_cont_porc'] == 0.00 && $fila['caja_inicio_cont'] == 0.00)
{
    $caja_inicio_cont = 0.00;
    $controlCont      = 0.00;   
}else
    {
        if ($fila['caja_inicio_cont_porc'] != 0.00 && $fila['caja_inicio_cont'] == 0.00)
        {
            $caja_inicio_cont      = $filaMinimos['caja_min_cont'];
                $controlCont=1;
           
        }else
        {
            if ($fila['caja_inicio_cont_porc'] == 0.00 && $fila['caja_inicio_cont'] != 0.00) 
            {
                $caja_inicio_cont = $fila['caja_inicio_cont'];
                $controlCont = 1;
            }
        }
    }
    
}

if($monto != 0.00 || $monto != 0)
{
    if ($fila['caja_inicio_cont_porc'] == 0.00 && $fila['caja_inicio_cont'] == 0.00)
{
    $caja_inicio_cont = 0.00;
    $controlCont      = 0.00;   
}else
    {
        if ($fila['caja_inicio_cont_porc'] != 0.00 && $fila['caja_inicio_cont'] == 0.00)
        {
            $caja_inicio_cont_porc = $fila['caja_inicio_cont_porc'];
            $caja_inicio_cont      = verifica($monto, $caja_inicio_cont_porc, $filaMinimos['caja_min_cont']);
            if ($caja_inicio_cont == $filaMinimos['caja_min_cont'])
                $controlCont=1;
            else
                $controlCont= 2;
        }else
        {
            if ($fila['caja_inicio_cont_porc'] == 0.00 && $fila['caja_inicio_cont'] != 0.00) 
            {
                $caja_inicio_cont = $fila['caja_inicio_cont'];
                $controlCont = 1;
            }
        }
    }
    
}


    //$sumaCForense = $caja_inicio_aporte + $caja_inicio_cont + $bono_ley;
        $sumaCForense = $caja_inicio_aporte + $caja_inicio_cont;



// valores rentas inicio

$rentas_inicio_general=0.00;
$rentas_inicio_tfija=0.00;
$rentas_inicio_tvariable=0.00;

if(!$oficio)
{
    if($fila['rentas_inicio_general'] != 0.00)
        $rentas_inicio_general = $fila['rentas_inicio_general'];
    else
        $rentas_inicio_general=0.00;

}

if($monto == 0.00 || $monto == 0)
{
    if($oficio)
        {
            $rentas_inicio_tfija= $filaMinimos['rentas_minimo'];
            $controlIniRentas=1;
        }else
        {
            if ($indeterminado) 
            {
                $rentas_inicio_tfija= $filaMinimos['rentas_indeterminado'];
                $controlIniRentas=5;
            }else
            {
                if($fila['sinmonto'] != 0.00)
            {
                $rentas_inicio_tfija = $fila['sinmonto'];
                $controlIniRentas=4;
            }else
            {
                if($fila['rentas_inicio_tfija']== 0.00 && $fila['rentas_inicio_tvariable'] != 0.00)
                {
                    $rentas_inicio_tfija= $fila['rentas_inicio_tfija'];
                    $rentas_inicio_tvariable= verifica($monto, $fila['rentas_inicio_tvariable'], $filaMinimos['sinmonto']);
                    if($rentas_inicio_tvariable== $filaMinimos['rentas_minimo'])
                        $controlIniRentas=2;
                    else
                        $controlIniRentas=1;
                }else
                {
                    if($fila['rentas_inicio_tfija']!=0.00 && $fila['rentas_inicio_tvariable'] == 0.00)
                    {
                        $rentas_inicio_tvariable= $fila['rentas_inicio_tvariable'];
                        $rentas_inicio_tfija= $fila['rentas_inicio_tfija'];
                        $controlIniRentas=3;
                    }
                }

                if($fila['rentas_inicio_tfija'] !=0.00 && $fila['rentas_inicio_tvariable'] != 0.00)
                {
                    $rentas_inicio_tvariable= verifica($monto, $fila['rentas_inicio_tvariable'], $fila['sinmonto']);
                    $rentas_inicio_prop= $fila['rentas_inicio_tvariable'];
                    if($rentas_inicio_tvariable== $fila['rentas_inicio_tfija'])
                        $controlIniRentas=2;
                    else
                        $controlIniRentas=1;
                }
            }
            }
        }
        
}

if($monto != 0.00 || $monto != 0)
{
    if($oficio)
    {
        $rentas_inicio_tfija= $fila['rentas_inicio_tfija'];
        $rentas_inicio_tvariable= verifica($monto, 0.5, $filaMinimos['rentas_minimo']);
        $rentas_inicio_prop= number_format(0.5,2);
        if($rentas_inicio_tvariable== $filaMinimos['rentas_minimo'])
            $controlIniRentas=2;
        else
            $controlIniRentas=1;
    }else
    {
         if($fila['rentas_inicio_tfija']== 0.00 && $fila['rentas_inicio_tvariable'] != 0.00)
        {
            $rentas_inicio_tfija= $fila['rentas_inicio_tfija'];
            $rentas_inicio_tvariable= verifica($monto, $fila['rentas_inicio_tvariable'], $filaMinimos['rentas_minimo']);
            $rentas_inicio_prop= $fila['rentas_inicio_tvariable'];
            if($rentas_inicio_tvariable== $filaMinimos['rentas_minimo'])
                $controlIniRentas=2;
            else
                $controlIniRentas=1;
        }else
        {
            if($fila['rentas_inicio_tfija']!=0.00 && $fila['rentas_inicio_tvariable'] == 0.00)
            {
                $rentas_inicio_tvariable= $fila['rentas_inicio_tvariable'];
                $rentas_inicio_tfija= $fila['rentas_inicio_tfija'];
                $controlIniRentas=3;
            }
        }

        if($fila['rentas_inicio_tfija'] !=0.00 && $fila['rentas_inicio_tvariable'] != 0.00)
        {
            $rentas_inicio_tvariable= verifica($monto, $fila['rentas_inicio_tvariable'], $fila['rentas_inicio_tfija']);
            $rentas_inicio_prop= $fila['rentas_inicio_tvariable'];
            if($rentas_inicio_tvariable== $fila['rentas_inicio_tfija'])
                $controlIniRentas=2;
            else
                $controlIniRentas=1;
        }
    }
}

      

    $sumaDGR = $rentas_inicio_general + $rentas_inicio_tvariable + $rentas_inicio_tfija;

    //total de inicio

    $sumaInicio = $sumaCForense + $sumaDGR + $bono_ley;

    $sumaInicio = number_format($sumaInicio, 2);

    //Verifico que haya valores para caja final

    if ($fila['caja_fin_aportes'] != 0.00) 
    {
        $caja_fin_aportes = $fila['caja_fin_aportes_aportes'];
        $controlFinCajaAp=1;

    } else {
        if ($fila['caja_fin_ap_porc'] != 0.00) {
            $caja_fin_aportes = verifica($monto, $fila['caja_fin_ap_porc'], $filaMinimos['caja_min_aporte']);
            $controlFinCajaAp=2;

            if($caja_fin_aportes == $filaMinimos['caja_min_aporte'])
                $controlFinCajaAp=1;

        } else {
            $caja_fin_aportes = 0.00;
        }
    }

    if ($fila['caja_fin_cont'] != 0.00) 
    {
        $caja_fin_cont = $fila['caja_fin_cont'];
        $controlFinCajaCont=1;

    } else {
        if ($fila['caja_fin_cont_porc'] != 0.00) 
        {
            $caja_fin_cont = verifica($monto, $fila['caja_fin_cont_porc'], $filaMinimos['caja_min_cont']);
            $controlFinCajaCont=2;

            if($caja_fin_cont == $filaMinimos['caja_min_cont'])
                $controlFinCajaCont=1;

        } else {
            $caja_fin_cont = 0.00;
        }

    }

    //valores rentas final

    if ($fila['rentas_fin_general'] != 0.00) 
    {
        $rentas_fin_general = $fila['rentas_fin_general'];

    } else {
        $rentas_fin_general = 0.00;
    }

    //verifico valor de tasa variable rentas

    if ($fila['rentas_fin_tfija'] != 0.00) 
    {
        $rentas_fin_tfija = verifica($monto, $fila['rentas_fin_tfija'], $filaMinimos['rentas_minimo']);
        $controlFinRentas=1;
    } else {

        if ($fila['rentas_fin_tvariable'] != 0.00) 
            {
                $rentas_fin_tasa_variable = verifica($monto, $fila['rentas_fin_tvariable'], $filaMinimos['rentas_minimo']);
                $controlFinRentas=2;

                if($rentas_fin_tasa_variable == $filaMinimos['rentas_minimo'])
                    $controlFinRentas=3;    
            }else 
                {
                    $rentas_fin_tasa_variable = 0.00;
                }
        }

if($oficio)
{
    $sumaFinDGR = 0.00;
    $sumaFinCajaForense = 0.00;
}else
{
    $sumaFinDGR = $rentas_fin_general + $rentas_fin_tasa_variable + $rentas_fin_tfija;

    $sumaFinCajaForense = $caja_fin_aportes + $caja_fin_cont;
}

//////////////////// LINEAS PARA AGREGAR EL FIN DE JUICIOS SIN CARGO DE LAS DIFERENTES MATERIAS//////////////////////////////////////////////////////////////
     if (($monto == 0.00 || $monto == 0) && $materia == "DIVORCIO")
    {
        $sumaFinDGR = 0;

        $sumaFinCajaForense = 0;   
    }
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    $sumaFinalJuicio = $sumaFinCajaForense + $sumaFinDGR; // lo pongo aca porque el format de los numeros no deja sumar bien

    $sumaFinalJuicio    = number_format($sumaFinalJuicio, 2);
    $sumaFinCajaForense = number_format($sumaFinCajaForense, 2);
    $rentas_fin_tfija   = number_format($rentas_fin_tfija, 2);
    $sumaFinDGR         = number_format($sumaFinDGR, 2);

    //se hacen los redondeos a lo ultimo de todas las sumas ya que sino las comas que agrega el number_format alteran el esultado final

    //redondeos de inicio de caja
    //redondeo aportes a 2 decimales
    $caja_inicio_aporte = number_format($caja_inicio_aporte, 2);

    //redondeo contibuciones a 2 decimales
    $caja_inicio_cont = number_format($caja_inicio_cont, 2);

    //redondeo suma de aportes y contribuciones a 2 decimales
    $sumaCForense = number_format($sumaCForense, 2);

    //redondeo e tasas de DGR
    $rentas_inicio_tvariable = number_format($rentas_inicio_tvariable, 2);

    //redondeo de suma de DGR
    $sumaDGR = number_format($sumaDGR, 2);

    ?>
  <body>
<?php


    if (isset($_POST['calcular'])) {
        ?>


<div class="container" id="containerCuerpo">

  <div class="panel panel-default" id="tabla-juicios">
      <div class="panel-heading">

        <?php
if($oficio)
    print "<h4 class='panel-title'>Costos de Juicios: " . $materia . ". Monto: $ " . number_format($montoCalculo, 2) . ". Oficio Ley 22.172.-</h4>";
else
    {
        if($indeterminado)
            print "<h4 class='panel-title'>Costos de Juicios: " . $materia . " por MONTO INDETERMINADO </h4>";
        else
            print "<h4 class='panel-title'>Costos de Juicios: " . $materia . ". Monto: $ " . number_format($montoCalculo, 2) . "</h4>";
    }
        ?>

      </div>
<div class="panel-body" id="montos">
<?php
//Si no hay finalizacion de juicio las tablas se centran en el panel

        if ($sumaFinCajaForense != 0.00 || $sumaFinDGR != 0.00) {
            print "<div class='col-sm-6 col-md-6'>";
        } else {
            print "<div class='col-sm-6 col-md-6 col-md-offset-3'>";
        }

        ?>

  <h4>Costo de Iniciaci&oacute;n</h4>

    <table class="table-striped">

      <?php
    
    if ($bono_ley > 0) 
    {                
            
    echo "<caption><th>Colegio de Abogados</th></caption>";
    echo '<tr><td>Bono Ley N&#176; 422</td><td style="align:right;padding-left:30px;">' . $bono_ley . '</td></tr>';
    echo '</table>';

    echo'<table class="table-striped">';    
    }

if ($sumaCForense > 0) {


            print "<caption><th>Caja Forense de La Pampa</th></caption>";

            switch ($controlAporte) {
                case 1:
                    print "<tr><td>Aportes</td><td style='align:right;padding-left:30px;'>" . $caja_inicio_aporte . "</td></tr>";
                    break;

                case 2:
                    print "<tr><td>Aportes</td><td style='align:right;padding-left:30px;'>" . $caja_inicio_aporte .
                        "</td><td style='align:right;padding-left:30px;'>" . $caja_inicio_ap_porc . " %</td></tr>";
                    break;

                case '':

                    break;
            }

            switch ($controlCont) {
                case 1:
                    print "<tr><td>Contribuciones</td><td style='align:right;padding-left:30px;'>" . $caja_inicio_cont . "</td></tr>";
                    break;

                case 2:
                    print "<tr><td>Contribuciones</td><td style='align:right;padding-left:30px;'>" . $caja_inicio_cont .
                        "</td><td style='align:right;padding-left:30px;'>" . $caja_inicio_cont_porc . " %</td></tr>";
                    break;

                case '':

                    break;
            }

            //TOTAL DE CAJA FORENSE INICIO
            print "<tr style='border-style: solid;border-top-width: 2px;border-left: none;border-bottom:none;border-right:none;'><th>Total Caja Forense: </th>
            <th style='align:right;padding-left:30px;'>" . $sumaCForense . "</th></tr>";
        }

        ?>
    </table>



      <?php
//verifico si rentas inicio tiene monto fijo o variable para mostrar la tabla

        if ($sumaDGR != 0.00) {
            print "<table class='table-striped'>";

            print "<caption><th>Direcci&oacute;n General de Rentas</th></caption>";

            if($rentas_inicio_general != 0.00)
                print "<tr><td>Tasa General</td><td style='align:right;padding-left:30px;'>" . number_format($rentas_inicio_general,2) . "</td></tr>";

            switch ($controlIniRentas) {                
                case 1:
                    print "<tr><td>Tasa Esp. Variable</td><td style='align:right;padding-left:30px;'>" . $rentas_inicio_tvariable . "</td>
                    <td style='align:right;padding-left:30px;'>" . $rentas_inicio_prop . " %</td></tr>";
                    break;
                case 2:
                    print "<tr><td>Tasa Esp. Variable</td><td style='align:right;padding-left:30px;'>" . $rentas_inicio_tvariable . "</td></tr>";
                    break;
                case 3:
                    print "<tr><td>Tasa Esp. Fija</td><td style='align:right;padding-left:30px;'>" . $rentas_inicio_tfija . "</td></tr>";
                    break;
                case 4:
                    print "<tr><td>Tasa Sin Cont. Econom.</td><td style='align:right;padding-left:30px;'>" . $rentas_inicio_tfija . "</td></tr>";
                    break;
                case 5:
                    print "<tr><td>Tasa por Monto Ideterm.</td><td style='align:right;padding-left:30px;'>" . $rentas_inicio_tfija . "</td></tr>";
                    break;
            }


            print "<tr style='border-style: solid;border-top-width: 2px;border-left: none;border-bottom:none;border-right:none;'><th>Total D.G.R: </th>
            
            <th style='align:right;padding-left:30px;'>" . $sumaDGR . "</th></tr>";
            print "</table>";
        }

        if ($filaconsulta)
        print "<div id='total-IniFin' class= 'well well-sm'>Total a Pagar al Inicio: $ " . $sumaInicio . "</div>";
        else
          echo "<div id='total-IniFin' class= 'well well-sm'>El juicio no esta en la lista.-</div>";

        ?>


<!--=================================================================================================================================================================================-->
<!--Comienzo de la tabla de finalizacion de Juicios-->
<!--=================================================================================================================================================================================-->

<?php
if ($sumaFinCajaForense != 0.00) {
            ?>
    </div>

    <div class="col-sm-6 col-md-6">

    <h4>Costo de Finalizaci&oacute;n</h4>

    <table class="table-striped">

      <?php
if ($sumaFinCajaForense > 0) 
{

                print "<caption><th>Caja Forense de La Pampa</th></caption>";

            
                    switch ($controlFinCajaAp) 
                    {
                        case 1:
                            print "<tr><td>Aportes</td><td style='align:right;padding-left:30px;'>" . number_format($caja_fin_aportes, 2) . "</td></tr>";
                            break;
                        case 2:
                            print "<tr><td>Aportes</td><td style='align:right;padding-left:30px;'>" . number_format($caja_fin_aportes, 2) .
                            "</td><td style='align:right;padding-left:30px;'>" . number_format($fila['caja_fin_ap_porc'], 2) . " %</td></tr>";
                            break;
                    }
                
                    switch ($controlFinCajaCont) 
                    {
                        case 1:
                            print "<tr><td>Contribuciones</td><td style='align:right;padding-left:30px;'>" . number_format($caja_fin_cont,2) . "</td></tr>";
                            break;
                        case 2:
                            print "<tr><td>Contribuciones</td><td style='align:right;padding-left:30px;'>" . number_format($caja_fin_cont,2) .
                             "</td><td style='align:right;padding-left:30px;'>" . number_format($fila['caja_fin_cont_porc'], 2) . " %</td></tr>";
                            break;
                    }

                    print "<tr style='border-style: solid;border-top-width: 2px;border-left: none;border-bottom:none;border-right:none;'><th>Total Caja Forense: </th>
                    <th style='align:right;padding-left:30px;'>" . $sumaFinCajaForense . "</th></tr>";
                } else {
                    print "<tr style='border-style: solid;border-top-width: 2px;border-left: none;border-bottom:none;border-right:none;'><th>Total Caja Forense: </th>
                    <th style='align:right;padding-left:30px;'>" . $sumaFinalJuicio . "</th></tr>";
                }

            

            ?>
    </table>

    <?php
//verifico si rentas fin tiene monto fijo o variable para mostrar la tabla

            if ($sumaFinDGR != 0.00) {
                print "<table class='table-striped'>";

                print "<caption><th>Direcci&oacute;n General de Rentas</th></caption>";

                if ($rentas_fin_general != 0.00) {
                    print "<tr><td>Tasa General</td><td style='align:right;padding-left:30px;'>" . $rentas_fin_general . "</td></tr>";
                }

                switch ($controlFinRentas) {
                    case 1:
                        print "<tr><td>Tasa Esp. Fija</td><td style='align:right;padding-left:30px;'>" . $rentas_fin_tfija ."</tr>";
                        break;
                    case 2:
                        print "<tr><td>Tasa Esp. Variable</td><td style='align:right;padding-left:30px;'>" . $rentas_fin_tasa_variable . 
                         "</td><td style='align:right;padding-left:30px;'>" . number_format($fila['rentas_fin_tvariable'], 2) . " %</td></tr>";
                        break;
                    case 3:
                        print "<tr><td>Tasa Esp. Variable</td><td style='align:right;padding-left:30px;'>" . $rentas_fin_tasa_variable . "</td></tr>";
                        break;    
                }

                print "<tr style='border-style: solid;border-top-width: 2px;border-left: none;border-bottom:none;border-right:none;'><th>Total D.G.R: </th>
          <th style='align:right;padding-left:30px;'>" . $sumaFinDGR . "</th></tr>";
                print "</table>";
            }

            print "<div id='total-IniFin' class= 'well well-sm'>Total a Pagar al Finalizar: $ " . $sumaFinalJuicio . "</div>";
        }
        ?>

</div>

</div>
<?php 
if($materia=="HOMOLOGACION DE CONVENIO")
            print "<div id='total-IniFin' class= 'well well-sm'>En Homologación de convenio se pagará el 2% con un minimo de $ ".$fila['sinmonto']."</div>";
 ?>

<div id='total-IniFin' class= 'well well-sm'>La información que se suministra no tiene validez legal. Los datos son meramente informativos, por lo que no constituyen ni reemplazan
                                             las liquidaciones formales que efectúan la Caja Forense de La Pampa y la Dirección General de Rentas.
                                             Para la programación de este aplicativo se han tomado como referencia las disposiciones de la Ley 1861 y de la Ley Impositiva.</div>

<div id='alert-orange' class= 'well well-sm'>Solicitamos que antes de proceder a efectuar el depósito o transferencia bancaria se verifiquen los importes en los siguientes correos: 
                                            <a href="mailto: intervencionesdigitalessr@cforense.org">intervencionesdigitalessr@cforense.org</a> (I, III y IV CJ) y 
                                            <a href="mailto: intervencionesdigitalesgp@cforense.org">intervencionesdigitalesgp@cforense.org</a> (II CJ).</div>

</div>

  <div class='panel panel-default'>
    <div class='panel-heading'>
      <button id="boton-noticia" style="background: url(imagenes/logos/fondo_azul.png);" type='button' class='btn btn-info  btn-lg'
      name='calcular' onclick= 'return imprJus();'>Imprimir</button>

     <!--<input type="button" style="background: url(imagenes/logos/fondo_azul.png);" class="btn btn-info  btn-lg" name="PDF" id="PDF" onClick="enviarAPHP();" value="PDF" /> -->

      <a id="link-Botones" href="montosJuicios2.php"><button id="boton-noticia" style="background: url(imagenes/logos/fondo_azul.png);" type='button' class='btn btn-info  btn-lg'
        name='volver' style='margin-left:15px;'>Volver</button></a>
    </div>
  </div>

</div>





</body>

<div id="printno">
<?php
} //aca termina else de isset calcular



?>
</div>
  </html>
<script type="text/javascript">
var juicios = [
<?php

$consulta = "select * from ValoresCajaRentas where materia NOT LIKE '%SUCES%' order by materia asc"; /*busca todo menos los que tenga suces*/
$result   = mysql_query($consulta, $conexion);
$n        = mysql_num_rows($result);
$i        = 0;

for ($i; $i <= $n; $i++) {
    $fila = mysql_fetch_array($result);
    if ($fila["materia"] != "") {

        print('"' . $fila["materia"] . '",');
    }
}

// funcion verifica montos

function verifica($a, $b, $minimo)
{
    $valor1 = $a * ($b / 100);

    if ($valor1 > $minimo) {
        return $valor1;
    } else {
        return $minimo;
    }
}

?>

];
$( "#juicio" ).autocomplete({
  source: juicios
});

function volver ()
{
 window.history.back();
}


function doPrint(){
 //document.all.item("noprint").style.visibility="hidden"
 window.print()
 //document.all.item("noprint").style.visibility="visible"

 }





<?php
if (isset($_POST['PDF']))
    require_once 'dompdf/autoload.inc.php';
    use Dompdf\Dompdf;
    $dompdf = new DOMPDF();
    $dompdf->load_html(ob_get_clean());
    $dompdf->render();
    $pdf = $dompdf->output();
    $filename = "ejemplo.pdf";
    file_put_contents($filename, $pdf);
    $dompdf->stream($filename);
?>



</script>

<?php

//session_unregister("juicio");

 unset($_SESSION['juicio']);

?>