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
      $monto= $_REQUEST ['monto'];
      $consulta= mysql_query("select * from ValoresCajaRentas where Materia = 'SUCESION AB-INTESTATO'") or die ("No se pudo realizar la consulta");

      
      $nfilas= mysql_num_rows($consultaMinimos);

      for($i=0;$nfilas>$i;$i++)
        {
          $filaMinimos= mysql_fetch_array($consultaMinimos);
        }
      $fila= mysql_fetch_array($consulta);
      $bono_ley= $fila ['bono_ley'];
      $caja_inicio_ap_porc= $fila ['caja_inicio_ap_porc'];
      $caja_inicio_cont_porc= $fila ['caja_inicio_cont_porc'];
      $caja_inicio_aporte= verifica ($monto,$caja_inicio_ap_porc,$filaMinimos ['caja_inicio_aporte']);
      $caja_inicio_cont= verifica ($monto,$caja_inicio_cont_porc,$filaMinimos ['caja_inicio_cont']);
      $sumaCForense= $caja_inicio_aporte + $caja_inicio_cont + $bono_ley;

      //redondeo aportes a 2 decimales
      $caja_inicio_aporte=number_format((float)$caja_inicio_aporte, 2, '.', '');

      //redondeo contibuciones a 2 decimales
      $caja_inicio_cont=number_format((float)$caja_inicio_cont, 2, '.', '');

      //redondeo suma de aportes y contribuciones a 2 decimales
      $sumaCForense= number_format((float)$sumaCForense, 2, '.', '');

      // valores rentas inicio

      if($fila ['rentas_inicio_general'] != 0.00)
      {
         $rentas_inicio_general= $filaMinimos ['rentas_inicio_general'];
      }

      $rentas_inicio_tfija= $fila ['rentas_inicio_tfija'];

      //verifico valor de tasa variable rentas

      if($fila ['rentas_inicio_tvariable']!= 0.00)
      {
         $rentas_inicio_tasa_variable= verifica ($monto, $fila ['rentas_inicio_tvariable'], $filaMinimos ['rentas_minimo']);
      }

      $sumaDGR=$rentas_inicio_general+$rentas_inicio_tasa_variable+$rentas_inicio_tfija;

      $sumaDGR=number_format((float)$sumaDGR, 2,'.','');

      //total de inicio

      $sumaInicio= $sumaCForense+$sumaDGR;

      $sumaInicio= number_format((float)$sumaInicio, 2, '.','');

      //Verifico que haya valores para

      if($fila ['caja_fin_aportes']!= '')
      {
        $caja_fin_aportes=$fila['caja_fin_aportes'];
        $caja_fin_aportes=number_format((float)$caja_fin_aportes,2,',','');
      }else
      {
        if($fila ['caja_fin_ap_porc']!='')
        {
          $caja_fin_aportes= verifica ($monto, $fila ['caja_fin_ap_porc'], $filaMinimos ['caja_inicio_aporte']);
          $caja_fin_aportes=number_format((float)$caja_fin_aportes,2,',','');
          $caja_fin_ap_porc= $fila ['caja_fin_ap_porc'];
        }else
        {
          $caja_fin_aportes= 0.00;
        }
      }

      if($fila ['caja_fin_cont'] != '')
      {
        $caja_fin_cont= $filaMinimos ['caja_fin_cont'];
      }else
      {
        if($fila ['caja_fin_cont_porc'])
        {
          $caja_fin_cont= verifica ($mont, $fila ['caja_fin_ap_porc'], $filaMinimos ['caja_inicio_cont']);
          $caja_fin_cont_porc= $fila ['caja_fin_cont_porc'];
        }else
        $caja_fin_cont= 0.00;
      }

      $sumaFinCajaForense= $caja_fin_aportes+$caja_fin_cont;
      $sumaFinCajaForense= number_format((float)$sumaFinCajaForense, 2, '.','');
      $sumaFinalJuicio=$sumaFinCajaForense;

  ?>
  <body>



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
                  <li class="active"><a href="sucesiones.php">Costos de sucesiones</a></li>
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


<div class="container" style="margin-top: 30px; height: 600px;">


  <div class="panel panel-default" id="tabla-juicios">
      <div class="panel-heading">

        <?php
         print "<h3 class='panel-title'>Costos de Juicios: ".$materia.". Monto: $ ".$monto."</h3>";
        ?>

      </div>
<div class="panel-body" id="montos">
<?php

//Si no hay finalizacion de juicio las tablas se centran en el panel

 if($sumaFinCajaForense != 0.00)
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

          if($caja_inicio_ap_porc == '')
          {
            print "<tr><td>Aportes</td><td style='align:right;padding-left:30px;'>".$caja_inicio_aporte."</td></tr>";
          }else
          {
            print "<tr><td>Aportes</td><td style='align:right;padding-left:30px;'>".$caja_inicio_aporte.
            "</td><td style='align:right;padding-left:30px;'>".$caja_inicio_ap_porc." %</td></tr>";
          }

          if($caja_inicio_cont_porc == '')
          {
            print "<tr><td>Contribuciones</td><td style='align:right;padding-left:30px;'>".$caja_inicio_cont."</td></tr>";
          }else
          {
            print "<tr><td>Contribuciones</td><td style='align:right;padding-left:30px;'>".$caja_inicio_cont.
            "</td><td style='align:right;padding-left:30px;'>".$caja_inicio_cont_porc." %</td></tr>";
          }

          if ($sumaCForense>0)
          {
            print "<tr style='border-style: solid;border-top-width: 2px;border-left: none;border-bottom:none;border-right:none;'><th>Total Caja Forense: </th>
            <th style='align:right;padding-left:30px;'>".$sumaCForense."</th></tr>";
          }else
          {
            print "<tr style='border-style: solid;border-top-width: 2px;border-left: none;border-bottom:none;border-right:none;'><th>Total Caja Forense: </th>
            <th style='align:right;padding-left:30px;'>".$sumaCForense."</th></tr>";
          }


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
          print "<tr><td>Tasa General</td><td style='align:right;padding-left:30px;'>".$filaMinimos ['rentas_inicio_general']."</td></tr>";
        }

        if($rentas_inicio_tasa_variable != 0.00)
        {
          print "<tr><td>Tasa Especial Variable</td><td style='align:right;padding-left:30px;'>".$rentas_inicio_tasa_variable."</td>
          <td style='align:right;padding-left:30px;'>".$fila ['rentas_inicio_tvariable']." %</td></tr>";;
        }

        if($rentas_inicio_tfija != 0.00)
        {
          print "<tr><td>Tasa Especial Fija</td><td style='align:right;padding-left:30px;'>".$rentas_inicio_tfija."</td></tr>";
        }

        print "<tr style='border-style: solid;border-top-width: 2px;border-left: none;border-bottom:none;border-right:none;'><th>Total Caja Forense: </th>
          <th style='align:right;padding-left:30px;'>".$sumaDGR."</th></tr>";
        print "</table>";
      }

      print "<div id='total-IniFin' class= 'well well-sm'>Total a Pagar al Inicio: $ ".$sumaInicio."</div>";
      ?>


<!--=================================================================================================================================================================================-->
<!--Comienzo de la tabla de finalizacion de Juicios-->
<!--=================================================================================================================================================================================-->

<?php
  if ($sumaFinCajaForense!=0.00)
  {
    ?>
    </div>

    <div class="col-sm-6 col-md-6">

    <h4>Costo de Finalizaci&oacute;n</h4>

    <table class="table-striped">

      <?php
      if($sumaCForense>0)
      {

        print "<caption>Caja Forense de La Pampa</caption>";

        if($caja_fin_ap_porc != ''|| $caja_fin_aporte != 0.00)
        {
          if($caja_fin_aporte != 0.00)
          {
            print "<tr><td>Aportes</td><td style='align:right;padding-left:30px;'>".$caja_fin_aportes."</td></tr>";
          }else
          {
            if($caja_fin_ap_porc != '')
            {
              print "<tr><td>Aportes</td><td style='align:right;padding-left:30px;'>".$caja_fin_aportes.
              "</td><td style='align:right;padding-left:30px;'>".$caja_fin_ap_porc." %</td></tr>";
            }
          }
        }

          if($caja_fin_cont_porc == '')
          {
            print "<tr><td>Contribuciones</td><td style='align:right;padding-left:30px;'>".$caja_fin_cont."</td></tr>";
          }else
          {
            print "<tr><td>Contribuciones</td><td style='align:right;padding-left:30px;'>".$caja_fin_cont.
            "</td><td style='align:right;padding-left:30px;'>".$caja_fin_cont_porc." %</td></tr>";
          }

          if ($sumaCForense>0)
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
    print "<div id='total-IniFin' class= 'well well-sm'>Total a Pagar al Finalizar: $ ".$sumaFinalJuicio."</div>";
  }
?>
   
</div>

</div>
<div id="noprint" class="panel-footer">

 
   <button type='button' class='btn btn-info  btn-lg' name='calcular' onclick= 'doPrint ()'>Imprimir</button>
   <button type='button' class='btn btn-info  btn-lg' name='volver' onclick= 'volver ()' style='margin-left:15px;'>Volver</button>
 

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
 document.all.item("noprint").style.visibility="hidden"
 window.print()
 document.all.item("noprint").style.visibility="visible"
 
 }

</script>

<?php
  
  session_unregister ("juicio1");

?>