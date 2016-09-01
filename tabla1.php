<?php
session_start();
?>
<?php

if(isset($calcular1))
{
  $juicio= "juicio";
  session_register ("juicio");
}

  if( $_SESSION ['juicio']=="")  //lo puse asi para que si se accede desde 0 te manda al index si apretas enviar entra
  {
    include'redir.php';

  }else /*<!-- aca termina el if si no paso por el index*/
{
?>

<!DOCTYPE html>
<html lang="es">

  <head>
    <?php 
      include 'head2.php';
     ?>    
    <title>Costos de Sucesiones</title>

  </head>
  <?php

      include 'conexion.php';
      $materia=$_REQUEST ['juicio'];
      $monto= $bg1 + $bg2 + $bp1 + $bp2;
      $consulta= mysql_query("select * from ValoresCajaRentas where Materia = 'SUCESION AB-INTESTATO'") or die ("No se pudo realizar la consulta");


      $nfilas= mysql_num_rows($consulta);




      if ($oficio)
        {
          $sel = 1;
        }

      if ($sel == 1)
       {
        $vhonorarios = ($bg1 + ($bg2 / 3 * 2)) * 0.0693 + ($bp1 + ($bp2 / 3 * 2)) * 0.0924;

          if ($oficio)
            {
              $vhonorarios = $vhonorarios / 3;
            }
        }else
        {
          $vhonorarios = ($bg1 + ($bg2 / 3 * 2)) * 0.0495 + ($bp1 + ($bp2 / 3 * 2)) * 0.066;
        }


        if ($sel == 1)
        {
          $poder="Act&uacute;a con Poder";
        }else
         {
          $poder="Act&uacute;a por Derecho Propio";
        }


        if ($oficio)
          {
            $poder=$poder." y Oficio Ley 22.172";
          }

          //consulto la ultima fila de los minimos para sacar el valor actualizado

      $consultaMinimos= mysql_query("select * from minimos") or die ("No se puedo realizar consulta de minimos");

      $nfilas= mysql_num_rows($consultaMinimos);

      for($i=0;$nfilas>$i;$i++)
        {
          $filaMinimos= mysql_fetch_array($consultaMinimos);
        }

      $fila= mysql_fetch_array($consulta);
      $bono_ley= $filaMinimos ['bono_ley'];
      $caja_inicio_aporte= $filaMinimos ['caja_min_aporte'];
      $caja_inicio_cont= $filaMinimos ['caja_min_cont'];

      $sumaCForense= $caja_inicio_aporte + $caja_inicio_cont + $bono_ley;


      $rentas_inicio_general= $filaMinimos ['rentas_inicio_general'];



      //total de inicio

      $sumaInicio= $sumaCForense+$rentas_inicio_general;


      //Costo previo a inscribir

      $caja_fin_aportes= $vhonorarios * 0.15;

      $caja_fin_cont= $monto * 0.005;

      $tasaVariable=($bp1 + $bg1) * ($fila ['rentas_fin_tvariable'] / 100);

    
      //haciendo las sumas de las tablas
      $sumaFinCajaForense= $caja_fin_aportes + $caja_fin_cont;

      $sumaFin= $caja_fin_aportes + $caja_fin_cont + $tasaVariable;

      //casteando los numeros
      $caja_fin_aportes= number_format($caja_fin_aportes, 2);
      $caja_fin_cont= number_format($caja_fin_cont, 2);
      $monto=number_format($monto, 2);
      $vhonorarios=number_format($vhonorarios, 2);
      $tasaVariable=number_format($tasaVariable, 2);
      $sumaFinCajaForense=number_format($sumaFinCajaForense, 2);
      $sumaFin= number_format($sumaFin, 2);
      $sumaCForense= number_format($sumaCForense, 2);
      $sumaInicio= number_format($sumaInicio, 2);

?>
  <body>

<?php
include 'navbarFooter.php';
include 'logo.php';

    if(isset($calcular1))
      {
?>


<div class="container" id="containerCuerpo">


  <div class="panel panel-default" id="panel">
      <div class="panel-heading">

        <?php

         print "<h3>Costos de Acervo Hereditario. Monto: $ ".$monto.". ".$poder."</h3>";

        ?>

      </div>
<div id="panel-cuerpo" class="panel-body">

 <div class="col-sm-6 col-md-6">

  <h4>Costo de Iniciaci&oacute;n</h4>

    <table class="table-striped">

      <?php



        print "<caption>Caja Forense de La Pampa</caption>";


          print "<tr><td>Bono Ley N&#176; 422</td><td style='align:right;padding-left:30px;'>".$bono_ley."</td></tr>";

          print "<tr><td>Aportes</td><td style='align:right;padding-left:30px;'>".$caja_inicio_aporte."</td></tr>";

          print "<tr><td>Contribuciones</td><td style='align:right;padding-left:30px;'>".$caja_inicio_cont."</td></tr>";

          print "<tr style='border-style: solid;border-top-width: 2px;border-left: none;border-bottom:none;border-right:none;'><th>Total Caja Forense: </th>
          <th style='align:right;padding-left:30px;'>".$sumaCForense."</th></tr>";


      ?>
    </table>



      <?php

        print "<table class='table-striped'>";

        print "<caption>Direcci&oacute;n General de Rentas</caption>";

        print "<tr><td>Tasa General</td><td style='align:right;padding-left:30px;'>".$rentas_inicio_general."</td></tr>";

        print "<tr style='border-style: solid;border-top-width: 2px;border-left: none;border-bottom:none;border-right:none;'><th>Total Caja Forense: </th>
          <th style='align:right;padding-left:30px;'>".$rentas_inicio_general."</th></tr>";
        print "</table>";

        print "<div id='total-IniFin' class= 'well well-sm'>Total a Pagar al Inicio: $ ".$sumaInicio."</div>";

      ?>

  </div>

<!--=================================================================================================================================================================================-->
<!--Comienzo de la tabla de finalizacion de Juicios-->
<!--=================================================================================================================================================================================-->


<div class="col-sm-6 col-md-6" id="sucesDer">

    <h4>Presupuesto previo a inscribir los bienes</h4>

    <table class="table-striped">

      <?php


        print "<caption>Caja Forense de La Pampa</caption>";

        print "<tr><td>Aportes</td><td style='align:right;padding-left:30px;'>".$caja_fin_aportes."</td></tr>";

        print "<tr><td>Contribuciones</td><td style='align:right;padding-left:30px;'>".$caja_fin_cont."</td></tr>";

        print "<tr style='border-style: solid;border-top-width: 2px;border-left: none;border-bottom:none;border-right:none;'><th>Total Caja Forense: </th>
        <th style='align:right;padding-left:30px;'>".$sumaFinCajaForense."</th></tr>";

      ?>
    </table>


    <table class="table-striped">

      <?php


        print "<caption>Direcci&oacute;n General de Rentas</caption>";

        print "<tr><td>Tasa Especial Variable</td><td style='align:right;padding-left:30px;'>".$tasaVariable."</td></tr>";

        print "<tr style='border-style: solid;border-top-width: 2px;border-left: none;border-bottom:none;border-right:none;'><th>Total Caja Forense: </th>
        <th style='align:right;padding-left:30px;'>".$tasaVariable."</th></tr>";

      ?>
    </table>

     <?php
    print "<div id='total-IniFin' class= 'well well-sm'>Total a Pagar al Finalizar: $ ".$sumaFin."</div>";
    ?>

</div>
</div>

<?php
  print "<div id='total-IniFin' class= 'well well-sm'>Honorarios Minimos segun Ley de Aranceles: $ ".$vhonorarios."</div>"; //cambiar los montos
 ?>

<div id="noprint" class="panel-footer">


   <button id="boton-noticia" style="background: url(imagenes/logos/fondo_azul.png);" type='button' class='btn btn-info  btn-lg' name='calcular' onclick= 'doPrint ()'>Imprimir</button>
   <a href="sucesiones.php"><button id="boton-noticia" style="background: url(imagenes/logos/fondo_azul.png);" type='button' class='btn btn-info  btn-lg' name='volver' style='margin-left:15px;'>Volver</button></a>


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

?>

];
$( "#juicio" ).autocomplete({
  source: juicios
});

/*
function volver ()
{
 window.history.back();
}
*/

function doPrint(){
 //document.all.item("noprint").style.visibility="hidden"
 //document.all.item("printno").style.visibility="hidden" //tuve que hacer este div porque no toma 2 div con el mismo id, se traba el browser
 
 window.print()
 //document.all.item("noprint").style.visibility="visible"
 //document.all.item("printno").style.visibility="visible"

 }

</script>

<?php

  session_unregister ("juicio1");


  function calculaAportes ($a, $b)
      {
        $valor=$a * ($b/100);
        return $valor;
      }

?>