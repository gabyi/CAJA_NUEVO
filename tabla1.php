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
    <meta charset="utf8_general_ci"><!--para que aparezca la ñ-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="imagenes/logo.ico"/>

    <title>Caja Forense de La Pampa</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!--mi estilo -->
    <link href="css/miestilo.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/offcanvas.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>

     <!--Estos estan agregados para que minimece la barra movil-->
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://getbootstrap.com/dist/js/bootstrap.js"></script>

    <!--<link type="text/css" rel="stylesheet" href="http://getbootstrap.com/dist/css/bootstrap.css">-->

    <link href="css/jquery-ui.css" rel="stylesheet">
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/jquery-ui.min.js" type="text/javascript"></script>

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

      $sumaFinCajaForense= $caja_fin_aportes + $caja_fin_cont;

      $sumaFin= $caja_fin_aportes + $caja_fin_cont + $tasaVariable;


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
  <body style="height:900px;">



  <nav class="navbar navbar-fixed-top navbar-default" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

                <a class="navbar-brand" href="index.php">Caja Forense de La Pampa</a>

        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Inicio</a></li>
             <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown">Institucional <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Creacion y objetivos</a></li>
                    <!--<li class="divider"><li> Este se pone para hacer una linea divisoria entre los li-->
                    <li><a href="#">Autoridades</a></li>
                    <li><a href="#">Marco normativo y financiamiento</a></li>
                    <li><a href="#">Coordinadora de cajas</a></li>
                  </ul>
             </li>
             <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Costos<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="montosJuicios.php">Costos de juicios</a></li>
                  <li><a href="sucesiones.php">Costos de sucesiones</a></li>
                </ul>
              </li>

             <li><a href="contacto.php">Contacto</a></li>
          </ul>
        </div><!-- /.nav-collapse -->

       </div><!-- /.container -->
    </nav><!-- /.navbar -->
<?php
include 'logo.php';

    if(isset($calcular1))
      {
?>


<div class="container" style="margin-top: 30px;">


  <div class="panel panel-default" id="tabla-juicios">
      <div class="panel-heading">

        <?php

         print "<h3 class='panel-title'>Costos de Acervo Hereditario. Monto: $ ".$monto.". ".$poder."</h3>";

        ?>

      </div>
<div class="panel-body" id="montos">

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


<div class="col-sm-6 col-md-6">

    <h4>Costo previo a inscribir los bienes</h4>

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


   <button type='button' class='btn btn-info  btn-lg' name='calcular' onclick= 'doPrint ()'>Imprimir</button>
   <a href="sucesiones.php"><button type='button' class='btn btn-info  btn-lg' name='volver' style='margin-left:15px;'>Volver</button></a>


</div>
</div>
</div>





</body>

<?php
 }//aca termina else de isset calcular

}/*termina el else de que si no hay session disponible, o si no entro por el index */

?>
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
 document.all.item("noprint").style.visibility="hidden"
 window.print()
 document.all.item("noprint").style.visibility="visible"

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