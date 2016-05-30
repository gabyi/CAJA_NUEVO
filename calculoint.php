<?php
session_start();
?>
<?php

  if($_SESSION['user']=="" && !isset($calcular))  //lo puse asi para que si se accede desde 0 te manda al index si apretas enviar entra
  {
    include'redir.php';
  }else /*<!-- aca termina el if si no paso por el index*/
{

?>

<!DOCTYPE html>
<html lang="es">
<meta charset="utf-8">
  <head>
     <?php
      include 'head2.php';
      include 'conexion.php';
      ?>
      <!--mi estilo -->
    <link href="css/mestilocalculo.css" rel="stylesheet">


  

<!--PARA EL DATEPICKER-->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="js/jquery-1.10.2.js"></script>
  <script src="js/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">

  <title>Presupuesto de Sucesiones</title>
  </head>

  <body>
<?php 
  include 'navbarFooter.php';
  include 'logo.php';
 ?>

<div class="container" id="containerCuerpo">

  <div class="row">

	<div id="forminteres" class="panel panel-default">
  		<div class="panel-heading">
        C&aacute;lculo de intereses
      </div>   		
  		
  		<div id="" class="panel-body">
    	 <!--<form name="frmSample" class="form-horizontal" method="post" onSubmit="return ValidateForm()">-->

<?php  
if(!isset($calcular))
{
  session_register('contador'); //cuenta las veces que aprete el isset
  session_register('valores');//guarda los valores de la tabla
  session_register('totales');//suma los totales
}

if(isset($calcular))
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
  

  if($mes1==$mes0)
    {
      $consulta="select indice from ".$tasa." where MONTH(fecha) = '".$mes0."' AND YEAR(fecha) = '".$año0."' ";  
      $query= mysql_query($consulta) or die ("no se pudo realizar la consulta paso 1");  
      $numeroDias = cal_days_in_month(CAL_GREGORIAN, $mes0, $año0);
      $dias=$dia1-$dia0;
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
      <form name'frmSample' class='form-horizontal' method='post' action='calculoint.php'>

        <!--  <form name='frmSample' class='form-horizontal' method='post' action=''>
        <!--=================================================================================================================================-->
								<!-- Juicio input-->

                <div class="form-group">
                    <div class="col-md-2 col-sm-2 control-label" for="carat">
                      <h4>Car&aacute;tula</h4>
                    </div>

                      
                    <div class="col-sm-4 col-md-4">
                        
                        <input type='text' class='form-control' id='carat' name='carat' placeholder='' value=<?php if(isset($calcular)){ print '"'.$carat.'"';}?>>
                      
                    </div>


                    <div class="col-md-2 col-sm-2 control-label" for="fechcalc">
                      <h4>Fecha C&aacute;lculo</h4>
                    </div>

                    <div class="col-sm-4 col-md-4">

                     <input class="form-control" id="vfhasta" name="vfhasta" placeholder="DD/MM/YYYY" type="text" value="" disabled/>  <!--FECHA PARA EL CALCULO ORIGEN-->

                    </div>
                </div>

                

                <div class="form-group">
                    <div class="col-sm-2 col-md-2 control-label" for="concep">
                      <h4>Concepto</h4>
                    </div>


                    <div class="col-sm-4 col-md-4">
                      <input type="text" class="form-control" id="concep" name="concep" placeholder="" value="">
                    </div>


                    <div class="col-md-2 col-sm-2 control-label" for="fechcalc">
                      <h4>Fecha Origen</h4>
                    </div>

                    <div class="col-sm-4 col-md-4">

                      <input class="form-control" id="vfdesde" name="vfdesde" placeholder="DD/MM/YYYY" type="text" value=""/>  <!--FECHA PARA EL CALCULO FIN-->

                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-2 col-md-2 control-label" for="importe">
                      <h4>Importe</h4>
                    </div>


                    <div class="col-sm-4 col-md-4">
                      <input type="text" class="form-control" id="importe" name="importe" placeholder="" value="">
                    </div>


                    <div class="col-md-2 col-sm-2 control-label" for="fechcalc">
                      <h4>M&eacute;todo de C&aacute;lculo</h4>
                    </div>

                    <div class="col-sm-4 col-md-4">                      

                        <select name="tasa" class="form-control" id="tasalist" name="fechacalc" placeholder="" value="">    
                            <option value="tmix" selected="selected">Tasa Mix</option>
                            <option value="bna">Activa BNA</option>
                            <option value="blp">Activa BLP</option>
                        </select>

                    </div>
                </div>

							  <div class="form-group">
                  <div class="col-sm-12 col-md-12" style="text-align:center;">
                  <button style="background: url(imagenes/logos/fondo_azul.png);" type="submit" class="btn btn-info  btn-lg" name="calcular" onclick="">Calcular Intereses</button>
                  <button style="background: url(imagenes/logos/fondo_azul.png);" type="submit" class="btn btn-info  btn-lg" name="limpiar" onclick="">Limpiar Tabla</button>
                  <!--<a href="montosJuicios.php"><button type="button" class="btn btn-info  btn-lg" name="sucesiones">Volver a Calculo de Juicios</button></a>-->
								  </div>
                </div>

      </form>

  		</div>

	</div>
</div>
</div>
<!-- PONER EL CONTROS QUE SI EL VALOR TOTAL DE LA TABLA ES != DE 0 HACER LA TABLA, SINO LLEMARLA-->
<?php 

  if (isset($limpiar))
  {
    session_unregister('contador');
    session_unregister('valores');
    session_unregister('totales');
  }

  if(isset($calcular))
  {
    if(!isset($_SESSION['contador']))
    {
      $_SESSION['contador']=0;
      $contador=$_SESSION['contador'];
    } else
       {
        $contador=$_SESSION['contador']+1; // cambia +1 por ++
        }

    //coloco la tasa en una variable para que se coloque en la tabla

      if($tasa=="tmix")
        {
          $metodo="Tasa Mix";
        }else
        {
          if($tasa=="tactiva")
          {
            $metodo="Activa BNA";
          }else
          {
            if($tasa="blp")
              $metodo="Activa BLP";
          }
        }  

    //lleno la matriz de sessiones con los valores de la consulta y los del formulario
      $interes=($importe*$vindice_final);
      $valorFila= array($concep,$metodo,$vfdesde,$importe,$vindice_final,$interes,$importe+$interes,$contador);
      $_SESSION['valores'] [$contador]= $valorFila;
      $_SESSION['totales'] [$contador]= array($importe,$interes,$importe+$interes);

    
    if($importe=="" || !is_numeric($importe))
      {
        $texto="Tiene que colocar un valor numerico en Importe!";
        print "<script type='text/javascript'>alert('$texto')</script>";
      }
  else
    {
      
 ?>

  <div class="row">
  <div id="tablainteres" class="panel panel-default">
      <div class="panel-heading">
        Tabla de C&aacute;lculo de intereses
      </div>      
      
      <div id="interes" class="panel-body">
       <!--<form name="frmSample" class="form-horizontal" method="post" onSubmit="return ValidateForm()">-->
        <table class="table table-hover" id="tablaint">
          <th id="thint">Concepto</th>
          <th id="thint">Método</th>
          <th id="thint">Fecha Origen</th>
          <th id="thint">Tasa</th>
          <th id="thint">Importe</th>
          <th id="thint">Intereses</th>
          <th id="thint">Total</th>
          <!--<th>Eliminar</th>-->
          <?php 
            $total=array(); //cuenta el total de la suma de los valores
              $tot=0;
              $tot2=0;
              $tot3=0;
            for ($i=0; $i <= $contador ; $i++) { 
               
                print '<tr><td>'.$_SESSION['valores'] [$i][0].'</td><td>'.$_SESSION['valores'] [$i][1].'</td><td>'.$_SESSION['valores'] [$i][2].'</td><td>'.$_SESSION['valores'] [$i][4].'</td><td>'.$_SESSION['valores'] [$i][3];
                print '</td><td>'.$_SESSION['valores'] [$i][5].'</td><td>'.$_SESSION['valores'] [$i][6].'</td></tr>';
                $tot= $_SESSION['totales'] [$i][0]+ $tot;
                $tot2= $_SESSION['totales'] [$i][1] + $tot2;
                $tot3= $_SESSION['totales'] [$i][2] + $tot3;
                if($i==$contador)
                  print '<tr><td><b>Total</b></td><td></td><td></td><td></td><td>'.$tot.'</td><td>'.$tot2.'</td><td>'.$tot3.'</td></tr>';
                }

           ?>
           
        </table>
       
        <div id="noprint" class="form-group">
                  <div class="col-sm-12 col-md-12" style="text-align:center;">
                  <button id="boton-noticia" style="background: url(imagenes/logos/fondo_azul.png);" type='button' class='btn btn-info  btn-lg' name='calcular' onclick= 'doPrint ()'>Imprimir</button>
                  <!--<a href="montosJuicios.php"><button type="button" class="btn btn-info  btn-lg" name="sucesiones">Volver a Calculo de Juicios</button></a>-->
                  </div>
        </div>     

    </div>
  </div>

  </div>



<?php
      //las 2 {} son si se presiona el boton
    }
  }

include 'footer.php';
include 'footer1.php';
	
 }/*termina el else de que si no hay session disponible, o si no entro por el index */
 

?>
  </body>
  </html>

<script language = "Javascript">

    $("#vfdesde").datepicker({
        onSelect: function() {      
          var minDate = $(this).datepicker('getDate');
       
          minDate.setDate(minDate.getDate()+1);

          $("#vfhasta").datepicker("option","minDate", minDate);
          $("#vfhasta").datepicker("option", "maxDate", <?php
          $day=date('d');
          $month=date('m');
          $year=date('Y');
          print '"'.date("d/m/Y",(mktime(0,0,0,$month+1,1,$year)-1)).'"'; ?>); //toma el ultimo dia del mes actual
          $("#vfhasta").val('');
          $("#vfhasta").prop('disabled', false);
        }
    });

    $("#vfhasta").datepicker();  

    $('#borrar').click(function() {
    $("#vfdesde").val('');
    $("#vfhasta").val('');

});


$(function($){
$.datepicker.regional['es'] = {
closeText: 'Cerrar',
dateFormat: "dd/mm/yyyy",
prevText: '',
currentText: 'Hoy',
monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
weekHeader: 'Sm',
dateFormat: 'dd/mm/yy',
firstDay: 1,
isRTL: false,
showMonthAfterYear: false,
yearSuffix: ''
};
$.datepicker.setDefaults($.datepicker.regional['es']);
});

function doPrint(){
 window.print()
 }


</script>