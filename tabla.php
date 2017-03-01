<?php
session_start();
?>
<?php

if(isset($_POST['calcular']))
{
  $juicio= "juicio";
  //session_register ("juicio");
  $_SESSION ['juicio']=$juicio;

}

  if( $_SESSION ['juicio']=="")  //lo puse asi para que si se accede desde 0 te manda al index si apretas enviar entra
  {
    include'redir.php';

  }else /*<!-- aca termina el if si no paso por el index*/
{
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
      $materia=$_REQUEST ['juicio'];
      $monto= $_REQUEST ['monto'];
      $consulta= mysql_query("select * from ValoresCajaRentas where materia= '".$materia."'") or die ("No se pudo realizar la consulta");

      //consulto la ultima fila de los minimos para sacar el valor actualizado
      $consultaMinimos= mysql_query("select * from minimos") or die ("No se puedo realizar consulta de minimos");

      $nfilas= mysql_num_rows($consultaMinimos);

      for($i=0;$nfilas>$i;$i++)
        {
          $filaMinimos= mysql_fetch_array($consultaMinimos);
        }
      $fila= mysql_fetch_array($consulta);

      if ($fila['bono_ley']!=0.00)
        {
          $bono_ley= $filaMinimos['bono_ley'];
         }


      //Verificacion de valores de aportes

      if($fila ['caja_inicio_ap_porc'] == 0.00 && $fila ['caja_inicio_aporte'] == 0.00 )
      {
        $caja_inicio_ap_porc=0.00;
        $controlAporte= 0.00;
      }else
      {
        if($fila ['caja_inicio_ap_porc'] != 0.00 && $fila ['caja_inicio_aporte'] == 0.00 )
      {
        $caja_inicio_ap_porc=$fila ['caja_inicio_ap_porc'];
        $caja_inicio_aporte= verifica ($monto,$caja_inicio_ap_porc,$filaMinimos ['caja_min_aporte']);
        $controlAporte=2;
      }else
        {
          if($fila ['caja_inicio_ap_porc'] == 0.00 && $fila ['caja_inicio_aporte'] != 0.00 )
          {
            $caja_inicio_aporte= $filaMinimos ['caja_min_aporte'];
            $controlAporte=1;
          }
        }
      }
      

      //Verificacion de valores de contribuciones
      
      if($fila ['caja_inicio_cont_porc'] == 0.00 && $fila ['caja_inicio_cont'] == 0.00)
      {
        $caja_inicio_cont=0.00;
        $controlCont= 0.00;
      }else
      {
        if($fila ['caja_inicio_cont_porc'] != 0.00 && $fila ['caja_inicio_cont'] == 0.00)
      {
        $caja_inicio_cont_porc =$fila ['caja_inicio_cont_porc'];
        $caja_inicio_cont= verifica ($monto,$caja_inicio_cont_porc,$filaMinimos ['caja_min_cont']);
        $controlCont=2;
      }else
        {
          if($fila ['caja_inicio_cont_porc'] == 0.00 && $fila ['caja_inicio_cont'] != 0.00 )
          {
            $caja_inicio_cont= $filaMinimos ['caja_min_cont'];
            $controlCont=1;
          }
        }
      }
      
      
      $sumaCForense= $caja_inicio_aporte + $caja_inicio_cont + $bono_ley;

      

      // valores rentas inicio

      if($fila ['rentas_inicio_general'] != 0.00)
      {
         $rentas_inicio_general= $filaMinimos ['rentas_inicio_general'];
      }else
        {
          $rentas_inicio_general=0.00;
        }      

      
      //$rentas_inicio_general= $filaMinimos ['rentas_inicio_general'];

      $rentas_inicio_tfija= $fila ['rentas_inicio_tfija'];

      //verifico valor de tasa variable rentas

      if($fila ['rentas_inicio_tvariable']!= 0.00)
      {
         $rentas_inicio_tasa_variable= verifica ($monto, $fila ['rentas_inicio_tvariable'], $filaMinimos ['rentas_minimo']);
      }

      $sumaDGR=$rentas_inicio_general+$rentas_inicio_tasa_variable+$rentas_inicio_tfija;


      //total de inicio

      $sumaInicio= $sumaCForense+$sumaDGR;

      $sumaInicio= number_format($sumaInicio, 2);


      //Verifico que haya valores para caja final

      if($fila ['caja_fin_aportes']!= 0.00)
      {
        $caja_fin_aportes=$filaMinimos['caja_min_aportes'];

      }else
      {
        if($fila ['caja_fin_ap_porc'] != 0.00)
        {
          $caja_fin_aportes= verifica ($monto, $fila ['caja_fin_ap_porc'], $filaMinimos ['caja_min_aporte']);

        }else
        {
          $caja_fin_aportes= 0.00;
        }
      }

      if($fila ['caja_fin_cont'] != 0.00)
      {
        $caja_fin_cont= $filaMinimos ['caja_min_cont'];
      }else
      {
        if($fila ['caja_fin_cont_porc'] != 0.00)
        {
          $caja_fin_cont= verifica ($mont, $fila ['caja_fin_ap_porc'], $filaMinimos ['caja_min_cont']);
          
        }else

        $caja_fin_cont= 0.00;
      }


      //valores rentas final

      if ($fila ['rentas_fin_general'] != 0.00) {
        $rentas_fin_general= $filaMinimos['rentas_inicio_general'];
      }else
      {
        $rentas_fin_general= 0.00;
      }

      //verifico valor de tasa variable rentas

      if ($fila['rentas_fin_tfija'] != 0.00) {

        $rentas_fin_tfija= verifica ($monto, $fila['rentas_fin_tfija'], $filaMinimos ['rentas_minimo']);
      }else
      {
        $rentas_fin_tfija= 0.00;
      }

      if($fila ['rentas_fin_tvariable']!= 0.00)
      {
        $rentas_fin_tasa_variable= verifica ($monto, $fila ['rentas_fin_tvariable'], $filaMinimos ['rentas_minimo']);
      }else
        {
          $rentas_fin_tasa_variable= 0.00;
        }
        

      $sumaFinDGR=$rentas_fin_general+$rentas_fin_tasa_variable+$rentas_fin_tfija;



      $sumaFinCajaForense= $caja_fin_aportes+$caja_fin_cont;

      $sumaFinalJuicio=$sumaFinCajaForense+$sumaFinDGR;// lo pongo aca porque el format de los numeros no deja sumar bien

      $sumaFinalJuicio= number_format($sumaFinalJuicio,2);
      $sumaFinCajaForense= number_format($sumaFinCajaForense, 2);
      $rentas_fin_tfija= number_format($rentas_fin_tfija, 2);
      $sumaFinDGR= number_format($sumaFinDGR, 2);
     

      //se hacen los redondeos a lo ultimo de todas las sumas ya que sino las comas que agrega el number_format alteran el esultado final

      //redondeos de inicio de caja
      //redondeo aportes a 2 decimales
      $caja_inicio_aporte=number_format($caja_inicio_aporte, 2);

      //redondeo contibuciones a 2 decimales
      $caja_inicio_cont=number_format($caja_inicio_cont, 2);

      //redondeo suma de aportes y contribuciones a 2 decimales
      $sumaCForense= number_format($sumaCForense, 2);

      //redondeo e tasas de DGR
      $rentas_inicio_tasa_variable= number_format($rentas_inicio_tasa_variable,2);

      //redondeo de suma de DGR 
      $sumaDGR=number_format($sumaDGR, 2);

  ?>
  <body>
<?php
include 'navbarFooter.php';
include 'logo.php';

    if(isset($_POST['calcular']))
      {
?>


<div class="container" id="containerCuerpo">

  <div class="panel panel-default" id="tabla-juicios">
      <div class="panel-heading">

        <?php
         print "<h4 class='panel-title'>Costos de Juicios: ".$materia.". Monto: $ ".number_format($monto, 2)."</h4>";
        ?>

      </div>
<div class="panel-body" id="montos">
<?php
//Si no hay finalizacion de juicio las tablas se centran en el panel

 if($sumaFinCajaForense != 0.00 || $sumaFinDGR != 0.00)
 {
  print "<div class='col-sm-6 col-md-6'>";
 }else
 {
  print "<div class='col-sm-6 col-md-6 col-md-offset-3'>";
 }

 ?>

  <h4>Costo de Iniciaci&oacute;n</h4>

    <table class="table-striped">

      <?php
      if($sumaCForense>0)
      {

        print "<caption>Caja Forense de La Pampa</caption>";

          if($bono_ley>0)
          print "<tr><td>Bono Ley N&#176; 422</td><td style='align:right;padding-left:30px;'>".$bono_ley."</td></tr>";


          switch ($controlAporte) {
            case 1:
              print "<tr><td>Aportes</td><td style='align:right;padding-left:30px;'>".$caja_inicio_aporte."</td></tr>";
              break;

            case 2:
              print "<tr><td>Aportes</td><td style='align:right;padding-left:30px;'>".$caja_inicio_aporte.
            "</td><td style='align:right;padding-left:30px;'>".$caja_inicio_ap_porc." %</td></tr>";
              break;
            
            case '':
              
              break;
          }

          switch ($controlCont) {
            case 1:
              print "<tr><td>Contribuciones</td><td style='align:right;padding-left:30px;'>".$caja_inicio_cont."</td></tr>";
              break;

            case 2:
              print "<tr><td>Contribuciones</td><td style='align:right;padding-left:30px;'>".$caja_inicio_cont.
            "</td><td style='align:right;padding-left:30px;'>".$caja_inicio_cont_porc." %</td></tr>";
              break;
              
            case '':
             
              break;  
          }

            //TOTAL DE CAJA FORENSE INICIO
            print "<tr style='border-style: solid;border-top-width: 2px;border-left: none;border-bottom:none;border-right:none;'><th>Total Caja Forense: </th>
            <th style='align:right;padding-left:30px;'>".$sumaCForense."</th></tr>";
      }

   
      ?>
    </table>



      <?php
               //verifico si rentas inicio tiene monto fijo o variable para mostrar la tabla

      if($sumaDGR!=0.00)
      {
        print "<table class='table-striped'>";

        print "<caption>Direcci&oacute;n General de Rentas</caption>";

        if($rentas_inicio_general != 0.00)
        {
          print "<tr><td>Tasa General</td><td style='align:right;padding-left:30px;'>".$rentas_inicio_general."</td></tr>";
        }

        if($rentas_inicio_tasa_variable != 0.00)
        {
          print "<tr><td>Tasa Esp. Variable</td><td style='align:right;padding-left:30px;'>".$rentas_inicio_tasa_variable."</td>
          <td style='align:right;padding-left:30px;'>".$fila ['rentas_inicio_tvariable']." %</td></tr>";;
        }

        if($rentas_inicio_tfija != 0.00)
        {
          print "<tr><td>Tasa Esp. Fija</td><td style='align:right;padding-left:30px;'>".$rentas_inicio_tfija."</td></tr>";
        }

        print "<tr style='border-style: solid;border-top-width: 2px;border-left: none;border-bottom:none;border-right:none;'><th>Total D.G.R: </th>
          <th style='align:right;padding-left:30px;'>".$sumaDGR."</th></tr>";
        print "</table>";
      }

      print "<div id='total-IniFin' class= 'well well-sm'>Total a Pagar al Inicio: $ ".$sumaInicio."</div>";
      ?>


<!--=================================================================================================================================================================================-->
<!--Comienzo de la tabla de finalizacion de Juicios-->
<!--=================================================================================================================================================================================-->

<?php
  if ($sumaFinCajaForense != 0.00)
  {
    ?>
    </div>

    <div class="col-sm-6 col-md-6">

    <h4>Costo de Finalizaci&oacute;n</h4>

    <table class="table-striped">

      <?php
      if($sumaFinCajaForense>0)
      {

        print "<caption>Caja Forense de La Pampa</caption>";

        if($sumaFinCajaForense > 0)
        {
          if($fila['caja_fin_aportes'] != 0.00)
          {
            print "<tr><td>Aportes</td><td style='align:right;padding-left:30px;'>".number_format($caja_fin_aportes,2)."</td></tr>";
          }else
          {
            if($fila['caja_fin_ap_porc'] != 0.000000)
            {
              print "<tr><td>Aportes</td><td style='align:right;padding-left:30px;'>".number_format($caja_fin_aportes,2).
              "</td><td style='align:right;padding-left:30px;'>".number_format($fila['caja_fin_ap_porc'],2)." %</td></tr>";
            }
          }
        }

          if($fila['caja_fin_cont'] != 0.00)
          {
            print "<tr><td>Contribuciones</td><td style='align:right;padding-left:30px;'>".$caja_fin_cont."</td></tr>";
          }else
          {
            if ($fila['caja_fin_cont_porc'] != 0.000000) {
              print "<tr><td>Contribuciones</td><td style='align:right;padding-left:30px;'>".$caja_fin_cont.
              "</td><td style='align:right;padding-left:30px;'>".number_format($fila['caja_fin_cont_porc'],2)." %</td></tr>";
            }
            
          }

          if ($sumaFinCajaForense > 0)
          {
            print "<tr style='border-style: solid;border-top-width: 2px;border-left: none;border-bottom:none;border-right:none;'><th>Total Caja Forense: </th>
            <th style='align:right;padding-left:30px;'>".$sumaFinCajaForense."</th></tr>";
          }else
          {
            print "<tr style='border-style: solid;border-top-width: 2px;border-left: none;border-bottom:none;border-right:none;'><th>Total Caja Forense: </th>
            <th style='align:right;padding-left:30px;'>".$sumaFinalJuicio."</th></tr>";
          }


      }


      ?>
    </table>

    <?php
               //verifico si rentas fin tiene monto fijo o variable para mostrar la tabla

      if($sumaFinDGR!=0.00)
      {
        print "<table class='table-striped'>";

        print "<caption>Direcci&oacute;n General de Rentas</caption>";

        if($rentas_fin_general != 0.00)
        {
          print "<tr><td>Tasa General</td><td style='align:right;padding-left:30px;'>".$rentas_fin_general."</td></tr>";
        }

        if($rentas_fin_tasa_variable != 0.00)
        {
          print "<tr><td>Tasa Esp. Variable</td><td style='align:right;padding-left:30px;'>".$rentas_fin_tasa_variable."</td>
          <td style='align:right;padding-left:30px;'>".number_format($fila ['rentas_fin_tvariable'],2)." %</td></tr>";;
        }

        if($rentas_fin_tfija != 0.00)
        {
          print "<tr><td>Tasa Esp. Fija</td><td style='align:right;padding-left:30px;'>".$rentas_fin_tfija."</td>
          <td style='align:right;padding-left:30px;'>".number_format($fila ['rentas_fin_tfija'],2)." %</td></tr>";
        }

        print "<tr style='border-style: solid;border-top-width: 2px;border-left: none;border-bottom:none;border-right:none;'><th>Total D.G.R: </th>
          <th style='align:right;padding-left:30px;'>".$sumaFinDGR."</th></tr>";
        print "</table>";
      }

    print "<div id='total-IniFin' class= 'well well-sm'>Total a Pagar al Finalizar: $ ".$sumaFinalJuicio."</div>";
  }
?>
   
</div>

</div>

<div id='total-IniFin' class= 'well well-sm'>La información que se suministra no tiene validez legal. Los datos son meramente informativos, por lo que no constituyen ni reemplazan
                                             las liquidaciones formales que efectúan la Caja Forense de La Pampa y la Dirección General de Rentas.
                                             Para la programación de este aplicativo se han tomado como referencia las disposiciones de la Ley 1861 y de la Ley Impositiva.</div>

</div>

  <div class='panel panel-default'>
    <div class='panel-heading'>
      <button id="boton-noticia" style="background: url(imagenes/logos/fondo_azul.png);" type='button' class='btn btn-info  btn-lg' 
      name='calcular' onclick= 'return imprJus();'>Imprimir</button>
    
      <a id="link-Botones" href="montosJuicios.php"><button id="boton-noticia" style="background: url(imagenes/logos/fondo_azul.png);" type='button' class='btn btn-info  btn-lg' 
        name='volver' style='margin-left:15px;'>Volver</button></a> 
    </div>
  </div>

</div>





</body>

<div id="printno">
<?php
include 'footer.php';
include 'footer1.php';
 }//aca termina else de isset calcular

}/*termina el else de que si no hay session disponible, o si no entro por el index */

?>
</div>
  </html>
<script type="text/javascript">
var juicios = [
<?php

$consulta="select * from ValoresCajaRentas where materia NOT LIKE '%SUCES%' order by materia asc"; /*busca todo menos los que tenga suces*/
$result=mysql_query($consulta, $conexion);
$n= mysql_num_rows($result);
$i=0;


  for($i;$i<=$n;$i++)
  {
    $fila= mysql_fetch_array($result);
    if($fila["materia"]!="")
    {

      print ('"'.$fila["materia"].'",');
     }
  }

// funcion verifica montos

 function verifica ($a,$b,$minimo)
      {
        $valor1=$a * ($b/100);

        if($valor1>$minimo)
          return $valor1;
        else
          return $minimo;
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

</script>

<?php
  
  session_unregister ("juicio");

?>