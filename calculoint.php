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

  <title>Presupuesto de Sucesiones</title>
  </head>

  <body>

<?php
include 'navbar.php';

?> <!-- php para las sucesiones-->

<div class="container" id="containerCuerpo">



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

                      <input class="form-control" id="vfdesde" name="vfdesde" placeholder="DD/MM/AAAA" type="text" value=<?php if (isset($_POST['calcular'])) {print '"' . $vfdesde . '"';}?>>  <!--FECHA PARA EL CALCULO ORIGEN-->

                    </div>

                    <div class="col-md-2 col-sm-2 control-label" for="fechcalc">
                      <h4>Fecha C&aacute;lculo</h4>
                    </div>

                    <div class="col-sm-4 col-md-4">

                     <input class="form-control" id="vfhasta" name="vfhasta" placeholder="DD/MM/AAAA" type="text" value=<?php print($fecha_actual=date("d/m/Y")); if (isset($_POST['calcular'])) {print '"' . $vfhasta . '"';}?> disabled>  <!--FECHA PARA EL CALCULO FIN-->

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
                <!--<input type="button" style="background: url(imagenes/logos/fondo_azul.png);" class="btn btn-info  btn-lg" name="calcular" onClick="javascript:calcularTasa();" value="Calcular Intereses" />-->
                <input type="button" style="background: url(imagenes/logos/fondo_azul.png);" class="btn btn-info  btn-lg" name="calcular" id="calcular" onClick="verificaDatos();" value="Calcular Intereses" />
                  <!--<a href="montosJuicios.php"><button type="button" class="btn btn-info  btn-lg" name="sucesiones">Volver a Calculo de Juicios</button></a>-->
              </div>
            </div>

      </div>

  </div>

<!--<div id="mensaje"></div> // este es para verificar los datos que entrabas al ajax-->

  <div class="panel panel-default">
      <div class="panel-heading">
        Tabla de C&aacute;lculo de intereses
      </div>

      <div id="intereses" class="table-responsive">
       <!--<form name="frmSample" class="form-horizontal" method="post" onSubmit="return ValidateForm()">-->
        <table class="table" id="grilla">
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
            <th id="thint">Totales</th><th id="thint"></th><th id="thint"></th><th id="thint"></th><th id="thint"></th><th id="totImporte"></th><th id="totInteres"></th><th id="total"></th><th></th>
          </tfoot>

        </table>
    </div>
    <div class="panel-footer">       
      <button id="boton-noticia" style="background: url(imagenes/logos/fondo_azul.png);" type='button' class='btn btn-info  btn-lg' name='calcular' onclick= 'return imprInt();'>Imprimir</button>       
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

    $("#vfdesde").mask("99/99/9999",{placeholder:"DD/MM/AAAA"});
    $("#vfhasta").mask("99/99/9999",{placeholder:"DD/MM/AAAA"});

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
          //$("#vfhasta").val('');
          $("#vfhasta").prop('disabled', false);
        }
    });

    $("#vfhasta").datepicker();

    $('#borrar').click(function() {
      $("#vfdesde").val('');
      $("#vfhasta").val('');
    });

function verificaDatos()
  { 
    //saco los datos de los input
    var importe= document.getElementById("importe").value;   
    var tipoTasa= document.getElementById("tasalist").value;
    var fechaOrigen= document.getElementById("vfdesde").value;

    //convierto a enteros los string
    var importe= parseInt(importe);
    var fechaOrigen= parseInt(fechaOrigen);


    if(tipoTasa=="pactadasimple" || tipoTasa=="compuestaSimple")
    {
      var tasa= document.getElementById("tPactadasimple").value;
      var tasa= parseInt(tasa);
    }else
    {
      var tasa="";
    }
      
    //hago el control si esta la tasa y si no  para que no haga el calculo
    if(tasa.length!=0)
    {
      if(!isNaN(importe) && !isNaN(fechaOrigen) && !isNaN(tasa))
        {
          calcularTasa();
        }else
        {
          alert("Debe colocar valores en importe, tasa y en fecha de origen.");
        }
    }else
    {
     if(tasa.length=="")
      {
        if(!isNaN(importe) && !isNaN(fechaOrigen))
        {
          calcularTasa();
        }else
        {
          alert("Debe colocar valores en importe y en fecha de origen.");
        }
      }
    }
    
  }
</script>
