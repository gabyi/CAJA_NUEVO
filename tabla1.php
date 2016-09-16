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

  include 'calculosucesiones.php';
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

<?php 



 ?>

 <div class="col-sm-6 col-md-6">

  <h4>Costo de Iniciaci&oacute;n</h4>


      <?php


         
        print "<table class='table-striped'>";

        print "<caption>Caja Forense de La Pampa</caption>";


        print "<tr><td>Bono Ley N&#176; 422</td><td style='align:right;padding-left:30px;'>".$bono_ley."</td></tr>";

        print "<tr><td>Aportes</td><td style='align:right;padding-left:30px;'>".$caja_inicio_aporte."</td></tr>";

        print "<tr><td>Contribuciones</td><td style='align:right;padding-left:30px;'>".$caja_inicio_cont."</td></tr>";

        print "<tr style='border-style: solid;border-top-width: 2px;border-left: none;border-bottom:none;border-right:none;'><th>Total Caja Forense: </th>
        <th style='align:right;padding-left:30px;'>".$sumaCForense."</th></tr>";

        print "</table>";


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
      <?php

        print"<div class='col-sm-6 col-md-6' id='sucesDer'>";

        print "<h4>Presupuesto previo a inscribir los bienes</h4>";

        print "<table class='table-striped'>";

        print "<caption>Caja Forense de La Pampa</caption>";

        print "<tr><td>Aportes</td><td style='align:right;padding-left:30px;'>".$caja_fin_aportes."</td></tr>";

        print "<tr><td>Contribuciones</td><td style='align:right;padding-left:30px;'>".$caja_fin_cont."</td></tr>";

        print "<tr style='border-style: solid;border-top-width: 2px;border-left: none;border-bottom:none;border-right:none;'><th>Total Caja Forense: </th>
        <th style='align:right;padding-left:30px;'>".$sumaFinCajaForense."</th></tr>";

        print "</table>";



        print "<table class='table-striped'>";

        print "<caption>Direcci&oacute;n General de Rentas</caption>";

        print "<tr><td>Tasa Especial Variable</td><td style='align:right;padding-left:30px;'>".$tasaVariable."</td></tr>";

        print "<tr style='border-style: solid;border-top-width: 2px;border-left: none;border-bottom:none;border-right:none;'><th>Total D.G.R.: </th>
        <th style='align:right;padding-left:30px;'>".$tasaVariable."</th></tr>";

        print "</table>";


        print "<div id='total-IniFin' class= 'well well-sm'>Total a Pagar al Finalizar: $ ".$sumaFin."</div>";

        print "</div>";

        print "</div>";


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