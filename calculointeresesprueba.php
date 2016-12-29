<?php
session_start();
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

  <link rel="stylesheet" href="css/jquery-ui.css">
  <script src="js/jquery-1.10.2.js"></script>
  <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="css/style.css">
  

<!--PARA EL DATEPICKER-->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">

  <title>Presupuesto de Sucesiones</title>
  </head>

  <body>

<?php
include 'navbarFooter.php';
include 'logo.php';

?> <!-- php para las sucesiones-->

<div class="container" style="margin-top: 200px;">

  <div class="row">

	<div id="" class="panel panel-default">
  		<div class="panel-heading">
        C&aacute;lculo de intereses
      </div>   		
  		
  		<div id="" class="panel-body">
    	 <!--<form name="frmSample" class="form-horizontal" method="post" onSubmit="return ValidateForm()">-->
      
        <form name="frmSample" class="form-horizontal" method="post" action="">
     <!-- =================================================================================================================================-->
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
            <td><input id="txtDate" type="text" /></td>
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

?>
  </body>
  </html>

<script language = "Javascript">

$(document).ready(function() {
            $("#vfdesde").keyup(function(){
                if ($(this).val().length == 2){
                    $(this).val($(this).val() + "/");
                }else if ($(this).val().length == 5){
                    $(this).val($(this).val() + "/");
                }
            });
});

/*

function ValidateForm(){
  var dt=document.frmSample.fechaorig
  if (isDate(dt.value)==false){
    dt.focus()
    return false
  }
    return true
    
 }
*/

    $("#vfdesde").datepicker({
        onSelect: function() {      
          var minDate = $(this).datepicker('getDate');
          minDate.setDate(minDate.getDate()+1);
          $("#vfhasta").datepicker("option","minDate", minDate);
          $("#vfhasta").val('');
          $("#vfhasta").prop('disabled', false);
        }
    });

    $("#vfhasta").datepicker();  
/*

$("#datepicker1").datepicker();
$("#datepicker2").datepicker();

$("#datepicker1").change(function() {

  if ($("#datepicker1").datepicker("getDate") !== null) {
    $("#datepicker2").val('');
    $("#datepicker2").prop('disabled', false);
  } else {
    $("#datepicker2").prop('disabled', true);
  }

});*/

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