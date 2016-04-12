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



  <nav class="navbar navbar-fixed-top navbar-default" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

		        <a id="marca" class="navbar-brand" href="index.php"><h4>Caja Forense de La Pampa</h4></a>

		</div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Inicio</a></li>
            <li><a href="institucional.php">Institucional</a></li>
            <li><a href="institucional.php#comision">Comisi&oacute;n de J&oacute;venes</a></li>
            <li><a href="contacto.php">Contacto</a></li>
          </ul>
        </div><!-- /.nav-collapse -->

       </div><!-- /.container -->
    </nav><!-- /.navbar -->
<?php
include 'logo.php';


?> <!-- php para las sucesiones-->

<div class="container" style="margin-top: 80px;">

  <div class="row">

	<div id="" class="panel panel-default">
  		<div class="panel-heading">
        C&aacute;lculo de intereses
      </div>   		
  		
  		<div id="" class="panel-body">
    	 <!--<form name="frmSample" class="form-horizontal" method="post" onSubmit="return ValidateForm()">-->

<?php  
if(isset($calcular))
{

    //esto es para que salga cartel de error por falta de importe o mal puesta la fecha
  
  $vfdesde =$_REQUEST["vfdesde"]; 
  $vfhasta= $_REQUEST["vfhasta"];
  $vmonto = $_REQUEST["vmonto"];
  $tasa= $_REQUEST["tasa"];
  $carat= $_REQUEST["carat"];
  $concep= $_REQUEST["concep"];
  $importe= $_REQUEST["importe"];

 if($importe!="" && is_numeric($importe))
  {
   print "<form name'frmSample' class='form-horizontal' method='post' action='calculoint.php'>";
  }
  else
    {
      $texto="Tiene que colocar un valor numerico en Importe!";
      print "<script type='text/javascript'>alert('$texto')</script>";
    }
}

?>
        
    <form name='frmSample' class='form-horizontal' method='post' action=''>
   <!--   =================================================================================================================================-->
								<!-- Juicio input-->

                <div class="form-group">
                    <div class="col-md-2 col-sm-2 control-label" for="carat">
                      <h4>Car&aacute;tula</h4>
                    </div>


                    <div class="col-sm-4 col-md-4">
            
                       <input type='text' class='form-control' id='carat' name='carat' placeholder='' value=''>
                      
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
                  <button style="background: url(imagenes/logos/fondo_azul.png);" type="submit" class="btn btn-info  btn-lg" name="calcular" onclick="control()">Calcular Intereses</button>
                  <!--<a href="montosJuicios.php"><button type="button" class="btn btn-info  btn-lg" name="sucesiones">Volver a Calculo de Juicios</button></a>-->
								  </div>
                </div>

						</form>

  		</div>

	</div>
</div>

<div class="row">
  <div id="" class="panel panel-default">
      <div class="panel-heading">
        Tabla de C&aacute;lculo
      </div>      
      
      <div id="" class="panel-body">
       <!--<form name="frmSample" class="form-horizontal" method="post" onSubmit="return ValidateForm()">-->
        <table class="table table-hover">
          <thead>
            <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Username</th>
            </tr>
          </thead>
          <tbody>
            <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            </tr>
            <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
            </tr>
            <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
            </tr>
          </tbody>
        </table
       
        <div class="form-group">
                  <div class="col-sm-12 col-md-12" style="text-align:center;">
                  <button style="background: url(imagenes/logos/fondo_azul.png);" type="submit" class="btn btn-info  btn-lg" name="imprimir" onclick="control()">Imprimir</button>
                  <!--<a href="montosJuicios.php"><button type="button" class="btn btn-info  btn-lg" name="sucesiones">Volver a Calculo de Juicios</button></a>-->
                  </div>
                </div>     

  </div>
</div>

</div>

<?php

include 'footer.php';
include 'footer1.php';
	}/*termina el else de que si no hay session disponible, o si no entro por el index */

if(isset($calcular))
  {
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
      $query= mysql_query($consulta) or die ("no se pudo realizar la consulta");  
      $numeroDias = cal_days_in_month(CAL_GREGORIAN, $mes0, $año0);
      $dias=$dia1-$dia0;
      $fila=  mysql_fetch_array($query);
      $vindice_final =  round($fila['indice']/$numeroDias* $dias,2);
    }else
      {
      // realiza la consulta 1 de 3 

      $consulta="select sum(indice) as indice from ".$tasa." where fecha >= '".date("Y-m-d", strtotime($vfecha1))."' and fecha < '".date("Y-m-d", strtotime($vfecha2))."' ";   
      $query= mysql_query($consulta) or die ("no se pudo realizar la consulta");  
      $fila= mysql_fetch_array($query);
      $vindice_final =  $fila["indice"];

      // consulta 2 de 3 el mes inicial

      $consulta="select indice from ".$tasa." where MONTH(fecha) = '".$mes0."' AND YEAR(fecha) = '".$año0."' ";  
      $query= mysql_query($consulta) or die ("no se pudo realizar la consulta");  
      $fila= mysql_fetch_array($query);
      $numeroDias = cal_days_in_month(CAL_GREGORIAN, $mes0, $año0); 
      $vindice_final = $vindice_final + ($fila['indice']/$numeroDias* ($numeroDias-$dia0+1));

  
      // consulta 3 de 3 el mes final
  
      $consulta="select indice from ".$tasa." where MONTH(fecha) = '".$mes1."' AND YEAR(fecha) = '".$año1."' ";  
      $query= mysql_query($consulta) or die ("no se pudo realizar la consulta");  
      $numeroDias = cal_days_in_month(CAL_GREGORIAN, $mes1, $año1);
      $fila=  mysql_fetch_array($query);
      $vindice_final =  round($vindice_final + (($fila['indice']/$numeroDias* $dia1)),2);
    }//del else si es un mismo mes el calculo

}//del isset calcular


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


</script>