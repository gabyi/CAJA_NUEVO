<?php 
      echo "<div class='panel panel-default' id='panel11'>";
      echo "<div class='panel-heading'>";

       

      echo "<h4>Costos de Acervo Hereditario. Monto: $ ".$monto.". ".$poder."</h4>";



      echo "</div>";

           
       
      echo "<div id='panel-cuerpo' class='panel-body'>";
 
      if (!$oficio)
      { 

      echo "<div class='col-sm-6 col-md-6'>";

      echo "<h4>Costo de Iniciaci&oacute;n</h4>";


 


         
        echo "<table class='table-striped' id='resultajui'>";

        echo "<caption>Caja Forense de La Pampa</caption>";


        echo "<tr><td>Bono Ley N&#176; 422</td><td style='align:right;padding-left:30px;'>".$bono_ley."</td></tr>";

        echo "<tr><td>Aportes</td><td style='align:right;padding-left:30px;'>".$caja_inicio_aporte."</td></tr>";

        echo "<tr><td>Contribuciones</td><td style='align:right;padding-left:30px;'>".$caja_inicio_cont."</td></tr>";

        echo "<tr style='border-style: solid;border-top-width: 2px;border-left: none;border-bottom:none;border-right:none;'><th>Total Caja Forense: </th>
        <th style='align:right;padding-left:30px;'>".$sumaCForense."</th></tr>";

        echo "</table>";


        echo "<table class='table-striped'>";

        echo "<caption>Direcci&oacute;n General de Rentas</caption>";

        echo "<tr><td>Tasa General</td><td style='align:right;padding-left:30px;'>".$rentas_inicio_general."</td></tr>";

        echo "<tr style='border-style: solid;border-top-width: 2px;border-left: none;border-bottom:none;border-right:none;'><th>Total Caja Forense: </th>
          <th style='align:right;padding-left:30px;'>".$rentas_inicio_general."</th></tr>";
        echo "</table>";

        echo "<div id='total-IniFin' class= 'well well-sm'>Total a Pagar al Inicio: $ ".$sumaInicio."</div>";



  echo "</div>";

         }

/*<!--=================================================================================================================================================================================-->
<!--Comienzo de la tabla de finalizacion de Juicios-->
<!--=================================================================================================================================================================================-->
*/   

        echo"<div class='col-sm-6 col-md-6' id='sucesDer'>";

        echo "<h4>Presupuesto previo a inscribir los bienes</h4>";

        echo "<table class='table-striped'>";

        echo "<caption>Caja Forense de La Pampa</caption>";

        echo "<tr><td>Aportes</td><td style='align:right;padding-left:30px;'>".$caja_fin_aportes."</td></tr>";

        echo "<tr><td>Contribuciones</td><td style='align:right;padding-left:30px;'>".$caja_fin_cont."</td></tr>";

        echo "<tr style='border-style: solid;border-top-width: 2px;border-left: none;border-bottom:none;border-right:none;'><th>Total Caja Forense: </th>
        <th style='align:right;padding-left:30px;'>".$sumaFinCajaForense."</th></tr>";

        echo "</table>";

        if (!$oficio)
        {  

        echo "<table class='table-striped'>";

        echo "<caption>Direcci&oacute;n General de Rentas</caption>";

        echo "<tr><td>Tasa Especial Variable</td><td style='align:right;padding-left:30px;'>".$tasaVariable."</td></tr>";

        echo "<tr style='border-style: solid;border-top-width: 2px;border-left: none;border-bottom:none;border-right:none;'><th>Total D.G.R.: </th>
        <th style='align:right;padding-left:30px;'>".$tasaVariable."</th></tr>";

        echo "</table>";

        }
        echo "<div id='total-IniFin' class= 'well well-sm'>Total a Pagar al Finalizar: $ ".$sumaFin."</div>";

        echo "</div>";

        echo "</div>";


        echo "<div id='total-IniFin' class= 'well well-sm'>Honorarios Mínimos según Ley de Aranceles: $ ".$vhonorarios."</div>"; //cambiar los montos

        echo "<div id='total-IniFin' class= 'well well-sm'>La información que se suministra no tiene validez legal. Los datos son meramente informativos, por lo que no constituyen ni reemplazan
                                             las liquidaciones formales que efectúan la Caja Forense de La Pampa y la Dirección General de Rentas.
                                             Para la programación de este aplicativo se han tomado como referencia las disposiciones de la Ley 1861 y de la Ley Impositiva.</div>";

  echo "</div>"; //termina el panel body

    echo "<div class='panel panel-default'>";
      echo "<div class='panel-heading'>";
        echo "<button id='boton-noticia' style='background: url(imagenes/logos/fondo_azul.png);' type='button' class='btn btn-info  btn-lg' name='calcular' onclick= 'return imprJui();'>Imprimir</button>";
        echo "<a href='sucesiones.php'><button id='boton-noticia' style='background: url(imagenes/logos/fondo_azul.png);' type='button' class='btn btn-info  btn-lg' name='volver' style='margin-left:15px;'>Volver</button></a>";
      echo "</div>";
    echo "</div>";
?>
