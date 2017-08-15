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

  <link rel="stylesheet" href="css/style.css">


<!--PARA EL DATEPICKER-->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="js/cajascript.js" type="text/javascript"></script>



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

        <form id="formint" name="frmSample" class="form-horizontal" method="" action="">
     <!-- =================================================================================================================================-->
                <!-- Juicio input-->

                <div class="form-group">
                    <div class="col-md-2 col-sm-2 control-label" for="carat">
                      <h4>Car&aacute;tula</h4>
                    </div>


                    <div class="col-sm-4 col-md-4">

                       <input type='text' class='form-control' id='carat' name='carat' placeholder='' value="">

                    </div>


                    <div class="col-sm-2 col-md-2 control-label" for="concep">
                      <h4>Concepto</h4>
                    </div>


                    <div class="col-sm-4 col-md-4">
                      <input type="text" class="form-control" id="concepto" name="concepto" placeholder="" value="">
                    </div>
                </div>



                <div class="form-group">
                    <div class="col-md-2 col-sm-2 control-label" for="fechcalc">
                      <h4>Fecha Origen</h4>
                    </div>

                    <div class="col-sm-4 col-md-4">

                      <input class="form-control" id="vfdesde" name="vfdesde" placeholder="DD/MM/YYYY" type="text" value=<?php if (isset($_POST['calcular'])) {print '"' . $vfdesde . '"';}?>>  <!--FECHA PARA EL CALCULO ORIGEN-->

                    </div>

                    <div class="col-md-2 col-sm-2 control-label" for="fechcalc">
                      <h4>Fecha C&aacute;lculo</h4>
                    </div>

                    <div class="col-sm-4 col-md-4">

                     <input class="form-control" id="vfhasta" name="vfhasta" placeholder="DD/MM/YYYY" type="text" value=<?php if (isset($_POST['calcular'])) {print '"' . $vfhasta . '"';}?>>  <!--FECHA PARA EL CALCULO FIN-->

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

                        <select name="tasa" class="form-control" id="tasalist" name="fechacalc" placeholder="" value="" onChange="mirarTasa();">
                            <option value="tmix" selected="selected">Tasa Mix</option>
                            <option value="tactiva">Activa BLP</option>
                            <option value="tpasiva">Pasiva BLP</option>
                            <option value="pactadasimple">Pactada Simple Mensual</option>
                            <option value="compuestaSimple">Interes Compuesta</option>
                        </select>

                    </div>
                </div>

            </form>

            <div class="form-group">
              <div class="col-sm-12 col-md-12" style="text-align:center;">
                <input type="button" style="background: url(imagenes/logos/fondo_azul.png);" class="btn btn-info  btn-lg" name="calcular" onClick="javascript:calcularTasa();" value="Calcular Intereses" />

                  <!--<a href="montosJuicios.php"><button type="button" class="btn btn-info  btn-lg" name="sucesiones">Volver a Calculo de Juicios</button></a>-->
              </div>
            </div>

      </div>

  </div>
</div>
<!--<div id="mensaje"></div> // este es para verificar los datos que entrabas al ajax-->
  <div class="row">
  <div class="panel panel-default">
      <div class="panel-heading">
        Tabla de C&aacute;lculo de intereses
      </div>

      <div id="intereses" class="table-responsive">
       <!--<form name="frmSample" class="form-horizontal" method="post" onSubmit="return ValidateForm()">-->
        <table class="table table-hover" id="grilla">
          <thead>
            <th id="thint">Concepto</th>
            <th id="thint">Método</th>
            <th id="thint">Fecha Origen</th>
            <th id="thint">Fecha Cálculo</th>
            <th id="thint">Tasa</th>
            <th id="thint">Importe</th>
            <th id="thint">Intereses</th>
            <th id="thint">Total</th>
            <th id="thint">Eliminar</th>
          </thead>
          <tbody>

          </tbody>
          <tfoot>
            <th id="thint">Totales</th><th></th><th></th><th></th><th></th><th id="totImporte"></th><th id="totInteres"></th><th id="total"></th>
          </tfoot>

        </table>
    </div>
    <div class="panel-footer">       
      <button id="boton-noticia" style="background: url(imagenes/logos/fondo_azul.png);" type='button' class='btn btn-info  btn-lg' name='calcular' onclick= 'return imprInt();'>Imprimir</button>       
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
yearSuffix: '',
orientation: 'bottom auto',
};
$.datepicker.setDefaults($.datepicker.regional['es']);
});

    $("#vfdesde").datepicker({
        onSelect: function() {

          var minDate = $(this).datepicker('getDate');

          minDate.setDate(minDate.getDate()+1);

          $("#vfhasta").datepicker("option","minDate", minDate);
          $("#vfhasta").datepicker("option", "maxDate", <?php
          $day   = date('d');
          $month = date('m');
          $year  = date('Y');
          print '"' . date("d/m/Y", (mktime(0, 0, 0, $month + 1, 1, $year) - 1)) . '"';?>); //toma el ultimo dia del mes actual
          $("#vfhasta").val('');
          $("#vfhasta").prop('disabled', false);
        }
    });

    $("#vfhasta").datepicker();

    $('#borrar').click(function() {
      $("#vfdesde").val('');
      $("#vfhasta").val('');
    });
</script>
